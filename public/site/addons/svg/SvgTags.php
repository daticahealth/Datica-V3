<?php
/**
 * 
 */
namespace Statamic\Addons\Svg;

use InlineSvg\Collection;
use InlineSvg\Transformers\Cleaner;
use Statamic\API\Asset;
use Statamic\Extend\Tags;

require __DIR__ . '/vendor/autoload.php';

class SvgTags extends Tags
{
  /**
   * The {{ svg }} tag
   * 
   * @return mixed
   */
  public function index()
  {
    // Intial config
    $file = $this->getParam('src');
    $name = $this->getFileName($file);
    $container = $this->getContainerUrl($file);
    $path = $this->getFilePath($file);
    $folder = $this->getAssetFolder($path);
    $fullPath = $this->getFullAssetFolderPath($container, $folder);

    // Set up the InlineSVG collection
    $collection = $this->getCollection($fullPath);

    // Check to see if we want to allow IDs. If we do, move on; else scrub any IDs.
    $allowIds = $this->getParam('allowIds');
    if(!$allowIds)
    {
      $collection->addTransformer(new Cleaner());
    }

    // Check to see if there is any accessibility text for the SVGs.
    $a11y = $this->getA11y();

    // Get any config (classes/height/width etc) from the SVG tag.
    $config = $this->getSvgConfig();

    // Return the SVG with config and a11y.
    return $collection->get($name)->withAttributes($config)->withA11y($a11y);
  }

  /**
   * Getter for the a11y parameter in the tag.
   *
   * @return string
   */
  public function getA11y()
  {
    return $this->getParam('a11y');
  }

  /**
   * Getter for the class, height, and width parameters in the tag.
   *
   * @return string
   */
  public function getSvgConfig()
  {
    // Get the config from the params
    $class = $this->getParam('class');
    $height = $this->getParam('height');
    $width = $this->getParam('width');

    // Add the config to an array and return it.
    return [
      'class' => ((false) ? null : $class),
      'height' => ((false) ? null : $height),
      'width' => ((false) ? null : $width)
    ];
  }

  /**
   * Init a collection from InlineSVG
   *
   * @param string $fullPath Pass through the path to the SVG's containing folder
   * @return void
   */
  public function getCollection($fullPath)
  {
    return Collection::fromPath($fullPath);
  }

  /**
   * Gets and returns the asset folder path as a string.
   * 
   * @param string $path The path to the file
   * @return string
   */
  public function getAssetFolder($path)
  {
    // First, explode and then reverse the array.
    // We do this so we can easily remove the file itself.
    $reversedArray = array_reverse(explode('/', $path));

    // Now the array is flipped, remove the file.
    $removeFile = array_shift($reversedArray);

    // Reverse the reversed array back, convert to string, and return.
    return implode('/', array_reverse($reversedArray));
  }

  /**
   * Get the full folder path for the SVG being called.
   * This is used by InlineSVG's collection class.
   *
   * @param string $container
   * @param string $folder
   * @return Collection
   */
  public function getFullAssetFolderPath($container, $folder)
  {
    return getcwd() . $container . '/' . $folder;
  }

  /**
   * Get the asset's container URL.
   *
   * @param string The path to the SVG
   * @return string
   */
  public function getContainerUrl($file)
  {
    $asset = Asset::find($file);
    $container = $asset->container();
    return $container->url();
  }

  /**
   * Get the name of the asset.
   *
   * @param string The path to the SVG
   * @return string
   */
  public function getFileName($file)
  {
    $asset = Asset::find($file);
    return $asset->filename();
  }

  /**
   * Get the path to the asset file.
   *
   * @param string The path to the SVG
   * @return string
   */
  public function getFilePath($file)
  {
    $asset = Asset::find($file);
    return $asset->path();
  }

}