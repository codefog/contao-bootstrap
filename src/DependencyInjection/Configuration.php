<?php

namespace Codefog\ContaoBootstrapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('codefog_contao_bootstrap');

        $rootNode
            ->children()
                ->arrayNode('template_mapper')
                    ->prototype('scalar')->end()
                    ->defaultValue($this->getDefaultTemplateMapper())->end()
                ->end()
            ->end();

        return $treeBuilder;
    }

    /**
     * Get the default template mapper
     *
     * @return array
     */
    private function getDefaultTemplateMapper()
    {
        return [
            // Forms
            'form_checkbox'  => 'cfgbs_form_checkbox',
            'form_radio'     => 'cfgbs_form_radio',
            'form_select'    => 'cfgbs_form_select',
            'form_submit'    => 'cfgbs_form_submit',
            'form_textarea'  => 'cfgbs_form_textarea',
            'form_textfield' => 'cfgbs_form_textfield',

            // Frontend pages
            'fe_page'        => 'cfgbs_fe_page',

            // Modules
            'mod_breadcrumb' => 'cfgbs_mod_breadcrumb',
            'mod_search'     => 'cfgbs_mod_search',

            // Pagination
            'pagination'     => 'cfgbs_pagination',
        ];
    }
}