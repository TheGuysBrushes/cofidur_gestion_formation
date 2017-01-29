<?php
namespace AppCofidurBundle\DataFixtures\ORM;
use AppCofidurBundle\Entity\Category;
use AppCofidurBundle\Entity\Task;
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

    private function createVisserie(ObjectManager $manager) {
        $formation = new Formation();
        $formation->setName("FREINAGE ET MARQUAGE VISSERIE");
        $formation->setType("Visserie");
        $formation->setSector("SECTEUR");
        $formation->setReference("CEPX/METH/CL/09/017");
        $formation->setCriticality(4);
        $formation->setGoal("Savoir effectuer les diverses opérations de freinage et marquage visserie sur les produits
        THALES DAE en respectant leurs contraintes et exigences définies dans les procédures");
        $formation->setTeachingAids("Support de formation pour le freinage et le marquage de la visserie CEPX/METH/CL/09/06
        (document issu des procédures Thalès DAE 16262754 / Freinage démontage de la visserie et 16262760-024 / Marquage de la visserie )");
        $formation->setPlacesMaterialRessources("Formation en salle");
        $formation->setValidityTime(rand(0,1)*rand(1,90));

        // Création d'une catégorie
        $category = new Category();
        $category->setName("FREINAGE DE LA VISSERIE");
        $category->setOrdre(1);

        // Création des tâches de la catégorie

        $task = new Task();
        $task->setName("Préparation des surfaces");
        $task->setOrdre(1);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Application du produit de freinage");
        $task->setOrdre(2);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Pose du produit de freinage");
        $task->setOrdre(3);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Dimensionnement du dépôt");
        $task->setOrdre(4);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Procédure de montage des points de fixation vissés d'un assemblage");
        $task->setOrdre(5);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Polymérisation");
        $task->setOrdre(6);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Vérification de conformité");
        $task->setOrdre(7);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        // Ajout de la catégorie dans la formation
        $formation->addCategory($category); $category->setFormation($formation);
        $manager->persist($category);

        // Création d'une catégorie
        $category = new Category();
        $category->setName("PRODUITS DE FREINAGE ET RECOMMANDATIONS");
        $category->setOrdre(2);

        // Création des tâches de la catégorie

        $task = new Task();
        $task->setName("Les produits de freinage anaérobies (frein filet)");
        $task->setOrdre(1);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Restriction d'emploi");
        $task->setOrdre(2);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Synthèse sur le freinage visserie");
        $task->setOrdre(3);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        // Ajout de la catégorie dans la formation
        $formation->addCategory($category); $category->setFormation($formation);
        $manager->persist($category);

        // Création d'une catégorie
        $category = new Category();
        $category->setName("MARQUAGE DE LA VISSERIE");
        $category->setOrdre(3);

        $task = new Task();
        $task->setName("Procédé du cautionnement du serrage au couple");
        $task->setOrdre(1);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Préparation des surfaces");
        $task->setOrdre(2);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Application du marquage (cas des vis à tête non fraisée et cas des vis à tête fraisée)");
        $task->setOrdre(3);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Dimensionnement du marquage");
        $task->setOrdre(4);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Procédure de marquage des points de fixation vissés d'un assemblage");
        $task->setOrdre(5);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Vérification de conformité");
        $task->setOrdre(6);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        $task = new Task();
        $task->setName("Les produits de cautionnement utilisable");
        $task->setOrdre(7);
        $category->addTask($task); $task->setCategory($category);
        $manager->persist($task);

        // Ajout de la catégorie dans la formation
        $formation->addCategory($category); $category->setFormation($formation);
        $manager->persist($category);

        // Sauvegarde de la formation dans le manager
        $manager->persist($formation);
    }

	public function load(ObjectManager $manager){
        $this->createVisserie($manager);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Cablage");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Collage MIDS");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Contrôle AOI + CLUSO + XPRESS");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Devitalisation");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Etuvage PCB");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Insertion CIF");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Masquage");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("MDV");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Pilotage machine depot colle GL");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Pilotage machine report CMS");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Potting-Enrobage");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Reparateur CIFx");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Retouches manuelles  CMS");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("test fonctionnel cartes Nodes chassis Suchard ONLINEl");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Test fonctionnel Nodes");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Test INSITU à sondes mobiles et station fixe");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Test JTAG");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Test OK _ NOK");
        $manager->persist($formation);

        $formation = new Formation();
        $formation->setCriticality(rand(1,5));
        $formation->setGoal("OBJECTIF");
        $formation->setType("TYPE");
        $formation->setSector("SECTEUR");
        $formation->setReference("REFERENCE");
        $formation->setTeachingAids("Aide pour l'apprentissage");
        $formation->setPlacesMaterialRessources("Lieux et moyens materiels");
        $formation->setValidityTime(rand(0,1)*rand(1,90));
        $formation->setName("Test Pre-calibration carte FDU508 DIAMANT");
        $manager->persist($formation);
                
		$manager->flush();
	}

    public function getOrder(){
            return 1;
    }
}