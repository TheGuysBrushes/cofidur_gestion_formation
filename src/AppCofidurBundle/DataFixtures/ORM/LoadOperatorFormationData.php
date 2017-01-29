<?php
namespace AppCofidurBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use AppCofidurBundle\Entity\OperatorFormation;
use AppCofidurBundle\Entity\OperatorCategory;


class LoadOperatorFormationData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface{

        public function setContainer(ContainerInterface $container = null){
                $this->container = $container;
        }

	public function load(ObjectManager $manager){

        for($j=1; $j<53; $j++){
            for ($i=1; $i < 21; $i++) {
                $rand = rand(1,3);
                if($rand == 2){
                    $operator = $manager->getRepository('AppCofidurBundle:User')->find($j);
                    $former = $manager->getRepository('AppCofidurBundle:User')->find(rand(1,50));
                    $formation = $manager->getRepository('AppCofidurBundle:Formation')->find($i);

                    $operatorformation = new OperatorFormation();
                    $validation = rand(1, 5);
                    $operatorformation->setValidation($validation);
                    $operatorformation->setDateBegin(date_create(date('Y-m-d H:i:s')));
                    if ($validation == 1 ) {
                        $operatorformation->setDateEnd( date_create(date('Y-m-d H:i:s', strtotime( '+'.mt_rand(-10,0).' days'))) );
                    }
                    if ($validation > 3 ) {
                        $operatorformation->setDateEnd( date_create(date('Y-m-d H:i:s', strtotime( '+'.mt_rand(-150,0).' days'))) );
                    }
                    $operatorformation->setCommentary("Petit commentaire");
                    $operatorformation->setFormer($former);
                    $operatorformation->setOperator($operator);
                    $operatorformation->setFormation($formation);
                    $operatorformation->setSignature("Signature");

                    $categories = $formation->getCategories();
                    foreach ($categories as $cat) {
                        $operatorcategory = new OperatorCategory();
                        $operatorcategory->setCategory($cat);
                        $operatorcategory->setOperatorformation($operatorformation);
                        $manager->persist($operatorcategory);
                    }

                    $manager->persist($operatorformation);
                 }
            }
        }

        $manager->flush();
    }

	public function getOrder(){
		return 10;
    }
}
