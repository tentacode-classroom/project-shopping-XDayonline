<?php

namespace App\Entity;

class old
{
    private $id;
    private $name;
    private $description;
    private $type;
    private $price;
    private $urlimg;

    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setDescription(string $description)
    {
        $this->description = $description;
    }
    public function setType(string $type)
    {
        $this->type = $type;
    }
    public function setPrice(string $price)
    {
        $this->price = $price;
    }
    public function setUrlimg(string $urlimg)
    {
        $this->urlimg = $urlimg;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getUrlimg()
    {
        return $this->urlimg;
    }
}