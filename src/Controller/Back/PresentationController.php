<?php

namespace App\Controller\Back;

use App\Entity\Presentation;
use App\Form\PresentationType;
use App\Repository\PresentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/presentation", requirements={"id"="\d+"})
 */
class PresentationController extends AbstractController
{
    /**
     * @Route("/", name="presentation_index", methods={"GET"})
     */
    public function index(PresentationRepository $presentationRepository): Response
    {
        return $this->render('back/presentation/index.html.twig', [
            'presentations' => $presentationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="presentation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PresentationRepository $presentationRepository): Response
    {
        $presentation = new Presentation();
        $form = $this->createForm(PresentationType::class, $presentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $presentationRepository->add($presentation);
            return $this->redirectToRoute('presentation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/presentation/new.html.twig', [
            'presentation' => $presentation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="presentation_show", methods={"GET"})
     */
    public function show(Presentation $presentation): Response
    {
        return $this->render('back/presentation/show.html.twig', [
            'presentation' => $presentation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="presentation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Presentation $presentation, PresentationRepository $presentationRepository): Response
    {
        $form = $this->createForm(PresentationType::class, $presentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $presentationRepository->add($presentation);
            return $this->redirectToRoute('presentation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/presentation/edit.html.twig', [
            'presentation' => $presentation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="presentation_delete", methods={"POST"})
     */
    public function delete(Request $request, Presentation $presentation, PresentationRepository $presentationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$presentation->getId(), $request->request->get('_token'))) {
            $presentationRepository->remove($presentation);
        }

        return $this->redirectToRoute('presentation_index', [], Response::HTTP_SEE_OTHER);
    }
}
