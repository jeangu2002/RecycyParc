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
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Conteneur;

/**
 * Description of ConteneurType
 *
 * @author jean-gustave
 */
class ConteneurType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder ->add('contenance', TextType::class)
                ->add('emplacement', IntegerType::class)
                ->add('niveau', IntegerType::class);
        $builder->add('parc', EntityType::class,
                array('class' => 'AppBundle:Parc',
                    'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p');},
                    'choice_label' => 'rue'));
        $builder->add('dechets', EntityType::class,
                array('class' => 'AppBundle:Dechet',
                    'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p');},
                    'choice_label' => 'nom'));
        
       
}
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Conteneur::class,
        ));
    }
}
