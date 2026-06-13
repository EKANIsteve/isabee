@extends('layouts.app')

@section('title', isset($candidat) ? 'Modifier inscription concours ISABEE' : 'Nouvelle inscription concours ISABEE')

@section('content')

<section class="isabee-form-page">

    <div class="form-hero">
        <div class="form-hero-overlay"></div>

        <div class="container form-hero-content">
            <div>
                <span class="form-hero-badge">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Concours ISABEE 2026
                </span>

                <h1>
                    {{ isset($candidat) ? 'Modification de votre inscription' : 'Inscription au concours ISABEE' }}
                </h1>

                <p>
                    {{ isset($candidat)
                        ? 'Votre formulaire est ouvert en mode édition. Les anciennes informations sont conservées.'
                        : 'Remplissez soigneusement toutes les informations demandées afin de générer votre fiche officielle.' }}
                </p>
            </div>

            <div class="form-hero-logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo ISABEE">
            </div>
        </div>
    </div>

    <div class="form-container">
        <div class="form-card">

            <div class="form-header">
                <div>
                    <span>
                        {{ isset($candidat) ? 'Mode édition' : 'Préinscription officielle' }}
                    </span>

                    <h2>
                        {{ isset($candidat) ? 'Modifier la fiche de candidature' : 'Formulaire de candidature' }}
                    </h2>
                </div>

                <div class="form-header-icon">
                    <i class="fa-solid fa-file-signature"></i>
                </div>
            </div>

            @if($errors->any())
                <div class="alert-error-pro">
                    <i class="fa-solid fa-circle-exclamation"></i>

                    <div>
                        <strong>Veuillez corriger les erreurs suivantes :</strong>
                        <ul style="margin-top:8px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('candidat_id'))
                <div class="print-zone">
                    <a href="{{ route('concours.fiche', session('candidat_id')) }}"
                       target="_blank"
                       class="btn-print">
                        <i class="fa-solid fa-print"></i>
                        Imprimer la fiche d’inscription
                    </a>
                </div>
            @endif

            <div class="receipt-box">
                <div>
                    <i class="fa-solid fa-building-columns"></i>
                </div>

                <div>
                    <strong>Numéro de transaction CCA Bank Cameroun</strong>
                    <p>
                        {{ old('numero_recu', $candidat->numero_recu ?? $numeroRecu ?? 'Non défini') }}
                    </p>
                    <small>
                        Ce numéro prouve le paiement. Il est unique pour chaque candidat.
                    </small>
                </div>
            </div>

            <div class="progress-bar">
                <div class="progress-step active">
                    <span>1</span>
                    Formation
                </div>

                <div class="progress-step">
                    <span>2</span>
                    Candidat
                </div>

                <div class="progress-step">
                    <span>3</span>
                    Localisation
                </div>

                <div class="progress-step">
                    <span>4</span>
                    Famille
                </div>

                <div class="progress-step">
                    <span>5</span>
                    Diplôme
                </div>
            </div>

            <form method="POST"
                  action="{{ isset($candidat) ? route('concours.update', $candidat->id) : route('concours.store') }}"
                  enctype="multipart/form-data"
                  id="concoursForm">

                @csrf

                @if(isset($candidat))
                    @method('PUT')
                @endif

                <input type="hidden"
                       name="numero_recu"
                       value="{{ old('numero_recu', $candidat->numero_recu ?? $numeroRecu ?? '') }}">

                @include('concours.steps.formation')
                @include('concours.steps.informations')
                @include('concours.steps.localisation')
                @include('concours.steps.famille')
                @include('concours.steps.diplome')


            </form>

        </div>
    </div>

</section>

@endsection