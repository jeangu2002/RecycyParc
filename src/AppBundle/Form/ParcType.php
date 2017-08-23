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
use AppBundle\Entity\Parc;
/**
 * Description of ParcType
 *
 * @author jean-gustave
 */
class ParcType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
         $builder ->add('rue', TextType::class)
                ->add('numero', IntegerType::class)
                ->add('codePostal', IntegerType::class)
                ->add('localite', TextType::class)
                ->add('telephone', TextType::class);
                
    }
    
     public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Parc::class,
        ));
    }
}
