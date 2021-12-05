<?php

namespace App\Controller;

use App\Entity\Statistique;
use App\Form\StatistiqueType;
use App\Repository\StatistiqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/statistique")
 */
class StatistiqueController extends AbstractController
{
    /**
     * @Route("/list", name="statistique_index", methods={"GET"})
     */
    public function index(StatistiqueRepository $statistiqueRepository): Response
    {
        return $this->render('statistique/index.html.twig', [
            'statistiques' => $statistiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="statistique_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $statistique = new Statistique();
        $form = $this->createForm(StatistiqueType::class, $statistique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($statistique);
            $entityManager->flush();

            return $this->redirectToRoute('statistique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('statistique/new.html.twig', [
            'statistique' => $statistique,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="statistique_show", methods={"GET"})
     */
    public function show(Statistique $statistique): Response
    {
        return $this->render('statistique/show.html.twig', [
            'statistique' => $statistique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="statistique_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Statistique $statistique, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StatistiqueType::class, $statistique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('statistique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('statistique/edit.html.twig', [
            'statistique' => $statistique,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="statistique_delete", methods={"POST"})
     */
    public function delete(Request $request, Statistique $statistique, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statistique->getId(), $request->request->get('_token'))) {
            $entityManager->remove($statistique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('statistique_index', [], Response::HTTP_SEE_OTHER);
    }
}
