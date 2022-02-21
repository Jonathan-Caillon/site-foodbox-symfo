<?php

namespace App\Controller;

use App\Repository\AccueilRepository;
use App\Repository\ContactRepository;
use App\Repository\GalerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitRepository;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'home_page')]
    public function index(ProduitRepository $produitRepository, GalerieRepository $galerieRepository, AccueilRepository $accueilRepository, ContactRepository $contactRepository): Response
    {
        return $this->render('home_page/index.html.twig', [
            'produits' => $produitRepository->findAll(),
            'galeries'=> $galerieRepository->findAll(),
            'accueils'=> $accueilRepository->findAll(),
            'contacts'=> $contactRepository->findAll(),
        ]);
    }
}
