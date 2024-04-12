<?php

namespace FriendsOfTYPO3\ThemePortfolio\Controller;

use Psr\Http\Message\ResponseInterface;
use FriendsOfTYPO3\ThemePortfolio\Domain\Model\Project;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use FriendsOfTYPO3\ThemePortfolio\Domain\Repository\ProjectRepository;

class ProjectController extends ActionController
{
    public function __construct(
        protected ProjectRepository $projectRepository
    ) {}

    public function listAction(): ResponseInterface
    {
        $projects = $this->projectRepository->findAll();
        $this->view->assign('projects', $projects);
        return $this->htmlResponse();
    }

    public function showAction(Project $project): ResponseInterface
    {
        if(!$project->getShowDetailPage()) {
            throw new \TYPO3\CMS\Core\Exception('Project does not have a detail page');
        }

        $this->view->assign('project', $project);
        return $this->htmlResponse();
    }
}
