<?php

namespace Codefog\ContaoBootstrapBundle\EventListener;

use Codefog\ContaoBootstrapBundle\PageChecker;
use Codefog\ContaoBootstrapBundle\TemplateMapper;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\Widget;
use Symfony\Component\HttpFoundation\RequestStack;

class WidgetListener
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
            && $this->pageChecker->isBootstrapEnabled($GLOBALS['objPage'])
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
}