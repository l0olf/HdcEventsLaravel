@extends('layouts.main')

@section('title', '{{$event->title}}')

@section('content')

<div class="container event-detail-hero py-5">
    <div class="row align-items-center"> {{-- Centraliza verticalmente o conteúdo das colunas --}}

        <div id="image-container" class="col-md-6 mb-4 mb-md-0">
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-fluid event-image-detail">
        </div>

        <div id="info-container" class="col-md-6 p-4 event-info-card"> {{-- Adicionei p-4 para padding interno e event-info-card para estilização --}}
            <h1 class="event-title-detail mb-3">{{$event->title}}</h1>

            <div class="event-meta-group mb-4"> {{-- Nova classe para agrupar meta-informações --}}
                <p class="event-city meta-item mb-2"><ion-icon name="location-outline"></ion-icon> <strong>Local:</strong> {{$event->city}}</p>
                <p class="events-participantes meta-item mb-2"><ion-icon name="people-outline"></ion-icon> <strong>Participantes: </strong>{{ count($event->users) }}</p>
                <p class="event-owner meta-item mb-4"><ion-icon name="star-outline"></ion-icon> <strong>Organizador:</strong>{{ $eventOwner ['name'] }}</p>
            </div>

            @if ($isParticipant)
                <p class="text-success">✅ Você já está participando deste evento!</p>
                <form action="/events/leave/{{ $event->id }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary btn-lg event-confirm-btn exit-btn" title="Deletar">
                                <ion-icon class="exit-icon" name="exit-outline"></ion-icon> Sair do evento
                            </button>
                        </form>
            @else

                <form action="/events/join/{{$event->id}}" method="post">
                    @csrf
                    <a href="/events/join/{{$event->id}}"
                        class="btn btn-primary btn-lg event-confirm-btn"
                        id="event-submit"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Confirmar presença
                    </a>
                </form>
            @endif


        </div>
    </div>
</div>

{{-- Seção de descrição separada, com mais destaque --}}
<div class="container mt-5 mb-5"> {{-- Margem superior e inferior para separar do bloco de cima --}}
    <div class="row justify-content-center"> {{-- Centraliza a coluna de descrição --}}
        <div class="col-md-10" id="description-container">
            <h3 class="description-title mb-4">Sobre o evento:</h3> {{-- mb-4 para mais espaço --}}
            <p class="event-description">{{$event->description}}</p>
            <h3>O evento conta com:</h3>
            <ul id="items-list" class="event-items-list">
                @foreach($event->items as $item)
                    <li class="event-item">{{$item}}</li>
                @endforeach
            </ul>
        </div>

    </div>
</div>

@endsection
