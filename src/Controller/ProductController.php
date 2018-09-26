<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{productId}", name="product")
     */
    public function index(int $productId/*, string $productName*/)
    {
        $product = new Product();
        $product->id = $productId;
        $product->name = "test"/*$productName*/;

        return $this->render('product/detail.html.twig', [
            'product' => $product,
        ]);
    }
}

class Product
{
    public $id;
    public $name;
}