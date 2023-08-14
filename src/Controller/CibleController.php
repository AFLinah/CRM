<?php

namespace App\Controller;

use App\Entity\Cible;
use App\Form\CibleType;
use App\Repository\CibleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cible')]
class CibleController extends AbstractController
{
    #[Route('/cible', name: 'app_cible_index', methods: ['GET'])]
    #[IsGranted("ROLE_USER")]
    public function index(CibleRepository $cibleRepository): Response
    {
        return $this->render('cible/index.html.twig', [
            'cibles' => $cibleRepository->findAll(),
        ]);
    }
 
    #[Route('/cible/new', name: 'app_cible_new', methods: ['GET', 'POST'])]
    #[IsGranted("ROLE_USER")]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cible = new Cible();
        $form = $this->createForm(CibleType::class, $cible);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cible);
            $entityManager->flush();

            return $this->redirectToRoute('app_cible_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cible/new.html.twig', [
            'cible' => $cible,
            'form' => $form,
        ]);
    }

    #[Route('/cible/{id}', name: 'app_cible_show', methods: ['GET'])]
    #[IsGranted("ROLE_USER")]
    public function show(Cible $cible): Response
    {
        return $this->render('cible/show.html.twig', [
            'cible' => $cible,
        ]);
    }

    #[Route('/cible/{id}/edit', name: 'app_cible_edit', methods: ['GET', 'POST'])]
    #[IsGranted("ROLE_USER")]
    public function edit(Request $request, Cible $cible, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CibleType::class, $cible);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cible_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cible/edit.html.twig', [
            'cible' => $cible,
            'form' => $form,
        ]);
    }

    #[Route('/cible/{id}/delete', name: 'app_cible_delete', methods: ['POST'])]
    #[IsGranted("ROLE_USER")]
    public function delete(Request $request, Cible $cible, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cible->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cible);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cible_index', [], Response::HTTP_SEE_OTHER);
    }
}
