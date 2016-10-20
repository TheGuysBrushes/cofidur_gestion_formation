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
        $category->setIdFormation($idForm);

        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_formation_show', array('id' => $idForm));
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

            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            $requete_formation = $em->createQuery('
                SELECT c.idFormation FROM AppCofidurBundle:Category c WHERE c.id = :idCategory')
                ->setParameter('idCategory', $idCat);

            $formation = $requete_formation->getResult();

            $formation_id = $formation[0]['idFormation'];


            return $this->redirectToRoute('AppCofidurBundle_formation_show', array('id' => $formation_id));
        }

        return $this->render('AppCofidurBundle:Page/Category:category_edit.html.twig', array(
            'form' => $form->createView(),
        ));    
    }   


    public function deleteAction(Request $request, $idCat)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('AppCofidurBundle:Category')->find($idCat);
        $tasks = $em->getRepository('AppCofidurBundle:Task')->findBy(array('idCategory' => $idCat));

        if (!$category) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $requete_formation = $em->createQuery('
            SELECT c.idFormation FROM AppCofidurBundle:Category c WHERE c.id = :idCategory')
            ->setParameter('idCategory', $idCat);

        $formation = $requete_formation->getResult();

        $formation_id = $formation[0]['idFormation'];


        $em->remove($category);

        foreach ($tasks as $task)
            $em->remove($task);

        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_formation_show', array('id' => $formation_id));
    }

}