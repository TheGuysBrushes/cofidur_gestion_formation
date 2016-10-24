<?php
namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\OperatorCategory;
use AppCofidurBundle\Form\Type\OperatorCategoryType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OperatorCategoryController extends Controller
{

    public function addAction(Request $request, $idOpForm)
    {
        $operatorcategory = new OperatorCategory();

        $em = $this->getDoctrine()->getManager();
        $operatorformation = $em->getRepository('AppCofidurBundle:OperatorFormation')->find($idOpForm);
        $operatorcategory->setOperatorFormation($operatorformation);
        
        $form = $this->createForm(OperatorCategoryType::class, $operatorcategory);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $operatorcategory = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($operatorcategory);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_operatorformation_show', array('idOpForm' => $idOpForm));
        }

        return $this->render('AppCofidurBundle:Page/OperatorCategory:operatorcategory_add.html.twig', array(
            'form' => $form->createView(),
        ));    
    }

    public function deleteAction($idOpCat)
    {
        $em = $this->getDoctrine()->getManager();

        $operatorcategory = $em->getRepository('AppCofidurBundle:OperatorCategory')->find($idOpCat);

        if (!$operatorcategory) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $em->remove($operatorcategory);
        $em->flush();

        $idOpForm = $operatorcategory->getOperatorFormation()->getId();

        return $this->redirectToRoute('AppCofidurBundle_operatorformation_show', array('idOpForm' => $idForm));   
    }


    public function editAction(Request $request, $idOpCat)
    {
        $em = $this->getDoctrine()->getManager();

        $operatorcategory = $em->getRepository('AppCofidurBundle:OperatorCategory')->find($idOpCat);

        $form = $this->createForm(OperatorCategoryType::class, $operatorcategory);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $operatorcategory = $form->getData();

            $em->persist($operatorcategory);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_operatorformation_show', array('idOpForm' => $operatorcategory->getOperatorFormation()->getId()));
        }

        return $this->render('AppCofidurBundle:Page/OperatorCategory:operatorcategory_edit.html.twig', array(
            'form' => $form->createView(),
        ));    
    }   


}   