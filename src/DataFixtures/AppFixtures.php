<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\MainCategory;
use App\Entity\Presentation;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $projects = [

            [
                'name' => 'qt100balles',
                'image' => 'assets/images/qt100.png',
                'summary' => 'Site nostalgique sur les années 80/90',
                'description' => "Projet de fin de formation effectué en groupe.
                Développé avec Symfony (5.4), Bootstrap, CSS personnalisé et JS, ce projet a été réalisé sur 4 Sprints d'une semaine, de la conception à la mise en production.",
                'category' => ['Symfony', 'JS' , 'PHP'],
                'url' => 'https://quandtavais100balles.herokuapp.com/',
                'github' => 'https://github.com/FlorianGROSJEAN/qt100balles',
            ],
            [
                'name' => 'portfolio',
                'image' => 'assets/images/portfolio.PNG',
                'summary' => 'Mon portfolio',
                'description' => "Développé avec Symfony, CSS personnalisé et JS pour les animations.
                Il regroupe mes informations et projets sur lesquels j'ai travaille.",
                'category' => ['Symfony','JS' , 'PHP'],
                'url' => 'https://floriangrosjean.herokuapp.com/',
                'github' => 'https://github.com/FlorianGROSJEAN/Portfolio-symfo',
            ],
        ];

        $category = [

           "HTML",
           "CSS",
           'Javascript',
           'PHP',
           'Symfony',
           'Lumen',
            'MySql',
            'GitHub',

        
        ];

        $mainCategory = [

            "Front",
            "Back",
            "Autres",
    
         ];

        $presentation = [

            "Anciennement conseiller de vente, je me suis tourné vers le monde du numérique grâce à une formation de développeur web suite à une reconversion professionnelle.
            J'ai suivi une formation chez O'clock qui m'a permis d'acquérir de solides bases en html, css, javascript, php. Puis j'ai chois une spécialisation sur le framework Symfony.
            Aujourd'hui, je suis à la recherche d'opportunités dans ce domaine qui me passionne.
            Ce qui me plait dans ce domaine c'est la multitude de possibilités offertes pour résoudre une problématique et y apporter une solution afin d'arriver au résultat escompté.
            J'aime le travail en équipe et je cherche à intégrer une équipe humaine et bienveillante afin de monter en compétences et continuer d'apprendre de nouvelles choses."
            
        ];

        foreach ($presentation as $presentationText) {
            $presentation = new Presentation();

            $presentation->setDescription($presentationText);
            $manager->persist($presentation);
            $manager->flush();
        }


        foreach ($category as $category_name) {
            $category = new Category();

            $category->setName($category_name);

            $manager->persist($category);
            $manager->flush();

            $categories[] = $category;
        }

        foreach ($mainCategory as $mainCategory_name) {
            $mainCategory = new MainCategory();
            $mainCategory->setName($mainCategory_name);
            $manager->persist($mainCategory);
            $manager->flush();

        }


        foreach ($projects as $projectdata) {
            $project = new Project();

            $project->setName($projectdata['name']);
            $project->setImage($projectdata['image']);
            $project->SetSummary($projectdata['summary']);
            $project->setDescription($projectdata['description']);
            $project->setUrl($projectdata['url']);
            $project->setGithub($projectdata['github']);

            foreach ($categories as $project_category) {
                if (in_array($project_category->getName(), $projectdata['category'])) {
                    $project->addCategory($project_category);
                }
            }

            $manager->persist($project);
        }
    

        $manager->flush($project);


        
    }
}
