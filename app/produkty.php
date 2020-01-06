<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produkty extends Model
{
    protected $table = 'produkty';
    public $timestamps = false;
    protected $primaryKey = 'ID_produkty';
}
