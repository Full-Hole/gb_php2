<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SingleProductController extends AbstractController
{
    /**
     * @Route("/single/product", name="single_product")
     */
    public function index(): Response
    {
        return $this->render('single_product/index.html.twig', [
            'controller_name' => 'SingleProductController',
        ]);
    }
}
