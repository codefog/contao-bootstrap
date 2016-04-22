<?php

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseTemplate'][] = ['codefog_bootstrap.listener.template_replacement', 'onParseTemplate'];
$GLOBALS['TL_HOOKS']['parseWidget'][]   = ['codefog_bootstrap.listener.template_replacement', 'onParseWidget'];
