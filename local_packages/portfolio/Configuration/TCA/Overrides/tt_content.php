<?php
declare(strict_types=1);

$boot = static function (): void {
    $LLL = 'LLL:EXT:portfolio/Resources/Private/Language/locallang_db.xlf:';

    $GLOBALS['TCA']['tt_content']['columns']['link'] = [
        'label' => $LLL . 'field.link',
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
                        'title' => $LLL . 'field.link.formlabel',
                        'windowOpenParameters' => 'height=800,width=1000,status=0,menubar=0,scrollbars=1',
                    ],
                ],
            ],
        ],
    ];

    $GLOBALS['TCA']['tt_content']['columns']['link_text'] = [
        'label' => $LLL . 'field.link_text',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'max' => 255,
            'eval' => 'trim',
        ],
    ];
};

$boot();
unset($boot);
