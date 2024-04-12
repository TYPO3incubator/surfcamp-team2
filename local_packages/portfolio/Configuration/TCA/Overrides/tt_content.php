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

$GLOBALS['TCA']['tt_content']['columns']['header_style'] = [
    'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.header_style',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
            ['label' => '', 'value' => ''],
            ['label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.header_style.h1', 'value' => 'h1'],
            ['label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.header_style.h2', 'value' => 'h2'],
            ['label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.header_style.h3', 'value' => 'h3'],
            ['label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.header_style.h4', 'value' => 'h4 '],
            ['label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.header_style.h5', 'value' => 'h5'],
            ['label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.header_style.h6', 'value' => 'h6'],
        ],
    ],
];

$GLOBALS['TCA']['tt_content']['palettes']['minimalHeader'] = [
    'showitem' => '
        header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,
        --linebreak--,
        header_layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_layout_formlabel,
        header_style,
    ',
];

$GLOBALS['TCA']['tt_content']['palettes']['minimalHeaders'] = [
    'showitem' => '
        header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,
        --linebreak--,
        header_layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_layout_formlabel,
        header_style,
        --linebreak--,
        subheader;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:subheader_formlabel
    ',
];

call_user_func(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Portfolio',
        'Projects',
        'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.portfolio_projects',
        'icon_project',
        'default',
        'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:content_element.portfolio_projects.description',
    );
});
