@extends('layouts.app')

@section('page-title', 'Home')

<div class="container mt-4">
    <h1 class="text-center mb-4">
        Crea il tuo COMIC
    </h1>

    <div class="mb-4">
        <a href="{{ route('comics.index') }}" class="btn btn-primary w-100">
            Torna alla home
        </a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger my-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('comics.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo..." maxlength="124" required value={{ old('title') }}>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control" id="description" name="description" placeholder="Inserisci la descrizione..." required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Thumb</label>
            <input type="text" class="form-control" id="thumb" name="thumb" placeholder="Inserisci la thumbnail..." maxlength="1000" value={{ old('thumb') }}>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo..." required value={{ old('price') }}>
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control" id="series" name="series" placeholder="Inserisci la serie..." maxlength="124" required value={{ old('series') }}>
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Data di rilascio</label>
            <input type="text" class="form-control" id="sale_date" name="sale_date" placeholder="Inserisci la data di rilascio..." maxlength="124" value={{ old('sale_date') }}>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Genere</label>
            <input type="text" class="form-control" id="type" name="type" placeholder="Inserisci il genere..." maxlength="124" required value={{ old('type') }}>
        </div>
        <div class="mb-3">
            <label for="artists" class="form-label">Artisti</label>
            <textarea type="text" class="form-control" id="artists" name="artists" placeholder="Inserisci gli artisti...">{{ old('artists') }}</textarea>
            <div class="form-text">Separa gli artisti con delle virgole</div>
        </div>
        <div class="mb-3">
            <label for="writers" class="form-label">Scrittori</label>
            <textarea type="text" class="form-control" id="writers" name="writers" placeholder="Inserisci gli scrittori...">{{ old('writers') }}</textarea>
            <div class="form-text">Separa gli scrittori con delle virgole</div>
        </div>
        <button type="submit" class="btn btn-success my-3 w-100">
            Crea
        </button>
    </form>
</div>
