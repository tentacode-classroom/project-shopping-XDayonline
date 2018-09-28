<?php

namespace App\Controller;

use App\Entity\Chicken;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use App\Repository\MusicRepository;
use App\Entity\Music;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $productRepository = new ProductRepository();
        $chickens = $productRepository->findAll();
        return $this->render('homepage.html.twig', [
            'chickens' => $chickens,
        ]);
    }
}
