@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Nome do Evento</th>
                    <th scope="col" class="text-center">Participantes</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td data-label="#" scope="row" class="index-col">{{ $loop->index + 1 }}</td>

                    <td data-label="Evento">
                        <a href="/events/{{ $event->id }}" class="event-title">{{ $event->title }}</a>
                    </td>

                    <td data-label="Participantes" class="text-center">
                        <span class="badge-participants">
                            <ion-icon name="people-outline"></ion-icon>
                            {{ count($event->users) }}
                        </span>
                    </td>

                    <td data-label="Ações" class="actions-col">
                        <a href="events/edit/{{$event->id}}" class="btn-action edit" title="Editar">
                            <ion-icon class="edit-icon-btn" name="create-outline"></ion-icon>
                        </a>

                        <form action="/events/{{ $event->id }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action delete" title="Deletar">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-state">
            <ion-icon name="calendar-clear-outline"></ion-icon>
            <p>Você ainda não tem eventos criados.</p>
            <a href="/events/create" class="btn-create">Criar meu primeiro evento</a>
        </div>
    @endif
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos que estou participando</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($eventsAsParticipant) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Nome do Evento</th>
                    <th scope="col" class="text-center">Participantes</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventsAsParticipant as $event)
                <tr>
                    <td data-label="#" scope="row" class="index-col">{{ $loop->index + 1 }}</td>

                    <td data-label="Evento">
                        <a href="/events/{{ $event->id }}" class="event-title">{{ $event->title }}</a>
                    </td>

                    <td data-label="Participantes" class="text-center">
                        <span class="badge-participants">
                            <ion-icon name="people-outline"></ion-icon>
                            {{ count($event->users) }}
                        </span>
                    </td>

                    <td data-label="Ações" class="actions-col">
                        <a href="events/{{$event->id}}" class="btn-action edit" title="Editar">
                            <ion-icon class="view-icon-btn" name="eye-outline"></ion-icon>
                        </a>

                        <form action="/events/leave/{{ $event->id }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action delete" title="Deletar">
                                <ion-icon name="exit-outline"></ion-icon>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <div class="empty-state">
            <ion-icon name="calendar-clear-outline"></ion-icon>
            <p>Você ainda não participa de nenhum evento.</p>
            <a href="/" class="btn-create">Ver eventos disponíveis</a>
        </div>
    @endif
</div>



@endsection
