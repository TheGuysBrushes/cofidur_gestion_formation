<?php
namespace AppCofidurBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;

class RegistrationController extends BaseController
{
    /*
    public function registerAction(Request $request)
    {

    }

    public function addAction(Request $request)
    {
        $operator = new Operator();

        $form = $this->createForm(RegistrationType::class, $operator);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $operator= $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($operator);
            $em->flush();

            return $this->redirectToRoute('AppCofidurBundle_operator_show_all');
        }
        else {
            return $this->render('AppCofidurBundle:Page/Operator:operator_add.html.twig', array(
                'form' => $form->createView(),
            ));
        }
    }*/
}
