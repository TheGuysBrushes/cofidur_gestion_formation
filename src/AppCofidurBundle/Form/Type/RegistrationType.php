<?php

namespace AppCofidurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, ['label_format' => 'security.login.firstName',])
            ->add('lastName', TextType::class,  ['label_format' => 'security.login.lastName',])
            ->add('dateOfBirth', DateType::class, array(
                    'label_format' => 'security.login.dateOfBirth',
                    'placeholder' => array(
                        'year' => 'date.year', 'month' => 'date.month', 'day' => 'date.day'
                    ),
                    'years' => array(
                        '1940','1941','1942','1943','1944','1945','1945','1946','1947','1948','1949',
                        '1950',
                        '1960',
                        '1970',
                        '1980',
                        '1990',
                        '2000'
                    )
                ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\User',
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

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
