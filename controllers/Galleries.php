<?php namespace UMAR\MasonGallery\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Flash;
use UMAR\MasonGallery\Models\Gallery;

/**
 * Galleries Back-end Controller
 */
class Galleries extends Controller
{
    
    public $requiredPermissions = ['umar.masongallery.access_galleries'];
    
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('UMAR.MasonGallery', 'masongallery', 'galleries');
    }
    
    /**
     * Deleted checked galleries.
     */
    public function onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $galleryId) {
                if (!$gallery = Gallery::find($galleryId)) {
                    continue;
                }

                $gallery->delete();
            }

            Flash::success('Gallery successfully deleted.');
        } else {
            Flash::error('No gallery selected.');
        }

        return $this->listRefresh();
    }
    
}