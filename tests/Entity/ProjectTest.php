<?php

namespace App\Tests\Entity;

use App\Entity\Project;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    public function testSomething(): void
    {
        $project = new Project();

        $newProjectName = "projectTest";
        $project->setName($newProjectName);
        $this->assertEquals('projectTest', $project->getName());

        $newProjectDescription = "test de la description";
        $project->setDescription($newProjectDescription);
        $this->assertEquals('test de la description', $project->getDescription());

        $newProjectImage = "imageTest";
        $project->setImage($newProjectImage);
        $this->assertEquals('imageTest', $project->getImage());

        $newProjectUrl = "urlTest";
        $project->setUrl($newProjectUrl);
        $this->assertEquals('urlTest', $project->getUrl());

        $newProjectGithub = "githubTest";
        $project->setGithub($newProjectGithub);
        $this->assertEquals('githubTest', $project->getGithub());

        $newProjectSummary = "summaryTest";
        $project->setSummary($newProjectSummary);
        $this->assertEquals('summaryTest', $project->getSummary());
    }
}