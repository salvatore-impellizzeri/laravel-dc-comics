@extends('layouts.app')

@section('page-title', $comic->title)

@section('main-content')

<div class="container w-50 mx-auto my-5">
    
    <div class="mb-4">
        <a href="{{ route('comics.index') }}" class="btn btn-primary w-100">
            Torna alla home
        </a>

        <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-warning my-3 w-100">
            Modifica
        </a>
    </div>

    <div class="card">
        <h1 class="text-center">
            {{ $comic->title }}
        </h1>
        <div class="card-body">
            <ul>
                <li>
                    Serie: {{ $comic->series }}
                </li>
                <li>
                    Prezzo: {{ $comic->price }}
                </li>
                <li>
                    Data vendita: {{ $comic->sale_date }}
                </li>
                <li>
                    Tipo: {{ $comic->type }}
                </li>

                <li>Artisti:
                    <ul>
                        @foreach (json_decode($comic->artists, true) as $artist)
                            <li>{{ $artist }}</li>
                        @endforeach
                    </ul>
                </li>
                <li>Scrittori:
                    <ul>
                        @foreach (json_decode($comic->writers, true) as $writer)
                            <li>{{ $writer }}</li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <p>
                Descrizione: {{ $comic->description }}
            </p>
            <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" class="card-img-bottom">
        </div>
    </div>
</div>

