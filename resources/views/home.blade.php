@extends('layouts.app')

@section('content')

{{-- HERO SLIDER --}}
<section class="hero-section">
    <div class="hero-slider">

        @forelse($sliders as $slide)
            <div class="hero-slide @if($loop->first) active @endif">
                <img src="{{ asset('images/slider/' . $slide->image) }}" alt="{{ $slide->titre }}">

                <div class="hero-overlay"></div>

                <div class="hero-content">
                    <span>Université d’Ebolowa</span>
                    <h2>{{ $slide->titre }}</h2>
                    <p>{{ $slide->description }}</p>

                    <div class="hero-actions">
                        <a href="{{ route('concours.inscription') }}" class="btn btn-red">
                            <i class="fa-solid fa-graduation-cap"></i>
                            Concours 2026
                        </a>

                        <a href="{{ route('formation.continue') }}" class="btn btn-green">
                            <i class="fa-solid fa-book-open"></i>
                            Formation Continue
                        </a>

                        <a href="{{ route('concours.inscription') }}" class="btn btn-blue">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Inscription en ligne
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="hero-slide active">
                <img src="{{ asset('images/logo.jpg') }}" alt="ISABEE">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <span>Université d’Ebolowa</span>
                    <h2>Bienvenue à l’ISABEE</h2>
                    <p>Institut Supérieur d’Agriculture, du Bois, de l’Eau et de l’Environnement.</p>
                </div>
            </div>
        @endforelse

    </div>

    <button class="hero-arrow hero-prev" id="heroPrev">
        <i class="fa-solid fa-chevron-left"></i>
    </button>

    <button class="hero-arrow hero-next" id="heroNext">
        <i class="fa-solid fa-chevron-right"></i>
    </button>
</section>

{{-- MOT DU DIRECTEUR --}}
<section class="director-section reveal">
    <div class="container director-grid">

        <div class="director-text">
            <span class="section-label">Message officiel</span>
            <h2>Mot du Directeur</h2>

            <div id="directorShort">
                <p>
                    Bienvenue à l’ISABEE : votre porte d’entrée vers un avenir durable.
                    Né de la volonté de former les futurs acteurs du développement durable,
                    l’ISABEE offre une gamme de formations de qualité dans les domaines de
                    l’agriculture, du bois, de l’eau et de l’environnement.
                </p>

                <p>
                    Notre établissement est un acteur clé dans la formation d’ingénieurs qualifiés,
                    capables de relever les défis scientifiques, techniques et environnementaux
                    de notre époque.
                </p>
            </div>

            <div id="directorFull" class="hidden-message">
                <p>
                    La Filière des Métiers du Bois, de l’Eau et de l’Environnement fut une annexe
                    de la Faculté d’Agronomie et de Sciences Agricoles de l’Université de Dschang
                    à Ebolowa, créée en 2009.
                </p>

                <p>
                    Suite au Décret N° 2022/003 du 05 janvier 2022 et au Décret N° 2022/009 du
                    09 janvier 2022, cette filière devient l’Institut Supérieur d’Agriculture,
                    du Bois, de l’Eau et de l’Environnement de l’Université d’Ebolowa.
                </p>

                <p>
                    L’ISABEE est aujourd’hui un pôle polytechnique d’excellence formant des
                    ingénieurs en Agronomie, Foresterie, Hydraulique, Énergies Renouvelables,
                    Génie Civil, Architecture, Génie Rural et Environnement.
                </p>
            </div>

            <button class="director-btn" id="directorBtn">
                Lire le message complet
            </button>
        </div>

        <div class="director-card">
            <img src="{{ asset('images/directeur.jpg') }}" alt="Directeur ISABEE">
            <div class="director-info">
                <h3>Pr. Philippe KOSMA</h3>
                <p>Directeur de l’ISABEE de l’Université d’Ebolowa</p>
            </div>
        </div>

    </div>
</section>

{{-- ANNONCES --}}
<section class="annonces-section reveal">
    <div class="container">

        <div class="section-title">
            <span>Communiqués</span>
            <h2>Informations importantes</h2>
            <p>Consultez les dernières annonces officielles de l’établissement.</p>
        </div>

        <div class="annonces-grid">
            @forelse($annonces as $annonce)
                <div class="annonce-card">
                    <div class="icon">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                    <a href="{{ $annonce->lien }}">{{ $annonce->titre }}</a>
                </div>
            @empty
                <div class="annonce-card">
                    <div class="icon">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                    <a href="#">Aucune annonce disponible pour le moment.</a>
                </div>
            @endforelse
        </div>

    </div>
</section>

{{-- STATISTIQUES --}}
<section class="stats-section reveal">
    <div class="container stats-grid">

        <div class="stat-card">
            <i class="fa-solid fa-user-graduate"></i>
            <h3 class="counter" data-target="3500">0</h3>
            <p>Étudiants</p>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-layer-group"></i>
            <h3 class="counter" data-target="25">0</h3>
            <p>Filières</p>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-chalkboard-user"></i>
            <h3 class="counter" data-target="120">0</h3>
            <p>Enseignants</p>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-handshake"></i>
            <h3 class="counter" data-target="15">0</h3>
            <p>Partenaires</p>
        </div>

    </div>
</section>

{{-- FORMATIONS --}}
<section class="formations-section reveal">
    <div class="container formation-grid">

        <div class="formation-left">
            <span class="section-label">Parcours académiques</span>
            <h2>Formations et accès</h2>
            <p>
                L’ISABEE propose des formations adaptées aux besoins du développement durable,
                de l’innovation agricole, de l’environnement et des métiers d’ingénierie.
            </p>

            <div class="formation-list">
                <div>
                    <i class="fa-solid fa-check"></i>
                    Classes préparatoires intégrées
                </div>

                <div>
                    <i class="fa-solid fa-check"></i>
                    Cycle Ingénieur
                </div>

                <div>
                    <i class="fa-solid fa-check"></i>
                    Licence, Master et Doctorat
                </div>

                <div>
                    <i class="fa-solid fa-check"></i>
                    Formation continue
                </div>
            </div>
        </div>

        <div class="accordion">

            <div class="accordion-item">
                <button class="accordion-header">
                    Cursus Ingénieur
                    <i class="fa-solid fa-plus"></i>
                </button>
                <div class="accordion-body">
                    Classes préparatoires intégrées pendant deux ans, suivies du cycle ingénieur pendant trois ans.
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">
                    Sciences de l’Ingénieur
                    <i class="fa-solid fa-plus"></i>
                </button>
                <div class="accordion-body">
                    Cycle Licence, Cycle Master et Cycle Doctorat dans les domaines scientifiques et techniques.
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">
                    Masters Professionnels et Recherche
                    <i class="fa-solid fa-plus"></i>
                </button>
                <div class="accordion-body">
                    Des parcours orientés vers la professionnalisation, la recherche appliquée et l’innovation.
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header">
                    Localisation
                    <i class="fa-solid fa-plus"></i>
                </button>
                <div class="accordion-body">
                    L’ISABEE est situé à Ebolowa, Campus principal PK17.
                </div>
            </div>

        </div>

    </div>
</section>

{{-- STAFF --}}
<section class="staff-section reveal">
    <div class="container">

        <div class="section-title">
            <span>Administration</span>
            <h2>Staff Administratif</h2>
            <p>L’équipe administrative engagée pour l’encadrement et l’accompagnement des étudiants.</p>
        </div>

        <div class="staff-grid">
            @forelse($personnels as $personnel)
                <div class="staff-card">
                    <img src="{{ asset('storage/' . $personnel->photo) }}" alt="{{ $personnel->nom }}">
                    <div class="staff-content">
                        <h3>{{ $personnel->nom }}</h3>
                        <p>{{ $personnel->poste }}</p>
                    </div>
                </div>
            @empty
                <p>Aucun personnel disponible pour le moment.</p>
            @endforelse
        </div>

    </div>
</section>

{{-- ACTUALITÉS --}}
<section class="news-section reveal">
    <div class="container">

        <div class="section-title">
            <span>Actualités</span>
            <h2>Actualités récentes</h2>
            <p>Retrouvez les dernières nouvelles de l’ISABEE.</p>
        </div>

        <div class="news-grid">
            @forelse($actualites as $actu)
                <article class="news-card">
                    <h3>{{ $actu->titre }}</h3>
                    <p>{{ $actu->contenu }}</p>

                    @if($actu->lien)
                        <a href="{{ $actu->lien }}">
                            Lire plus <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    @endif
                </article>
            @empty
                <article class="news-card">
                    <h3>Aucune actualité disponible</h3>
                    <p>Les actualités seront publiées prochainement.</p>
                </article>
            @endforelse
        </div>

    </div>
</section>

@endsection