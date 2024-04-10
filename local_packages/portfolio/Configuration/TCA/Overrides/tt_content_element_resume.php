<?php
declare(strict_types=1);

defined('TYPO3') or die();

$boot = static function (): void {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.resume',
            'resume',
            'icon_resume'
        ],
        '--div--',
        'after'
    );

    if (empty($GLOBALS['TCA']['tt_content']['types']['resume'])) {
        $GLOBALS['TCA']['tt_content']['types']['resume'] = [];
    }

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['resume'] = 'icon_resume';

    $GLOBALS['TCA']['tt_content']['types']['resume'] = array_replace_recursive(
        $GLOBALS['TCA']['tt_content']['types']['resume'],
        [
            'showitem' => '
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                header,
                resume_items,
                additional_header,
                additional_resume_items,
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
            ]
        ]
    );

    $GLOBALS['TCA']['tt_content']['columns']['additional_header'] = [
        'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.additional_header',
        'config' => [
            'type' => 'input',
        ]
    ];

    $GLOBALS['TCA']['tt_content']['columns']['resume_items'] = [
        'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.resume.items',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tx_portfolio_resume_item',
            'foreign_field' => 'parent',
            'foreign_match_fields' => [
                'is_additional_item' => 0
            ],
        ]
    ];

    $GLOBALS['TCA']['tt_content']['columns']['additional_resume_items'] = [
        'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.additional_resume_items',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tx_portfolio_resume_item',
            'foreign_field' => 'parent',
            'foreign_sortby' => 'sorting',
            'foreign_match_fields' => [
                'is_additional_item' => 1
            ],
            'appearance' => [
                'useSortable' => true
            ],
        ]
    ];
};

$boot();
unset($boot);
