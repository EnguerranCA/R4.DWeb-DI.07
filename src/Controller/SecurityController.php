<?php

/* indique où "vit" ce fichier */

namespace App\Controller;

// Import de la classe LEgo
use App\Entity\Lego;
use App\Entity\User;
use App\Entity\LegoCollection;
use App\Repository\LegoRepository;
use App\Repository\UserRepository;
// Import de la classe LegoService
use App\Service\LegoService;

/* indique l'utilisation du bon bundle pour gérer nos routes */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\LegoCollectionRepository;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



/* le nom de la classe doit être cohérent avec le nom du fichier */

class SecurityController extends AbstractController
{
    public function index(UserPasswordHasherInterface $passwordHasher): Response
    {
        // ... e.g. get the user data from a registration form
        $user = new User();
        $plaintextPassword = 'poule';

        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);

        return new Response('Password hashed: ' . $hashedPassword);
    }

    // L'attribute #[Route] indique ici que l'on associe la route
    // "/" à la méthode lego() pour que Symfony l'exécute chaque fois
    // que l'on accède à la racine de notre site.

    #[Route('/login', name: 'lego_store_login')]
    public function login(Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // var_dump($error);
        // var_dump($lastUsername);

        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    // #[Route('/logout', name: 'lego_store_logout')]
    // public function logout(): Response
    // {
    //     $response = $security->logout();

    //     return $response;
    // }
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

    // #[Route('/{collection}', name: 'filter_by_collection', requirements: ['collection' => 'creator|star_wars|creator_expert|[0-9]+'])]
    // public function filter(LegoRepository $legoService, LegoCollectionRepository $legoCollectionsService, string $collection): Response
    // {
    //     $legos = $legoService->findByCollection($collection);

    //     $collections = $legoCollectionsService->findAll();
    //     $categories = [];
    //     foreach ($collections as $collection) {
    //         $categories[] = [
    //             'id' => $collection->getId(),
    //             'name' => $collection->getName()
    //         ];
    //     }

    //     $response = new Response();
    //     foreach ($legos as $lego) {
    //         $response->setContent(
    //             $response->getContent() . $this->renderView('lego.html.twig', [
    //                 $lego->collection = $lego->getCategory()->getName(),
    //                 'lego' => $lego,
    //                 'categories' => $categories
    //             ])
    //         );
    //     }
    //     return $response;
    // }
}
