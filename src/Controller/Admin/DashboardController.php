<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Entity\Collection;
use App\Entity\Contacts;
use App\Entity\Membre;
use App\Entity\Produits;
use App\Entity\SmallCategories;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(CategoriesCrudController::class)->generateUrl());

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
            ->setTitle('Projet Paoli');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('Nos catégories', 'fas fa-list', Categories::class);
        yield MenuItem::linkToCrud('Nos collections', 'fas fa-list', Collection::class);
        yield MenuItem::linkToCrud('Nos contacts', 'fas fa-list', Contacts::class);
        yield MenuItem::linkToCrud('Nos Produits', 'fas fa-list', Produits::class);
        yield MenuItem::linkToCrud('Nos Sous Catégories', 'fas fa-list', SmallCategories::class);
        yield MenuItem::linkToCrud('Nos Users', 'fas fa-list', User::class);
    }   
}
