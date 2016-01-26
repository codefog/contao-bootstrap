<?php

/**
 * Extend palettes
 */
$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = str_replace(
    'cols;',
    'cols,cfg_bootstrap_mainClass;',
    $GLOBALS['TL_DCA']['tl_layout']['palettes']['default']
);

$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = str_replace(
    'static;',
    'cfg_bootstrap_static;',
    $GLOBALS['TL_DCA']['tl_layout']['palettes']['default']
);

/**
 * Replace the subpalettes
 */
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_2cll'] = 'cfg_bootstrap_leftClass';
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_2clr'] = 'cfg_bootstrap_rightClass';
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_3cl']  = 'cfg_bootstrap_leftClass,cfg_bootstrap_rightClass';

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_layout']['fields']['cfg_bootstrap_leftClass'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_layout']['cfg_bootstrap_leftClass'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_layout']['fields']['cfg_bootstrap_mainClass'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_layout']['cfg_bootstrap_mainClass'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_layout']['fields']['cfg_bootstrap_rightClass'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_layout']['cfg_bootstrap_rightClass'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_layout']['fields']['cfg_bootstrap_static'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_layout']['cfg_bootstrap_static'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => "char(1) NOT NULL default ''"
];
