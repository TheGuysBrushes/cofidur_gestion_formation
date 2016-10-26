<?php

namespace AppCofidurBundle\Form\Type;

use AppCofidurBundle\Entity\Operator;
use AppCofidurBundle\Entity\Formation;

use Doctrine\ORM\EntityManager;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OperatorFormationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('operator', EntityType::class,
               array('class'  => 'AppCofidurBundle:User', 'choice_label' => 'firstName'))
            ->add('formation', EntityType::class,
               array('class'  => 'AppCofidurBundle:Formation', 'choice_label' => 'name'))
            ->add('dateBegin', DateType::class,
                array('label' => 'operatorFormation.dateBegin'))
            ->add('dateEnd', DateType::class,
                array('label' => 'operatorFormation.dateEnd'))
            ->add('validation', ChoiceType::class,
               array(
                    'choices'  => array(
                        1 => 'operatorFormation.choices.unvalidated',
                        2 => 'operatorFormation.choices.validating',
                        3 => 'operatorFormation.choices.planned',
                        4 => 'operatorFormation.choices.formed',
                        5 => 'operatorFormation.choices.can_form',
                    ),
                    'label' => 'operatorFormation.validation',
                )
            )
            ->add('commentary', TextType::class,
                array('label' => 'operatorFormation.commentary'))
            ->add('former', EntityType::class,
               array('class'  => 'AppCofidurBundle:User', 'choice_label' => 'firstName'))
            ->add('save', SubmitType::class, array('label' => 'operatorFormation.save.submit'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\OperatorFormation',
        ));
    }
}
