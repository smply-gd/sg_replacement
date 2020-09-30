<?php
defined('TYPO3_MODE') or die();

// Register hook for cached content
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all']['sg_replacement'] =
    \SG\SgReplacement\Hooks\TypoScriptFrontendController::class . '->contentPostProcAll';

// Register hook for uncached content
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output']['sg_replacement'] =
    \SG\SgReplacement\Hooks\TypoScriptFrontendController::class . '->contentPostProcOutput';