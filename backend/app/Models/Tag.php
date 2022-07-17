<?php

namespace App\Models;

class Tag extends AbstractModel
{
    public function quotes()
    {
        return $this->belongsToMany(Quote::class);
    }
}
