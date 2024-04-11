<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.portfolio_projects',
        'description' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.portfolio_projects.description',
        'value' => 'portfolio_projects',
        'icon' => 'icon_project',
        'group' => 'default',
    ],
    '--div--',
    'after'
);

$GLOBALS['TCA']['tt_content']['types']['portfolio_projects'] = [
    'showitem' => '
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
        header,
        header_layout,
        subheader,
        pages,
        recursive,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
        starttime,
        endtime
    ',
    'columnsOverrides' => [
        'header_layout' => [
            'config' => [
                'default' => 2
            ]
        ],
    ]
];
