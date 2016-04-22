<?php

namespace Codefog\ContaoBootstrapBundle;

use Contao\CoreBundle\Framework\ContaoFrameworkInterface;
use Contao\PageModel;

class PageChecker
{
    /**
     * @var ContaoFrameworkInterface
     */
    private $framework;

    /**
     * PageChecker constructor.
     *
     * @param ContaoFrameworkInterface $framework
     */
    public function __construct(ContaoFrameworkInterface $framework)
    {
        $this->framework = $framework;
    }

    /**
     * Return true if the Bootstrap on the given page is enabled
     *
     * @param PageModel $pageModel
     *
     * @return bool
     */
    public function isBootstrapEnabled(PageModel $pageModel)
    {
        /** @var \Contao\LayoutModel $layoutModel */
        $layoutModel = $this->framework->getAdapter('Contao\LayoutModel')->findByPk($pageModel->layout);

        if ($layoutModel === null) {
            return false;
        }

        return $layoutModel->cfg_bootstrap_enable ? true : false;
    }
}