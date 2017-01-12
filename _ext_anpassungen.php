<?php
/**
 * ext_tables.php
 */

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_slider';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_slider.xml');


// TCA

array(

	'link' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:example/locallang_db.xml:tt_content.link',
		'config' => array(
			'type' => 'input',
			'size' => '30',
			'softref' => 'typolink',
			'wizards' => array(
				'_PADDING' => 2,
				'link' => array(
					'type' => 'popup',
					'title' => 'Link',
					'icon' => 'EXT:example/Resources/Public/Images/FormFieldWizard/wizard_link.gif',
					'module' => array(
						'name' => 'wizard_element_browser',
						'urlParameters' => array(
							'mode' => 'wizard'
						) ,
					) ,
					'JSopenParams' => 'height=600,width=500,status=0,menubar=0,scrollbars=1'
				)
			)
		)
	),
);