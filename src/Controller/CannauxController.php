<?php

namespace App\Controller;

use App\Entity\Cannaux;
use App\Form\CannauxType;
use App\Repository\CannauxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cannaux')]
class CannauxController extends AbstractController
{
    #[Route('/cannaux', name: 'app_cannaux_index', methods: ['GET'])]
    #[IsGranted("ROLE_USER")]
    public function index(CannauxRepository $cannauxRepository): Response
    {
        return $this->render('cannaux/index.html.twig', [
            'cannauxes' => $cannauxRepository->findAll(),
        ]);
    }

    #[Route('/cannaux/new', name: 'app_cannaux_new', methods: ['GET', 'POST'])]
    #[IsGranted("ROLE_USER")]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cannaux = new Cannaux();
        $form = $this->createForm(CannauxType::class, $cannaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cannaux);
            $entityManager->flush();

            return $this->redirectToRoute('app_cannaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cannaux/new.html.twig', [
            'cannaux' => $cannaux,
            'form' => $form,
        ]);
    }

    #[Route('/cannaux/{id}', name: 'app_cannaux_show', methods: ['GET'])]
    #[IsGranted("ROLE_USER")]
    public function show(Cannaux $cannaux): Response
    {
        return $this->render('cannaux/show.html.twig', [
            'cannaux' => $cannaux,
        ]);
    }

    #[Route('/cannaux/{id}/edit', name: 'app_cannaux_edit', methods: ['GET', 'POST'])]
    #[IsGranted("ROLE_USER")]
    public function edit(Request $request, Cannaux $cannaux, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CannauxType::class, $cannaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cannaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cannaux/edit.html.twig', [
            'cannaux' => $cannaux,
            'form' => $form,
        ]);
    }

    #[Route('/cannaux/{id}/delete', name: 'app_cannaux_delete', methods: ['POST'])]
    #[IsGranted("ROLE_USER")]
    public function delete(Request $request, Cannaux $cannaux, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cannaux->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cannaux);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cannaux_index', [], Response::HTTP_SEE_OTHER);
    }
}
