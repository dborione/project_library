<?php

namespace App\DataFixtures;

use App\Entity\Staff;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class StaffFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $staff = new Staff();
        $staff->setEmail("staff@test.com");
        $staff->setRoles(["ROLE_STAFF"]);
        $staff->setPassword($this->passwordHasher->hashPassword(
            $staff,
            "staff123"
        ));
        $manager->persist($staff);
        $manager->flush();
    }

  
}
