<?php
namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\OperatorCategory;
use AppCofidurBundle\Form\Type\OperatorCategoryType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OperatorCategoryController extends Controller
{

    public function addAction(Request $request, $idOpForm, $idCategory)
    {
        $em = $this->getDoctrine()->getManager();

        $operatorformation = $em->getRepository('AppCofidurBundle:OperatorFormation')->find($idOpForm);
        $operatorcategory_test = $em->getRepository('AppCofidurBundle:OperatorCategory')->findBy(array('operatorformation'=>$operatorformation, 'idCategory'=>$idCategory));
        if(sizeof($operatorcategory_test) != 0){
            throw $this->createNotFoundException('Formation déjà validée!');
        }

        $operatorcategory = new OperatorCategory();
        $operatorcategory->setIdCategory($idCategory);

        $operatorcategory->setOperatorFormation($operatorformation);
        
        $form = $this->createForm(new OperatorCategoryType($em), $operatorcategory);

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

    public function deleteAction($idOpForm, $idCategory)
    {
        $em = $this->getDoctrine()->getManager();

        $operatorformation = $em->getRepository('AppCofidurBundle:OperatorFormation')->find($idOpForm);
        $operatorcategory_test = $em->getRepository('AppCofidurBundle:OperatorCategory')->findBy(array('operatorformation'=>$operatorformation, 'idCategory'=>$idCategory));
        if(sizeof($operatorcategory_test) == 0){
            throw $this->createNotFoundException('Formation non validée!');
        }

        $operatorcategory = $operatorcategory_test[0];

        if (!$operatorcategory) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $operatorcategory->setSignature(NULL);
        $operatorcategory->setDateSignature(NULL);
        $operatorcategory->setIdTrainer(NULL);
        $operatorcategory->setNbHours(NULL);

        /*$operatortask=$em->getRepository('AppCofidurBundle:OperatorTask')->findBy(array('operatorcategory'=>$operatorcategory));
        foreach($operatortask as $op_task){
            $em->remove($op_task);
        }*/

        $em->flush();

        $idOpForm = $operatorcategory->getOperatorFormation()->getId();

        return $this->redirectToRoute('AppCofidurBundle_operatorformation_show', array('idOpForm' => $idOpForm));   
    }


    public function editAction(Request $request, $idOpForm, $idCategory)
    {
        $em = $this->getDoctrine()->getManager();

        $operatorformation = $em->getRepository('AppCofidurBundle:OperatorFormation')->find($idOpForm);
        $operatorcategory_test = $em->getRepository('AppCofidurBundle:OperatorCategory')->findBy(array('operatorformation'=>$operatorformation, 'idCategory'=>$idCategory));

        if(sizeof($operatorcategory_test) == 0){
            throw $this->createNotFoundException('Formation non validée!');
        }

        $operatorcategory = $operatorcategory_test[0];

        $form = $this->createForm(new OperatorCategoryType($em), $operatorcategory);

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