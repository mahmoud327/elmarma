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
       'category_id',
       'image'
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

    public function category()
    {
         return  $this->belongsTo('App\Models\Category','category_id');
    }

    public function scopeActive($q){
     $q->where('active',1);
    }
}

