<?php

namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\Formation;
use AppCofidurBundle\Form\Type\FormationType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class FormationController extends Controller
{

    public function addAction(Request $request)
    {
        $formation = new Formation();

        $form = $this->createForm(FormationType::class, $formation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formation = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_formation_show_all');
        }

        return $this->render('AppCofidurBundle:Page/Formation:formation_add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function editAction(Request $request, $idForm)
    {
        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($idForm);

        if (!$formation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $form = $this->createForm(FormationType::class, $formation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formation = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_formation_show', ['idForm'=>$idForm]);
        }

        return $this->render('AppCofidurBundle:Page/Formation:formation_edit.html.twig', array(
            'form' => $form->createView(),
        ));

    }


    public function deleteAction($idForm)
    {
        $em = $this->getDoctrine()->getManager();

        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($idForm);

        if (!$formation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $em->remove($formation);
        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_formation_show_all');
    }

    public function showAction($idForm)
    {
        $em = $this->getDoctrine()->getManager();

        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($idForm);

        if (!$formation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        return $this->render('AppCofidurBundle:Page/Formation:formation_show.html.twig', array(
            'formation'     => $formation,
        ));
    }

    public function showAllAction()
    {
        $em = $this->getDoctrine()->getRepository('AppCofidurBundle:Formation');

        $formations = $em->findAll();

        return $this->render('AppCofidurBundle:Page/Formation:formation_show_all.html.twig', array(
            'formations'      => $formations,
        ));
    }
}
