<?php

namespace Statamic\Addons\ColorSwatches;

use Statamic\Extend\Fieldtype;

class ColorSwatchesFieldtype extends Fieldtype
{
    /**
     * The blank/default value.
     *
     * @return array
     */
    public function blank()
    {
    }

    /**
     * Pre-process the data before it gets sent to the publish page.
     *
     * @param mixed $data
     *
     * @return array|mixed
     */
    public function preProcess($data)
    {
        return $data;
    }

    /**
     * Process the data before it gets saved.
     *
     * @param mixed $data
     *
     * @return array|mixed
     */
    public function process($data)
    {
        return $data;
    }
}
