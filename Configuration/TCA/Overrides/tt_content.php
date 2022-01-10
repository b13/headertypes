<?php

call_user_func(static function () {
    $additionalColumns = [
        'tx_headertypes_headertype' => [
            'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:headertype',
            'config' => [
                'default' => '0',
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.default',
                        '0'
                    ],
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h1',
                        '1'
                    ],
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h2',
                        '2'
                    ],
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h3',
                        '3'
                    ],
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h4',
                        '4'
                    ],
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h5',
                        '5'
                    ],
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h6',
                        '6'
                    ],
                ]
            ]
        ],
        'tx_headertypes_subheadertype' => [
            'label' => 'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:subheadertype',
            'config' => [
                'default' => '0',
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.default',
                        '0'
                    ],
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h1',
                        '1'
                    ],
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h2',
                        '2'
                    ],
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h3',
                        '3'
                    ],
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h4',
                        '4'
                    ],
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h5',
                        '5'
                    ],
                    [
                        'LLL:EXT:headertypes/Resources/Private/Language/locallang.xlf:type.I.h6',
                        '6'
                    ],
                ]
            ]
        ]
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
