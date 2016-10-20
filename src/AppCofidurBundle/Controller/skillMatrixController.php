<?php

namespace AppCofidurBundle\Controller;


use AppCofidurBundle\Entity\Operator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class skillMatrixController extends Controller
{

    public function tempCreateOperators()
    {
        $ope_1= new Operator();
        $ope_1->setLastName("DAVID");
        $ope_1->setFirstName("Florian");
        $ope_2= new Operator();
        $ope_2->setLastName("DE LEEUW");
        $ope_2->setFirstName("Valérian");
        $ope_3= new Operator();
        $ope_3->setLastName("GARNIER");
        $ope_3->setFirstName("Antoine");

        return $operators= array($ope_1, $ope_2, $ope_3);
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

    public function showAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $formations= array('form_1', 'form_2', 'form_3');

        $operators= $this->tempCreateOperators();
        $formFormer= $this->tempCreatorFormers();

        return $this->render('AppCofidurBundle:Page/skillMatrix:skillMatrix_show.html.twig', array(
            'tab_formations'      => $formations,
            'tab_operators'       => $operators,
            'liaison'             => $formFormer,
        ));
    }
}