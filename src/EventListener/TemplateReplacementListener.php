<?php

namespace Codefog\ContaoBootstrapBundle\EventListener;

use Codefog\ContaoBootstrapBundle\PageChecker;
use Codefog\ContaoBootstrapBundle\TemplateMapper;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\CoreBundle\Framework\ContaoFrameworkInterface;
use Contao\Template;
use Contao\Widget;
use Symfony\Component\HttpFoundation\RequestStack;

class TemplateReplacementListener
{
    /**
     * @var ContaoFrameworkInterface
     */
    private $framework;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var TemplateMapper
     */
    private $templateMapper;

    /**
     * TemplateReplacementListener constructor.
     *
     * @param ContaoFrameworkInterface $framework
     * @param RequestStack             $requestStack
     * @param TemplateMapper           $templateMapper
     */
    public function __construct(
        ContaoFrameworkInterface $framework,
        RequestStack $requestStack,
        TemplateMapper $templateMapper
    ) {
        $this->framework      = $framework;
        $this->requestStack   = $requestStack;
        $this->templateMapper = $templateMapper;
    }

    /**
     * Replace the default template
     *
     * @param Template $template
     */
    public function onParseTemplate(Template $template)
    {
        // Do not override if the current scope is not frontend or the template has a custom template set
        // or the Bootstrap is not enabled
        if (($request = $this->requestStack->getCurrentRequest()) === null
            || $request->get('_scope') !== ContaoCoreBundle::SCOPE_FRONTEND
            || $template->customTpl
            || !$this->isBootstrapEnabled()
        ) {
            return;
        }

        $templateName = $template->getName();

        // Do not override if there is no mapped template
        if (!$this->templateMapper->has($templateName)) {
            return;
        }

        $template->setName($this->templateMapper->get($templateName));
    }

    /**
     * Replace the default template
     *
     * @param string $buffer
     * @param Widget $widget
     *
     * @return string
     */
    public function onParseWidget($buffer, Widget $widget)
    {
        // Override if the current scope is frontend and the template has no custom template set
        // and the Bootstrap is enabled
        if ($this->requestStack->getCurrentRequest()->get('_scope') === ContaoCoreBundle::SCOPE_FRONTEND
            && !$widget->customTpl
            && $this->isBootstrapEnabled()
        ) {
            $templateName = $widget->template;

            // Override if there is a mapped template
            if ($this->templateMapper->has($templateName)) {
                $widget->template = $this->templateMapper->get($templateName);
                $buffer           = $widget->inherit();
            }
        }

        return $buffer;
    }

    /**
     * Return true if the Bootstrap on the given page is enabled
     *
     * @return bool
     */
    private function isBootstrapEnabled()
    {
        /** @var \Contao\LayoutModel $layoutModel */
        $layoutModel = $this->framework->getAdapter('Contao\LayoutModel')->findByPk($GLOBALS['objPage']->layout);

        if ($layoutModel === null) {
            return false;
        }

        return $layoutModel->cfg_bootstrap_enable ? true : false;
    }
}
