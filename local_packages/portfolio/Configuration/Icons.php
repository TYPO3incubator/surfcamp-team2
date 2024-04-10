<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;

return [
    'icon_intro' => [
        'provider' => BitmapIconProvider::class,
        'source' => 'EXT:portfolio/Resources/Public/Icons/Backend/intro.png',
    ],
    'icon_skills' => [
        'provider' => BitmapIconProvider::class,
        'source' => 'EXT:portfolio/Resources/Public/Icons/Backend/skills.png',
    ],
];
