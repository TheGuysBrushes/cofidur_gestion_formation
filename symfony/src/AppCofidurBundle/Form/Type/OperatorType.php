<?php

namespace AppCofidurBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OperatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, ['label_format' => 'operator.firstName',])
            ->add('lastName', TextType::class,  ['label_format' => 'operator.lastName',])
            ->add('dateOfBirth', DateType::class,   ['label_format' => 'operator.dateOfBirth',])
            ->add('email', EmailType::class,    ['label_format' => 'operator.email',])
            ->add('statut', ChoiceType::class,
                array(
                    'choices'  => array(
                        1 => 'operator.statusChoices.interim',
                        2 => 'operator.statusChoices.cdd',
                        3 => 'operator.statusChoices.cdi',
                    ),
                    'label_format' => 'operator.employmentStatus',
                )
            )
            ->add('superiorLvl1', EntityType::class,
                array(
                   'class'  => 'AppCofidurBundle:User', 'choice_label' => 'firstName',
                    'label_format' => 'operatorFormation.superior1Name',
                )
            )
            ->add('superiorLvl2', EntityType::class,
                array(
                    'class'  => 'AppCofidurBundle:User', 'choice_label' => 'firstName',
                    'label_format' => 'operatorFormation.superior2Name',
                )
            )
            ->add('save', SubmitType::class, array('label' => 'operator.add.submit'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\User',
        ));
    }

//    public function getParent()
//    {
////        return 'AppCofidurBundle\Form\Type\RegistrationType';
//        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
//    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getFirstName()
    {
        return $this->getBlockPrefix();
    }

    public function getLastName()
    {
        return $this->getBlockPrefix();
    }

}
