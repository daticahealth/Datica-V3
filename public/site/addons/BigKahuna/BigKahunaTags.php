<?php

namespace Statamic\Addons\BigKahuna;

use Statamic\API\Content;
use Statamic\Extend\Tags;

class BigKahunaTags extends Tags
{
    /**
     * The {{ menus }} tag
     *
     * @return string|array
     */
    public function index()
    {
        // Get the pages from storage and return proper html
        $pages = $this->storage->getJSON($this->getParam('menu'));
        if ($pages) {
            return $this->getItems($pages);
        }
    }

    /**
     * The recursive list
     *
     * @return html
     */
    private function getItems($pages, $root = true)
    {
        $menu                   = ($this->getParam('menu')) ? ' ' . $this->getParam('menu') : "";
        $id                     = ($this->getParam('id')) ? $this->getParam('id') : "";
        $class                  = ($this->getParam('class')) ? $this->getParam('class') : "nav";
        $itemClass              = ($this->getParam('item_class')) ? $this->getParam('item_class') : "nav__item";
        $parentClass            = ($this->getParam('parent_class')) ? $this->getParam('parent_class') : "nav__item--parent";
        $submenu_class          = ($this->getParam('submenu_class')) ? $this->getParam('submenu_class') : "submenu";
        $submenu_item_class     = ($this->getParam('submenu_item_class')) ? $this->getParam('submenu_item_class') : "submenu__item";
        $activeClass            = ($this->getParam('active_class')) ? $this->getParam('active_class') : "is--active";

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $html = '';

        if ($root == true) {
            // The root list
            $html .= '<ul id="' . $id . '" class="' . $class . $menu . '">';
        } else {
            // A submenu list
            $itemClass = $submenu_item_class;
            $html .= '<ul class="' . $submenu_class . '">';
        }

        foreach ($pages as $page) {
            $id             = $page['id'];
            $myClassname    = ' ' . $page['classname'];
            $isParent       = $page['items'] ? ' ' . $parentClass : '';

            if ($page['linktitle'] != '') {
                $myLinkTitle = $page['linktitle'];
            } else {
                $myLinkTitle = $page['title'];
            }
            $content = Content::find($id);

            if ($page['type'] == 'Custom') {
                // A custom link
                $html .= '<li class="' . $itemClass . $isParent . $myClassname .'">';
            } else {
                $isactive = '';
                if ($content->absoluteUrl() == $actual_link || $this->getChildActiveStatus($page, $actual_link)) {
                    $isactive = ' ' . $activeClass;
                }

                $html .= '<li class="' . $itemClass . $isParent . $isactive . $myClassname . '">';
            }

            if ($page['type'] == 'Custom') {
                // A custom link
                $html .= '<a href="' . $page['url'] . '" title="' . $myLinkTitle . '" rel="external">';
            } else {
                // An internal link
                $html .= '<a href="' . $content->absoluteUrl() . '" title="' . $myLinkTitle . '">';
            }

            $html .= $page['title'];
            $html .= '</a>';

            if ($page['items']) {
                // Return the submenu html
                $html .= $this->getItems($page['items'], false);
            }

            $html .= '</li>';
        }

        $html .= '</ul>';
        return $html;
    }

    public function getChildActiveStatus($page, $actual_link)
    {
        foreach ($page['items'] as $child) {
            $child_content = Content::find($child['id']);

            if ($child_content && $child_content->absoluteUrl() == $actual_link) {
                return true;
            } else {
                return $this->getChildActiveStatus($child, $actual_link);
            }
        }

        return false;
    }
}
