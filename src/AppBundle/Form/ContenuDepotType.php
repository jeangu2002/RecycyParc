<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Doctrine\ORM\EntityRepository;

/**
 * Description of ContenuDepotType
 *
 * @author jean-gustave
 */
class ContenuDepotType extends AbstractType {
   
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder ->add('id', IntegerType::class)
                ->add('quantite',NumberType::class)
                ->add('dechet', EntityType::class,array('class' => 'AppBundle:Dechet','choice_label' => 'nom'));/*,
                array('class' => 'AppBundle:Dechet',
                    'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p');},
                    'choice_label' => 'nom'));*/
    }
    
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => \AppBundle\Entity\ContenuDepot::class,
        ));
    }
}
