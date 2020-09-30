<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

if (TYPO3_MODE === 'BE') {
    /**
     * Registers a Backend Module
     */
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'SgReplacement',
        'web',	 // Make module a submodule of 'user'
        'mod1',	// Submodule key
        '',						// Position
        [
            \SG\SgReplacement\Controller\ManagementController::class => 'index,allitems'
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:sg_replacement/Resources/Public/Icons/mod_icon.png',
            'labels' => 'LLL:EXT:sg_replacement/Resources/Private/Language/locallang_mod.xlf',
        ]
    );
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sgreplacement_domain_model_item');