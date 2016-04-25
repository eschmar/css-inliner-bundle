<?php

namespace Eschmar\CssInlinerBundle\Twig;

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

/**
 * Twig Extension containing the CssInliner Twig tag.
 *
 * @package default
 * @author Marcel Eschmann, @eschmar
 **/
class CssInlinerExtension extends \Twig_Extension {

    /**
     * Returns the name of the extension.
     *
     * @return string
     * @author Marcel Eschmann, @eschmar
     **/
    public function getName() {
        return 'css_inliner_extension';
    }

    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return array(Twig_Node)
     * @author Marcel Eschmann, @eschmar
     **/
    public function getTokenParsers() {
        return array(
            new CssInlinerTokenParser()
        );
    }

} // END class CssInlinerExtension extends \Twig_Extension