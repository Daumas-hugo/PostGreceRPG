<?php

namespace App\Controller;

use App\Entity\ItemType;
use App\Form\ItemTypeType;
use App\Repository\ItemTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/item/type")
 */
class ItemTypeController extends AbstractController
{
    /**
     * @Route("/", name="item_type_index", methods={"GET"})
     */
    public function index(ItemTypeRepository $itemTypeRepository): Response
    {
        return $this->render('item_type/index.html.twig', [
            'item_types' => $itemTypeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="item_type_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $itemType = new ItemType();
        $form = $this->createForm(ItemTypeType::class, $itemType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($itemType);
            $entityManager->flush();

            return $this->redirectToRoute('item_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('item_type/new.html.twig', [
            'item_type' => $itemType,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="item_type_show", methods={"GET"})
     */
    public function show(ItemType $itemType): Response
    {
        return $this->render('item_type/show.html.twig', [
            'item_type' => $itemType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="item_type_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ItemType $itemType, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ItemTypeType::class, $itemType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('item_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('item_type/edit.html.twig', [
            'item_type' => $itemType,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="item_type_delete", methods={"POST"})
     */
    public function delete(Request $request, ItemType $itemType, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$itemType->getId(), $request->request->get('_token'))) {
            $entityManager->remove($itemType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('item_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
