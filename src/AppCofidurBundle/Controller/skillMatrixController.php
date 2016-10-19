<?php

namespace AppCofidurBundle\Controller;


use AppCofidurBundle\Entity\Operator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class skillMatrixController extends Controller
{


    public function showAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $formations= array('form_1', 'form_2', 'form_3');
        $ope_1= new Operator();
            $ope_1->setLastName("DAVID");
            $ope_1->setFirstName("Florian");
        $ope_2= new Operator();
            $ope_2->setLastName("DE LEEUW");
            $ope_2->setFirstName("Valérian");
        $ope_3= new Operator();
            $ope_3->setLastName("GARNIER");
            $ope_3->setFirstName("Antoine");
        $operators= array($ope_1, $ope_2, $ope_3);

        return $this->render('AppCofidurBundle:Page/skillMatrix:skillMatrix_show.html.twig', array(
            'tab_formations'      => $formations,
            'tab_operators'       => $operators,
        ));
    }
}