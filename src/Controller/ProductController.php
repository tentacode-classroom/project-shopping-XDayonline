<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{productId}", name="product")
     */
    public function index(int $productId /*, string $productName*/)
    {
//        $product = new Product();
//        $product->id = $productId;
//        $product->name = "test" /*$productName*/;
//
//        return $this->render('product/detail.html.twig', [
//            'product' => $product,
//        ]);
//
        $productRepository = new ProductRepository();
        $chicken = $productRepository->findOneById($productId);
        return $this->render('product/detail.html.twig', [
            'chicken' => $chicken,
        ]);
    }
}
/*
class Product
{
    public $id;
    public $name;
}*/