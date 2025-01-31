<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

// Import de la classe LEgo
use App\Entity\Lego;

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
    public function lego() : Response
    {
        $lego =  new Lego(10252, "La coccinelle Volkwagen", "Creator Expert");
        $lego->setboxImage('LEGO_10252_Box.png');
        $lego->setPrice(94.99);
        $lego->setDescription("Construis une réplique LEGO® Creator Expert de l'automobile la plus populaire au monde. Ce magnifique modèle LEGO est plein de détails authentiques qui capturent le charme et la personnalité de la voiture, notamment un coloris bleu ciel, des ailes arrondies, des jantes blanches avec des enjoliveurs caractéristiques, des phares ronds et des clignotants montés sur les ailes.");
        $lego->setPieces(1167);
        $lego->setLegoImage('LEGO_10252_Main.jpg');

        return $this->render('lego.html.twig', [
            'lego' => $lego
        ]);
    }

    #[Route('/me', name: 'me')]
    public function me(){
        die("Enguerran");
    }
}
