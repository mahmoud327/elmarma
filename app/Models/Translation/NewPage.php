<?php

namespace App\Models\Translation;

use Illuminate\Database\Eloquent\Model;

class NewPage extends Model {

    protected $table = "new_translations";

    protected $fillable = ['title','desc','new_id','locale'];


    public $timestamps = true;

}
