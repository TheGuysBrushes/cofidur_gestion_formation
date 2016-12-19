<?php

namespace AppCofidurBundle\Form\Type;

use Faker\Provider\cs_CZ\DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class OperatorCategoryType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateSignature', DateType::class,
                array(
                    'label_format' => 'operatorCategory.dateSignature',
                    'placeholder' => ['year' => 'date.year', 'month' => 'date.month', 'day' => 'date.day'],
                    // L'année de signature peut être choisie entre l'année actuelle et l'année précédente
                    'years' => range( date("Y"), date("Y", strtotime("-1 year")) ),
                    'data' => new \DateTime()
                )
            )
//            ->add('signature', TextType::class, ['label_format' => 'operatorCategory.signature'])
            ->add('nbHours', TimeType::class, ['label_format' => 'operatorCategory.nbHours'])
            ->add('trainer', EntityType::class,
               array(
                   'class'  => 'AppCofidurBundle:User',
                   'choice_label' => 'firstName',
                   'label_format' => 'operatorCategory.trainerName'
               )
            )
            ->add('save', SubmitType::class, ['label_format' => 'operatorCategory.save.submit']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\OperatorCategory'
        ));
    }
}
