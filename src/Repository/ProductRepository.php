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
            'No cat found with id "%s"',
            $id
        ));
    }
}