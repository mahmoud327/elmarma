<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewPage extends Model
{
    use \Astrotomic\Translatable\Translatable;


    protected $table = 'news';
    protected $appends = [
        'image_path',
    ];

    public $timestamps = true;
    protected $translationForeignKey = "new_id";
    public $translatedAttributes = ['title', 'desc'];
    public $translationModel = 'App\Models\Translation\NewPage';


    protected $fillable = [
        'title',
        'des',
        'image',
        'category_id'

    ];


    /*
     * ----------------------------------------------------------------- *
     * ----------------------------- Acessores ---------------------------- *
     * ----------------------------------------------------------------- *
     */


    public function getImagePathAttribute()
    {
        return $this->image ? asset('uploads/news/' . $this->image) : asset('uploads/default.jpeg');
    }


    public function scopeActive($q)
    {
        $q->where('active', 1);
    }

    /*
     * ----------------------------------------------------------------- *
     * ----------------------------- relations ---------------------------- *
     * ----------------------------------------------------------------- *
     */

    public function category()
    {
        return  $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function medias()
    {
        return $this->morphMany('App\Models\Media', 'mediaable');
    }
}
