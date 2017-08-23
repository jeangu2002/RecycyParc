<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType; 
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Dechet;
use AppBundle\Entity\Conteneur;

/**
 * Description of DechetType
 *
 * @author jean-gustave
 */
class DechetType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        /*$builder->add('conteneur', EntityType::class,
                array('class' => 'AppBundle:Conteneur',
                    'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c');},
                    'choice_label' => 'emplacement'));*/
        $builder ->add('nom', TextType::class)
                ->add('volumeDeBase', TextType::class)
                ->add('quota', NumberType::class)
                ;
    }
    
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Dechet::class,
        ));
    }
}
