<?php

namespace App\Models\Translation;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = "post_translations";

    protected $fillable = ['title','desc','post_id','locale'];


    public $timestamps = true;

}
