<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
 
/**
 * Description of RegisterationType
 *
 * @author jean-gustave
 */
class RegistrationType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder->add('nom');
       $builder->add('prenom');
       $builder->add('roles',"Symfony\Component\Form\Extension\Core\Type\ChoiceType", array(
                        'choices' => array('Employé' => 'ROLE_EMPLOYE', 'Gérant' => 'ROLE_GERANT','Gérant de l\'intercommunale'=>'ROLE_GERANT_INTERCOMMUNALE'),
                        'multiple' => true,
                    ))
               ->add('parc', EntityType::class, array('class' => 'AppBundle:Parc',
                    'query_builder' => function (\AppBundle\Repository\ParcRepository $er) {
                    return $er->createQueryBuilder('p')->orderBy('p.rue','ASC');},
                    'choice_label' => function ($parc) {
                                         return $parc->getRue(). ' ' . $parc->getNumero().' '.$parc->getLocalite();
                                      }));
    }
     public function getParent()
    {
       return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
 
   public function getBlockPrefix()
 
   {
       return 'app_user_registration';
   }
 
   public function getName()
   {
       return $this->getBlockPrefix();
   }
   
   
}
