<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title'=> 'required|max:128',
            'description'=> 'required|min:20|max:1000',
            'thumb'=> 'nullable|max:1024|url',
            'price'=> 'required|decimal:2|min:0.00|max:999.99',
            'series'=> 'required|max:50',
            'sale_date'=> 'nullable|date',
            'type'=> 'required|max:32',
            'artists'=> 'nullable',
            'writers'=> 'nullable',
        ]);

        $comic = new Comic();
        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        $explodeArtists = explode(',', $data['artists']);
        $jsonArtists= json_encode($explodeArtists);
        $comic->artists = $jsonArtists;
        $explodeWriters = explode(',', $data['writers']);
        $jsonWriters = json_encode($explodeWriters);
        $comic->writers = $jsonWriters;
        $comic->save();

        return redirect()->route('comics.show', ['comic'=> $comic->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::findOrFail($id);

        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        $request->validate([
            'title'=> 'required|max:128',
            'description'=> 'required|min:20|max:1000',
            'thumb'=> 'nullable|max:1024|url',
            'price'=> 'required|decimal:2|min:0.00|max:999.99',
            'series'=> 'required|max:50',
            'sale_date'=> 'nullable|date',
            'type'=> 'required|max:32',
            'artists'=> 'nullable',
            'writers'=> 'nullable',
        ]);

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        $explodeArtists = explode(',', $data['artists']);
        $jsonArtists= json_encode($explodeArtists);
        $comic->artists = $jsonArtists;
        $explodeWriters = explode(',', $data['writers']);
        $jsonWriters = json_encode($explodeWriters);
        $comic->writers = $jsonWriters;
        $comic->save();

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}