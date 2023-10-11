<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Produits;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createForm(SearchFormType::class);
        $search = $request->query->get('search');

        if(is_null($search) || empty($search)){
            return $this->redirectToRoute('app_accueil');
        }
        $articles = $entityManager->getRepository(Produits::class)->findBySearch($search); // renvoie une list d'articles
        // dump($articles); // vous affichera si articles renvoie bien un article
        $datas = array();

        foreach($articles as $key =>$article){
            $datas[$key]['id'] =$article->getId();
            $datas[$key]['titre'] =$article->getTitre();
            $datas[$key]['category'] =$article->getCategory()->getName();
            $datas[$key]['description'] =$article->getDescription();
            $datas[$key]['picture'] =$article->getPicture();
            $datas[$key]['prix'] =$article->getPrix();
    
          
    
        }

        return new Response(json_encode($datas));
        
        
    }
}
