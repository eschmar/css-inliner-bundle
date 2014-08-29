<?php

namespace Eschmar\CssInlinerBundle\Twig;

/**
 * Responsible for processing the current node.
 *
 * @package default
 * @author Marcel Eschmann
 **/
class CssInlinerNode extends \Twig_Node {
    
    /**
     * @return void
     * @author Marcel Eschmann
     **/
    public function __construct(\Twig_NodeInterface $body, $lineno, $tag = 'cssinline') {
        parent::__construct(array('body' => $body), array(), $lineno, $tag);
    }

    /**
     * Directly outputs the processed node.
     *
     * @return string
     * @author Marcel Eschmann
     **/
    public function compile() {
        $compiler
            ->addDebugInfo($this)
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write('echo $context["inliner"](ob_get_clean());' . "\n");
    }

} // END class CssInlinerNode extends \Twig_Node