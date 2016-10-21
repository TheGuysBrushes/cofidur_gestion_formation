<?php

namespace AppCofidurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class OperatorFormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idOperator', IntegerType::class)
            ->add('idFormation', IntegerType::class)
            ->add('dateBegin', DateType::class)
            ->add('dateEnd', DateType::class)
            ->add('validation', TextType::class)
            ->add('commentary', TextType::class) 
            ->add('idFormer', IntegerType::class)
            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\OperatorFormation',
        ));
    }
}