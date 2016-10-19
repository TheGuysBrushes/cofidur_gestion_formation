<?php

namespace AppCofidurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FormationController extends Controller
{
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($id);

        if (!$formation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        return $this->render('AppCofidurBundle:Page/Formation:show_formation.html.twig', array(
            'formation'      => $formation,
        ));
    }
}
