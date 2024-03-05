<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Form\PokemonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $pokemon = new Pokemon();

        $form = $this->createForm(PokemonType::class, $pokemon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('app_default');
        }

        return $this->render('default/index.html.twig', [
            'form' => $form,
        ]);
    }
}
