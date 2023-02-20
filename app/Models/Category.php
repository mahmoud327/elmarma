<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \Astrotomic\Translatable\Translatable;


    protected $table = 'categories';
    protected $fillable =['status'];

    public $timestamps = true;
    protected $translationForeignKey = "category_id";
    public $translatedAttributes = ['title'];
    public $translationModel = 'App\Models\Translation\Category';





}

