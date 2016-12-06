<?php
namespace AppCofidurBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppCofidurBundle\Entity\OperatorFormation;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LoadOperatorFormationData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface{

        public function setContainer(ContainerInterface $container = null){
                $this->container = $container;
        }
        
	public function load(ObjectManager $manager){

                for($j=1; $j<51; $j++){
                        for ($i=1; $i < 20; $i++) { 
                                $rand = rand(1,3);
                                if($rand == 2){
                                        $operator = $manager->getRepository('AppCofidurBundle:User')->find($j);
                                        $former = $manager->getRepository('AppCofidurBundle:User')->find(rand(1,50));
                                        $formation = $manager->getRepository('AppCofidurBundle:Formation')->find($i);

                                        $operatorformation = new OperatorFormation();
                                        $operatorformation->setDateBegin(date_create(date('Y-m-d H:i:s')));
                                        $operatorformation->setDateEnd(date_create(date('Y-m-d H:i:s'))); 
                                        $operatorformation->setValidation(rand(1, 5));
                                        $operatorformation->setCommentary("Petit commentaire");
                                        $operatorformation->setFormer($former);
                                        $operatorformation->setOperator($operator);
                                        $operatorformation->setFormation($formation);
                                        $operatorformation->setSignature("Signature");
                                        $manager->persist($operatorformation);
                                 }
                        }
                }

                $manager->flush();
        }
	
	public function getOrder(){
		return 3;
        }
}