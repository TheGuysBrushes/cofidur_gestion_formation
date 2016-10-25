<?php
namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\Category;
use AppCofidurBundle\Form\Type\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{


    public function addAction(Request $request, $idForm)
    {
        $category = new Category();

        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($idForm);
        $category->setFormation($formation);
        
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_formation_show', array('idForm' => $idForm));
        }

        return $this->render('AppCofidurBundle:Page/Category:category_add.html.twig', array(
            'form' => $form->createView(),
        ));    
    }   


    public function editAction(Request $request, $idCat)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('AppCofidurBundle:Category')->find($idCat);

        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            $em->persist($category);
            $em->flush();


            return $this->redirectToRoute('AppCofidurBundle_formation_show', array('idForm' => $category->getFormation()->getId()));
        }

        return $this->render('AppCofidurBundle:Page/Category:category_edit.html.twig', array(
            'form' => $form->createView(),
        ));    
    }   


    public function deleteAction($idCat)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('AppCofidurBundle:Category')->find($idCat);

        if (!$category) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $idForm = $category->getFormation()->getId();

        $em->remove($category);
        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_formation_show', array('idForm' => $idForm));
    }

}