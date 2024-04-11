<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:tx_portfolio_domain_model_project',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title',
        'iconfile' => 'EXT:portfolio/Resources/Public/Icons/Backend/project.png',
    ],
    'types' => [
        '1' => ['showitem' => '
            --palette--;;paletteMain,
            description,
        '],
    ],
    'palettes' => [
        'paletteMain' => [
            'showitem' => 'title,hidden',
        ],
    ],
    'columns' => [
        'hidden' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'title' => [
            'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.title',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'description' => [
            'label' => 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:field.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
            ],
        ],

    ],
];
