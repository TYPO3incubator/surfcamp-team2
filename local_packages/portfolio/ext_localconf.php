<?php
declare(strict_types=1);

use Surfcamp\Portfolio\Controller\ProjectController;
use Surfcamp\Portfolio\Hooks\PageRenderer\WebfontHook;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

// Register custom EXT:form configuration
if (ExtensionManagementUtility::isLoaded('form')) {
    ExtensionManagementUtility::addTypoScriptSetup(
        trim('
            module.tx_form {
                settings {
                    yamlConfigurations {
                        110 = EXT:portfolio/Configuration/Form/Setup.yaml
                    }
                }
            }
            plugin.tx_form {
                settings {
                    yamlConfigurations {
                        110 = EXT:portfolio/Configuration/Form/Setup.yaml
                    }
                }
            }
        ')
    );
}

ExtensionUtility::configurePlugin(
    'Portfolio',
    'Projects',
    [
        ProjectController::class => ['list', 'show'],
    ],
    [
        ProjectController::class => ['list', 'show'],
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][WebfontHook::class]
    = WebfontHook::class . '->execute';
