<?php
declare(strict_types=1);

defined('TYPO3') or die();

$boot = static function (): void {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.services',
            'services',
            'icon_services'
        ],
        '--div--',
        'after'
    );

    if (empty($GLOBALS['TCA']['tt_content']['types']['services'])) {
        $GLOBALS['TCA']['tt_content']['types']['services'] = [];
    }

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['services'] = 'icon_skills';

    $GLOBALS['TCA']['tt_content']['types']['services'] = array_replace_recursive(
        $GLOBALS['TCA']['tt_content']['types']['services'],
        [
            'showitem' => '
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                header,
                header_layout,
                subheader,
                services,
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

    $GLOBALS['TCA']['tt_content']['columns']['services'] = [
        'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.services',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tx_portfolio_service',
            'foreign_field' => 'parent',
            'foreign_sortby' => 'sorting',
            'appearance' => [
                'useSortable' => true
            ],
        ]
    ];
};

$boot();
unset($boot);

