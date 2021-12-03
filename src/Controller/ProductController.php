<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product')]
    public function index(): Response
    {
        $manager = $this -> getDoctrine() -> getManager();
        $repository = $manager -> getRepository(Product::class);
        $products = $repository -> findAll();
        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/product/create', name: 'create_product')]
    public function createProduct(): RedirectResponse
    {
        $manager = $this -> getDoctrine() -> getManager();
        $product = new Product();
        $product -> setTitle('Title' . random_int(1,100));
        $product -> setPrice(rand(1,1000));
        $product -> setDescription('');
        $manager ->persist($product);
        $manager -> flush($product);
        return $this -> redirectToRoute('product'); 
    }
}
