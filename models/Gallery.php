<?php namespace UMAR\MasonGallery\Models;

use Model;

/**
 * Gallery Model
 */
class Gallery extends Model
{

    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'date'  => 'date',
        'images' => 'required',
    ];
    
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'umar_masongallery_galleries';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [
        'images' => 'System\Models\File',
    ];

}