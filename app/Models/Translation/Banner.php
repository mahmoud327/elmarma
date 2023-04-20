<?php

namespace App\Models\Translation;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{

    protected $table = "banner_translations";

    protected $fillable = ['title', 'banner_id', 'desc'];


    public $timestamps = true;
}
