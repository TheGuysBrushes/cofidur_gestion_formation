<?php
namespace AppCofidurBundle\Controller;


use AppCofidurBundle\Entity\Task;
use AppCofidurBundle\Form\Type\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TaskController extends Controller
{

    public function addAction(Request $request, $idCat)
    {
        $task = new Task();
        $task->setIdCategory($idCat);

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

//            Erreur phpstorm :
//           "Warning:(30, 52) No data sources are configured to run this SQL and provide advanced code assistance.
//              Disable this inspection via problem menu (Alt+Enter)."
//            "Warning:(30, 52) SQL dialect is not configured."
            $request_formation = $em->createQuery('SELECT c.idFormation FROM AppCofidurBundle:Category c WHERE c.id = :idCategory')
            ->setParameter('idCategory', $idCat);

            $formation = $request_formation->getResult();

            $formation_id = $formation[0]['idFormation'];

            return $this->redirectToRoute('AppCofidurBundle_formation_show', array('id' => $formation_id));
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
//            Erreur phpstorm :
//           "Warning:(56, 48) No data sources are configured to run this SQL and provide advanced code assistance.
//              Disable this inspection via problem menu (Alt+Enter)."
//            "Warning:(60, 42) SQL dialect is not configured."
        $requete_formation = $em->createQuery('
            SELECT c.idFormation FROM AppCofidurBundle:Category c  WHERE c.id = (SELECT t.idCategory FROM AppCofidurBundle:Task t WHERE t.id = :idTask)')
            ->setParameter('idTask', $idTask);

        $formation = $requete_formation->getResult();

        $formation_id = $formation[0]['idFormation'];

        $em->remove($task);
        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_formation_show', array('id' => $formation_id));
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

//            Erreur phpstorm :
//           "Warning:(88, 52) No data sources are configured to run this SQL and provide advanced code assistance.
//              Disable this inspection via problem menu (Alt+Enter)."
//            "Warning:(88, 52) SQL dialect is not configured."
            $requete_formation = $em->createQuery('
                SELECT c.idFormation FROM AppCofidurBundle:Category c  WHERE c.id = (SELECT t.idCategory FROM AppCofidurBundle:Task t WHERE t.id = :idTask)')
                ->setParameter('idTask', $idTask);

            $formation = $requete_formation->getResult();

            $formation_id = $formation[0]['idFormation'];

            return $this->redirectToRoute('AppCofidurBundle_formation_show', array('id' => $formation_id));
        }

        return $this->render('AppCofidurBundle:Page/Task:task_edit.html.twig', array(
            'form' => $form->createView(),
        ));    
    }   
}