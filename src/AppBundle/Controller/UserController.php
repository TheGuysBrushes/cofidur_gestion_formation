<?php

// src/AppBundle/Controller/UserController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class UserController extends Controller
{
    /**
     * @Route("/user/add")
     */
    public function addAction()
    {
	//user info
        $user_id = "0";
	$user_lastname= "Last name";
	$user_firstname= "First name";

	$add_user= "Complete this fields to add a user";

        return $this->render('user/add.html.twig', array(
	    'page_msg' => $add_user,
            'id' => $user_id,
	    'user_lastname' => $user_lastname,
	    'user_firstname' => $user_firstname,
	    'add_user' => $add_user,
        ));
    }
}
