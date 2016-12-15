<?php

namespace AppCofidurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SkillMatrixType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder   
            ->add('formation', EntityType::class,
                array(
                    'class'  => 'AppCofidurBundle:Formation',
                    'choice_label' => 'name',
                    'required' => false,
                    'label_format' => 'Formation',
                )
            )   
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
                    'required' => false,
                )
            )
            ->add('qualification', ChoiceType::class,
                array(
                    'choices'  => array(
                        1 => 'Formé non habilité',
                        2 => 'En Formation',
                        3 => 'Prévision Formation',
                        4 => 'Habilité',
                        5 => 'Habilité à former',
                    ),
                    'required' => false,
                    'label_format' => 'Qualification',
                )
            ) 
            ->add('superiorLvl1', EntityType::class,
                array(
                    'class'  => 'AppCofidurBundle:User',
                    'choice_label' => 'username',
                    'required' => false,
                    'label_format' => 'Superieur Niveau 1',
                )
            ) 
            ->add('superiorLvl2', EntityType::class,
                array(
                    'class'  => 'AppCofidurBundle:User',
                    'choice_label' => 'username',
                    'required' => false,
                    'label_format' => 'Superieur Niveau 2',
                )
            )     
            ->add('statut', ChoiceType::class,
                array(
                    'choices'  => array(
                        1 => 'Interim',
                        2 => 'CDD',
                        3 => 'CDI',
                    ),
                    'required' => false,
                    'label_format' => 'Statut',
                )
            )
            ->add('save', SubmitType::class, array('label' => 'Recherche'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

}
