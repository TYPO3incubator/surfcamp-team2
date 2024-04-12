<?php

declare(strict_types=1);

namespace Surfcamp\Portfolio\UserFunctions;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Utility\PathUtility;

use function implode;
use function str_replace;

final class SetCss
{
    private const FONT_MARKUP = <<<END
        :root {
            --font-family-heading:  '#FONT_NAME#', 'Georgia', serif;
            --font-family-copytext: '#COPY_FONT_NAME#', 'Tahoma', sans-serif;
        }
        
        // Headline Font in Bold
        @font-face {
            font-family: '#FONT_NAME#';
            src: url(".#PATH##FONT_NAME_TRIMMED#-Bold.woff2") format("woff2");
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        
        // Headline Font in Medium
        @font-face {
            font-family: '#FONT_NAME#';
            src: url("#PATH##FONT_NAME_TRIMMED#-Medium.woff2") format("woff2");
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        
        // Headline Font in Regular
        @font-face {
            font-family: '#FONT_NAME#';
            src: url("#PATH##FONT_NAME_TRIMMED#-Regular.woff2") format("woff2");
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        
        // Copytext Font in Bold
        @font-face {
            font-family: '#COPY_FONT_NAME#';
            src: url("#PATH##COPY_FONT_NAME_TRIMMED#-Bold.woff2") format("woff2");
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        
        // Copytext Font in Medium
        @font-face {
            font-family: '#COPY_FONT_NAME#';
            src: url("#PATH##COPY_FONT_NAME_TRIMMED#-Medium.woff2") format("woff2");
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        
        // Copytext Font in Regular
        @font-face {
            font-family: '#COPY_FONT_NAME#';
            src: url("#PATH##COPY_FONT_NAME_TRIMMED#-Regular.woff2") format("woff2");
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
    END;


    public function getBodyDataModifier(string $content, array $conf, ServerRequestInterface $request): string
    {
        $settings = $this->getSettings($request);
        $styleVariables = [];
        foreach ($settings['style']['data'] as $item) {
            $styleVariables[] = 'data-' . $item['key'] . '="' . $item['value'] . '"';
        }

        return ' ' . implode(' ', $styleVariables);
    }

    public function getCssForHeader(string $content, array $conf, ServerRequestInterface $request): string
    {
        $settings = $this->getSettings($request);
        $styleVariables = [];
        foreach ($settings['style']['variables'] as $item) {
            $styleVariables[] = '--' . $item['key'] . ': ' . $item['value'] . '; ';
        }

        $font = $this->getCustomFont($settings);

        return '<style>' .
            ':root {' .
            implode(PHP_EOL, $styleVariables) . '} ' . $font . '
</style>';
    }

    protected function getSettings(ServerRequestInterface $request): array
    {
        return $request->getAttribute('site')->getConfiguration()['settings'];
    }

    private function getCustomFont(array $settings): string
    {
        $font = $settings['style']['font'];
        $copyFont = $settings['style']['copyFont'];

        $path = PathUtility::getPublicResourceWebPath('EXT:portfolio/Resources/Public/Fonts/');

        return str_replace(
            ['#FONT_NAME#', '#COPY_FONT_NAME#', '#FONT_NAME_TRIMMED#', '#COPY_FONT_NAME_TRIMMED#', '#PATH#'],
            [$font, $copyFont, str_replace(' ', '', $font), str_replace(' ', '', $copyFont), $path],
            self::FONT_MARKUP
        );
    }
}
