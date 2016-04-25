<?php

namespace Eschmar\CssInlinerBundle\Twig;

/**
 * Responsible for recognizing the cssinline tag.
 *
 * @package default
 * @author Marcel Eschmann, @eschmar
 **/
class CssInlinerTokenParser extends \Twig_TokenParser {

    /**
     * Is invoked whenever the parser encounters a cssinline tag.
     *
     * @return CssInlinerNode
     * @author Marcel Eschmann, @eschmar
     **/
    public function parse(\Twig_Token $token) {
        //$path = $this->parser->getStream()->expect(Twig_Token::STRING_TYPE)->getValue();
        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(array($this, 'decideCssInlineEnd'), true);
        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);
        return new CssInlinerNode($body, $token->getLine(), $this->getTag());
    }

    /**
     * Defines the name of the ending twig block.
     *
     * @return boolean
     * @author Marcel Eschmann, @eschmar
     **/
    public function decideCssInlineEnd(\Twig_Token $token) {
        return $token->test('endcssinline');
    }

    /**
     * Returns the name of the tag.
     *
     * @return string
     * @author Marcel Eschmann, @eschmar
     **/
    public function getTag() {
        return 'cssinline';
    }

} // END class CssInlinerTokenParser extends \Twig_TokenParser