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
        $product->setEmail('Tender');
        $product->setPassword(2);
        $product->setFirstname('Poulet');
        $product->setLastname("De vrais morceaux de poulet marinés et panés à déguster avec leurs sauces.");

        $manager->persist($product);

        $manager->flush();
    }
}
