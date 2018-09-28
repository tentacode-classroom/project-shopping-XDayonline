<?php

namespace App\Repository;

use App\Entity\Chicken;
use App\Entity\User;

class ProductRepository
{
    private $chickens;

    public function __construct()
    {
        $chicken1 = new Chicken();
        $chicken1->setId(1);
        $chicken1->setName('Tender');
        $chicken1->setType('Poulet');
        $chicken1->setDescription("De vrais morceaux de poulet marinés et panés à déguster avec leurs sauces.");
        $chicken1->setUrlimg("https://i1.wp.com/sgt-pepperoni.com/wp-content/uploads/2017/12/chicken-tenders-1.jpg?resize=600%2C353");

        $chicken2 = new Chicken();
        $chicken2->setId(2);
        $chicken2->setName('Spicy');
        $chicken2->setType('Poulet');
        $chicken2->setDescription("De délicieuses ailes de poulet marinées, épicées et panées à grignoter.");
        $chicken2->setUrlimg("https://www.pepperscale.com/wp-content/uploads/2016/11/Spicy-Chicken-Strips.jpeg");

        $chicken3 = new Chicken();
        $chicken3->setId(3);
        $chicken3->setName('Original');
        $chicken3->setType('Poulet');
        $chicken3->setDescription("Généreuses pièces de poulet marinées et panées à dévorer.");
        $chicken3->setUrlimg("https://topsecretrecipes.com/images/product/kfc-original-recipe-chicken-copycat-recipe_2.jpg");

        $chicken4 = new Chicken();
        $chicken4->setId(4);
        $chicken4->setName('Chicken Salad');
        $chicken4->setType('Salade');
        $chicken4->setDescription("2 Tenders, un mélange de jeunes pousses, des cerneaux de noix, des palets de chèvre, des lamelles de betterave, des tomates cerises, sauce salade au choix.");
        $chicken4->setUrlimg("https://truffle-assets.imgix.net/b13da2f9-742-friedchickensalad-square2.jpg");

        $this->chickens = [
            $chicken1,
            $chicken2,
            $chicken3,
            $chicken4,
        ];
    }

    public function findAll(): array
    {
        return $this->chickens;
    }

    public function findOneById(int $id): Chicken
    {
        foreach ($this->chickens as $chicken) {
            if ($chicken->getId() === $id) {
                return $chicken;
            }
        }
        throw new \RuntimeException(sprintf(
            'No chicken found with id "%s"',
            $id
        ));
    }
}