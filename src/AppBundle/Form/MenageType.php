<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Entity\Menage;

/**
 * Description of MenageType
 *
 * @author jean-gustave
 */
class MenageType extends AbstractType{
     public function buildForm(FormBuilderInterface $builder, array $options)
     {
                $builder ->add('nom', TextType::class)
                ->add('prenom', TextType::class)
                ->add('email', EmailType::class)
                ->add('rue', TextType::class)
                ->add('numero', IntegerType::class)
                ->add('boite', IntegerType::class)
                ->add('commune', ChoiceType::class, array(
                    'choices'=>array(
                        '---'=>'-',
                        )))
                ->add('localite',ChoiceType::class, array(
                    'choices'=>array(
                        '---'=>'-',
                        )))
                ->add('enfants', IntegerType::class)
                ->add('adultes', IntegerType::class)
               ;
                
                 $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
                    $entity = $event->getData();
                    //if($entity == null)
                        //return;
                    $commune = $entity['commune'];
                    $localite = $entity['localite'];

                    $event->getForm()->add('commune', ChoiceType::class, array(
                    'choices'=>array(
                        $commune=>$commune,
                        )))
                ->add('localite',ChoiceType::class, array(
                    'choices'=>array(
                        $localite=>$localite,
                        )));
                });
                
     }
     public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Menage::class,
        ));
    }
}
