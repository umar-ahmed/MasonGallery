<?php namespace UMAR\MasonGallery;

use Backend;
use Backend\Facades\BackendAuth;
use System\Classes\PluginBase;

/**
 * MasonGallery Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Mason Gallery',
            'description' => 'Lightbox gallery plugin using Masonry',
            'author'      => 'Umar Ahmed',
            'icon'        => 'icon-photo',
            'homepage'    => 'http://planet404.com'
        ];
    }

    
    
    /**
     * Registers back-end navigation menus
     *
     * @return array
     */
    public function registerNavigation() {
        return [
            'masongallery' => [
                'label'       => 'Gallery',
                'url'         => Backend::url('umar/masongallery/galleries'),
                'icon'        => 'icon-photo',
                'permissions' => ['umar.masongallery.*'],
                'order'       => 500,
                'sideMenu' => [
                    'galleries' => [
                        'label'       => 'Galleries',
                        'icon'        => 'icon-book',
                        'url'         => Backend::url('umar/masongallery/galleries'),
                        'permissions' => ['umar.masongallery.access_galleries']
                    ],
                ]
            ]
        ];
    }
    
    /**
     * Registers components
     *
     * @return array
     */
    public function registerComponents() {
        return [
            'UMAR\MasonGallery\Components\MasonGallery' => 'masonGallery',
            'UMAR\MasonGallery\Components\MasonGalleryList' => 'masonGalleryList',
        ];
    }
    
    /**
     * Registers page snippets
     *
     * @return array
     */
    public function registerPageSnippets()
    {
        return [
           'UMAR\MasonGallery\Components\MasonGallery' => 'masonGallery'
        ];
    }

    
    /**
     * Returns permissions associated with this plugin.
     *
     * @return array
     */
    public function registerPermissions() {
        return [
            'umar.masongallery.access_settings' => [
                'label' => 'Access Gallery Settings',
                'tab' => 'Mason Gallery'
            ],
            'umar.masongallery.access_galleries' => [
                'label' => 'Manage Galleries',
                'tab' => 'Mason Gallery'
            ],
        ];
    }
    
}
