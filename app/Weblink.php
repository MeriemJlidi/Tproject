<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weblink extends Model
{
    protected $fillable = [
        'link', 'header', 'icon','departement'
    ];
}
