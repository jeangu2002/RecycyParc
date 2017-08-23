<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type;
use AppBundle\Entity\Utilisateur;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Conteneur;

class UserController extends BaseController
{
    /**
     * @Route("/index")
     */
    public function indexAction(EntityManager $em)
    {
        if($this->container->get('security.authorization_checker')->isGranted('ROLE_GERANT'))
        {
            $idParc = $this->getUser()->getParc()->getId();
            $conteneursAlmostFull = $em->getRepository(Conteneur::class)->getAlmostFull($idParc);
            $conteneurs = $em->getRepository(Conteneur::class)->getParcConteneurs($idParc);
            
            return $this->render('AppBundle:User:index.html.twig', array('conteneursLimite'=>$conteneursAlmostFull, 'conteneurs'=>$conteneurs));
        }elseif($this->container->get('security.authorization_checker')->isGranted('ROLE_GERANT_INTERCOMMUNALE'))
        {
             $parcs = $em->getRepository(\AppBundle\Entity\Parc::class)->findAllWithRelatedEntities();
             return $this->render('AppBundle:User:index.html.twig', array('parcs'=>$parcs));
        }
        return $this->render('AppBundle:User:index.html.twig', array(
            // ...
        ));
    }
    
    public function register()
    {
        $user = new Utilisateur();
        $form = $this->createFormBuilder($user)
        ->add('nom', TextType::class)
        ->add('prenom',TextType::class)
        ->add('Inscription', Type\SubmitType::class,array('label' => 'Inscription'))
        ->getForm();
        return $this->render('User/register.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    

}
