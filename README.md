# Bootstrap – Documentation

## Installation

Run the composer command to install the package:

```
composer require codefog/contao-bootstrap
```

You also have to make sure that the Bootstrap 3 is included in your page layout. There are many different ways to implement the script and the decision about it is totally up to you.


## Page layout settings

To enable the Bootstrap integration simply tick the checkbox in the page layout settings. After a quick page reload you will notice that the default page layout builder fields (the ones where you set widths of columns) have been replaced by the new ones where you define the CSS class for each of the column.

For example you can set the following configuration of your layout:

```
Left column: col-md-4
Main column: col-md-8
```


## Custom frontend templates

If the Bootstrap is enabled for the current page layout, the extension performs an intelligent template replacement on the fly. The template mapper is defined as the replaceable ```%codefog_bootstrap.template_mapper%``` container parameter.

**Note:** to allow template overriding, the elements with defined custom templates will not be overridden.

Available customized frontend templates:

Forms:

- form_checkbox
- form_radio
- form_select
- form_submit
- form_textarea
- form_textfield

Frontend pages:

- fe\_page

Modules:

- mod_breadcrumb
- mod_search

Pagination:

- pagination


## Overriding frontend templates mapper

You can override the frontend templates mapper in your ```config.yml``` file like follows:

```yaml
codefog_contao_bootstrap:
    template_mapper:
        form_checkbox: cfgbs_form_checkbox
        form_radio: cfgbs_form_radio
        ...
```

You can also override the frontend templates mapper in your ```parameters.yml``` file like follows:

```yaml
parameters:
    codefog_bootstrap.template_mapper:
        form_checkbox: cfgbs_form_checkbox
        form_radio: cfgbs_form_radio
        ...
```
