<?php

namespace App\DataFixtures;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class SuperAdmin extends Fixture
{

 private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('hayethenchir26@gmail.com');
        $user->setRoles(['ROLE_SUPER_ADMIN']);
         $user->setPassword($this->passwordEncoder->encodePassword(
             $user,
             'secret'
         ));
         $manager->persist($user);

        $manager->flush();

        // ...
    }
}
?>