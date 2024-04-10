<?php
declare(strict_types=1);

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
    }
};

$boot();
unset($boot);
