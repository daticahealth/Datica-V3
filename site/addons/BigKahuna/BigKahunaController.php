<?php

namespace Statamic\Addons\BigKahuna;

use Statamic\API\Page;
use Statamic\API\Collection;
use Statamic\API\Entry;
use Statamic\API\Content;
use Statamic\Contracts\Data\Pages\PageTreeReorderer;
use Statamic\Events\Data\AddonSettingsSaved;
use Statamic\Extend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BigKahunaController extends Controller
{
    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $menus_storage = Storage::files('/site/storage/addons/BigKahuna');
        $menus = [];

        if (!$menus_storage) {
            return redirect()->route('addons.menu_editor.create');
        }

        foreach ($menus_storage as $menu) {
            $add = str_replace('site/storage/addons/BigKahuna/', '', $menu);
            $add = str_replace('.json', '', $add);
            $menus[] = $add;
        }

        return $this->view('index', [
            'menus' => $menus
        ]);
    }

    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function edit(Request $request)
    {
        return $this->view('edit', [
            'items' => $this->getItems($request),
            'menu' => $request->menu
        ]);
    }

    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function create(Request $request)
    {
        return $this->view('create');
    }

    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $menu_name = str_slug($request->menu_name);

        $this->storage->putJSON($menu_name, []);

        return [
            'success' => true,
            'message' => 'Pages updated successfully.',
            'menu'    => $menu_name
        ];
    }

    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function destroy(Request $request)
    {
        Storage::delete('site/storage/addons/BigKahuna/'.$request->menu.'.json');

        return [
            'success' => true,
            'message' => 'Menu deleted successfully'
        ];
    }

    /**
     * Return all content as json
     *
     * @return json
     */
    public function allpages(Request $request)
    {
        return [
            'allpages' => $this->getItems($request),
        ];
    }

    /**
     * Return all pages in menu as an array
     *
     * @return array
     */
    public function json(Request $request)
    {
        $pages = $this->storage->getJSON($request->menu);
        if (!empty($pages)) {
            return [
                'pages' => $this->getJsonItems($pages)
            ];
        }
    }

    /**
     * Return a single branch object
     *
     * @return array
     */
    private function getJsonItems($pages)
    {
        $newpages = [];
        foreach ($pages as $item) {
            $id = $item['id'];
            $content = Content::find($id);

            $newpages[] = (object) [
                'id'             => $id,
                'order'          => $item['order'],
                'type'           => $item['type'],
                'title'          => $item['title'],
                'original_title' => $this->itemTitle($item),
                'url'            => $this->itemUrl($item),
                'classname'      => $this->itemClassname($item),
                'linktitle'      => $this->itemLinkTitle($item),
                'items'          => $this->getJsonItems($item['items']),
                'pages'          => $item['pages']
            ];
        }
        return $newpages;
    }

    /**
     * Return the branch title
     *
     * @return string
     */
    private function itemTitle($item)
    {
        $id = $item['id'];
        $content = Content::find($id);

        if ($item['type'] == 'Custom') {
            return $item['original_title'];
        } else {
            return $content->get('title');
        }
    }

    /**
     * Return the branch url
     *
     * @return string
     */
    private function itemUrl($item)
    {
        $id = $item['id'];
        $content = Content::find($id);

        if ($item['type'] == 'Custom') {
            return $item['url'];
        } else {
            return $content->absoluteUrl();
        }
    }

    /**
     * Return the branch classname
     *
     * @return string
     */
    private function itemClassname($item)
    {
        if (isset($item['classname'])) {
            return $item['classname'];
        } else {
            return '';
        }
    }

    /**
     * Return the branch classname
     *
     * @return string
     */
    private function itemLinkTitle($item)
    {
        if (isset($item['linktitle'])) {
            return $item['linktitle'];
        } else {
            return '';
        }
    }

    /**
     * Return all content as json
     *
     * @return json
     */
    private function getItems($request)
    {
        $items = Content::all();

        if ($request->has('q')) {
            $items = $items->filter(function ($item) use ($request) {

                if ($item->contentType() == 'page') {
                    if (stripos($item->get('title'), $request->q) !== false || stripos($item->id(), $request->q) !== false || stripos($item->path(), $request->q) !== false) {
                        return true;
                    }
                } elseif ($item->contentType() == 'entry') {
                    if (stripos($item->get('title'), $request->q) !== false || stripos($item->id(), $request->q) !== false || stripos($item->collectionName(), $request->q) !== false) {
                        return true;
                    }
                } elseif ($item->contentType() == 'term') {
                    if (stripos($item->title(), $request->q) !== false || stripos($item->id(), $request->q) !== false || stripos($item->taxonomyName(), $request->q) !== false) {
                        return true;
                    }
                }
                return false;
            });
        }

        return $items->map(function ($entry) {
            if ($entry->contentType() == 'page') {
                return [
                    'id'    => $entry->id(),
                    'title' => $entry->get('title'),
                    'type'  => 'Pages',
                ];
            } elseif ($entry->contentType() == 'entry') {
                return [
                    'id'    => $entry->id(),
                    'title' => $entry->get('title'),
                    'type'  => ucwords(str_replace('-', ' ', $entry->collectionName()))
                ];
            } elseif ($entry->contentType() == 'term') {
                return [
                    'id'    => $entry->id(),
                    'title' => $entry->title(),
                    'type'  => ucwords(str_replace('-', ' ', $entry->taxonomyName()))
                ];
            }
        });
    }

    /**
     * Get the content type
     *
     * @return string
     */
    private function contentType()
    {
        if ($this instanceof Page) {
            return 'page';
        } elseif ($this instanceof Entry) {
            return 'entry';
        } elseif ($this instanceof Term) {
            return 'term';
        } elseif ($this instanceof GlobalSet) {
            return 'globals';
        }
    }

    /**
     * Page tree save submission
     *
     * @return array
     */
    public function save(Request $request)
    {
        get('token', function () {
            return csrf_token();
        });

        // Grab the JSON payload
        $pages = $this->request->input('pages');

        // Save a new json with only the above options
        $this->storage->putJSON($request->menu, $this->saveJsonItems($pages));

        // Emit event
        event(new AddonSettingsSaved('site/storage/addons/BigKahuna/' . $request->menu . '.json', $pages));

        return [
            'success' => true,
            'message' => 'Pages updated successfully.'
        ];
    }

    /**
     * Return a single branch object for saving
     *
     * @return array
     */
    private function saveJsonItems($pages)
    {
        $newpages = [];
        foreach ($pages as $page) {
            $id = $page['id'];
            $content = Content::find($id);

            if ($page['type'] == 'Custom') {
                $newpages[] = (object) [
                    'id'             => $id,
                    'order'          => $page['order'],
                    'type'           => $page['type'],
                    'title'          => $page['title'],
                    'original_title' => $page['original_title'],
                    'url'            => $page['url'],
                    'classname'      => $page['classname'],
                    'linktitle'      => $page['linktitle'],
                    'items'          => $this->saveJsonItems($page['items']),
                    'pages'          => $page['pages']
                ];
            } else {
                $newpages[] = (object) [
                    'id'             => $id,
                    'order'          => $page['order'],
                    'type'           => $page['type'],
                    'title'          => $page['title'],
                    'classname'      => $page['classname'],
                    'linktitle'      => $page['linktitle'],
                    'items'          => $this->saveJsonItems($page['items']),
                    'pages'          => $page['pages']
                ];
            }
        }
        return $newpages;
    }
}
