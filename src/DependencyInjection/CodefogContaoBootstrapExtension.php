<?php

namespace Codefog\ContaoBootstrapBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CodefogContaoBootstrapExtension extends ConfigurableExtension
{
    /**
     * @inheritDoc
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('codefog_bootstrap.template_mapper', $mergedConfig['template_mapper']);
    }
}