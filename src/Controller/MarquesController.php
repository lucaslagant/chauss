<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MarquesController extends AbstractController
{ 
    #[Route('/marques', name: 'marques')]
    public function index(CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('marques/index.html.twig', [
            'controller_name' => 'MarquesController',
            'categories' => $categoriesRepository->findBy([],
            ['categoryOrder' => 'asc'])
        ]);
    }
}
