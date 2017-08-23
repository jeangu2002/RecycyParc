<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ConteneurType;
use AppBundle\Entity\Conteneur;

class ConteneurController extends Controller
{
    public function createAction(Request $request)
    {
        $conteneur = new Conteneur;
        $form = $this->createForm(ConteneurType::class, $conteneur);
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
            $menage = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $repo = $em->getRepository(Conteneur::class);
            $repo->add($conteneur);
            return $this->redirectToRoute('conteneur_show_all');
        }else
        {   
            return $this->render('AppBundle:Conteneur:create.html.twig', array(
                'form' => $form->createView(),
            ));
        }
    }

    public function deleteAction()
    {
        return $this->render('AppBundle:Conteneur:delete.html.twig', array(
            // ...
        ));
    }

    public function editAction()
    {
        return $this->render('AppBundle:Conteneur:edit.html.twig', array(
            // ...
        ));
    }

    public function showAllAction()
    {
        return $this->render('AppBundle:Conteneur:show_all.html.twig', array(
            // ...
        ));
    }
    
    public function cloturerAction(\Doctrine\ORM\EntityManager $em, $id)
    {
        $em->getRepository(Conteneur::class)->cloturer($id);
        return $this->redirectToRoute('user_show_all');
    }

}
