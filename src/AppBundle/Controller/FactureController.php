<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Menage;
use AppBundle\Entity\Facture;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\JsonResponse;

class FactureController extends Controller {

    public function generateAction(\Doctrine\ORM\EntityManagerInterface $em) {
        $menages = $em->getRepository(Menage::class)->getAllWithRelatedEntities();
        $dechets = $em->getRepository(\AppBundle\Entity\Dechet::class)->findAll();
        foreach ($menages as $menage) {
            if ($menage->getDepots() != null) {
                $facture = new Facture();
                $facture->setMenage($menage);
                $depotsMenages = $menage->getDepots();
                foreach ($depotsMenages as $depots) {
                    $contenusDepots = $depots->getContenu();
                    foreach ($dechets as $dechet) {
                        //filter contenusDepots to calculate each amount separately
                        $contenusFiltres = $contenusDepots->filter(function($element) use($dechet) {
                            return $element->getDechet()->getNom() == $dechet->getNom();
                        });
                        if ($contenusFiltres != null) {
                            $montantDetaille = new \AppBundle\Entity\MontantDetaille();
                            $montantDetaille->setDechet($dechet);
                            $montantDetaille->setFacture($facture);
                            foreach ($contenusFiltres as $content) {
                                $montantDetaille->addQuantite($content->getQuantite());
                            }
                            $volumeAutorise = $dechet->getVolumeDeBase() + ($dechet->getVolumeDebase() * ($menage->getCoefficientDeCorrection() / 100));
                            if ($montantDetaille->getQuantite() > $volumeAutorise) {
                                $surplus = $montantDetaille->getQuantite() - $volumeAutorise;
                                $montantSurplus = 0;
                                if ($surplus >= ($volumeAutorise * 0.2)) {
                                    $montantSurplus = (($surplus / 0.25) * $dechet->getVariable20()) + $dechet->getForfait20();
                                } else if ($surplus >= ($volumeAutorise * 0.5)) {
                                    $montantSurplus = (($surplus / 0.25) * $dechet->getVariable50()) + $dechet->getForfait50();
                                } else {
                                    $montantSurplus = (($surplus / 0.25) * $dechet->getVariable50Plus()) + $dechet->getForfait50Plus();
                                }
                                $montantDetaille->setMontant($montantSurplus);
                            }
                            $facture->addMontantDetaille($montantDetaille);
                        }
                    }
                    foreach ($contenusDepots as $contenu) {
                        $contenu->setFacture($facture);
                        $facture->addContenuDechet($contenu);
                    }
                }

                $facture->calculateTotalAmount();
                $em->getRepository(Facture::class)->add($facture);
            }
        }

        return $this->render('AppBundle:Facture:generate.html.twig', array(
                        // ...
        ));
    }

    public function getDetailsAction(Request $request, $id) {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $montantDetailles = $em->getRepository(Facture::class)->getDetails($id);
            $response = new \Symfony\Component\HttpFoundation\Response(json_encode($montantDetailles));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
        return new \Symfony\Component\HttpFoundation\Response();
    }

}
