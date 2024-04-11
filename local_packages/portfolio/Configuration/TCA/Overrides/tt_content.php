<?php

defined('TYPO3') or die();

$GLOBALS['TCA']['tt_content']['columns']['link'] = [
    'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.link',
    'config' => [
        'type' => 'input',
        'renderType' => 'inputLink',
        'size' => 50,
        'max' => 1024,
        'eval' => 'trim',
        'softref' => 'typolink',
        'fieldControl' => [
            'linkPopup' => [
                'options' => [
                    'title' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.link.formlabel',
                    'windowOpenParameters' => 'height=800,width=1000,status=0,menubar=0,scrollbars=1',
                ],
            ],
        ],
    ],
];

$GLOBALS['TCA']['tt_content']['columns']['link_text'] = [
    'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.link_text',
    'config' => [
        'type' => 'input',
        'size' => 50,
        'max' => 255,
        'eval' => 'trim',
    ],
];

call_user_func(static function () {

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Portfolio',
        'Projects',
        'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.portfolio_project',
        'icon_project'
    );

});