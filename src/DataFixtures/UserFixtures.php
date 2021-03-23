<?php

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    
    protected UserPasswordEncoderInterface $passwordEncoder;

    /**
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        $user = new User();

        $user->setEmail('admin@gmail.com')
             ->setPassword($this->passwordEncoder->encodePassword($user, 'password'))
             ->setFirstName('Rakoto')
             ->setLastName('Rabe')
             ->setCompany('Esokia');

        $manager->persist($user);
        $manager->flush();
    }
}
