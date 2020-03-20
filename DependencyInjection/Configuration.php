<?php

namespace Eschmar\CssInlinerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('eschmar_css_inliner');
        // BC layer for symfony/config 4.1 and older
        if (! \method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->root('eschmar_css_inliner');
        } else {
            $rootNode = $treeBuilder->getRootNode();
        }

        return $treeBuilder;
    }
}
