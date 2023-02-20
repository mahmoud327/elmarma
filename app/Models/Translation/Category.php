<?php

namespace App\Models\Translation;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = "category_translations";

    protected $fillable = ['title','category_id','locale'];


    public $timestamps = true;

}
