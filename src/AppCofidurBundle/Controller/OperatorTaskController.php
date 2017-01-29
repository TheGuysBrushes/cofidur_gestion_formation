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
        $category = $em->getRepository('AppCofidurBundle:Category')->find($idCategory);
        $task = $em->getRepository('AppCofidurBundle:Task')->find($idTask);
        $operatorcategory = $em->getRepository('AppCofidurBundle:OperatorCategory')
                                ->findBy(['operatorformation'=>$operatorformation, 'category'=>$category]);

        $operatortask = new OperatorTask();
        $operatortask->setOperatorcategory($operatorcategory[0]);
        $operatortask->setTask($task);
        $operatortask->setValidation(true);

        $em->persist($operatortask);
        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_operatorformation_show', array('idOpForm' => $idOpForm));
    }

    public function deleteAction($idOpForm, $idCategory, $idTask)
    {
        $em = $this->getDoctrine()->getManager();

        $operatorformation = $em->getRepository('AppCofidurBundle:OperatorFormation')->find($idOpForm);
        $category = $em->getRepository('AppCofidurBundle:Category')->find($idCategory);
        $task = $em->getRepository('AppCofidurBundle:Task')->find($idTask);
        $operatorcategory = $em->getRepository('AppCofidurBundle:OperatorCategory')
                                ->findBy(array('operatorformation'=>$operatorformation, 'category'=>$category));

        $operatortasks = $em->getRepository('AppCofidurBundle:OperatorTask')
                            ->findBy(['operatorcategory'=>$operatorcategory, 'task'=>$task]);

        foreach ($operatortasks as $operatortask) {
            $em->remove($operatortask);
        }

        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_operatorformation_show', array('idOpForm' => $idOpForm));
    }

}
