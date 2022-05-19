<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project/{id}", name="project", methods={"GET"})
     */
    public function show(Project $project, ProjectRepository $projectRepository): Response
    {
        return $this->render('front/project/index.html.twig', [
            'project' => $project,
        ]);
    }
}
