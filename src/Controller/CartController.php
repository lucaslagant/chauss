<?php

namespace App\Controller;

use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/panier', name: 'cart_index')]
    public function index(CartService $cartService): Response
    {
        return $this->render('cart/index.html.twig', [
            'cart' => $cartService->getTotal()        
        ]);
    }


    #[Route('/panier/ajout/{id<\d+>}', name: 'cart_add')]
    public function addToCart(CartService $cartService, int $id): Response
    {
        $cartService->addToCard($id);
        
        return $this->redirectToRoute('cart_index');
    }

    #[Route('/panier/remove/{id<\d+>}', name: 'cart_remove')]
    public function removeToCart(CartService $cartService, int $id): Response
    {
        $cartService->removeToCart($id);
        
        return $this->redirectToRoute('cart_index');
    }

    #[Route('/panier/removeAll', name: 'cart_removeAll')]
    public function removeAll(CartService $cartService): Response
    {
        $cartService->removeCartAll();
        
        return $this->redirectToRoute('marques');
    }

    #[Route('/panier/decrease/{id<\d+>}', name: 'cart_decrease')]
    public function decrease(CartService $cartService, $id): RedirectResponse
    {
        $cartService->decrease($id);

        return $this->redirectToRoute('cart_index');
    }
}
