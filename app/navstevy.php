<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class navstevy extends Model
{
    protected $table = 'navstevy';
    public $timestamps = false;
    protected $primaryKey = 'ID_navsteva';
}
