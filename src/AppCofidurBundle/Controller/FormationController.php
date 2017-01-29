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

    private function nbOperatorsFormations($em, $formation, $validity)
    {
        $opFormationsValids = $em->findBy(
            array('formation' => $formation->getId(), 'validation' => $validity)
        );

        $nbValids = count($opFormationsValids);

        return $nbValids;
    }


    private function nbOperatorsFormationsValids($em, $formation, $validity)
    {
        $opFormationsValids = $em->findBy(
            array('formation' => $formation->getId(), 'validation' => $validity)
        );

        $nbValids = 0;
        foreach($opFormationsValids as $opFormationValids) {
            if ($opFormationValids->getFormation()->getValidityTime() == 0 || $opFormationValids->getRemainingTime() > 0) {++$nbValids;}
        }

        return $nbValids;
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


        if($formation->getValidityTime() == 0){
            $i=0;
            foreach($finaltab as $k => $v){
                $finaltab[$k] += $i;
                $i += $v;
            }
        }

        foreach($finaltab as $k => $v){
            $finaltab[date("d-M-y", $k)] = $v;
            unset($finaltab[$k]);
        }

        $fileName = $this->getParameter('data_directory');
        $fileName = $fileName.'data_'.$formation->getId().'.tsv';
        $file = fopen($fileName, "w+");
        fwrite($file, "date\toperator\n");
        foreach($finaltab as $d => $e){
           fwrite($file, $d."\t".$e."\n");
        }
        fclose($file);

        // We count the number of formations of operators concerning this formation
        $em = $this->getDoctrine()->getRepository('AppCofidurBundle:OperatorFormation');

        $nbFormer = $this->nbOperatorsFormationsValids($em, $formation, 5);
        $nbFormedAndFormer = $nbFormer + $this->nbOperatorsFormationsValids($em, $formation, 4);

        $nbFormerTot = $this->nbOperatorsFormations($em, $formation, 5);
        $nbFormedAndFormerTot = $nbFormerTot + $this->nbOperatorsFormations($em, $formation, 4);

        return $this->render('AppCofidurBundle:Page/Formation:formation_show.html.twig', array(
            'formation'     => $formation,
            'nbFormed'      => $nbFormedAndFormer,
            'nbFormer'      => $nbFormer,
            'nbFormedTot' => $nbFormedAndFormerTot,
            'nbFormerTot' => $nbFormerTot,
        ));
    }

    public function showAllAction()
    {
        $em = $this->getDoctrine()->getRepository('AppCofidurBundle:Formation');

        $formations = $em->findAll();

        // We count the number of formations of operators concerning each formation
        $em = $this->getDoctrine()->getRepository('AppCofidurBundle:OperatorFormation');

        $formationsNbFormed = [];
        $formationsCanForm = [];
//        $formationsNbFormerTot = [];
        $formationsNbFormedTot = [];
        foreach($formations as $formation) {
            $nbFormer = $this->nbOperatorsFormationsValids($em, $formation, 5);
            $formationsCanForm[] = $nbFormer;
            $formationsNbFormed[] = $nbFormer + $this->nbOperatorsFormationsValids($em, $formation, 4);

            $nbFormerTot =$this->nbOperatorsFormations($em, $formation, 5);
//            $formationsNbFormerTot[] = $nbFormerTot;
            $formationsNbFormedTot[] = $nbFormerTot + $this->nbOperatorsFormations($em, $formation, 4);
        }

        return $this->render('AppCofidurBundle:Page/Formation:formation_show_all.html.twig', array(
            'formations'      => $formations,
            'formationsNbFormed' => $formationsNbFormed,
            'formationsNbFormer' => $formationsCanForm,
            'formationsNbFormedTot' => $formationsNbFormedTot,
//            'formationsNbFormerTot' => $formationsNbFormerTot,
        ));
    }
}
