<?php
namespace AppCofidurBundle\Controller;


use AppCofidurBundle\Entity\Task;
use AppCofidurBundle\Form\Type\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TaskController extends Controller
{

    public function upAction($idTask){
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository('AppCofidurBundle:Task')->find($idTask);
        $ordre = $task->getOrdre();
        $category = $task->getCategory();
        $tasks = $category->getTasks();

        $task_tmp = NULL;
        foreach($tasks as $task_for_tmp)
            if($task_for_tmp->getOrdre() == $ordre-1)
                $task_tmp = $task_for_tmp;

        if($task_tmp != NULL ){
            $task_tmp->setOrdre($ordre);
            $task->setOrdre($ordre-1);

            $em->persist($task);
            $em->persist($task_for_tmp);
            $em->flush();
        }

        return $this->redirectToRoute('AppCofidurBundle_formation_show', array('idForm' => $category->getFormation()->getId()));
    }

    public function downAction($idTask){
         $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository('AppCofidurBundle:Task')->find($idTask);
        $ordre = $task->getOrdre();
        $category = $task->getCategory();
        $tasks = $category->getTasks();

        $task_tmp = NULL;
        foreach($tasks as $task_for_tmp)
            if($task_for_tmp->getOrdre() == $ordre+1)
                $task_tmp = $task_for_tmp;

        if($task_tmp != NULL ){
            $task_tmp->setOrdre($ordre);
            $task->setOrdre($ordre+1);

            $em->persist($task);
            $em->persist($task_for_tmp);
            $em->flush();
        }

        return $this->redirectToRoute('AppCofidurBundle_formation_show', array('idForm' => $category->getFormation()->getId()));

    }


    public function addAction(Request $request, $idCat)
    {
        $task = new Task();
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('AppCofidurBundle:Category')->find($idCat);
        $task->setCategory($category);
        $task->setOrdre(sizeof($category->getTasks()));

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_formation_show',
                ['idForm' => $task->getCategory()->getFormation()->getId()]
            );
        }

        return $this->render('AppCofidurBundle:Page/Task:task_add.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    public function deleteAction(Request $request, $idTask)
    {
        $em = $this->getDoctrine()->getManager();

        $task = $em->getRepository('AppCofidurBundle:Task')->find($idTask);

        if (!$task) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $em->remove($task);
        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_formation_show',
            ['idForm' => $task->getCategory()->getFormation()->getId()]
        );
    }


    public function editAction(Request $request, $idTask)
    {
        $em = $this->getDoctrine()->getManager();

        $task = $em->getRepository('AppCofidurBundle:Task')->find($idTask);

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_formation_show', array('idForm' => $task->getCategory()->getFormation()->getId()));
        }

        return $this->render('AppCofidurBundle:Page/Task:task_edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
