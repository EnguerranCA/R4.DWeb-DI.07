<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

// Import de la classe LEgo
use App\Entity\Lego;

// Import de la classe LegoService
use App\Service\LegoService;

/* indique l'utilisation du bon bundle pour gérer nos routes */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/* le nom de la classe doit être cohérent avec le nom du fichier */
class LegoController extends AbstractController
{
    // L'attribute #[Route] indique ici que l'on associe la route
    // "/" à la méthode lego() pour que Symfony l'exécute chaque fois
    // que l'on accède à la racine de notre site.

    #[Route('/', name: 'lego')]
    public function lego(LegoService $legoService) : Response
    {
        // On récupère un objet Lego grâce à la méthode getLego() de LegoService

        $lego = $legoService->getLego();
        
        return $this->render('lego.html.twig', [
            'lego' => $lego
        ]);
    }

    #[Route('/me', name: 'me')]
    public function me(){
        die("Enguerran");
    }
}
