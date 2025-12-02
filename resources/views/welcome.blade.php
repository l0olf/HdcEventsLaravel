@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

        <div id="search-container" class="col-md-12">
            <h1>Busque um evento</h1>
            <form action="/" method="GET">
                <input type="text" name="search" id="search" class="form-control" placeholder="Procurar...">
            </form>
        </div>

        <div id="events-container" class="col-md-12">
            @if($search)
                <h2>Buscando por: {{$search}}</h2>
                <p>Aqui estão os resultados da busca</p>
            @else
            <h2>Próximos eventos</h2>
            <p>Veja os eventos dos próximos dias</p>
            @endif

            <div id="cards-container">
                @foreach($events as $event)
                    <div class="card">
                        <div class="card-image-wrapper">
                            <div class="card-date-badge">
                                <ion-icon name="calendar-outline"></ion-icon>
                                {{ date('d/m/Y', strtotime($event->date)) }}
                            </div>

                            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>

                            <p class="card-participants">
                                <ion-icon name="people-outline"></ion-icon>
                                {{ count($event->users) }} Participantes
                            </p>

                            <a href="/events/{{ $event->id }}" class="btn btn-primary">
                                Saber mais <ion-icon name="arrow-forward-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-12 text-center">
                @if (count($events) == 0 && $search)
                    <p>Não foi possível encontrar nenhum evento com: <strong>{{$search}}</strong>. <a href="/">Ver todos</a></p>
                @elseif (count($events) == 0)
                    <p>Não há eventos disponíveis</p>
                @endif
            </div>
        </div>


@endsection
