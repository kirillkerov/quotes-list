<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbstractModel extends Model
{
    public $timestamps = false;
    protected $guarded = [];
}
