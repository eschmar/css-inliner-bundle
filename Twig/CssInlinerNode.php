<?php

namespace Eschmar\CssInlinerBundle\Twig;

/**
 * Responsible for processing the current node.
 *
 * @package default
 * @author Marcel Eschmann, @eschmar
 **/
class CssInlinerNode extends \Twig_Node {
    
    /**
     * @return void
     * @author Marcel Eschmann, @eschmar
     **/
    public function __construct(\Twig_Node $body, $lineno, $tag = 'cssinline') {
        parent::__construct(array('body' => $body), array(), $lineno, $tag);
    }

    /**
     * Directly outputs the processed node.
     *
     * @return string
     * @author Marcel Eschmann, @eschmar
     **/
    public function compile(\Twig_Compiler $compiler) {
        $compiler
            ->addDebugInfo($this)
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))

            ->write("\$inliner = new TijsVerkoyen\\CssToInlineStyles\\CssToInlineStyles(); \n")
            ->write("\$html = ob_get_clean(); \n")
            ->write("echo \$inliner->convert(\$html); \n");
    }

} // END class CssInlinerNode extends \Twig_Node
