<?php

namespace AppCofidurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OperatorCategoryType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateSignature', DateType::class, array('label' => 'operatorCategory.dateSignature'))
            ->add('signature', TextType::class, array('label' => 'operatorCategory.signature'))
            ->add('nbHours', TimeType::class, array('label' => 'operatorCategory.nbHours'))
            ->add('trainer', EntityType::class,
               array('class'  => 'AppCofidurBundle:User',
                    'choice_label' => 'firstName',
                    'label' => 'operatorCategory.trainer'))
            ->add('save', SubmitType::class, array('label' => 'operatorCategory.save.submit'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\OperatorCategory',
        ));
    }
}
