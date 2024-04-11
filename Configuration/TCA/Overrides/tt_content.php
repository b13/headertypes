<?php

call_user_func(static function () {
    $additionalColumns = [
        'tx_headertypes_headertype' => [
            'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:headertype',
            'config' => [
                'default' => 0,
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.default',
                        'value' => 0,
                    ],
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h1',
                        'value' => 1,
                    ],
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h2',
                        'value' => 2,
                    ],
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h3',
                        'value' => 3,
                    ],
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h4',
                        'value' => 4,
                    ],
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h5',
                        'value' => 5,
                    ],
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h6',
                        'value' => 6,
                    ],
                ],
            ],
        ],
        'tx_headertypes_subheadertype' => [
            'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:subheadertype',
            'config' => [
                'default' => 0,
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.default',
                        'value' => 0,
                    ],
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h1',
                        'value' => 1,
                    ],
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h2',
                        'value' => 2,
                    ],
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h3',
                        'value' => 3,
                    ],
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h4',
                        'value' => 4,
                    ],
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h5',
                        'value' => 5,
                    ],
                    [
                        'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h6',
                        'value' => 6,
                    ],
                ],
            ],
        ],
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'tt_content',
        $additionalColumns
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'header',
        'tx_headertypes_headertype',
        'after:header'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'headers',
        'tx_headertypes_headertype',
        'after:header'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'headers',
        'tx_headertypes_subheadertype',
        'after:subheader'
    );

    // rename the default "header_layout" field
    $GLOBALS['TCA']['tt_content']['columns']['header_layout']['label'] = 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:header_layout';

    // replace the default label for "header_layout" from the two palettes in use
    $GLOBALS['TCA']['tt_content']['palettes']['header']['showitem'] = str_replace(
        'header_layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_layout_formlabel',
        'header_layout',
        $GLOBALS['TCA']['tt_content']['palettes']['header']['showitem']
    );
    $GLOBALS['TCA']['tt_content']['palettes']['headers']['showitem'] = str_replace(
        'header_layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_layout_formlabel',
        'header_layout',
        $GLOBALS['TCA']['tt_content']['palettes']['headers']['showitem']
    );

});
