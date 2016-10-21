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

    public function showAllAction()
    {
        $em = $this->getDoctrine()->getRepository('AppCofidurBundle:OperatorFormation');

        $operatorsformations = $em->findAll();

        return $this->render('AppCofidurBundle:Page/OperatorFormation:operatorformation_show_all.html.twig', array(
            'operatorsformations'      => $operatorsformations,
        ));
    }
}
