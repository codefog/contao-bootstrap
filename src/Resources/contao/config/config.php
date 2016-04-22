<?php

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseTemplate'][] = ['codefog_bootstrap.listener.template', 'onParseTemplate'];
$GLOBALS['TL_HOOKS']['parseWidget'][]   = ['codefog_bootstrap.listener.widget', 'onParseWidget'];
