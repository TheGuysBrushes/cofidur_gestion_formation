<?php

namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\OperatorFormation;

use AppCofidurBundle\Form\Type\OperatorFormationType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class OperatorFormationController extends Controller
{   
    
    public function addAction(Request $request)
    {
        $operatorformation = new OperatorFormation();

        $form = $this->createForm(OperatorFormationType::class, $operatorformation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $operatorformation = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($operatorformation);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_operatorformation_show_all');
        }

        return $this->render('AppCofidurBundle:Page/OperatorFormation:operatorformation_add.html.twig', array(
            'form' => $form->createView(),
        ));    
    }   

    public function showAction($idOpForm)
    {
        $em = $this->getDoctrine()->getManager();

        $operatorformation = $em->getRepository('AppCofidurBundle:OperatorFormation')->find($idOpForm);
        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($operatorformation->getIdFormation());
        //$operator = $em->getRepository('AppCofidurBundle:Operator')->find($operatorformation->getIdOperator());


        if (!$operatorformation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        if (!$formation) {
            throw $this->createNotFoundException('Formation non existante');
        }

        /*if (!$operator) {
            throw $this->createNotFoundException('Utilisateur non existant');
        }*/


        return $this->render('AppCofidurBundle:Page/OperatorFormation:operatorformation_show.html.twig', array(
            'formation'             => $formation,
            //'operator'              => $operator,
            'operatorformation'     => $operatorformation,
        )); 
    }

    public function showAllAction()
    {
        $em = $this->getDoctrine()->getRepository('AppCofidurBundle:OperatorFormation');

        $operatorsformations = $em->findAll();

        return $this->render('AppCofidurBundle:Page/OperatorFormation:operatorformation_show_all.html.twig', array(
            'operatorsformations'      => $operatorsformations,
        ));
    }

    public function deleteAction($idOpForm)
    {
        $em = $this->getDoctrine()->getManager();;

        $operatorformation = $em->getRepository('AppCofidurBundle:OperatorFormation')->find($idOpForm);

        if (!$operatorformation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $em->remove($operatorformation);
        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_operatorformation_show_all');
    }
}
