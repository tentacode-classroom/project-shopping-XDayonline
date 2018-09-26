<?php

namespace App\Entity;

class Chicken
{
    private $id;
    private $name;
    private $description;
    private $type;
    private $price;

    public function setId(int $id)
    {
        $this->name = $id;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setDescription(string $description)
    {
        $this->name = $description;
    }
    public function setType(string $type)
    {
        $this->name = $type;
    }
    public function setPrice(string $price)
    {
        $this->name = $price;
    }

    public function getName()
    {
        return $this->name;
    }
}