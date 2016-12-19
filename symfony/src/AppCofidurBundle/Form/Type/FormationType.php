<?php

namespace AppCofidurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class,      ['label_format' => 'formation.type'])
            ->add('reference', TextType::class,      ['label_format' => 'formation.reference'])
            ->add('name', TextType::class,      ['label_format' => 'formation.name'])
            ->add('sector', TextType::class,  ['label_format' => 'formation.sector'])
            ->add('goal', TextareaType::class,  ['label_format' => 'formation.goal'])
            ->add('teachingAids', TextareaType::class,  ['label_format' => 'formation.teachingAids'])
            ->add('placesMaterialRessources', TextType::class,
                ['label_format' => 'formation.placesMaterialRessources']
            )
            ->add('reference', TextType::class,
                ['label_format' => 'formation.reference']
            )
            ->add('validityTime', NumberType::class,   ['label_format' => 'formation.validityTime'])
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
            ->add('save', SubmitType::class, ['label_format' => 'formation.save.submit']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\Formation',
        ));
    }
}
