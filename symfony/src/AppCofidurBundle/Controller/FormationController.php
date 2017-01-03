<?php

namespace AppCofidurBundle\Controller;

use AppCofidurBundle\Entity\Formation;
use AppCofidurBundle\Form\Type\FormationType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FormationController extends Controller
{

    public function addAction(Request $request)
    {
        $formation = new Formation();

        $form = $this->createForm(FormationType::class, $formation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formation = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_formation_show_all');
        }

        return $this->render('AppCofidurBundle:Page/Formation:formation_add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function editAction(Request $request, $idForm)
    {
        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($idForm);

        if (!$formation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $form = $this->createForm(FormationType::class, $formation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formation = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_formation_show', ['idForm'=>$idForm]);
        }

        return $this->render('AppCofidurBundle:Page/Formation:formation_edit.html.twig', array(
            'form' => $form->createView(),
        ));

    }


    public function deleteAction($idForm)
    {
        $em = $this->getDoctrine()->getManager();

        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($idForm);

        if (!$formation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $em->remove($formation);
        $em->flush();

        return $this->redirectToRoute('AppCofidurBundle_formation_show_all');
    }

    public function sort_by_date($a, $b) {
        $a = strtotime($a['date']);
        $b = strtotime($b['date']);
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
    }

    public function showAction($idForm)
    {
        $em = $this->getDoctrine()->getManager();

        $formation = $em->getRepository('AppCofidurBundle:Formation')->find($idForm);

        if (!$formation) {
            throw $this->createNotFoundException('Pas d\'objet');
        }

        $op_fo = $em->getRepository('AppCofidurBundle:OperatorFormation')->findBy(['formation'=>$formation]);

        $tab=[];
        foreach($op_fo as $opfo){
            if($opfo->getValidation() >= 4){
                $date_str = date("d-M-y", $opfo->getDateEnd()->getTimestamp());
                if(isset($tab[$date_str])){
                    $tab[$date_str] += 1;
                }else{
                    $tab[$date_str] = 1;
                }
            }
        }

        if($formation->getValidityTime() != 0){
            $finaltab=[];
            foreach($tab as $k => $v){
                $ma_date_ts = strtotime($k);
                for($i=0; $i<$formation->getValidityTime(); $i++){
                    $ma_date_ts = strtotime('+1 day', $ma_date_ts);
                    $ma_date = date("d-M-y", $ma_date_ts);
                    if(isset($finaltab[$ma_date])){
                        $finaltab[$ma_date] += $v;
                    }else{
                        $finaltab[$ma_date] = $v;
                    }
                }
                $ma_date_ts = strtotime('+1 day', $ma_date_ts);
                $ma_date = date("d-M-y", $ma_date_ts);
                if(isset($finaltab[$ma_date])){
                    $finaltab[$ma_date] -= 1;
                }else{
                    $finaltab[$ma_date] = 0;                    
                }
            }
        }else{
            $finaltab = $tab;
        }

        foreach($finaltab as $k => $v){
            $finaltab[strtotime($k)] = $v;
            unset($finaltab[$k]);
        }

        ksort($finaltab);

        foreach($finaltab as $k => $v){
            $finaltab[date("d-M-y", $k)] = $v;
            unset($finaltab[$k]);
        }       

        $fileName = $this->container->get('kernel')->locateResource('@AppCofidurBundle/Resources/public/data/data.tsv');
        $file = fopen($fileName, "w+");
        fwrite($file, "date\toperator\n");
        foreach($finaltab as $d => $e){
           fwrite($file, $d."\t".$e."\n");
        }
        fclose($file);

        // We count the number of formations of operators concerning this formation
        $em = $this->getDoctrine()->getRepository('AppCofidurBundle:OperatorFormation');

        $nbFormer = count($em->findBy(
            array('formation' => $formation->getId(), 'validation' => 5)
        ));

        $nbFormedAndFormer = $nbFormer + count($em->findBy(
            array('formation' => $formation->getId(), 'validation' => 4)
        ));
//        $operatorsFormations = $em->createQueryBuilder('f')
//            ->where('f.validity = :validity')
//            ->where('f.formation = :idformation')
//            ->setParameter('validity', '4')
//            ->setParameter('id_formation', $idForm)
//            ->getQuery();

        return $this->render('AppCofidurBundle:Page/Formation:formation_show.html.twig', array(
            'formation'     => $formation,
            'nbFormed'      => $nbFormedAndFormer,
            'nbFormer'      => $nbFormer,
        ));
    }

    public function showAllAction()
    {
        $em = $this->getDoctrine()->getRepository('AppCofidurBundle:Formation');

        $formations = $em->findAll();

        // We count the number of formations of operators concerning this formation
        $em = $this->getDoctrine()->getRepository('AppCofidurBundle:OperatorFormation');

        $formationsNbFormed = [];
        $formationsCanForm = [];
        foreach($formations as $formation) {
//            $operatorsFormations = $em->createQueryBuilder('f')
//                ->where('f.validity = :validity')
//                ->where('f.formation = :idformation')
//                ->setParameter('validity', '4')
//                ->setParameter('id_formation', $formation->getId())
//                ->getQuery();
//            $formationsNbFormed[] = count($em->findByFormation($formation->getId()));

            $nb_former = count($em->findBy(
                array('formation' => $formation->getId(), 'validation' => 5)
            ));
            $formationsCanForm[] = $nb_former;
            $formationsNbFormed[] = $nb_former + count($em->findBy(
                array('formation' => $formation->getId(), 'validation' => 4)
            ));
//            $formationsNbFormed[] = count($operatorsFormations);
        }

        return $this->render('AppCofidurBundle:Page/Formation:formation_show_all.html.twig', array(
            'formations'      => $formations,
            'formationsNbFormed' => $formationsNbFormed,
            'formationsNbCanForm' => $formationsCanForm,
        ));
    }
}
