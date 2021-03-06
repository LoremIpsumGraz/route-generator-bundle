<?php

namespace LoremIpsum\RouteGeneratorBundle\DependencyInjection;

use LoremIpsum\RouteGeneratorBundle\Model\RouteHandlerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class LoremIpsumRouteGeneratorExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(dirname(__DIR__) . '/Resources/config'));
        $loader->load('services.yaml');

        $container->registerForAutoconfiguration(RouteHandlerInterface::class)
                  ->addTag(RouteGeneratorCompilerPass::ROUTEHANDLER_TAG);
    }
}
