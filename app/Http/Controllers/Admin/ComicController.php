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
        $comics = Comic::get();

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

        $comic = new Comic();
        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
           
        if (!empty($data['artists'])) {
            $comic->artists = json_encode(array_map('trim', explode(',', $data['artists'])));
        } else {
            $comic->artists = null;
        }

        if (!empty($data['writers'])) {
            $comic->writers = json_encode(array_map('trim', explode(',', $data['writers'])));
        } else {
            $comic->writers = null;
        }

        $comic->save();

        // $comic = Comic::create($data);

        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comics = Comic::findOrFail($id);
        return view('comics.show', compact('comics'));
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

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
           
        if (!empty($data['artists'])) {
            $comic->artists = json_encode(array_map('trim', explode(',', $data['artists'])));
        } else {
            $comic->artists = null;
        }

        if (!empty($data['writers'])) {
            $comic->writers = json_encode(array_map('trim', explode(',', $data['writers'])));
        } else {
            $comic->writers = null;
        }

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