<?php

declare(strict_types=1);

namespace Surfcamp\Portfolio\UserFunctions;

use Psr\Http\Message\ServerRequestInterface;

final class SetCss
{
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
            $styleVariables[] = '--' . $item['key'] . ': ' . $item['value'];
        }

        return '<style>' . implode(';', $styleVariables) . '</style>';
    }

    protected function getSettings(ServerRequestInterface $request): array
    {
        return $request->getAttribute('site')->getConfiguration()['settings'];
    }
}
