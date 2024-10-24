@extends('layouts.app')

@section('page-title', 'Home')

<div class="container mt-4">
    <h1 class="text-center mb-4">
        Modifica il COMIC
    </h1>

    <div class="mb-4">
        <a href="{{ route('comics.index') }}" class="btn btn-primary w-100">
            Torna alla home
        </a>
    </div>

    <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <h1>
            {{ $comic->title }}
        </h1>

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" value="{{ $comic->title }}" class="form-control" id="title" name="title" placeholder="Inserisci il titolo..." maxlength="124" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="5" placeholder="Inserisci la descrizione..." required>{{ $comic->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Thumb</label>
            <input type="text" value="{{ $comic->thumb }}" class="form-control" id="thumb" name="thumb" placeholder="Inserisci la thumbnail..." maxlength="1000">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" value="{{ $comic->price }}" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo..." required>
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" value="{{ $comic->series }}" class="form-control" id="series" name="series" placeholder="Inserisci la serie..." maxlength="124" required>
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Data di rilascio</label>
            <input type="text" value="{{ $comic->sale_date }}" class="form-control" id="sale_date" name="sale_date" placeholder="Inserisci la data di rilascio..." maxlength="124">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Genere</label>
            <input type="text" value="{{ $comic->type }}" class="form-control" id="type" name="type" placeholder="Inserisci il genere..." maxlength="124" required>
        </div>
        <div class="mb-3">
            <label for="artists" class="form-label">Artisti</label>
            <textarea type="text" class="form-control" id="artists" name="artists" placeholder="Inserisci gli artisti...">{{ implode(', ', json_decode($comic->artists, true)) }}</textarea>
            <div class="form-text">Separa gli scrittori con delle virgole</div>
        </div>
        <div class="mb-3">
            <label for="writers" class="form-label">Scrittori</label>
            <textarea type="text" class="form-control" id="writers" name="writers" placeholder="Inserisci gli scrittori...">{{ implode(', ', json_decode($comic->writers, true)) }}</textarea>
            <div class="form-text">Separa gli scrittori con delle virgole</div>
        </div>
        <button type="submit" class="btn btn-success my-3 w-100">
            Modifica
        </button>
    </form>
</div>
