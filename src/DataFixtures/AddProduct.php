<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Chicken;

class AddProduct extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product = new Chicken();
        $product->setName('Tender');
        $product->setPrice(2);
        $product->setType('Poulet');
        $product->setDescription("De vrais morceaux de poulet marinés et panés à déguster avec leurs sauces.");
        $product->setUrlimg("https://i1.wp.com/sgt-pepperoni.com/wp-content/uploads/2017/12/chicken-tenders-1.jpg?resize=600%2C353");

        $manager->persist($product);

        $manager->flush();
    }
}
