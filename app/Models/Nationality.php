<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $filable = array('name');

    public function contactUs()
    {
        return $this->hasMany('App\Models\ContactUs');
    }
}
