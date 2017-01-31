<?php

namespace Codefog\ContaoBootstrapBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Config\ModuleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Codefog\ContaoBootstrapBundle\CodefogContaoBootstrapBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * @inheritdoc
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            new BundleConfig(CodefogContaoBootstrapBundle::class),
        ];
    }
}
