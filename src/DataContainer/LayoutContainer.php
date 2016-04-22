<?php

namespace Codefog\ContaoBootstrapBundle\DataContainer;

use Contao\CoreBundle\Framework\ContaoFrameworkInterface;
use Contao\DataContainer;

class LayoutContainer
{
    /**
     * @var ContaoFrameworkInterface
     */
    private $framework;

    /**
     * LayoutContainer constructor.
     *
     * @param ContaoFrameworkInterface $framework
     */
    public function __construct(ContaoFrameworkInterface $framework)
    {
        $this->framework = $framework;
    }

    /**
     * Enable the Bootstrap features
     *
     * @param DataContainer $dc
     */
    public function enableBootstrapFeatures(DataContainer $dc)
    {
        if (!$dc->id) {
            return;
        }

        $layoutModel = $this->framework->getAdapter('Contao\LayoutModel')->findByPk($dc->id);

        if ($layoutModel === null || !$layoutModel->cfg_bootstrap_enable) {
            return;
        }

        $this->extendPalettes();
        $this->replaceSubpalettes();
    }

    /**
     * Extend the palettes
     */
    private function extendPalettes()
    {
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

    }

    /**
     * Replace the subpalettes
     */
    private function replaceSubpalettes()
    {
        $GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_2cll'] = 'cfg_bootstrap_leftClass';
        $GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_2clr'] = 'cfg_bootstrap_rightClass';
        $GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_3cl']  = 'cfg_bootstrap_leftClass,cfg_bootstrap_rightClass';
    }
}