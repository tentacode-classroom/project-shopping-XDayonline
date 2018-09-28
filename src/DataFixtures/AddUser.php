<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class AddUser extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $product = new User();
        $product->setEmail('john.mysterio@hotmail.fr');
        $product->setPassword('jaimelespates');
        $product->setFirstname('Jeanmi');
        $product->setLastname("dutreize");

        $manager->persist($product);

        $manager->flush();
    }
}
