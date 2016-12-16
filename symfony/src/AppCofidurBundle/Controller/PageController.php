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
}
