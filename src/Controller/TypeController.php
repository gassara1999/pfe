<?php

namespace App\Controller;

use App\Entity\MembershipType;
use App\Form\MembershipTypeType;
use App\Repository\MembershipTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/type')]
#[IsGranted('ROLE_ADMIN')]
class TypeController extends AbstractController
{
    #[Route('/', name: 'app_type_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $membershipTypes = $entityManager
            ->getRepository(MembershipType::class)
            ->findAll();

        return $this->render('type/index.html.twig', [
            'membership_types' => $membershipTypes,
        ]);
    }

    #[Route('/new', name: 'app_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $membershipType = new MembershipType();
        $form = $this->createForm(MembershipTypeType::class, $membershipType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($membershipType);
            $entityManager->flush();
            $this->addFlash("success", "New membership type successfully created");
            return $this->redirectToRoute('app_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type/new.html.twig', [
            'membership_type' => $membershipType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_show', methods: ['GET'])]
    public function show(MembershipType $membershipType): Response
    {
        return $this->render('type/show.html.twig', [
            'membership_type' => $membershipType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MembershipType $membershipType, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MembershipTypeType::class, $membershipType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type/edit.html.twig', [
            'membership_type' => $membershipType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_delete', methods: ['POST'])]
    public function delete(Request $request, MembershipType $membershipType, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$membershipType->getId(), $request->request->get('_token'))) {
            $entityManager->remove($membershipType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
