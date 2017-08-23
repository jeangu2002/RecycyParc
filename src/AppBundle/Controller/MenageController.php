<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use AppBundle\Entity\Menage;
use AppBundle\Entity\Facture;
use AppBundle\Form\MenageType;
use AppBundle\Service\CoefficientManager;
use Doctrine\ORM\EntityManager;

class MenageController extends Controller {

    public function createAction(Request $request, CoefficientManager $cm) {

        $menage = new Menage();

        $form = $this->createForm(MenageType::class, $menage);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $menage = $form->getData();
            $coefficient = $cm->calculate($menage->getEnfants(), $menage->getAdultes());
            $menage->setCoefficientDeCorrection($coefficient);
            $em = $this->getDoctrine()->getManager();
            $repo = $em->getRepository(Menage::class);
            $repo->add($menage);
            return $this->redirectToRoute('menage_show_all');
        } else {
            return $this->render('AppBundle:Menage:create.html.twig', array(
                        'form' => $form->createView(),
            ));
        }
    }

    public function deleteAction(EntityManagerInterface $em, $id) {
        if ($em->getRepository(Menage::class)->delete($id))
        {
            $this->addFlash('notice', 'le ménage a été supprimé avec succès');
            return $this->render ('AppBundle:Menage:delete.html.twig', array ());
        }
        else
        {
            return $this->render ('AppBundle:Menage:delete.html.twig', array ());
        }
    }

    public function editAction(Request $request, EntityManager $em, CoefficientManager $cm, $id) {
        $menage = $em->getRepository(Menage::class)->find($id);

        $form = $this->createForm(MenageType::class, $menage);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $menage = $form->getData();
            $coefficient = $cm->calculate($menage->getEnfants(), $menage->getAdultes());
            $menage->setCoefficientDeCorrection($coefficient);
            $em = $this->getDoctrine()->getManager();
            $repo = $em->getRepository(Menage::class);
            $repo->update($menage);
            $this->addFlash('notice', 'le ménage a été modifié avec succès');
            return $this->redirectToRoute('menage_show_all');
        } else {
            return $this->render('AppBundle:Menage:create.html.twig', array(
                        'form' => $form->createView(),
            ));
        }
        return $this->render('AppBundle:Menage:edit.html.twig', array("form" => $form->createView(),
                        // ...
        ));
    }

    public function showAllAction(EntityManagerInterface $em) {
        $menages = $em->getRepository(Menage::class)
                ->getAll();
        return $this->render('AppBundle:Menage:show_all.html.twig', array('menages' => $menages));
    }

    public function getDetailsAction($id, EntityManagerInterface $em) {
        $menage = $em->getRepository(Menage::class)->find($id);
        $dechets = $em->getRepository(Menage::class)->getQuotas($menage->getId());
//        if (count($dechets) > 0) {
//            $quotas = Array();
//            for ($i = 0; $i < count($dechets); $i++) {
//                
//            }
//        }

        return $this->render('AppBundle:Menage:details.html.twig', array('menage' => $menage, 'dechets' => $dechets));
    }

    public function getFacturesAction($id, EntityManagerInterface $em) {
        $factures = $em->getRepository(Facture::class)->getByMenage($id);
        return $this->render('AppBundle:Facture:general_view.html.twig', array('factures' => $factures));
    }

    function search($keywords) {
        
    }

}
