<?php

namespace App\Controller\Admin;

use App\Entity\Accueil;
use App\Entity\Categorie;
use App\Entity\Contact;
use App\Entity\Galerie;
use App\Entity\Produit;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(ProduitCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Foodbox');
    }

    public function configureMenuItems(): iterable
    {
        
        yield MenuItem::section('Accueil');
        yield MenuItem::linkToCrud('Présentation', 'fas fa-list', Accueil::class);
        yield MenuItem::section('Menu');
        yield MenuItem::linkToCrud('Produit', 'fas fa-list', Produit::class);
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list', Categorie::class)->setPermission("ROLE_ADMIN");
        yield MenuItem::section('Galerie');
        yield MenuItem::linkToCrud('Photos', 'fas fa-list', Galerie::class);
        yield MenuItem::section('Nous contacter');
        yield MenuItem::linkToCrud('Contact', 'fas fa-list', Contact::class);
        yield MenuItem::section('Utilisateur')->setPermission("ROLE_ADMIN");
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class)->setPermission("ROLE_ADMIN");


    }
}
