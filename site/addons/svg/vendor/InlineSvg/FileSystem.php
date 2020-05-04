<?php

namespace InlineSvg;

use InlineSvg\Interfaces\SourceInterface;
use DOMDocument;

class FileSystem implements SourceInterface
{
    protected $basePath;
    protected $map;

    /**
     * Constructor.
     *
     * @param string $basePath The directory where the icon files are placed
     * @param array  $map      Optional svg renamed
     */
    public function __construct($basePath, array $map = [])
    {
        $this->basePath = $basePath;
        $this->map = $map;
    }

    /**
     * {@inheritdoc}
     */
    public function has($name)
    {
        return is_file($this->getPath($name));
    }

    /**
     * {@inheritdoc}
     */
    public function get($name)
    {
        $dom = new DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->load($this->getPath($name), LIBXML_NOBLANKS | LIBXML_NOERROR);

        return $dom;
    }

    /**
     * Returns the path of a svg.
     * 
     * @param string $name
     * 
     * @return string
     */
    protected function getPath($name)
    {
        $name = isset($this->map[$name]) ? $this->map[$name] : $name;

        return "{$this->basePath}/{$name}.svg";
    }
}
