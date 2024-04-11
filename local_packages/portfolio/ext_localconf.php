<?php
declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

$boot = static function (): void {
// Register custom EXT:form configuration
    if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('form')) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
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

        ExtensionUtility::configurePlugin(
            'Portfolio',
            'Project',
            [
                \Surfcamp\Portfolio\Controller\ProjectController::class => 'list, show',
            ],
            [
                \Surfcamp\Portfolio\Controller\ProjectController::class => 'list, show',
            ],
            ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
    }
};

$boot();
unset($boot);
