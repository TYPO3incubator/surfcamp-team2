<?php
declare(strict_types=1);

defined('TYPO3') or die();

$boot = static function (): void {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.portfolio_project',
            'description' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.portfolio_project.description',
            'value' => 'portfolio_project',
            'icon' => 'icon_project',
            'group' => 'default',
        ],
        '--div--',
        'after'
    );

    if (empty($GLOBALS['TCA']['tt_content']['types']['portfolio_project'])) {
        $GLOBALS['TCA']['tt_content']['types']['portfolio_project'] = [];
    }

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['portfolio_project'] = 'icon_skills';
};

$boot();
unset($boot);

