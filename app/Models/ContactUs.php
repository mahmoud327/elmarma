<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'nationality_id',
        'is_free'
    ];
    public function nationality()
    {
        return $this->belongsTo('App\Models\Nationality');
    }
}
