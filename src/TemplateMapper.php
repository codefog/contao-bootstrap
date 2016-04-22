<?php

namespace Codefog\ContaoBootstrapBundle;

class TemplateMapper
{
    /**
     * Templates mapper
     * @var array
     */
    private $mapper = [];

    /**
     * TemplateMapper constructor.
     *
     * @param array $mapper
     */
    public function __construct(array $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * Add the template to be mapped
     *
     * @param string $origin The original template name (e.g. mod_search)
     * @param string $new    The new template name (e.g. mod_search_cfgbs)
     */
    public function add($origin, $new)
    {
        $this->mapper[$origin] = $new;
    }

    /**
     * Return true if the template is in the mapper
     *
     * @param string $origin The original template name
     *
     * @return bool
     */
    public function has($origin)
    {
        return isset($this->mapper[$origin]);
    }

    /**
     * Get the template
     *
     * @param string $origin The original template name
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function get($origin)
    {
        if (!$this->has($origin)) {
            throw new \InvalidArgumentException(sprintf('The template "%s" is not mapped!', $origin));
        }

        return $this->mapper[$origin];
    }
}