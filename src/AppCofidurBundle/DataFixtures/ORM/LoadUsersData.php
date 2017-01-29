<?php
namespace AppCofidurBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppCofidurBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;   

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface{
	const MAX_NB_USERS = 50;
        
        /**
        * @var ContainerInterface
        */
        private $container;
        /**
        * {@inheritDoc}
        */
        public function setContainer(ContainerInterface $container = null){
                $this->container = $container;
        }
        
	public function load(ObjectManager $manager)
	{
		$faker = \Faker\Factory::create();
                $userManager = $this->container->get('fos_user.user_manager');
                
                $root = new User();
                $root->setUsername("root");
                $root->setFirstName("root");
                $root->setLastName("root");
                $root->setDateOfBirth(new \DateTime($faker->date));
                $root->setEmail("root@root.root");
                $root->setStatus(rand(1,3));
                $root->setPlainPassword("root");
                $root->setEnabled(true);
                $root->setSuperiorLvl1($root );
                $root->setSuperiorLvl2($root);
                $root->setSuperAdmin(true);
                $manager->persist($root);

                $user = new User();
                $user->setUsername("user");
                $user->setFirstName("user");
                $user->setLastName("user");
                $user->setDateOfBirth(new \DateTime($faker->date));
                $user->setEmail("user@user.user");
                $user->setStatus(rand(1,3));
                $user->setPlainPassword("user");
                $user->setEnabled(true);
                $user->setSuperiorLvl1($user);
                $user->setSuperiorLvl2($user);
                $manager->persist($user);

		for ($i=2; $i<self::MAX_NB_USERS+2; ++$i){
			$usertmp = new User();
			$usertmp->setUsername($faker->username);
            $usertmp->setFirstName($faker->firstname);
            $usertmp->setLastName($faker->lastname);
            $usertmp->setDateOfBirth(new \DateTime($faker->date));
            $usertmp->setEmail($faker->email);
            $usertmp->setPlainPassword($faker->password);
            $usertmp->setEnabled(true);
            $usertmp->setStatus(rand(1,3));
            $usertmp->setSuperiorLvl1($user);
            $usertmp->setSuperiorLvl2($user);
			$manager->persist($usertmp);
			$this->addReference('user'.$i, $usertmp);
		}

		$manager->flush();
	}
	
	public function getOrder(){
		return 9;
    }
}