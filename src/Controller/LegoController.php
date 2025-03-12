<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

// Import de la classe LEgo
use App\Entity\Lego;
use App\Repository\LegoRepository;
// Import de la classe LegoService
use App\Service\LegoService;

/* indique l'utilisation du bon bundle pour gérer nos routes */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\LegoCollectionRepository;
use App\Entity\LegoCollection;



/* le nom de la classe doit être cohérent avec le nom du fichier */
class LegoController extends AbstractController
{
    // L'attribute #[Route] indique ici que l'on associe la route
    // "/" à la méthode lego() pour que Symfony l'exécute chaque fois
    // que l'on accède à la racine de notre site.

    #[Route('/test/{id}', 'test')]
    public function test(LegoCollection $collection): Response
    {
        dd($collection);
    }


    #[Route('/', name: 'lego')]
    public function lego(LegoRepository $legoService, LegoCollectionRepository $legoCollectionsService) : Response
    {
        // On récupère un objet Lego grâce à la méthode getLego() de LegoService
        $legos = $legoService->findAll();

        $collections = $legoCollectionsService->findAll();
        $categories = [];
        foreach ($collections as $collection) {
            $categories[] = [
                'id' => $collection->getId(),
                'name' => $collection->getName()
            ];
        }

        $response = new Response();
        foreach ($legos as $lego) {
            $response->setContent(
                $response->getContent() . $this->renderView('lego.html.twig', [
                    $lego->collection = $lego->getCategory()->getName(),
                    'lego' => $lego,
                    'categories' => $categories
                ])
            );
        }
        return $response;
    }
    #[Route('/me', name: 'me')]
    public function me(){
        die("Enguerran");
    }

    // ROute pour star wars
    // #[Route('/star_wars', name: 'filter_by_collection_star_wars')]
    // public function legoStarWars(LegoService $legoService) : Response
    // {
    //     $legos = $legoService->getLegosByCollection(('Star Wars'));
        
    //     $response = new Response();
    //     foreach ($legos as $lego) {
    //         $response->setContent(
    //             $response->getContent() . $this->renderView('lego.html.twig', [
    //                 'lego' => $lego
    //             ])
    //         );
    //     }
    //     return $response;
    // }

    // // Route pour creator Expert
    // #[Route('/creator_expert', name: 'filter_by_collection_creator_expert')]
    // public function legoCreatorExpert(LegoService $legoService) : Response
    // {
    //     $legos = $legoService->getLegosByCollection(('Creator Expert'));
        
    //     $response = new Response();
    //     foreach ($legos as $lego) {
    //         $response->setContent(
    //             $response->getContent() . $this->renderView('lego.html.twig', [
    //                 'lego' => $lego
    //             ])
    //         );
    //     }
    //     return $response;
    // }

    // // Route pour Creator
    // #[Route('/creator', name: 'filter_by_collection_creator')]
    // public function legoCreator(LegoService $legoService) : Response
    // {
    //     $legos = $legoService->getLegosByCollection(('Creator'));
        
    //     $response = new Response();
    //     foreach ($legos as $lego) {
    //         $response->setContent(
    //             $response->getContent() . $this->renderView('lego.html.twig', [
    //                 'lego' => $lego
    //             ])
    //         );
    //     }
    //     return $response;
    // }

    #[Route('/{collection}', name: 'filter_by_collection', requirements: ['collection' => 'creator|star_wars|creator_expert|[0-9]+'])]
    public function filter(LegoRepository $legoService, LegoCollectionRepository $legoCollectionsService, string $collection): Response
    {
        $legos = $legoService->findByCollection($collection);

        $collections = $legoCollectionsService->findAll();
        $categories = [];
        foreach ($collections as $collection) {
            $categories[] = [
            'id' => $collection->getId(),
            'name' => $collection->getName()
            ];
        }

        $response = new Response();
        foreach ($legos as $lego) {
            $response->setContent(
                $response->getContent() . $this->renderView('lego.html.twig', [
                    $lego->collection = $lego->getCategory()->getName(),
                    'lego' => $lego,
                    'categories' => $categories
                ])
            );
        }
        return $response;
    }

}