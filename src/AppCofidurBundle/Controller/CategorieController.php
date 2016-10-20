<?php
namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\Categorie;
use AppCofidurBundle\Entity\Tache;
use AppCofidurBundle\Form\Type\CategorieType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieController extends Controller
{
    public function newAction(Request $request)
    {
        $categorie = new Categorie();

        $form = $this->createForm(CategorieType::class, $categorie);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // ... maybe do some form processing, like saving the Task and Tag objects
        }

        return $this->render('AppCofidurBundle:Categorie:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}