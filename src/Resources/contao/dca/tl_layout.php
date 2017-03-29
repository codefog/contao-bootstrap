<?php

/**
 * Register the onload_callback
 */
$GLOBALS['TL_DCA']['tl_layout']['config']['onload_callback'][] = [
    'codefog_bootstrap.data_container.layout',
    'enableBootstrapFeatures',
];

/**
 * Extend palettes
 */
$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = str_replace(
    'name;',
    'name,cfg_bootstrap_enable;',
    $GLOBALS['TL_DCA']['tl_layout']['palettes']['default']
);

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_layout']['fields']['cfg_bootstrap_enable'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_layout']['cfg_bootstrap_enable'],
    'exclude'   => true,
    'filter'    => true,
    'inputType' => 'checkbox',
    'eval'      => ['submitOnChange' => true, 'tl_class' => 'w50 m12'],
    'sql'       => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_layout']['fields']['cfg_bootstrap_leftClass'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_layout']['cfg_bootstrap_leftClass'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_layout']['fields']['cfg_bootstrap_mainClass'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_layout']['cfg_bootstrap_mainClass'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_layout']['fields']['cfg_bootstrap_rightClass'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_layout']['cfg_bootstrap_rightClass'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql'       => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_layout']['fields']['cfg_bootstrap_static'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_layout']['cfg_bootstrap_static'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => "char(1) NOT NULL default ''",
];
