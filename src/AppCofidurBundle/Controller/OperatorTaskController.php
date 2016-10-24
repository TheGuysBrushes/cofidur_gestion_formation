<?php
namespace AppCofidurBundle\Controller;


use AppCofidurBundle\Entity\OperatorTask;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OperatorTaskController extends Controller
{

    public function addAction($idOpForm, $idCategory, $idTask)
    {
        $em = $this->getDoctrine()->getManager();

       	$operatorformation = $em->getRepository('AppCofidurBundle:OperatorFormation')->find($idOpForm);
        $operatorcategory = $em->getRepository('AppCofidurBundle:OperatorCategory')->findBy(array('operatorformation'=>$operatorformation, 'idCategory'=>$idCategory));

        $operatortask = new OperatorTask();
        $operatortask->setOperatorcategory($operatorcategory[0]);
        $operatortask->setIdTask($idTask);
        $operatortask->setValidation(true);

        $em->persist($operatortask);
        $em->flush();


        return $this->redirectToRoute('AppCofidurBundle_operatorformation_show', array('idOpForm' => $idOpForm)); 
    }
	
}