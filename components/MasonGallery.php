<?php namespace UMAR\MasonGallery\Components;

use Lang;
use Cms\Classes\ComponentBase;
use System\Classes\CombineAssets;
use UMAR\MasonGallery\Models\Gallery;

class MasonGallery extends ComponentBase {

    public function componentDetails() {
        return [
            'name'        => 'Mason Gallery',
            'description' => 'Output a Masonry gallery with Magnific Popup.'
        ];
    }

    public function defineProperties() {
        return [
            'galleryId' => [
              'title'             => 'Gallery',
              'description'       => 'Select a gallery from the dropdown.',
              'type'              => 'dropdown'
            ],
            'height' => [
              'title'             => 'Height',
              'description'       => 'Height of each image.',
              'type'              => 'string',
              'validationPattern' => '^[0-9]+$|^auto$',
              'validationMessage' => 'Invalid value',
              'default'           => '150',
              'group'             => Lang::get('Dimensions'),
            ],
            'width' => [
              'title'             => 'Width',
              'description'       => 'Width of each image.',
              'type'              => 'string',
              'validationPattern' => '^[0-9]+$|^auto$',
              'validationMessage' => 'Invalid value',
              'default'           => 'auto',
              'group'             => Lang::get('Dimensions'),
              ],
        ];
    }
    
    public function getGalleryIdOptions() {
        return Gallery::select('id', 'name')->orderBy('name')->get()->lists('name', 'id');
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
        $gallery = new Gallery;
        $this->gallery = $this->page['gallery'] = $gallery->where('id', '=', $this->property('galleryId'))->first();
        $this -> page['height'] = $this -> property('height');
        $this -> page['width']  = $this -> property('width');
    }

}