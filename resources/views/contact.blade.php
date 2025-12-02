@extends('layouts.main')

@section('title', 'Contato')

@section('content')

<div class="contact-container">
    <div class="contact-box">
        <div class="contact-info">
            <h3>Fale Conosco</h3>
            <p>Dúvidas sobre os eventos? Quer sugerir algo? Mande uma mensagem pra gente!</p>

            <div class="info-item">
                <ion-icon name="location-outline"></ion-icon>
                <span>Marília - SP</span>
            </div>
            <div class="info-item">
                <ion-icon name="mail-outline"></ion-icon>
                <span>contato@hdc-events.com</span>
            </div>
            <div class="info-item">
                <ion-icon name="call-outline"></ion-icon>
                <span>(14) 99999-9999</span>
            </div>

            <div class="social-links">
                <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                <a href="#"><ion-icon name="logo-linkedin"></ion-icon></a>
            </div>
        </div>

        <div class="contact-form">
            <h2>Envie uma mensagem</h2>
            <form>
                <div class="input-group">
                    <input type="text" required>
                    <label>Seu Nome</label>
                </div>

                <div class="input-group">
                    <input type="email" required>
                    <label>Seu E-mail</label>
                </div>

                <div class="input-group">
                    <textarea required></textarea>
                    <label>Sua Mensagem</label>
                </div>

                <button type="button" class="btn btn-primary">Enviar Mensagem</button>
            </form>
        </div>
    </div>
</div>

@endsection
