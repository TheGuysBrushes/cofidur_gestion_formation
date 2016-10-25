<?php

namespace AppCofidurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,    array('label' => 'formation.name'))
            ->add('type', TextType::class,    array('label' => 'formation.type'))
            ->add('goal', TextType::class,    array('label' => 'formation.goal'))
            ->add('teachingAids', TextType::class,  array('label' => 'formation.teachingAids'))
            ->add('placesMaterialRessources', TextType::class,  array('label' => 'formation.placesMaterialRessources'))           
            ->add('criticality', ChoiceType::class,  
               array('label' => 'formation.criticality', 
                    'choices'  => array(
                        1 => '1',
                        2 => '2',
                        3 => '3',
                    ),
                )
            )
            ->add('save', SubmitType::class, array('label' => 'formation.save.submit'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\Formation',
        ));
    }
}