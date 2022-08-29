@extends('layout.main')
@section('title', 'Comprar: ' . $realDataCard->name)
@section('content')

    <div class="card-info">
        <div class="d-flex position-relative">
            <img src="https://images.ygoprodeck.com/images/cards_small/{{ $realDataCard->id }}.jpg" class="flex-shrink-0 me-3" width="150" height="200">
            <div>
                <h5 class="mt-0">{{ $realDataCard->name }}</h5>
                <p><i class="bi bi-star-fill"></i> {{ $realDataCard->level }}</p>
                <p><i class="bi bi-info-circle"></i> {{ $realDataCard->type }}</p>
                <p><i class="bi bi-fire"></i> {{ $realDataCard->atk }} / <i class="bi bi-tsunami"></i> {{ $realDataCard->def }}</p>
                <p>&copy; {{ $realDataCard->id }}</p>
                <p>{{ $realDataCard->desc }}</p>
                <p><i class="bi bi-heart"></i> {{ $realDataCard->race }}</p>
                <p><i class="bi bi-tag-fill"></i> {{ $realDataCard->attribute }}</p>
                @auth
                    <button type="button" onclick="window.print();" class="button-Deck">IMPORTAR PDF / IMPRIMIR</button>
                @endauth
                @guest
                    <a href="/login"><button type="button" class="button-Deck">ENTRE PARA IMPRIMIR OU IMPORTAR PDF</button></a>
                @endguest
            </div>
        </div>
    </div>

@endsection