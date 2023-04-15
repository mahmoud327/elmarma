<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \Astrotomic\Translatable\Translatable;


    protected $table = 'posts';
    protected $appends = [
        'image_path',
    ];

    public $timestamps = true;
    protected $translationForeignKey = "post_id";
    public $translatedAttributes = ['title', 'desc'];
    public $translationModel = 'App\Models\Translation\Post';


    protected $fillable = [
       'title',
       'des',
       'type',
       'category_id',
       'image',
       'type_post'
    ];


    /*
     * ----------------------------------------------------------------- *
     * ----------------------------- Acessores ---------------------------- *
     * ----------------------------------------------------------------- *
     */




     public function getImagePathAttribute()
     {
         return $this->image ? asset('uploads/posts/' . $this->image) : asset('uploads/default.jpeg');

     }


    /*
     * ----------------------------------------------------------------- *
     * ----------------------------- relations ---------------------------- *
     * ----------------------------------------------------------------- *
     */


    public function category()
    {
         return  $this->belongsTo('App\Models\Category','category_id');
    }


    public function medias()
    {
        return $this->morphMany('App\Models\Media', 'mediaable');
    }
    public function scopeActive($q){
     $q->where('active',1);
    }
}

