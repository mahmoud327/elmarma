<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use \Astrotomic\Translatable\Translatable;


    protected $table = 'banners';
    protected $fillable =['image'];

    public $timestamps = true;
    protected $translationForeignKey = "banner_id";
    public $translatedAttributes = ['title','desc','type'];
    public $translationModel = 'App\Models\Translation\Banner';



    public function getImagePathAttribute()
    {
        return $this->image ? asset('uploads/banners/' . $this->image) : asset('uploads/default.jpeg');
    }


}

