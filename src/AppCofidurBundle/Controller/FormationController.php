<?php

namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\Formation;
use AppCofidurBundle\Entity\Categorie;
use AppCofidurBundle\Entity\Tache;

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


    public function editAction(Request $request, $id)
    {   
        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($id);

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

            return $this->redirectToRoute('AppCofidurBundle_formation_show',array('id'=>$id));
        }

        return $this->render('AppCofidurBundle:Page/Formation:formation_edit.html.twig', array(
            'form' => $form->createView(),
        )); 


    }


    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($id);
        $categories = $em->getRepository('AppCofidurBundle:Categorie')->findBy(array('idFormation'=>$id));

        foreach($categories as $categorie){
            $taches = $em->getRepository('AppCofidurBundle:Tache')->findBy(array('idCategorie'=>$categorie->getId()));
            foreach($taches as $tache){
                $em->remove($tache);
            }
            $em->remove($categorie);
        }

        if (!$formation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $em->remove($formation);
        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_formation_show_all');
    }



    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($id);
        $categories = $em->getRepository('AppCofidurBundle:Categorie')->findBy(array('idFormation'=>$id));


        $requete_tache = $em->createQuery('SELECT t FROM AppCofidurBundle:Tache t JOIN AppCofidurBundle:Categorie c WHERE c.id = t.idCategorie AND c.idFormation =  :id')
            ->setParameter('id', $id);
        $taches = $requete_tache->getResult();


        if (!$formation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        return $this->render('AppCofidurBundle:Page/Formation:formation_show.html.twig', array(
            'formation'      => $formation,
            'categories'     => $categories,
            'taches'         => $taches,
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
