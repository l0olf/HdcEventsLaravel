@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

        <div id="event-create-container" class="col-md-6 offset-md-3">
            <h1>Crie o seu evento</h1>
            <form id="event-create-form" action="/events" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Capa do evento:</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="title">Evento:</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Nome do evento">
                </div>
                <div class="form-group">
                    <label for="date">Data do evento:</label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text" name="city" id="city" class="form-control" placeholder="Cidade do evento">
                </div>
                <div class="form-group">
                    <label for="city">O evento é privado?</label>
                    <select name="private" id="private" class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
                </div>
                        <div class="form-group mb-4"> {{-- mb-4 para dar um bom espaçamento --}}
            <label class="form-label-top" for="items-list">Adicione itens de infraestrutura:</label>

            <div id="items-list" class="checkbox-list-group">

                <div class="checkbox-item">
                    <input type="checkbox" name="items[]" value="Cadeiras" id="item-cadeiras">
                    <label for="item-cadeiras">Cadeiras</label>
                </div>

                <div class="checkbox-item">
                    <input type="checkbox" name="items[]" value="Palco" id="item-palco">
                    <label for="item-palco">Palco</label>
                </div>

                <div class="checkbox-item">
                    <input type="checkbox" name="items[]" value="Cerveja grátis" id="item-cerveja">
                    <label for="item-cerveja">Cerveja grátis</label>
                </div>

                <div class="checkbox-item">
                    <input type="checkbox" name="items[]" value="Open food" id="item-openfood">
                    <label for="item-openfood">Open food</label>
                </div>

                <div class="checkbox-item">
                    <input type="checkbox" name="items[]" value="Brindes" id="item-brindes">
                    <label for="item-brindes">Brindes</label>
                </div>

            </div>
        </div>
                <input type="submit" value="Criar Evento" class="btn btn-primary">
            </form>
        </div>

@endsection
