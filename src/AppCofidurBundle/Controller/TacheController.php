<?php
namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\Tache;
use AppCofidurBundle\Form\Type\TacheType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TacheController extends Controller
{

    public function addAction(Request $request, $idCat)
    {
        $tache = new Tache();
        $tache->setIdCategorie($idCat);

        $form = $this->createForm(TacheType::class, $tache);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tache = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($tache);
            $em->flush();

            //TODO refaire la page
            return $this->redirectToRoute('AppCofidurBundle_homepage');
        }

        return $this->render('AppCofidurBundle:Page/Tache:tache_add.html.twig', array(
            'form' => $form->createView(),
        ));    
    }   

}