<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\QuoteResource;
use App\Http\Resources\TagResource;
use App\Models\Quote;
use App\Models\Tag;

class TagController extends BaseApiController
{
    public function index()
    {
        return TagResource::collection(Tag::all());
    }

    public function show($id)
    {
        return new QuoteResource(Quote::findOrFail($id));
    }
}
