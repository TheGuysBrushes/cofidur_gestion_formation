<?php

namespace AppCofidurBundle\Form\Type;

use AppCofidurBundle\Entity\Operator;
use AppCofidurBundle\Entity\Formation;

use Doctrine\ORM\EntityManager;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OperatorFormationType extends AbstractType
{

    private $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $operators = $this->em->getRepository('AppCofidurBundle:Operator')->findAll();
        $formations = $this->em->getRepository('AppCofidurBundle:Formation')->findAll();

        foreach($operators as $operator){
            $op_tab[$operator->getId()] = $operator->getFirstName(). " " .$operator->getLastName();
        }

        foreach($formations as $formation){
            $form_tab[$formation->getId()] = $formation->getName();
        }


        $builder            
            ->add('idOperator', ChoiceType::class,
               array('choices'  => $op_tab))            
            ->add('idFormation', ChoiceType::class,
               array('choices'  => $form_tab))
            ->add('dateBegin', DateType::class)
            ->add('dateEnd', DateType::class)
            ->add('validation', ChoiceType::class,
               array(
                    'choices'  => array(
                        1 => 'Non validé',
                        2 => 'En cours de validation',
                        3 => 'Prévue',
                        4 => 'Formé',
                        5 => 'Peut former',
                    )
                )
            )
            ->add('commentary', TextType::class) 
            ->add('idFormer', ChoiceType::class,
               array('choices'  => $op_tab))       
            ->add('save', SubmitType::class, array('label' => 'Sauvegarder'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppCofidurBundle\Entity\OperatorFormation',
        ));
    }
}