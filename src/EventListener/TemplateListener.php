<?php

namespace Codefog\ContaoBootstrapBundle\EventListener;

use Codefog\ContaoBootstrapBundle\PageChecker;
use Codefog\ContaoBootstrapBundle\TemplateMapper;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\Template;
use Symfony\Component\HttpFoundation\RequestStack;

class TemplateListener
{
    /**
     * @var PageChecker
     */
    private $pageChecker;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var TemplateMapper
     */
    private $templateMapper;

    /**
     * TemplateListener constructor.
     *
     * @param PageChecker    $pageChecker
     * @param RequestStack   $requestStack
     * @param TemplateMapper $templateMapper
     */
    public function __construct(PageChecker $pageChecker, RequestStack $requestStack, TemplateMapper $templateMapper)
    {
        $this->pageChecker    = $pageChecker;
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
        if ($this->requestStack->getCurrentRequest()->get('_scope') !== ContaoCoreBundle::SCOPE_FRONTEND
            || $template->customTpl
            || !$this->pageChecker->isBootstrapEnabled($GLOBALS['objPage'])
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
}