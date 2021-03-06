<?php

namespace App\Controller;

use App\Entity\Chicken;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $doctrine = $this->getDoctrine();
        $productRepository = $doctrine->getRepository(Chicken::class);
        $chickens = $productRepository->findAllProducts();
        return $this->render('homepage.html.twig', [
            'chickens' => $chickens,
        ]);
    }
}
