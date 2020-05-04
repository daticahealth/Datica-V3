<?php

namespace InlineSvg\Transformers;

use DOMDocument;

class Cleaner
{
    /**
     * Execute the transformer.
     *
     * @param DOMDocument $dom
     */
    public function __invoke(DOMDocument $dom)
    {
        $elements = $dom->getElementsByTagName('*');

        //Remove ids
        foreach ($elements as $element) {
            $element->removeAttribute('id');
        }
    }
}
