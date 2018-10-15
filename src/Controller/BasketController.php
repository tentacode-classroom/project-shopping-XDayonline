<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Chicken;

class BasketController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(SessionInterface $session)
    {
        $basketProducts = $session->get('basket_products', []);
        $chickenRepository = $this->getDoctrine()->getRepository(Chicken::class);

        $chickens = [];
        foreach($basketProducts as $productId) {
            $chicken = $chickenRepository->find($productId);
            $chickens[] = $chicken;
        }
        return $this->render('basket/index.html.twig', [
            'basket_products' => $chickens,
        ]);
    }
    /**
     * @Route("/panier/ajouter/{productId}", name="basket_add")
     */
    public function add(int $productId, SessionInterface $session)
    {
        $basketProducts = $session->get('basket_products', []);
        if (!in_array($productId, $basketProducts)) {
            $basketProducts[] = $productId;
            $this->addFlash(
                'notice',
                'Produit bien ajouté !'
            );
        }
        $session->set('basket_products', $basketProducts);
        return $this->redirectToRoute('basket_list');
    }
    /**
     * @Route("/panier/supprimer/{productId}", name="basket_remove")
     */
    public function remove(int $productId, SessionInterface $session)
    {
        $basketProducts = $session->get('basket_products', []);

        $productIndex = array_search($productId, $basketProducts);
        if (false !== $productIndex) {
            unset($basketProducts[$productIndex]);
            $this->addFlash(
                'notice',
                'Produit bien supprimé !'
            );
        }
        $session->set('basket_products', $basketProducts);
        return $this->redirectToRoute('basket_list');
    }
}
