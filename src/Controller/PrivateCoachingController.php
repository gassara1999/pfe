<?php

namespace App\Controller;

use App\Entity\PrivateCoaching;
use App\Form\PrivateCoachingType;
use App\Repository\PrivateCoachingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/private/coaching')]
class PrivateCoachingController extends AbstractController
{
    #[Route('/', name: 'app_private_coaching_index', methods: ['GET'])]
    public function index(PrivateCoachingRepository $privateCoachingRepository): Response
    {
        return $this->render('private_coaching/index.html.twig', [
            'private_coachings' => $privateCoachingRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_private_coaching_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PrivateCoachingRepository $privateCoachingRepository): Response
    {
        $privateCoaching = new PrivateCoaching();
        $form = $this->createForm(PrivateCoachingType::class, $privateCoaching);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $privateCoachingRepository->add($privateCoaching, true);

            return $this->redirectToRoute('app_private_coaching_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('private_coaching/new.html.twig', [
            'private_coaching' => $privateCoaching,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_private_coaching_show', methods: ['GET'])]
    public function show(PrivateCoaching $privateCoaching): Response
    {
        return $this->render('private_coaching/show.html.twig', [
            'private_coaching' => $privateCoaching,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_private_coaching_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PrivateCoaching $privateCoaching, PrivateCoachingRepository $privateCoachingRepository): Response
    {
        $form = $this->createForm(PrivateCoachingType::class, $privateCoaching);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $privateCoachingRepository->add($privateCoaching, true);

            return $this->redirectToRoute('app_private_coaching_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('private_coaching/edit.html.twig', [
            'private_coaching' => $privateCoaching,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_private_coaching_delete', methods: ['POST'])]
    public function delete(Request $request, PrivateCoaching $privateCoaching, PrivateCoachingRepository $privateCoachingRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$privateCoaching->getId(), $request->request->get('_token'))) {
            $privateCoachingRepository->remove($privateCoaching, true);
        }

        return $this->redirectToRoute('app_private_coaching_index', [], Response::HTTP_SEE_OTHER);
    }
}
