<?php

namespace App\Repository;

class ProductRepository
{
    private $chickens;

    public function __construct()
    {
        $chicken1 = new Chicken();
        $chicken1->setId(11);
        $chicken1->setName('Tenders');

        $chicken2 = new Chicken();
        $chicken2->setId(12);
        $chicken2->setName('Spicy');

        $chicken3 = new Chicken();
        $chicken3->setId(13);
        $chicken3->setName('Original');

        $this->chickens = [
            $chicken1,
            $chicken2,
            $chicken3,
        ];
    }

    public function findAll(): array
    {
        // ici le code pour retourner tout les produits
    }

    public function findOneById(int $id): Chicken
    {
        // ici le code pour retourner un produit qui correspond à l'id
    }
}