<?php

namespace InlineSvg;

use InlineSvg\Interfaces\SourceInterface;
use DOMDocument;

class Collection
{
    protected $sources = [];
    protected $svg = [];
    protected $transformers = [];

    /**
     * Simple factory to create an instance using a directory
     * 
     * @param string $path
     * @param array  $map
     */
    public static function fromPath($path, array $map = [])
    {
        return new static(new FileSystem($path, $map));
    }

    /**
     * Constructor.
     *
     * @param SourceInterface $source The source class used to get the svg icons
     */
    public function __construct(SourceInterface $source)
    {
        $this->addSource($source);
    }

    /**
     * Add a new source to the incon set.
     * 
     * @param SourceInterface $source
     * 
     * @return self
     */
    public function addSource(SourceInterface $source)
    {
        $this->sources[] = $source;

        return $this;
    }

    /**
     * Add a new transformer
     * 
     * @param callable $transformer
     * 
     * @return self
     */
    public function addTransformer(callable $transformer)
    {
        $this->transformers[] = $transformer;

        return $this;
    }

    /**
     * Transform an element
     * 
     * @param DOMDocument $element
     * 
     * @return DOMDocument
     */
    protected function transform(DOMDocument $element)
    {
        foreach ($this->transformers as $transformer) {
            $transformer($element);
        }

        return $element;
    }

    /**
     * Load a svg from the sources.
     *
     * @param string $name The svg name
     *
     * @throws NotFoundException
     * 
     * @return DOMDocument
     */
    protected function load($name)
    {
        foreach ($this->sources as $source) {
            if ($source->has($name)) {
                return $this->transform($source->get($name));
            }
        }

        throw new NotFoundException(sprintf('The svg "%s" is not found', $name));
    }

    /**
     * Returns a clone of a svg.
     *
     * @param string $name The svg name
     *
     * @return Svg|null
     */
    public function get($name)
    {
        if (!isset($this->svg[$name])) {
            $this->svg[$name] = new Svg($this->load($name));
        }

        if ($this->svg[$name] !== false) {
            return $this->svg[$name];
        }
    }
}
