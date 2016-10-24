<?php
namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\Category;
use AppCofidurBundle\Form\Type\OperatorType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OperatorController extends Controller
{

    public function showAction($idForm)
    {
        $em = $this->getDoctrine()->getManager();

        $operator = $em->getRepository('AppCofidurBundle:Operator')->find($idForm);

        if (!$operator) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        return $this->render('AppCofidurBundle:Page/Formation:formation_show.html.twig', array(
            'operator'     => $operator,
        )); 
    }

    public function showAllAction()
    {
        $em = $this->getDoctrine()->getRepository('AppCofidurBundle:Operator');

        $operators = $em->findAll();

        return $this->render('AppCofidurBundle:Page/Operator:operator_show_all.html.twig', array(
            'operators'      => $operators,
        ));
    }

    // TODO Fonction qui crée un opérateur
    public function addAction()
    {
        $operator = new Operator();
    }
}