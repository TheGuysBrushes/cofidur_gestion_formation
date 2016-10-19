<?php

// src/AppBundle/Controller/OperatorController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class OperatorController extends Controller
{
    /**
     * @Route("/operator/add")
     */
    public function addAction()
    {
    //operator info
    $operator_id = "0";
	$operator_lastname= "Last name";
	$operator_firstname= "First name";

	$page_title= "Complete this fields to add a user";


        return $this->render('operator/add.html.twig', array(
	    'title' => $page_title,
        'id' => $operator_id,
	    'lastname' => $operator_lastname,
	    'firstname' => $operator_firstname,
        ));
    }
}
