<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'SG Replacement',
    'description' => 'Extension Replaces Placeholder with values',
    'category' => 'fe',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'SG\\SgReplacement\\' => 'Classes'
        ],
    ],
    'state' => 'beta',
    'version' => '1.0.1',
    'author' => 'Daniel Hoffmann',
    'author_email' => 'hoffmann@smply.gd',
    'author_company' => 'smply.gd GmbH',
    'uploadfolder' => 0,
    'clearCacheOnLoad' => 1,
];
