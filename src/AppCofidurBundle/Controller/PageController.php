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


    public function tempCreateOperators()
    {
        $ope1= new Operator();
        $ope1->setLastName("DAVID");
        $ope1->setFirstName("Florian");
        $ope2= new Operator();
        $ope2->setLastName("DE LEEUW");
        $ope2->setFirstName("Valérian");
        $ope3= new Operator();
        $ope3->setLastName("GARNIER");
        $ope3->setFirstName("Antoine");

        $operators= array($ope1, $ope2, $ope3);
        return $operators;
    }

    public function tempCreatorFormers()
    {
        //future case 1 : id de l'operateur
        //future case 2 : id de la formation
        //future case 3 : int associé à la couleur à placer dans le tableau (0 en formation, 1 formé non validé etc)
        $formFormer= array(
            array("GARNIER","form_1","1"),
            array("DE LEEUW", "form_1","1"),
            array("DAVID", "form_3", "2"),
            array("GARNIER", "form_2", "1"));

        return $formFormer;
    }

    public function skillMatrixAction()
    {
        $em = $this->getDoctrine()->getManager();


        $formations = $em->getRepository('AppCofidurBundle:Formation')->findAll();
        $operators= $em->getRepository('AppCofidurBundle:User')->findAll();
        $operatorsformations= $em->getRepository('AppCofidurBundle:OperatorFormation')->findAll();
        $allconnexions= array();
        for($i= 0; $i < count($operatorsformations); ++$i){
            $id_ope= $operatorsformations[$i]->getOperator()->getId();
            $id_formation= $operatorsformations[$i]->getFormation()->getId();
            $validation= $operatorsformations[$i]->getValidation();

            $allconnexions[$i]= array($id_ope, $id_formation, $validation);
        }

        return $this->render('AppCofidurBundle:Page:skillMatrix.html.twig', array(
            'tab_formations'      => $formations,
            'tab_operators'       => $operators,
            'liaison'             => $allconnexions,
        ));
    }
}
