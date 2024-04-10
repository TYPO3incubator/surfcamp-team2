<?php
declare(strict_types=1);

defined('TYPO3') or die();

$boot = static function (): void {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.skill_display',
            'description' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.skill_display.description',
            'value' => 'skill_display',
            'icon' => 'icon_skills',
            'group' => 'default',
        ],
        '--div--',
        'after'
    );

    if (empty($GLOBALS['TCA']['tt_content']['types']['skill_display'])) {
        $GLOBALS['TCA']['tt_content']['types']['skill_display'] = [];
    }

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['skill_display'] = 'icon_skills';

    $GLOBALS['TCA']['tt_content']['types']['skill_display'] = array_replace_recursive(
        $GLOBALS['TCA']['tt_content']['types']['skill_display'],
        [
            'showitem' => '
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                header,
                header_layout,
                subheader,
                skills,
                show_progress_level,
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
                        'default' => 2
                    ]
                ],
            ]
        ]
    );

    $GLOBALS['TCA']['tt_content']['columns']['skills'] = [
        'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.skill_display.skills',
        'config' => [
            'type' => 'inline',
            'help' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.skill_display.skills_help',
            'foreign_table' => 'tx_portfolio_skill',
            'foreign_field' => 'parent',
            'foreign_sortby' => 'sorting',
            'appearance' => [
                'useSortable' => true
            ],
        ]
    ];

    $GLOBALS['TCA']['tt_content']['columns']['show_progress_level'] = [
        'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.skill_display.show_progress_level',
        'config' => [
            'type' => 'check',
        ]
    ];
};

$boot();
unset($boot);

