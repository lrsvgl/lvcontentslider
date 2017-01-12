<?php
/**
 * ext_tables.php
 */

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_slider';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_slider.xml');