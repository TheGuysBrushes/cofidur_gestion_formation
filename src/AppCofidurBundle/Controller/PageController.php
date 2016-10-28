<?php

namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\User;
use AppCofidurBundle\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
        $allconnexions= [];
        for ($i= 0; $i < count($operatorsformations); ++$i){
            $operatorId= $operatorsformations[$i]->getOperator()->getId();
            $formationId= $operatorsformations[$i]->getFormation()->getId();
            $validation= $operatorsformations[$i]->getValidation();

            $allconnexions[$i]= [$operatorId, $formationId, $validation];
        }

        return $this->render('AppCofidurBundle:Page:skillMatrix.html.twig', array(
            'formations'      => $formations,
            'operators'       => $operators,
            'formationsValidation'         => $allconnexions,
        ));
    }
}
