<?php

namespace App\Models\Translation;

use Illuminate\Database\Eloquent\Model;

class TournamentNew extends Model {

    protected $table = "tournament_news_translations";

    protected $fillable = ['title','desc','new_id','locale'];


    public $timestamps = true;

}
