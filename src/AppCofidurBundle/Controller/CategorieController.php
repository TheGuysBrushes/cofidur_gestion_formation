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


    public function editAction(Request $request, $idCat)
    {
        $em = $this->getDoctrine()->getManager();

        $categorie = $em->getRepository('AppCofidurBundle:Categorie')->find($idCat);

        $form = $this->createForm(CategorieType::class, $categorie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorie = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            $requete_formation = $em->createQuery('
                SELECT c.idFormation FROM AppCofidurBundle:Categorie c WHERE c.id = :idCategorie')
            ->setParameter('idCategorie', $idCat);

            $formation = $requete_formation->getResult();

            $formation_id = $formation[0]['idFormation'];


            return $this->redirectToRoute('AppCofidurBundle_formation_show', array('id' => $formation_id));
        }

        return $this->render('AppCofidurBundle:Page/Categorie:categorie_edit.html.twig', array(
            'form' => $form->createView(),
        ));    
    }   


    public function deleteAction(Request $request, $idCat)
    {
        $em = $this->getDoctrine()->getManager();

        $categorie = $em->getRepository('AppCofidurBundle:Categorie')->find($idCat);
        $taches = $em->getRepository('AppCofidurBundle:Tache')->findBy(array('idCategorie'=>$idCat));

        if (!$categorie) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $requete_formation = $em->createQuery('
            SELECT c.idFormation FROM AppCofidurBundle:Categorie c WHERE c.id = :idCategorie')
        ->setParameter('idCategorie', $idCat);

        $formation = $requete_formation->getResult();

        $formation_id = $formation[0]['idFormation'];


        $em->remove($categorie);

        foreach ($taches as $tache) 
            $em->remove($tache);

        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_formation_show', array('id' => $formation_id));
    }

}