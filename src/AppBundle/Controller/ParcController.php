<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Parc;
use AppBundle\Form\ParcType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\ViewModels\StatsJournalierViewModel;
use AppBundle\ViewModels\StatMensuelViewModel;

/**
 * Modelise a un parc à conteneur
 */
class ParcController extends Controller {

    /**
     * creates a new park
     * @return type
     */
    public function createAction(\Symfony\Component\HttpFoundation\Request $request) {
        $parc = new Parc();
        $form = $this->createForm(ParcType::class, $parc);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $menage = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $repo = $em->getRepository(Parc::class);
            $repo->add($parc);
            return $this->redirectToRoute('parc_show_all');
        } else {
            return $this->render('AppBundle:Parc:create.html.twig', array(
                        'form' => $form->createView(),
            ));
        }
    }

    /**
     * deletes a park for the given id
     * @param type $id 
     * @return type
     */
    public function deleteAction($id) {
        return $this->render('AppBundle:Parc:delete.html.twig', array(
                        // ...
        ));
    }

    /**
     * edit a park based on its id
     * éparam type $id 
     * @return type
     */
    public function editAction(\Doctrine\ORM\EntityManager $em, Request $request, $id) {
        $parc = $em->getRepository(Parc::class)->find($id);
        $form = $this->createForm(ParcType::class, $parc);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $menage = $form->getData();
            $em->getRepository(Parc::class)->add($parc);
            return $this->redirectToRoute('parc_show_all');
        } else {
            return $this->render('AppBundle:Parc:create.html.twig', array(
                        'form' => $form->createView(),
            ));
        }
        return $this->render('AppBundle:Parc:edit.html.twig', array(
                        // ...
        ));
    }

    /**
     * shows all parks
     * @return type
     */
    public function showAllAction() {
        $em = $this->getDoctrine()->getManager();
        $parcs = $em->getRepository(Parc::class)
                ->getAll();
        return $this->render('AppBundle:Parc:show_all.html.twig', array('parcs' => $parcs
        ));
    }

    public function showStatsAction(\Doctrine\ORM\EntityManager $em) {
        $dechets = $em->getRepository(\AppBundle\Entity\Dechet::class)->findAll();
        return $this->render('AppBundle:Parc:statistiques.html.twig', array('dechets' => $dechets));
    }

    public function getStatsAction(Request $request, \Doctrine\ORM\EntityManager $em) {
        if ($request->isXMLHttpRequest()) {
            $type = $request->get("type");
            $moyen = $request->get("moyen");
            $typeDechet = $request->get("typeDechet");
            switch ($type) {
                case "mensuel": {

                        if ($moyen == "moyenneVolumeDechets" && $typeDechet != 0) {
                            $stats = $em->getRepository(Parc::class)->getStatsVolumeMensuelFiltre($typeDechet);
                            $statsJournaliers = array();
                            for ($i = 0; $i < count($stats); $i++) {
                                array_push($statsJournaliers, new StatMensuelViewModel($stats[$i]["mois"], $stats[$i]["quantite"],"m³"));
                            }

                            return new Response(json_encode($statsJournaliers));
                        } else if ($moyen == "moyenneVolumeDechets" && $typeDechet == 0) {
                            $stats = $em->getRepository(Parc::class)->getStatsVolumeMensuel();
                            $statsJournaliers = array();
                            for ($i = 0; $i < count($stats); $i++) {
                                array_push($statsJournaliers, new StatMensuelViewModel ($stats[$i]["mois"], $stats[$i]["quantite"],"m³"));
                            }

                            return new Response(json_encode($statsJournaliers));
                        } else if ($moyen == "nombreVisite") {
                            $stats = $em->getRepository(Parc::class)->getStatsMensuel();
                            $statsJournaliers = array();
                            for ($i = 0; $i < count($stats); $i++) {
                                array_push($statsJournaliers, new StatMensuelViewModel ($stats[$i]["mois"], $stats[$i]["quantite"],""));
                            }

                            return new Response(json_encode($statsJournaliers));
                        } 
                        break;
                    }
                case "journalier": {
                        if ($moyen == "moyenneVolumeDechets" && $typeDechet == 0) {
                            $stats = $em->getRepository(Parc::class)->getStatsVolumeJournalier();
                            $statsJournaliers = array();
                            for ($i = 0; $i < count($stats); $i++) {
                                array_push($statsJournaliers, new StatsJournalierViewModel($stats[$i]["jour"], $stats[$i]["quantite"],"m³"));
                            }

                            return new Response(json_encode($statsJournaliers));
                            
                        } else if ($moyen == "moyenneVolumeDechets" && $typeDechet != 0) {
                            $stats = $em->getRepository(Parc::class)->getStatsVolumeJournalierFiltre($typeDechet);
                            $statsJournaliers = array();
                            for ($i = 0; $i < count($stats); $i++) {
                                array_push($statsJournaliers, new StatsJournalierViewModel($stats[$i]["jour"], $stats[$i]["quantite"],"m³"));
                            }

                            return new Response(json_encode($statsJournaliers));
                        } elseif ($moyen == "nombreVisite") {
                            $stats = $em->getRepository(Parc::class)->getStatsJournalier();
                            $statsJournaliers = array();
                            for ($i = 0; $i < count($stats); $i++) {
                                array_push($statsJournaliers, new StatsJournalierViewModel($stats[$i]["jour"], $stats[$i]["quantite"],""));
                            }

                            return new Response(json_encode($statsJournaliers));
                        }

                        break;
                    }

                default:
                    break;
            }
        }
    }

}
