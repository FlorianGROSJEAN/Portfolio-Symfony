<?php

namespace App\Controller;

use App\Entity\MainCategory;
use App\Repository\CategoryRepository;
use App\Repository\MainCategoryRepository;
use App\Repository\PresentationRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PresentationRepository $presentationRepository, ProjectRepository $projectRepository, MainCategoryRepository $mainCategoryRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('front/home/index.html.twig', [
            // 'controller_name' => 'HomeController',
            'presentations' => $presentationRepository->findAll(),
            'projects' => $projectRepository->findAll(),
            'mainCategories' => $mainCategoryRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
            
        ]);
    }
}
