<?php
declare(strict_types=1);

defined('TYPO3') or die();

$boot = static function (): void {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.introduction_card',
            'introduction_card',
            'icon_intro'
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
            ]
        ]
    );
};

$boot();
unset($boot);

