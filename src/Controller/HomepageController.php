<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Chicen Salad',
                'type' => 'Entrée',
            ],
            [
                'id' => 2,
                'name' => 'Chicken Giant',
                'type' => 'Sandwich',
            ],
            [
                'id' => 3,
                'name' => 'My big bucket',
                'type' => 'Bucket',
            ],
        ];

        return $this->render('homepage.html.twig', [
            'products' => $products,
        ]);
    }
}
