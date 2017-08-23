<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Dechet;
use \AppBundle\Form\DechetType;
use Symfony\Component\HttpFoundation\Response;

class DechetController extends Controller
{
    public function createAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $dechet = new Dechet();
        $form = $this->createForm(DechetType::class,$dechet);
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
            $menage = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $repo = $em->getRepository(Dechet::class);
            $repo->add($dechet);
            return $this->redirectToRoute('dechet_show_all');
        }else
        {   
            return $this->render('AppBundle:Dechet:create.html.twig', array(
                'form' => $form->createView(),
            ));
        }
    }

    public function editAction()
    {
        return $this->render('AppBundle:Dechet:edit.html.twig', array(
            // ...
        ));
    }

    public function deleteAction()
    {
        return $this->render('AppBundle:Dechet:delete.html.twig', array(
            // ...
        ));
    }
    
    public function showAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dechets = $em->getRepository(Dechet::class)
        ->getAll();
         return $this->render('AppBundle:Dechet:show_all.html.twig', array(
            'dechets'=>$dechets
        ));
    }
    
    public function getAllAction(\Doctrine\ORM\EntityManager $em)
    {
        $dechets = $em->getRepository(Dechet::class)->findAll();
        return new Response(json_encode($dechets));
    }

}
