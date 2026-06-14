@extends('layouts.app')

@section('title', 'Inscription concours ISABEE 2026')

@section('content')

<section class="concours-page">

    {{-- HERO --}}
    <section class="concours-hero reveal-zoom">
        <div class="concours-hero-overlay"></div>

        <div class="container concours-hero-content">

            <div class="concours-hero-text">
                <span class="concours-badge">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Concours officiel 2026
                </span>

                <h1>Concours ISABEE 2026</h1>

                <p>
                    Plateforme officielle de préinscription en ligne à l’Institut Supérieur
                    d’Agriculture, du Bois, de l’Eau et de l’Environnement de l’Université d’Ebolowa.
                </p>

                <div class="concours-hero-actions">
                    <a href="#actions-concours" class="concours-btn concours-btn-primary">
                        Commencer l’inscription
                    </a>

                    <a href="#notice-inscription" class="concours-btn concours-btn-outline">
                        Voir la procédure
                    </a>
                </div>
            </div>

            <div class="concours-hero-card">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo ISABEE">

                <h3>ISABEE</h3>
                <p>Université d’Ebolowa</p>

                <div class="hero-card-line"></div>

                <span>
                    Agriculture • Bois • Eau • Environnement
                </span>
            </div>

        </div>
    </section>


    {{-- NOTICE FLYER --}}
    <section class="notice-flyer-section reveal" id="notice-inscription">
        <div class="container">

            <div class="notice-flyer">

                <div class="flyer-header">
                    <div class="flyer-logo">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo ISABEE">
                    </div>

                    <div>
                        <span>Université d’Ebolowa</span>
                        <h2>Notice de procédure d’inscription en ligne</h2>
                        <p>Concours d’entrée à l’ISABEE - Session 2026</p>
                    </div>
                </div>

                <div class="flyer-body">

                    <div class="flyer-step">
                        <div class="step-number">01</div>
                        <div>
                            <h3>Payer les frais de concours</h3>
                            <p>
                                Le candidat doit payer les frais d’inscription au concours uniquement
                                auprès de <strong>CCA Bank Cameroun</strong>.
                            </p>
                        </div>
                    </div>

                    <div class="flyer-step">
                        <div class="step-number">02</div>
                        <div>
                            <h3>Conserver le numéro de transaction</h3>
                            <p>
                                Le numéro de reçu ou numéro de transaction CCA Bank est obligatoire.
                                Il est unique pour chaque candidat.
                            </p>
                        </div>
                    </div>

                    <div class="flyer-step">
                        <div class="step-number">03</div>
                        <div>
                            <h3>Confirmer le numéro de transaction</h3>
                            <p>
                                Avant l’ouverture du formulaire, le candidat doit saisir deux fois
                                le même numéro de transaction afin d’éviter les erreurs.
                            </p>
                        </div>
                    </div>

                    <div class="flyer-step">
                        <div class="step-number">04</div>
                        <div>
                            <h3>Remplir le formulaire</h3>
                            <p>
                                Renseigner correctement les informations sur la formation, le candidat,
                                la localisation, la famille et le diplôme.
                            </p>
                        </div>
                    </div>

                    <div class="flyer-step">
                        <div class="step-number">05</div>
                        <div>
                            <h3>Valider et imprimer la fiche</h3>
                            <p>
                                Après validation, imprimer la fiche d’inscription générée automatiquement
                                et la joindre au dossier physique.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="flyer-info-grid">

                    <div class="flyer-info-card">
                        <i class="fa-solid fa-money-bill-wave"></i>
                        <h4>Frais de concours</h4>
                        <p>20 000 FCFA</p>
                    </div>

                    <div class="flyer-info-card">
                        <i class="fa-solid fa-building-columns"></i>
                        <h4>Mode de paiement</h4>
                        <p>CCA Bank Cameroun</p>
                    </div>

                    <div class="flyer-info-card">
                        <i class="fa-solid fa-receipt"></i>
                        <h4>Identifiant obligatoire</h4>
                        <p>N° transaction CCA Bank</p>
                    </div>

                </div>

                <div class="flyer-centres">
                    <h3>
                        <i class="fa-solid fa-location-dot"></i>
                        Centres d’examen
                    </h3>

                    <div class="centre-list">
                        <span>Bertoua</span>
                        <span>Douala</span>
                        <span>Dschang</span>
                        <span>Ebolowa</span>
                        <span>Garoua</span>
                        <span>Meyomessala</span>
                        <span>Yaoundé</span>
                    </div>
                </div>

                <div class="flyer-warning">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <p>
                        Le numéro de transaction permet de commencer, modifier ou vérifier l’inscription.
                        Toute fausse information peut entraîner le rejet du dossier.
                    </p>
                </div>

                <div class="flyer-footer">
                    <a href="#actions-concours" class="flyer-btn">
                        Commencer maintenant
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

            </div>

        </div>
    </section>


    {{-- ACTIONS CONCOURS --}}
    <section class="concours-action-section" id="actions-concours">
        <div class="container">

            @if(session('error'))
                <div class="alert-error-pro">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

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

            <div class="concours-action-title">
                <span>Plateforme concours ISABEE</span>
                <h2>Que souhaitez-vous faire ?</h2>
                <p>
                    Pour toute opération, le seul identifiant valide est le
                    <strong>numéro de reçu / numéro de transaction CCA Bank Cameroun</strong>.
                    Vous devez le saisir deux fois pour confirmation.
                </p>
            </div>

            <div class="concours-action-grid">

                {{-- COMMENCER --}}
                <button type="button"
                        class="concours-action-card card-start reveal-left reveal-delay-1"
                        id="openStartInscription">

                    <div class="action-icon">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>

                    <div class="action-content">
                        <h3>Commencer votre inscription</h3>
                        <p>
                            Saisissez et confirmez le numéro de transaction CCA Bank avant
                            d’ouvrir le formulaire.
                        </p>

                        <span>
                            Commencer maintenant
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>

                </button>

                {{-- MODIFIER --}}
                <button type="button"
                        class="concours-action-card card-edit reveal reveal-delay-2"
                        id="openEditInscription">

                    <div class="action-icon">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>

                    <div class="action-content">
                        <h3>Modifier votre inscription</h3>
                        <p>
                            Saisissez et confirmez votre numéro de transaction pour modifier
                            les informations déjà enregistrées.
                        </p>

                        <span>
                            Modifier ma fiche
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>

                </button>

                {{-- VERIFIER --}}
                <button type="button"
                        class="concours-action-card card-check reveal-right reveal-delay-3"
                        id="openCheckInscription">

                    <div class="action-icon">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>

                    <div class="action-content">
                        <h3>Vérifier votre inscription</h3>
                        <p>
                            Saisissez et confirmez le numéro de transaction pour vérifier
                            et imprimer votre fiche.
                        </p>

                        <span>
                            Vérifier maintenant
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>

                </button>

            </div>


            {{-- FORMULAIRE COMMENCER --}}
            <div class="concours-mini-form" id="startInscriptionBox">
                <div class="mini-form-header">
                    <i class="fa-solid fa-building-columns"></i>

                    <div>
                        <h3>Commencer votre inscription</h3>
                        <p>
                            Entrez deux fois le numéro de transaction CCA Bank Cameroun.
                            Ce numéro est unique et prouve le paiement du candidat.
                        </p>
                    </div>
                </div>

                <form action="{{ route('concours.commencer') }}" method="POST">
                    @csrf

                    <div class="mini-input-group">
                        <i class="fa-solid fa-receipt"></i>

                        <input type="text"
                               name="numero_recu"
                               value="{{ old('numero_recu') }}"
                               placeholder="Numéro de transaction CCA Bank"
                               required>
                    </div>

                    <div class="mini-input-group">
                        <i class="fa-solid fa-check-double"></i>

                        <input type="text"
                               name="numero_recu_confirmation"
                               placeholder="Confirmer le numéro de transaction"
                               required>
                    </div>

                    <button type="submit">
                        Ouvrir le formulaire
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </form>
            </div>


            {{-- FORMULAIRE MODIFIER --}}
            <div class="concours-mini-form" id="editInscriptionBox">
                <div class="mini-form-header">
                    <i class="fa-solid fa-pen-to-square"></i>

                    <div>
                        <h3>Modifier votre inscription</h3>
                        <p>
                            Entrez deux fois le numéro de transaction CCA Bank pour ouvrir
                            votre fiche en mode modification.
                        </p>
                    </div>
                </div>

                <form action="{{ route('concours.modifier') }}" method="POST">
                    @csrf

                    <div class="mini-input-group">
                        <i class="fa-solid fa-receipt"></i>

                        <input type="text"
                               name="numero_recu"
                               value="{{ old('numero_recu') }}"
                               placeholder="Numéro de transaction CCA Bank"
                               required>
                    </div>

                    <div class="mini-input-group">
                        <i class="fa-solid fa-check-double"></i>

                        <input type="text"
                               name="numero_recu_confirmation"
                               placeholder="Confirmer le numéro de transaction"
                               required>
                    </div>

                    <button type="submit">
                        Modifier mon inscription
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </form>
            </div>


            {{-- FORMULAIRE VERIFIER --}}
            <div class="concours-mini-form" id="checkInscriptionBox">
                <div class="mini-form-header">
                    <i class="fa-solid fa-magnifying-glass-check"></i>

                    <div>
                        <h3>Vérifier votre inscription</h3>
                        <p>
                            Entrez deux fois le numéro de transaction CCA Bank pour vérifier
                            et imprimer votre fiche.
                        </p>
                    </div>
                </div>

                <form action="{{ route('concours.verifier') }}" method="POST">
                    @csrf

                    <div class="mini-input-group">
                        <i class="fa-solid fa-id-badge"></i>

                        <input type="text"
                               name="numero_recu"
                               value="{{ old('numero_recu') }}"
                               placeholder="Numéro de transaction CCA Bank"
                               required>
                    </div>

                    <div class="mini-input-group">
                        <i class="fa-solid fa-check-double"></i>

                        <input type="text"
                               name="numero_recu_confirmation"
                               placeholder="Confirmer le numéro de transaction"
                               required>
                    </div>

                    <button type="submit">
                        Vérifier mon inscription
                        <i class="fa-solid fa-search"></i>
                    </button>
                </form>
            </div>

        </div>
    </section>


    {{-- CONTENU PRINCIPAL --}}
    <section class="concours-content-section">
        <div class="container concours-layout">

            <main class="concours-main">

                {{-- PROCEDURE --}}
                <article class="concours-card reveal">
                    <div class="card-heading">
                        <span>01</span>
                        <h2>Procédure d’inscription en ligne</h2>
                    </div>

                    <ul class="modern-list">
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            Payer les frais de concours uniquement à la CCA Bank Cameroun.
                        </li>

                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            Conserver le numéro de transaction inscrit sur le reçu de paiement.
                        </li>

                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            Cliquer sur <strong>Commencer votre inscription</strong>.
                        </li>

                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            Saisir deux fois le numéro de transaction pour confirmation.
                        </li>

                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            Remplir correctement toutes les informations demandées.
                        </li>

                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            Valider et imprimer la fiche d’inscription.
                        </li>
                    </ul>
                </article>


                {{-- PAIEMENT --}}
                <article class="concours-card reveal-left">
                    <div class="card-heading">
                        <span>02</span>
                        <h2>Modalités de paiement</h2>
                    </div>

                    <div class="payment-box">
                        <div class="payment-icon">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>

                        <div>
                            <h3>Paiement à la CCA Bank Cameroun</h3>

                            <p>
                                Les frais d’inscription au concours sont payables uniquement
                                dans les agences CCA Bank Cameroun.
                            </p>

                            <strong>Compte N° 10039-10012-00272771401-79</strong>
                        </div>
                    </div>
                    

                    <div class="note-box">
                        <i class="fa-solid fa-triangle-exclamation"></i>

                        <p>
                            Les droits d’inscription au concours s’élèvent à
                            <strong>20 000 FCFA</strong>. Le numéro de transaction est unique
                            par candidat et sera obligatoire pour commencer, modifier ou vérifier
                            l’inscription.
                        </p>
                    </div>
                </article>


                {{-- CENTRES --}}
                <article class="concours-card reveal-right">
                    <div class="card-heading">
                        <span>03</span>
                        <h2>Centres d’examen</h2>
                    </div>

                    <div class="document-grid">
                        <div class="document-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Bertoua</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Douala</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Dschang</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Ebolowa</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Garoua</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Meyomessala</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Yaoundé</span>
                        </div>
                    </div>
                </article>


                {{-- PIECES --}}
                <article class="concours-card reveal">
                    <div class="card-heading">
                        <span>04</span>
                        <h2>Pièces à fournir</h2>
                    </div>

                    <div class="document-grid">

                        <div class="document-item">
                            <i class="fa-solid fa-file-lines"></i>
                            <span>Une fiche de candidature remplie en ligne et téléchargée.</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-id-card"></i>
                            <span>Une photocopie certifiée conforme de l’acte de naissance datant de moins de trois mois.</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-file-pen"></i>
                            <span>Photocopies certifiées conformes des relevés de notes requis.</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-award"></i>
                            <span>Photocopie certifiée conforme du diplôme requis ou attestation de réussite.</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-stethoscope"></i>
                            <span>Un certificat médical datant de moins de trois mois.</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-envelope"></i>
                            <span>Une enveloppe format A4 timbrée à 1500 FCFA.</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-image"></i>
                            <span>Quatre photos 4x4 portant les noms et prénoms au verso.</span>
                        </div>

                        <div class="document-item">
                            <i class="fa-solid fa-receipt"></i>
                           <span>
    Reçu de paiement CCA Bank Cameroun clair et lisible.
    Ce reçu doit aussi être scanné dans le formulaire en ligne.
</span>
                        </div>

                    </div>
                </article>


                {{-- DEPOT --}}
                <article class="concours-card reveal-left">
                    <div class="card-heading">
                        <span>05</span>
                        <h2>Dépôt du dossier</h2>
                    </div>

                    <div class="timeline">

                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>

                            <div>
                                <h3>Date limite</h3>
                                <p>
                                    Les dossiers complets doivent être déposés au plus tard
                                    le <strong>jeudi 22 octobre 2026 à 15h30</strong>.
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>

                            <div>
                                <h3>Lieu de dépôt</h3>
                                <p>
                                    Service de la Scolarité et des Statistiques de l’ISABEE ou
                                    Délégation Régionale du Ministère des Enseignements Secondaires
                                    du lieu de résidence du candidat.
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="warning-box">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span>
                            Ne pas oublier de photocopier le reçu de paiement et de conserver le récépissé.
                        </span>
                    </div>
                </article>

            </main>


            {{-- SIDEBAR --}}
            <aside class="concours-sidebar">
                <div class="sidebar-card sticky-card reveal-right">
                    <div class="sidebar-header">
                        <i class="fa-solid fa-folder-open"></i>
                        <h3>Résumé important</h3>
                    </div>

                    <ul class="sidebar-list">
                        <li>
                            <i class="fa-solid fa-check"></i>
                            Paiement uniquement à la CCA Bank Cameroun.
                        </li>

                        <li>
                            <i class="fa-solid fa-check"></i>
                            Numéro de transaction obligatoire.
                        </li>

                        <li>
                            <i class="fa-solid fa-check"></i>
                            Confirmation du numéro de transaction obligatoire.
                        </li>

                        <li>
                            <i class="fa-solid fa-check"></i>
                            Frais de concours :
                            <strong>20 000 FCFA</strong>
                        </li>

                        <li>
                            <i class="fa-solid fa-check"></i>
                            Centres :
                            Bertoua, Douala, Dschang, Ebolowa, Garoua, Meyomessala, Yaoundé.
                        </li>
                    </ul>

                    <a href="#actions-concours" class="sidebar-action">
                        Accéder aux boutons
                    </a>
                </div>
            </aside>

        </div>
    </section>

</section>

@endsection