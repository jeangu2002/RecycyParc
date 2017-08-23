<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Depot;
use AppBundle\Form\DepotType;
use AppBundle\Entity\Dechet;
use AppBundle\Entity\ContenuDepot;

class DepotController extends Controller {

    public function createAction(\Symfony\Component\HttpFoundation\Request $request) {
        $depot = new Depot();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Dechet::class);
        $dechets = $repo->getAll();
        foreach ($dechets as $dechet) {
            $contenu = new ContenuDepot();
            $contenu->setDechet($dechet);
            $contenu->setDepot($depot);
            $depot->getContenu()->add($contenu);
        }
        $depot->setParc($this->getUser()->getParc());
        $form = $this->createForm(DepotType::class, $depot);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $quantiteJournaliere = $em->getRepository(\AppBundle\Entity\Menage::class)->getQuotaJournalier($depot->getMenage()->getId());
            $this->addFlash(
                    'notice', 'La quantité journalière est dépassée'
            );
            if ($quantiteJournaliere >= 4) {
                return $this->render('AppBundle:Depot:create.html.twig', array(
                            'form' => $form->createView()
                ));
            }

            $em = $this->getDoctrine()->getManager();
            $repo = $em->getRepository(Depot::class);
            $repo->add($depot);
            return $this->redirectToRoute('depot_show_all');
        } else {
            return $this->render('AppBundle:Depot:create.html.twig', array(
                        'form' => $form->createView()
            ));
        }
    }

    public function deleteAction() {
        return $this->render('AppBundle:Depot:delete.html.twig', array(
                        // ...
        ));
    }

    public function editAction() {
        return $this->render('AppBundle:Depot:edit.html.twig', array(
                        // ...
        ));
    }

    public function showAllAction() {
        return $this->render('AppBundle:Depot:show_all.html.twig', array(
                        // ...
        ));
    }

}
