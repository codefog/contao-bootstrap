<?php

/**
 * Register the templates
 */
TemplateLoader::addFiles([
    // Forms
    'form_checkbox'     => 'vendor/codefog/contao-bootstrap/src/Resources/contao/templates/forms',
    'form_radio'        => 'vendor/codefog/contao-bootstrap/src/Resources/contao/templates/forms',
    'form_select'       => 'vendor/codefog/contao-bootstrap/src/Resources/contao/templates/forms',
    'form_submit'       => 'vendor/codefog/contao-bootstrap/src/Resources/contao/templates/forms',
    'form_textarea'     => 'vendor/codefog/contao-bootstrap/src/Resources/contao/templates/forms',
    'form_textfield'    => 'vendor/codefog/contao-bootstrap/src/Resources/contao/templates/forms',

    // Frontend pages
    'fe_page_bootstrap' => 'vendor/codefog/contao-bootstrap/src/Resources/contao/templates/frontend',

    // Modules
    'mod_breadcrumb'    => 'vendor/codefog/contao-bootstrap/src/Resources/contao/templates/modules',
    'mod_search'        => 'vendor/codefog/contao-bootstrap/src/Resources/contao/templates/modules',

    // Pagination
    'pagination'        => 'vendor/codefog/contao-bootstrap/src/Resources/contao/templates/pagination',
]);
