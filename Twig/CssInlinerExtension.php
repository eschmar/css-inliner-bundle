<?php

namespace Eschmar\CssInlinerBundle\Twig;

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

/**
 * Twig Extension containing the CssInliner Twig tag.
 *
 * @package default
 * @author Marcel Eschmann
 **/
class CssInlinerExtension extends \Twig_Extension {

    /**
     * Returns the name of the extension.
     *
     * @return string
     * @author Marcel Eschmann
     **/
    public function getName() {
        return 'css_inliner_extension';
    }

    /**
     * Returns a list of global variables to add to the existing list.
     *
     * @return void
     * @author Marcel Eschmann
     **/
    public function getGlobals() {
        return array (
            /**
             * Actual css inliner implementation.
             **/
            'inliner' => function($input) {
                $inliner = new CssToInlineStyles();
                $inliner->setHTML($input);
                $inliner->setUseInlineStylesBlock();
                $inliner->setStripOriginalStyleTags();
                return $inliner->convert();
            }
        );
    }

    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return array(Twig_Node)
     * @author Marcel Eschmann
     **/
    public function getTokenParsers() {
        return array(
            new CssInlinerTokenParser()
        );
    }

} // END class CssInlinerExtension extends \Twig_Extension