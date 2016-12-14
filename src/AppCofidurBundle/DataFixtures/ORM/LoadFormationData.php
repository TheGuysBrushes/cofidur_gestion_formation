<?php
namespace AppCofidurBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppCofidurBundle\Entity\Formation;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadFormationData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface{

        public function setContainer(ContainerInterface $container = null){
                $this->container = $container;
        }

	public function load(ObjectManager $manager){
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Cablage");
                $manager->persist($formation);

                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Collage MIDS");
                $manager->persist($formation);

                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Contrôle AOI + CLUSO + XPRESS");
                $manager->persist($formation);

                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Devitalisation");
                $manager->persist($formation);
                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Etuvage PCB");
                $manager->persist($formation);
                             
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Insertion CIF");
                $manager->persist($formation);
                               
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Masquage");
                $manager->persist($formation);
                                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("MDV");
                $manager->persist($formation);
                                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Pilotage machine depot colle GL");
                $manager->persist($formation);
                                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Pilotage machine report CMS");
                $manager->persist($formation);
                                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Potting-Enrobage");
                $manager->persist($formation);
                                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Reparateur CIFx");
                $manager->persist($formation);
                                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Retouches manuelles  CMS");
                $manager->persist($formation);
                                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("test fonctionnel cartes Nodes chassis Suchard ONLINEl");
                $manager->persist($formation);
                                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Test fonctionnel Nodes");
                $manager->persist($formation);
                                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Test INSITU à sondes mobiles et station fixe");
                $manager->persist($formation);
                                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Test JTAG");
                $manager->persist($formation);
                                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Test OK _ NOK");
                $manager->persist($formation);
                                
                $formation = new Formation();
                $formation->setCriticality(1);
                $formation->setGoal("Objectif");
                $formation->setType("Type");
                $formation->setTeachingAids("Aide pour l'apprentissage");
                $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
                $formation->setValidityTime(0);
                $formation->setName("Test Pre-calibration carte FDU508 DIAMANT");
                $manager->persist($formation);
                
		$manager->flush();
	}

        public function getOrder(){
                return 1;
        }
}