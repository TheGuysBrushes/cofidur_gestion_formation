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
                array(
                   'class'  => 'AppCofidurBundle:User', 'choice_label' => 'firstName',
                   'label_format' => 'operatorFormation.operatorName',
                )
            )
            ->add('formation', EntityType::class,
                array(
                   'class'  => 'AppCofidurBundle:Formation', 'choice_label' => 'name',
                   'label_format' => 'operatorFormation.formationName',
                )
            )
            ->add('dateBegin', DateType::class, array(
                    'label_format' => 'operatorFormation.dateBegin',
                    // L'année de signature peut être choisie entre l'année actuelle et l'année précédente
                    'years' => range( date("Y"), date("Y",strtotime("-1 year")) )
                )
            )
            ->add('dateEnd', DateType::class, array(
                    'label_format' => 'operatorFormation.dateEnd',
                    // L'année de signature peut être choisie entre l'année précédente et l'année suivante
                    'years' => range( date("Y",strtotime("-1 year")), date("Y",strtotime("+1 year")) )
                )
            )
            ->add('validation', ChoiceType::class,
                array(
                    'choices'  => array(
                        1 => 'operatorFormation.choices.unvalidated',
                        2 => 'operatorFormation.choices.validating',
                        3 => 'operatorFormation.choices.planned',
                        4 => 'operatorFormation.choices.formed',
                        5 => 'operatorFormation.choices.can_form',
                    ),
                    'label_format' => 'operatorFormation.validation',
                )
            )
            ->add('commentary', TextType::class,
                array('label' => 'operatorFormation.commentary'))
            ->add('former', EntityType::class,
                array(
                   'class'  => 'AppCofidurBundle:User',
                   'choice_label' => 'firstName',
                   'label_format' => 'operatorFormation.formerName',
                )
            )
            ->add('save', SubmitType::class, array('label' => 'operatorFormation.save.submit'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\OperatorFormation',
        ));
    }
}
