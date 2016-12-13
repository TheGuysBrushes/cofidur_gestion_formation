<?php

namespace AppCofidurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppCofidurBundle:Page:index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('AppCofidurBundle:Page:about.html.twig');
    }

    public function contactAction()
    {
        return $this->render('AppCofidurBundle:Page:contact.html.twig');
    }

    public function adminAction()
    {
        return $this->render('AppCofidurBundle:Page:admin.html.twig');
    }

    public function skillMatrixAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formations = $em->getRepository('AppCofidurBundle:Formation')->findAll();
        $operators= $em->getRepository('AppCofidurBundle:User')->findAll();
        $operatorsformations= $em->getRepository('AppCofidurBundle:OperatorFormation')->findAll();
        $allConnexions= [];

        $nbOperatorFormations = count($operatorsformations);
        for ($i= 0; $i < $nbOperatorFormations; ++$i) {
            $operatorId= $operatorsformations[$i]->getOperator()->getId();
            $formationId= $operatorsformations[$i]->getFormation()->getId();
            $validation= $operatorsformations[$i]->getValidation();
            $operatorsformationsId= $operatorsformations[$i]->getId();

            $allConnexions[$i]= [$operatorId, $formationId, $validation, $operatorsformationsId];
        }

        return $this->render('AppCofidurBundle:Page:skillMatrix.html.twig', array(
            'formations'      => $formations,
            'operators'       => $operators,
            'formationsValidation'         => $allConnexions,
        ));
    }
}
