<?php

namespace InlineSvg;

use DOMDocument;
use DOMElement;

class Svg
{
    private $dom;

    public function __construct(DOMDocument $dom)
    {
        if ($dom->documentElement->tagName !== 'svg') {
            throw new \RuntimeException(sprintf('Only <svg> elements allowed. <%s> found', $dom->documentElement->tagName));
        }

        $this->dom = $dom;
    }

    /**
     * Return the svg.
     * 
     * @return DOMElement
     */
    public function get()
    {
        return $this->dom->documentElement;
    }

    /**
     * Magic method to clone.
     */
    public function __clone()
    {
        $this->dom = clone $this->dom;
    }

    /**
     * Set a new attribute of the svg.
     *
     * @param string $name
     * @param string $value
     *
     * @return self
     */
    public function withAttribute($name, $value)
    {
        $clone = clone $this;

        $clone->dom->documentElement->setAttribute($name, $value);

        return $clone;
    }

    /**
     * Set new attributes.
     * 
     * @param array $attributes
     * 
     * @return self
     */
    public function withAttributes(array $attributes)
    {
        $clone = clone $this;

        foreach ($attributes as $name => $value) {
            $clone->dom->documentElement->setAttribute($name, $value);
        }

        return $clone;
    }

    /**
     * Set accessibility information to the svg.
     * 
     * @param string|null $title Short description
     * @param string|null $desc  Long description
     *
     * @return Svg
     */
    public function withA11y($title = null, $desc = null)
    {
        $clone = clone $this;

        $clone->dom->documentElement->setAttribute('role', 'img');

        $ids = [];

        if ($title) {
            self::getOrCreateNode($clone->dom->documentElement, 'title', $title)->setAttribute('id', $ids[] = uniqid('svg_title_'));
        }

        if ($desc) {
            self::getOrCreateNode($clone->dom->documentElement, 'desc', $desc)->setAttribute('id', $ids[] = uniqid('svg_desc_'));
        }

        if ($ids) {
            $clone->dom->documentElement->setAttribute('aria-labelledby', implode(' ', $ids));
        }

        return $clone;
    }

    /**
     * Returns the xml code ready to embed in the html.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->dom->C14N();
    }

    /**
     * Returns a node by tagName. Create if it doesn't exist
     * 
     * @param DOMElement $svg
     * @param string     $tagName
     * @param string     $value
     * 
     * @return DOMElement
     */
    private static function getOrCreateNode(DOMElement $svg, $tagName, $value)
    {
        $node = $svg->getElementsByTagName($tagName);

        if ($node->length) {
            $node = $node->item(0);
            $node->nodeValue = $value;
            
            return $node;
        }

        $newNode = new DOMElement($tagName, $value);
        $svg->appendChild($newNode);

        return $newNode;
    }
}
