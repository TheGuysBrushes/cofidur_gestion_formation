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
                
		for ($i=0; $i<self::MAX_NB_USERS; ++$i){
			$user = new User();
			$user->setUsername($faker->username);
                        $user->setFirstName($faker->firstname);
                        $user->setLastName($faker->lastname);
                        $user->setDateOfBirth(new \DateTime($faker->date));
                        $user->setEmail($faker->email);
                        $user->setPlainPassword($faker->password);
                        $user->setEnabled(true);
			$manager->persist($user);
			$this->addReference('user'.$i, $user);
		}
                
                $user = new User();
                $user->setUsername("root");
                $user->setFirstName("root");
                $user->setLastName("root");
                $user->setDateOfBirth(new \DateTime($faker->date));
                $user->setEmail("root@root.root");
                $user->setPlainPassword("root");
                $user->setEnabled(true);
                $manager->persist($user);

		$manager->flush();
	}
	
	public function getOrder(){
		return 2;
        }
}