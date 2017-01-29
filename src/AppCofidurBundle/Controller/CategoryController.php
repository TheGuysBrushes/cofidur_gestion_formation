<?php
namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\Category;
use AppCofidurBundle\Form\Type\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    public function upAction($idCat){
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('AppCofidurBundle:Category')->find($idCat);
        $ordre = $category->getOrdre();
        $formation = $category->getFormation();
        $categories = $formation->getCategories();

        $cat_tmp = null;
        foreach ($categories as $cat_for_tmp)
            if ($cat_for_tmp->getOrdre() == $ordre-1) {
                $cat_tmp = $cat_for_tmp;
            }

        if ($cat_tmp !== null ){
            $cat_tmp->setOrdre($ordre);
            $category->setOrdre($ordre-1);

            $em->persist($category);
            $em->persist($cat_for_tmp);
            $em->flush();
        }

        return $this->redirectToRoute('AppCofidurBundle_formation_show', array('idForm' => $category->getFormation()->getId()));
    }

    public function downAction($idCat){
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('AppCofidurBundle:Category')->find($idCat);
        $ordre = $category->getOrdre();
        $formation = $category->getFormation();
        $categories = $formation->getCategories();

        $cat_tmp = NULL;
        foreach($categories as $cat_for_tmp)
            if($cat_for_tmp->getOrdre() == $ordre+1)
                $cat_tmp = $cat_for_tmp;

        if($cat_tmp != NULL ){
            $cat_tmp->setOrdre($ordre);
            $category->setOrdre($ordre+1);

            $em->persist($category);
            $em->persist($cat_for_tmp);
            $em->flush();
        }

        return $this->redirectToRoute('AppCofidurBundle_formation_show', array('idForm' => $category->getFormation()->getId()));

    }

    public function addAction(Request $request, $idForm)
    {
        $category = new Category();

        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($idForm);
        $category->setFormation($formation);
        $category->setOrdre(sizeof($formation->getCategories()));

        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            $nextAction= $form->get('saveAndAdd')->isClicked()
            ? 'AppCofidurBundle_category_add'
            : 'AppCofidurBundle_formation_show';

            return $this->redirectToRoute($nextAction, array('idForm' => $idForm));
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

            return $this->redirectToRoute('AppCofidurBundle_formation_show',
                ['idForm' => $category->getFormation()->getId()]
            );
        }

        return $this->render('AppCofidurBundle:Page/Category:category_edit.html.twig',
            ['form' => $form->createView()]
        );
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
