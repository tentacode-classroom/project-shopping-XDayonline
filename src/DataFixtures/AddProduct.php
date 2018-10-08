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

        $product = new Chicken();
        $product->setName('Spicy');
        $product->setPrice(3);
        $product->setType('Poulet');
        $product->setDescription("De délicieuses ailes de poulet marinées, épicées et panées à grignoter.");
        $product->setUrlimg("https://www.pepperscale.com/wp-content/uploads/2016/11/Spicy-Chicken-Strips.jpeg");

        $manager->persist($product);

        $product = new Chicken();
        $product->setName('Original');
        $product->setPrice(4);
        $product->setType('Poulet');
        $product->setDescription("Généreuses pièces de poulet marinées et panées à dévorer.");
        $product->setUrlimg("https://topsecretrecipes.com/images/product/kfc-original-recipe-chicken-copycat-recipe_2.jpg");

        $manager->persist($product);

        $product = new Chicken();
        $product->setPrice(5);
        $product->setName('Chicken Salad');
        $product->setType('Salade');
        $product->setDescription("2 Tenders, un mélange de jeunes pousses, des cerneaux de noix, des palets de chèvre, des lamelles de betterave, des tomates cerises, sauce salade au choix.");
        $product->setUrlimg("https://truffle-assets.imgix.net/b13da2f9-742-friedchickensalad-square2.jpg");

        $manager->persist($product);

        $product = new Chicken();
        $product->setPrice(2);
        $product->setName('Chicken Wing Cupcake');
        $product->setType('Dessert');
        $product->setDescription("1 Tender accompagnée de son délicieux cupcake chocolat nappé de sa crème onctueuse.");
        $product->setUrlimg("https://s.abcnews.com/images/Entertainment/ht_chicken_wing_cupcake_nt_120203_wmain.jpg");

        $manager->persist($product);

        $manager->flush();
    }
}
