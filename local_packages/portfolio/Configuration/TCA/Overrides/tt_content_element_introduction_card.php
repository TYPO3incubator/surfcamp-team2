<?php
declare(strict_types=1);

defined('TYPO3') or die();

$boot = static function (): void {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.introduction_card',
            'description' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.introduction_card.description',
            'value' => 'introduction_card',
            'icon' => 'icon_intro',
            'group' => 'default',
        ],
        '--div--',
        'after'
    );

    if (empty($GLOBALS['TCA']['tt_content']['types']['introduction_card'])) {
        $GLOBALS['TCA']['tt_content']['types']['introduction_card'] = [];
    }

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['introduction_card'] = 'icon_intro';

    $GLOBALS['TCA']['tt_content']['types']['introduction_card'] = array_replace_recursive(
        $GLOBALS['TCA']['tt_content']['types']['introduction_card'],
        [
            'showitem' => '
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                header,
                header_layout,
                bodytext,
                link,
                link_text,
                image,
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
                        'default' => 1
                    ]
                ],
                'bodytext' => [
                    'config' => [
                        'enableRichtext' => true,
                        'richtextConfiguration' => 'minimal'
                    ]
                ],
                'image' => [
                    'config' => [
                        'maxitems' => 1
                    ]
                ]
            ]
        ]
    );
};

$boot();
unset($boot);

