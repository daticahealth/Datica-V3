<?php

namespace Statamic\Addons\BigKahuna;

use Statamic\API\Nav;
use Statamic\Extend\Listener;

class BigKahunaListener extends Listener
{
    /**
     * The events to be listened for, and the methods to call.
     *
     * @var array
     */
    public $events = [
        'cp.nav.created' => 'addNavItems',
        'cp.add_to_head' => 'injectMenuStyles'
    ];

    public function addNavItems($nav)
    {
        // Create the first level navigation item
        // Note: by using route('store'), it assumes you've set up a route named 'store'.
        $menus = Nav::item('Menus')->route('addons.menu_editor')->icon('compass');

        // Finally, add our first level navigation item
        // to the navigation under the 'tools' section.
        $nav->addTo('tools', $menus);
    }

    /**
     * Return a <link> tag containing the addon stylesheet
     * @return string
     */
    public function injectMenuStyles()
    {
        $html = $this->css->tag('styles');
        return $html;
    }
}
