<?php
declare(strict_types=1);

defined('TYPO3') or die();

$boot = static function (): void {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.portfolio_project',
            'portfolio_project',
            'icon_project'
        ],
        '--div--',
        'after'
    );

    if (empty($GLOBALS['TCA']['tt_content']['types']['portfolio_project'])) {
        $GLOBALS['TCA']['tt_content']['types']['portfolio_project'] = [];
    }

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['portfolio_project'] = 'icon_project';

    $GLOBALS['TCA']['tt_content']['types']['portfolio_project'] = array_replace_recursive(
        $GLOBALS['TCA']['tt_content']['types']['portfolio_project'],
        [
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
                'header' => [
                    'config' => [
                        'required' => true,
                    ]
                ],
                'header_layout' => [
                    'config' => [
                        'default' => 2,
                    ]
                ]
            ]
        ]
    );
};

$boot();
unset($boot);

