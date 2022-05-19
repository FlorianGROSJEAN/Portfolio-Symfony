<?php

namespace App\Controller\Back;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/project", requirements={"id"="\d+"})
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/", name="project_index", methods={"GET"})
     */
    public function index(ProjectRepository $projectRepository): Response
    {
        return $this->render('back/project/index.html.twig', [
            'projects' => $projectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="project_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProjectRepository $projectRepository): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $projectRepository->add($project);
            return $this->redirectToRoute('project_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/project/new.html.twig', [
            'project' => $project,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="project_show", methods={"GET"})
     */
    public function show(Project $project): Response
    {
        return $this->render('back/project/show.html.twig', [
            'project' => $project,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="project_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Project $project, ProjectRepository $projectRepository): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $projectRepository->add($project);
            return $this->redirectToRoute('aproject_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/project/edit.html.twig', [
            'project' => $project,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="project_delete", methods={"POST"})
     */
    public function delete(Request $request, Project $project, ProjectRepository $projectRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$project->getId(), $request->request->get('_token'))) {
            $projectRepository->remove($project);
        }

        return $this->redirectToRoute('project_index', [], Response::HTTP_SEE_OTHER);
    }
}
