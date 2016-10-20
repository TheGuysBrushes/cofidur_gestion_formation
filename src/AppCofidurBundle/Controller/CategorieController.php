<?php
namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\Categorie;
use AppCofidurBundle\Form\Type\CategorieType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieController extends Controller
{


    public function addAction(Request $request, $idForm)
    {
        $categorie = new Categorie();
        $categorie->setIdFormation($idForm);

        $form = $this->createForm(CategorieType::class, $categorie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorie = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_formation_show', array('id' => $idForm));
        }

        return $this->render('AppCofidurBundle:Page/Categorie:categorie_add.html.twig', array(
            'form' => $form->createView(),
        ));    
    }   

}