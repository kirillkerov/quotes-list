<?php

namespace App\Models;

class Quote extends AbstractModel
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
