<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use App\Entity\Chicken;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{productId}", name="product")
     */
//    public function index(int $productId /*, string $productName*/)
//    {
//        $productRepository = new ProductRepository();
//        $chicken = $productRepository->findOneById($productId);
//        return $this->render('product/detail.html.twig', [
//            'chicken' => $chicken,
//        ]);
//    }
    public function show($productId)
    {
        $product = $this->getDoctrine()
            ->getRepository(Chicken::class)
            ->find($productId);

        if (!$productId) {
            throw $this->createNotFoundException(
                'No product found for id ' . $productId
            );
        }

        return $this->render('product/detail.html.twig', [
            'chicken' => $product,
        ]);
    }
}