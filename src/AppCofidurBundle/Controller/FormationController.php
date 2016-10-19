<?php

namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class FormationController extends Controller
{   


    public function addAction(Request $request)
    {
        $formation = new Formation();

        $form = $this->createFormBuilder($formation)
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create formation'))
            ->getForm();

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


    public function editAction(Request $request, $id)
    {   
        $em = $this->getDoctrine()->getEntityManager();
        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($id);

        if (!$formation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $form = $this->createFormBuilder($formation)
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Update formation'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formation = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_formation_show_all');
        }

        return $this->render('AppCofidurBundle:Page/Formation:formation_edit.html.twig', array(
            'form' => $form->createView(),
        )); 


    }


    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($id);

        if (!$formation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $em->remove($formation);
        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_formation_show_all');
    }



    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($id);

        if (!$formation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        return $this->render('AppCofidurBundle:Page/Formation:formation_show.html.twig', array(
            'formation'      => $formation,
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
