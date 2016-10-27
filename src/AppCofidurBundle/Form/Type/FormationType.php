<?php

namespace AppCofidurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,    array('label_format' => 'formation.name'))
            ->add('type', TextType::class,    array('label_format' => 'formation.type'))
            ->add('goal', TextareaType::class,    array('label_format' => 'formation.goal'))
            ->add('teachingAids', TextareaType::class,  array('label_format' => 'formation.teachingAids'))
            ->add('placesMaterialRessources', TextType::class,  array('label_format' => 'formation.placesMaterialRessources'))
            ->add('criticality', ChoiceType::class,
               array('label_format' => 'formation.criticality',
                    'choices'  => array(
                        1 => '1',
                        2 => '1+',
                        3 => '2',
                        4 => '2+',
                        5 => '3',
                        6 => '3+',
                    ),
                )
            )
            ->add('save', SubmitType::class, array('label_format' => 'formation.save.submit'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\Formation',
        ));
    }
}
