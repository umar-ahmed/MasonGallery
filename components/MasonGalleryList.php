<?php namespace UMAR\MasonGallery\Components;

use Lang;
use Cms\Classes\ComponentBase;
use System\Classes\CombineAssets;
use UMAR\MasonGallery\Models\Gallery;

class MasonGalleryList extends ComponentBase
{

    public $galleries;

    public function componentDetails()
    {
        return [
            'name'        => 'Mason Gallery List',
            'description' => 'Outputs all galleries.'
        ];
    }

    public function defineProperties() {
        return [
            'galleryPage' => [
              'title'             => 'Restriction',
              'description'       => 'Show gallery page galleries only.',
              'type'              => 'checkbox',
              'default'           => 'true',
            ],
            'height' => [
              'title'             => 'Height',
              'description'       => 'Height of each image.',
              'type'              => 'string',
              'validationPattern' => '^[0-9]+$|^auto$',
              'validationMessage' => 'Invalid value',
              'default'           => 'auto',
              'group'             => Lang::get('Dimensions'),
            ],
            'width' => [
              'title'             => 'Width',
              'description'       => 'Width of each image.',
              'type'              => 'string',
              'validationPattern' => '^[0-9]+$|^auto$',
              'validationMessage' => 'Invalid value',
              'default'           => '150',
              'group'             => Lang::get('Dimensions'),
              ],
        ];
    }
    
    public function onRun() {
        $css = [
            'assets/css/magnific-popup.css'
        ];
        $js  = [
            'assets/js/masonry.pkgd.min.js',
            'assets/js/magnific-popup.min.js',
            'assets/js/magnific-init.js'
        ];
        $this -> addCss(CombineAssets::combine($css, plugins_path() . '/umar/masongallery'));
        $this -> addJs(CombineAssets::combine($js, plugins_path() . '/umar/masongallery'));
    }
    
    
    
    public function onRender(){
        if ( $this->property('galleryPage') == true ) {
            $this->galleries = Gallery::where('show_gallery_page', '=', 1)->get();
        } else {
            $this->galleries = Gallery::all();
        }
        $this -> page['height'] = $this -> property('height');
        $this -> page['width']  = $this -> property('width');
    }

}