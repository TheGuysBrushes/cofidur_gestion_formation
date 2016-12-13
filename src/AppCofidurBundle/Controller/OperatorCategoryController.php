<?php
namespace AppCofidurBundle\Controller;


use AppCofidurBundle\Form\Type\OperatorCategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OperatorCategoryController extends Controller
{
    /* On n'a pas à ajouter d'OperatorCategory pour l'instant,
     * si on veut ajouter une nouvelle catégorie dans l'operatorFormation, on en crée une nouvelle
    public function addAction(Request $request, $idOpForm, $idCategory)
    {
        $em = $this->getDoctrine()->getManager();

        $operatorformation = $em->getRepository('AppCofidurBundle:OperatorFormation')->find($idOpForm);
        $category = $em->getRepository('AppCofidurBundle:Category')->find($idCategory);

        $operatorcategory = new OperatorCategory();
        $operatorcategory->setCategory($category);

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

        return $this->render('AppCofidurBundle:Page/OperatorCategory:operatorcategory_add.html.twig',
            ['form' => $form->createView()]
        );
    }
    */

    public function deleteAction($idOpForm, $idCategory)
    {
        $em = $this->getDoctrine()->getManager();

        $operatorformation = $em->getRepository('AppCofidurBundle:OperatorFormation')->find($idOpForm);

        $category = $em->getRepository('AppCofidurBundle:Category')->find($idCategory);
        $operatorcategoryTest = $em->getRepository('AppCofidurBundle:OperatorCategory')
                                    ->findBy( ['operatorformation'=>$operatorformation, 'category'=>$category]);

        if (sizeof($operatorcategoryTest) == 0) {
            throw $this->createNotFoundException('Formation non validée!');
        }

        $operatorcategory = $operatorcategoryTest[0];

        if (!$operatorcategory) {
            throw $this->createNotFoundException(
                'Aucune catégorie de la formation correspondant à l\'opérateur n\'a été trouvée'
            );
        }

        $operatorcategory->setSignature(null);
        $operatorcategory->setDateSignature(null);
        $operatorcategory->setTrainer(null);
        $operatorcategory->setNbHours(null);

        $em->flush();

        $idOpForm = $operatorcategory->getOperatorFormation()->getId();

        return $this->redirectToRoute('AppCofidurBundle_operatorformation_show', array('idOpForm' => $idOpForm));
    }


    public function editAction(Request $request, $idOpForm, $idCategory)
    {
        $em = $this->getDoctrine()->getManager();

        $operatorformation = $em->getRepository('AppCofidurBundle:OperatorFormation')->find($idOpForm);

        $category = $em->getRepository('AppCofidurBundle:Category')->find($idCategory);
        $operatorcategoryTest = $em->getRepository('AppCofidurBundle:OperatorCategory')
                                    ->findBy(array('operatorformation'=>$operatorformation, 'category'=>$category));

        if (sizeof($operatorcategoryTest) == 0) {
            throw $this->createNotFoundException('Formation non validée!');
        }

        $operatorcategory = $operatorcategoryTest[0];

        $form = $this->createForm(OperatorCategoryType::class, $operatorcategory);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $operatorcategory = $form->getData();

            $em->persist($operatorcategory);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_operatorformation_show',
                                            array('idOpForm' => $operatorcategory->getOperatorFormation()->getId())
            );
        }

        return $this->render('AppCofidurBundle:Page/OperatorCategory:operatorcategory_edit.html.twig',
            ['form' => $form->createView()]
        );
    }

}
