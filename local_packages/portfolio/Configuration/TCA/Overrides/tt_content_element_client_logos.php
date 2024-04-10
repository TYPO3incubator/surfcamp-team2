<?php
declare(strict_types=1);

defined('TYPO3') or die();

$boot = static function (): void {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.client_logos',
            'client_logos',
            'icon_clients'
        ],
        '--div--',
        'after'
    );

    if (empty($GLOBALS['TCA']['tt_content']['types']['client_logos'])) {
        $GLOBALS['TCA']['tt_content']['types']['client_logos'] = [];
    }

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['client_logos'] = 'icon_clients';

    $GLOBALS['TCA']['tt_content']['types']['client_logos'] = array_replace_recursive(
        $GLOBALS['TCA']['tt_content']['types']['client_logos'],
        [
            'showitem' => '
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                header,
                header_layout,
                subheader,
                client_logos,
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
        ]
    );

    $GLOBALS['TCA']['tt_content']['columns']['client_logos'] = [
        'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.client_logos',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tx_portfolio_client_logo',
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

