<?php

namespace Codefog\ContaoBootstrapBundle\ContaoManager;

use Codefog\ContaoBootstrapBundle\CodefogContaoBootstrapBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    /**
     * @inheritdoc
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(CodefogContaoBootstrapBundle::class)
        ];
    }
}
