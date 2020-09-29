<?php

return array(
    'ctrl' => array(
        'title'	=> 'LLL:EXT:sg_replacement/Resources/Private/Language/locallang_db.xlf:tx_sgreplacement_domain_model_item',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => TRUE,
        'versioningWS' => TRUE,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
        'searchFields' => 'name,description,search_for,',
        'iconfile' => 'EXT:sg_replacement/Resources/Public/Icons/tx_sgreplacement_domain_model_item.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, search_for, replace_with, is_reg_ex',
    ),
    'types' => array(
        '1' => array('showitem' => 'sys_language_uid;;;, l10n_parent, l10n_diffsource, hidden, --palette--;;1, name, description, search_for, replace_with, is_reg_ex, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
    ),
    'palettes' => array(
        '1' => array('showitem' => ''),
    ),
    'columns' => array(
        'sys_language_uid' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
                ),
            ),
        ),
        'l10n_parent' => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('', 0),
                ),
                'foreign_table' => 'tx_sgreplacement_domain_model_item',
                'foreign_table_where' => 'AND tx_sgreplacement_domain_model_item.pid=###CURRENT_PID### AND tx_sgreplacement_domain_model_item.sys_language_uid IN (-1,0)',
            ),
        ),
        'l10n_diffsource' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        't3ver_label' => array(
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'starttime' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => array(
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
                'behaviour' => array(
                    'allowLanguageSynchronization' => TRUE
                )
            ),
        ),
        'endtime' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => array(
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
                'behaviour' => array(
                    'allowLanguageSynchronization' => TRUE
                )
            ),
        ),
        'name' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sg_replacement/Resources/Private/Language/locallang_db.xlf:tx_sgreplacement_domain_model_item.name',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'description' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sg_replacement/Resources/Private/Language/locallang_db.xlf:tx_sgreplacement_domain_model_item.description',
            'config' => array(
                'type' => 'text',
                'eval' => 'trim'
            ),
        ),
        'search_for' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sg_replacement/Resources/Private/Language/locallang_db.xlf:tx_sgreplacement_domain_model_item.search_for',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'replace_with' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sg_replacement/Resources/Private/Language/locallang_db.xlf:tx_sgreplacement_domain_model_item.replace_with',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'is_reg_ex' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sg_replacement/Resources/Private/Language/locallang_db.xlf:tx_sgreplacement_domain_model_item.is_reg_ex',
            'config' => array(
                'type' => 'check',
            ),
        ),
    ),
);