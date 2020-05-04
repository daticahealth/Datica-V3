<?php

namespace InlineSvg\Interfaces;

use DOMDocument;

interface SourceInterface
{
    /**
     * Returns a svg.
     *
     * @param string $name The svg name
     *
     * @return DOMDocument
     */
    public function get($name);

    /**
     * Check if the svg exists.
     *
     * @param string $name The svg name
     *
     * @return bool
     */
    public function has($name);
}
