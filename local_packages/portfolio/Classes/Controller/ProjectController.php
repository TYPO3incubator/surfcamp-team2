<?php

namespace Surfcamp\Portfolio\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Surfcamp\Portfolio\Domain\Repository\ProjectRepository;

class ProjectController extends ActionController
{
    public function __construct(
        protected ProjectRepository $projectRepository
    ) {}

    public function listAction()
    {
        $projects = $this->projectRepository->findAll();
        $this->view->assign('projects', $projects);
    }

    public function showAction(\YourVendor\SitePortfolio\Domain\Model\Project $project)
    {
        $this->view->assign('project', $project);
    }
}
