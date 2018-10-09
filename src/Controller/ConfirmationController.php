<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmationController extends AbstractController
{
    /**
     * @Route("inscription/confirmation", name="confirmation")
     */
    public function index()
    {
        return $this->render('confirmation/confirmation.html.twig', [
            'controller_name' => 'ConfirmationController',
        ]);
    }
}
