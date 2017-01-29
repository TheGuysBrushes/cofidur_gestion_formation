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
                    'label_format' => 'formation.title',
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
                        1 => 'operatorFormation.qualificationChoices.formedUnentitled',
                        2 => 'operatorFormation.qualificationChoices.forming',
                        3 => 'operatorFormation.qualificationChoices.foreseenFormation',
                        4 => 'operatorFormation.qualificationChoices.formed',
                        5 => 'operatorFormation.qualificationChoices.canForm',
                    ),
                    'required' => false,
                    'label_format' => 'operatorFormation.qualification',
                )
            ) 
            ->add('superiorLvl1', EntityType::class,
                array(
                    'class'  => 'AppCofidurBundle:User',
                    'choice_label' => 'username',
                    'required' => false,
                    'label_format' => 'operator.superior1',
                )
            ) 
            ->add('superiorLvl2', EntityType::class,
                array(
                    'class'  => 'AppCofidurBundle:User',
                    'choice_label' => 'username',
                    'required' => false,
                    'label_format' => 'operator.superior2',
                )
            )     
            ->add('status', ChoiceType::class,
                array(
                    'choices'  => array(
                        1 => 'operator.statusChoices.interim',
                        2 => 'operator.statusChoices.cdd',
                        3 => 'operator.statusChoices.cdi',
                    ),
                    'required' => false,
                    'label_format' => 'operator.employmentStatus',
                )
            )
            ->add('save', SubmitType::class, array('label' => 'various.search'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

}
