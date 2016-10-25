<?php

namespace AppCofidurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Doctrine\ORM\EntityManager;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OperatorCategoryType extends AbstractType
{
    private $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $operators = $this->em->getRepository('AppCofidurBundle:Operator')->findAll();

        foreach($operators as $operator){
            $op_tab[$operator->getId()] = $operator->getFirstName(). " " .$operator->getLastName();
        }

        $builder
            ->add('dateSignature', DateType::class)
            ->add('signature', TextType::class)
            ->add('nbHours', TimeType::class) 
            ->add('idTrainer', ChoiceType::class,
               array('choices'  => $op_tab))    
            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\OperatorCategory',
        ));
    }
}