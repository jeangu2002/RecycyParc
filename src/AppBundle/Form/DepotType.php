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
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Depot;
/**
 * Description of DepotType
 *
 * @author jean-gustave
 */
class DepotType extends AbstractType {
   
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('volume', IntegerType::class);
        
        $builder->add('contenu',CollectionType::class,array('entry_type'=> ContenuDepotType::class, 
                    ));
        $builder->add('menage', EntityType::class, array('class' => 'AppBundle:Menage',
                    'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('m')->orderBy('m.nom','ASC');},
                    'choice_label' => function ($menage) {
                                         return $menage->getNom() . ' ' . $menage->getPrenom();
                                      }));
    }
    
     public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Depot::class,
        ));
    }
}
