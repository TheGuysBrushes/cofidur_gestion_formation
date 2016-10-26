<?php
namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\User;
use AppCofidurBundle\Entity\Operator;
use AppCofidurBundle\Entity\OperatorFormation;
use AppCofidurBundle\Form\Type\OperatorType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OperatorController extends Controller
{

    public function showAction($idOp)
    {
        $em = $this->getDoctrine()->getManager();

        $operator = $em->getRepository('AppCofidurBundle:User')->find($idOp);
        $ope_formations= $em->getRepository('AppCofidurBundle:OperatorFormation')->findAll();
        $operator_formations= array();

        /* Récupération des IDs des formations liées à l'opérateur $idOp */
        if(!$ope_formations){
            throw $this->createNotFoundException('Pas de formation en cours');
        } else {
            for($i= 0; $i < count($operator_formations); ++$i){
                if($idOp == $ope_formations[$i]->getOperateur()->getId()){
                    array_push($operator_formations, $operator_formations[$i]->getFormation()->getId());
                }
            }
        }

        /* Récupération des formations de l'opérateur $idOp */
        $formations= array();
        if(!$operator_formations){
            throw $this->createNotFoundException('Pas d\'operation formation');
        } else {
            $repo= $em->getRepository('AppCofidurBundle:Formation');
            for($i= 0; $i < count($operator_formations); ++$i){
                $tmp_formation= $repo->find($operator_formations[$i]);
                $formations[$i]= $tmp_formation;
            }
        }

        if (!$operator) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        return $this->render('AppCofidurBundle:Page/Operator:operator_show.html.twig', array(
            'operator'     => $operator,
            'formations'   => $formations
        ));
    }

    public function showAllAction()
    {
        $em = $this->getDoctrine()->getRepository('AppCofidurBundle:User');

        $operators = $em->findAll();

        return $this->render('AppCofidurBundle:Page/Operator:operator_show_all.html.twig', array(
            'operators'      => $operators,
        ));
    }

    public function deleteAction($idOp)
    {
        $em = $this->getDoctrine()->getManager();

        $operator = $em->getRepository('AppCofidurBundle:User')->find($idOp);

        if (!$operator) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $em->remove($operator);
        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_operator_show_all');
    }

    public function editAction(Request $request, $idOp)
    {
        $em = $this->getDoctrine()->getManager();

        $operator = $em->getRepository('AppCofidurBundle:User')->find($idOp);

        $form = $this->createForm(OperatorType::class, $operator);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $operator = $form->getData();

            $em->persist($operator);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_operator_show_all');
        }

        return $this->render('AppCofidurBundle:Page/Operator:operator_edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function addAction(Request $request)
    {
        $operator = new User();

        $form = $this->createForm(OperatorType::class, $operator);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $operator = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($operator);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_operator_show_all');
        }

        return $this->render('AppCofidurBundle:Page/Operator:operator_add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
