<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
    
        $role1 = new Role;
        $role1->setLibelle("SUPADMIN");
        $manager->persist($role1);
        
        $user1 = new User();
        $user1->setPassword($this->encoder->encodePassword($user1, "dame123"));
        $user1->setRoles(array("ROLE_".$role1->getLibelle()));
        $user1->setIsActive(true);
        $user1->setUsername("dame");
        $user1->setNomcomplet("damendiaye");
        $user1->setRole($role1);
        $manager->persist($user1);

        $role2 = new Role;
        $role2->setLibelle("ADMIN");
        $manager->persist($role2);

        $user2 = new User();
        $user2->setPassword($this->encoder->encodePassword($user2, "abdou123"));
        $user2->setRoles(array("ROLE_".$role2->getLibelle()));
        $user2->setIsActive(true);
        $user2->setUsername("abdou");
        $user2->setNomcomplet("abdoudiop");
        $user2->setRole($role2);
        $manager->persist($user2);


      
 
        $manager->flush();
    
    }
}
