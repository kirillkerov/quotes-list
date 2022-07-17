<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\QuoteResource;
use App\Models\Quote;

class QuoteController extends BaseApiController
{
    public function index()
    {
        return QuoteResource::collection(Quote::with('tags')->latest()->paginate(10));
    }

    public function store()
    {
        $input = request()->input();
        $quote = new Quote([
            'author' => $input['author'],
            'text' => $input['text'],
        ]);
        $quote->save();
        foreach ($input['tags'] as $tag) {
            $quote->tags()->attach($tag['id']);
        }
    }

    public function show($id)
    {
        return new QuoteResource(Quote::findOrFail($id));
    }
}
