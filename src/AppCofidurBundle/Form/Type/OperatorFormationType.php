<?php

namespace AppCofidurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
                    'years' => range( date("Y"), date("Y",strtotime("-1 year")) ),
                )
            )
            /// La date de fin de la formation ne doit pas être initialisé à la création ?
//             ->add('dateEnd', DateType::class, array(
//                     'label_format' => 'operatorFormation.dateEnd',
//                     // L'année de signature peut être choisie entre l'année précédente et l'année suivante
//                     'years' => range( date("Y",strtotime("-1 year")), date("Y",strtotime("+1 year")) ),
// //                    'data' => new \DateTime('+1 day'),
//                 )
//             )
            ->add('validation', ChoiceType::class,
                array(
                    'choices'  => array(
                        1 => 'operatorFormation.validationChoices.unvalidated',
                        2 => 'operatorFormation.validationChoices.validating',
                        3 => 'operatorFormation.validationChoices.planned',
                        4 => 'operatorFormation.validationChoices.formed',
                        5 => 'operatorFormation.validationChoices.can_form',
                    ),
                    'label_format' => 'operatorFormation.validationStatus',
                )
            )
            ->add('commentary', TextType::class, ['label' => 'operatorFormation.commentary', 'required' => false])
            ->add('former', EntityType::class,
                array(
                   'class'  => 'AppCofidurBundle:User',
                   'choice_label' => 'firstName',
                   'label_format' => 'operatorFormation.formerName',
                )
            )
            ->add('save', SubmitType::class, ['label' => 'operatorFormation.save.submit']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\OperatorFormation',
        ));
    }
}
