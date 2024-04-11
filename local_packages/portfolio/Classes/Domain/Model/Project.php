<?php

namespace Surfcamp\Portfolio\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Project extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $images;

    /**
     * @var string
     */
    protected $links = '';

    /**
     * @var bool
     */
    protected $showDetailPage = false;

    public function __construct()
    {
        $this->images = new ObjectStorage();
    }

    // Getters and setters here
}
