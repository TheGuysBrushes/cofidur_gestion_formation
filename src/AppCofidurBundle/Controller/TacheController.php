<?php
namespace AppCofidurBundle\Controller;


use AppCofidurBundle\Entity\Categorie;
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

            $requete_formation = $em->createQuery('SELECT c.idFormation FROM AppCofidurBundle:Categorie c WHERE c.id = :idCategory')
            ->setParameter('idCategory', $idCat);

            $formation = $requete_formation->getResult();

            $formation_id = $formation[0]['idFormation'];

            return $this->redirectToRoute('AppCofidurBundle_formation_show', array('id' => $formation_id));
        }

        return $this->render('AppCofidurBundle:Page/Tache:tache_add.html.twig', array(
            'form' => $form->createView(),
        ));    
    }   


    public function deleteAction(Request $request, $idTache)
    {
        $em = $this->getDoctrine()->getManager();

        $tache = $em->getRepository('AppCofidurBundle:Tache')->find($idTache);

        if (!$tache) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $requete_formation = $em->createQuery('
            SELECT c.idFormation FROM AppCofidurBundle:Categorie c  WHERE c.id = (SELECT t.idCategorie FROM AppCofidurBundle:Tache t WHERE t.id = :idTache)')
        ->setParameter('idTache', $idTache);

        $formation = $requete_formation->getResult();

        $formation_id = $formation[0]['idFormation'];

        $em->remove($tache);
        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_formation_show', array('id' => $formation_id));
    }


    public function editAction(Request $request, $idTache)
    {
        $em = $this->getDoctrine()->getManager();

        $tache = $em->getRepository('AppCofidurBundle:Tache')->find($idTache);

        $form = $this->createForm(TacheType::class, $tache);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tache = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($tache);
            $em->flush();

            $requete_formation = $em->createQuery('
                SELECT c.idFormation FROM AppCofidurBundle:Categorie c  WHERE c.id = (SELECT t.idCategorie FROM AppCofidurBundle:Tache t WHERE t.id = :idTache)')
            ->setParameter('idTache', $idTache);

            $formation = $requete_formation->getResult();

            $formation_id = $formation[0]['idFormation'];

            return $this->redirectToRoute('AppCofidurBundle_formation_show', array('id' => $formation_id));
        }

        return $this->render('AppCofidurBundle:Page/Tache:tache_edit.html.twig', array(
            'form' => $form->createView(),
        ));    
    }   
}