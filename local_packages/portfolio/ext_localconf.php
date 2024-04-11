<?php
declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

call_user_func(
    static function () {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Portfolio',
            'Project',
            [
                \Surfcamp\Portfolio\Controller\ProjectController::class => 'list, show',
            ],
            [
                \Surfcamp\Portfolio\Controller\ProjectController::class => 'list, show',
            ],
            ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
    }
);