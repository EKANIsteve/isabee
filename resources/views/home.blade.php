@extends('layouts.app')

@section('title', 'ISABEE - Université d’Ebolowa')

@section('content')

@php
    $heroSlides = [
        [
            'image' => 'slide1.jpg',
            'badge' => 'Concours officiel 2026',
            'title' => 'Concours ISABEE 2026',
            'text' => 'Entrée en première et troisième année à l’Institut Supérieur d’Agriculture, du Bois, de l’Eau et de l’Environnement de l’Université d’Ebolowa.',
            'primary_url' => route('concours.inscription'),
            'primary_text' => 'Commencer l’inscription',
            'primary_icon' => 'fa-graduation-cap',
            'secondary_url' => '#documents-isabee',
            'secondary_text' => 'Télécharger les PDF',
            'secondary_icon' => 'fa-file-pdf',
        ],
        [
            'image' => 'slide2.jpg',
            'badge' => 'Vie universitaire',
            'title' => 'Un institut polytechnique d’excellence',
            'text' => 'ISABEE forme des cadres capables de répondre aux défis du développement durable, de l’agriculture, de l’eau, du bois et de l’environnement.',
            'primary_url' => '#presentation-isabee',
            'primary_text' => 'Découvrir l’école',
            'primary_icon' => 'fa-school',
            'secondary_url' => '#formations-isabee',
            'secondary_text' => 'Nos formations',
            'secondary_icon' => 'fa-layer-group',
        ],
        [
            'image' => 'slide3.jpg',
            'badge' => 'Encadrement académique',
            'title' => 'Former les ingénieurs de demain',
            'text' => 'Un environnement académique moderne pour l’ingénierie, l’architecture, l’urbanisme, les sciences de l’eau et les technologies environnementales.',
            'primary_url' => '#formations-isabee',
            'primary_text' => 'Découvrir les filières',
            'primary_icon' => 'fa-layer-group',
            'secondary_url' => route('concours.inscription'),
            'secondary_text' => 'Postuler au concours',
            'secondary_icon' => 'fa-pen-to-square',
        ],
        [
            'image' => 'slide4.jpg',
            'badge' => 'Recherche et innovation',
            'title' => 'Une école tournée vers le terrain',
            'text' => 'Les formations combinent enseignements théoriques, pratiques, travaux de terrain, stages et projets professionnels.',
            'primary_url' => '#documents-isabee',
            'primary_text' => 'Documents officiels',
            'primary_icon' => 'fa-download',
            'secondary_url' => '#concours-2026',
            'secondary_text' => 'Infos concours',
            'secondary_icon' => 'fa-circle-info',
        ],
        [
            'image' => 'slide5.jpg',
            'badge' => 'Communauté ISABEE',
            'title' => 'Une communauté engagée',
            'text' => 'Étudiants, enseignants, administration et partenaires travaillent ensemble pour construire un avenir durable.',
            'primary_url' => '#presentation-isabee',
            'primary_text' => 'Présentation',
            'primary_icon' => 'fa-users',
            'secondary_url' => '#documents-isabee',
            'secondary_text' => 'Télécharger',
            'secondary_icon' => 'fa-file-pdf',
        ],
        [
            'image' => 'slide6.jpg',
            'badge' => 'Université d’Ebolowa',
            'title' => 'Votre porte d’entrée vers un avenir durable',
            'text' => 'Des formations scientifiques et techniques adaptées aux besoins du Cameroun et de la sous-région Afrique centrale.',
            'primary_url' => route('concours.inscription'),
            'primary_text' => 'Inscription en ligne',
            'primary_icon' => 'fa-graduation-cap',
            'secondary_url' => '#formations-isabee',
            'secondary_text' => 'Nos filières',
            'secondary_icon' => 'fa-sitemap',
        ],
        [
            'image' => 'slide7.jpg',
            'badge' => 'Agriculture et innovation',
            'title' => 'Former pour produire durablement',
            'text' => 'L’ISABEE accompagne la formation dans l’agriculture, l’élevage, les sciences halieutiques et les technologies du développement durable.',
            'primary_url' => '#formations-isabee',
            'primary_text' => 'Voir les filières',
            'primary_icon' => 'fa-seedling',
            'secondary_url' => '#documents-isabee',
            'secondary_text' => 'Brochures PDF',
            'secondary_icon' => 'fa-file-pdf',
        ],
        [
            'image' => 'slide8.jpg',
            'badge' => 'Génie et professionnalisation',
            'title' => 'Des formations pratiques et professionnelles',
            'text' => 'L’institut prépare les étudiants aux métiers de l’ingénierie, de l’eau, du bois, de l’environnement et de l’aménagement.',
            'primary_url' => '#presentation-isabee',
            'primary_text' => 'En savoir plus',
            'primary_icon' => 'fa-circle-info',
            'secondary_url' => route('concours.inscription'),
            'secondary_text' => 'Candidater',
            'secondary_icon' => 'fa-pen-to-square',
        ],
        [
            'image' => 'slide9.jpg',
            'badge' => 'Génie civil et habitat',
            'title' => 'Architecture, urbanisme et génie de l’habitat',
            'text' => 'ISABEE forme des profils capables de concevoir, planifier et construire des espaces durables.',
            'primary_url' => '#formations-isabee',
            'primary_text' => 'Parcours de formation',
            'primary_icon' => 'fa-city',
            'secondary_url' => '#concours-2026',
            'secondary_text' => 'Concours 2026',
            'secondary_icon' => 'fa-calendar-check',
        ],
        [
            'image' => 'slide10.jpg',
            'badge' => 'Campus et apprentissage',
            'title' => 'Un cadre de formation moderne',
            'text' => 'Les campus et les équipes pédagogiques favorisent un apprentissage appliqué, rigoureux et orienté vers l’emploi.',
            'primary_url' => '#presentation-isabee',
            'primary_text' => 'Découvrir ISABEE',
            'primary_icon' => 'fa-school',
            'secondary_url' => '#documents-isabee',
            'secondary_text' => 'Documents',
            'secondary_icon' => 'fa-download',
        ],
        [
            'image' => 'slide11.jpg',
            'badge' => 'Eau et environnement',
            'title' => 'Répondre aux défis de l’eau',
            'text' => 'Hydraulique, sciences et technologies de l’eau occupent une place importante dans les formations proposées.',
            'primary_url' => '#formations-isabee',
            'primary_text' => 'Voir les spécialités',
            'primary_icon' => 'fa-water',
            'secondary_url' => '#documents-isabee',
            'secondary_text' => 'Télécharger PDF',
            'secondary_icon' => 'fa-file-pdf',
        ],
        [
            'image' => 'slide12.jpg',
            'badge' => 'Énergies renouvelables',
            'title' => 'Innover pour l’énergie durable',
            'text' => 'L’institut développe des formations en énergies renouvelables, environnement et technologies adaptées aux enjeux actuels.',
            'primary_url' => '#formations-isabee',
            'primary_text' => 'Nos formations',
            'primary_icon' => 'fa-solar-panel',
            'secondary_url' => route('concours.inscription'),
            'secondary_text' => 'Inscription',
            'secondary_icon' => 'fa-pen-to-square',
        ],
        [
            'image' => 'slide13.jpg',
            'badge' => 'Sciences appliquées',
            'title' => 'Des laboratoires et des projets de terrain',
            'text' => 'Les étudiants sont préparés aux réalités professionnelles grâce aux enseignements pratiques et aux projets supervisés.',
            'primary_url' => '#presentation-isabee',
            'primary_text' => 'Présentation',
            'primary_icon' => 'fa-flask',
            'secondary_url' => '#documents-isabee',
            'secondary_text' => 'Livret ISABEE',
            'secondary_icon' => 'fa-book-open',
        ],
        [
            'image' => 'slide14.jpg',
            'badge' => 'Formation continue',
            'title' => 'Se former tout au long de la vie',
            'text' => 'ISABEE propose aussi des parcours de formation continue, de certification et de professionnalisation.',
            'primary_url' => route('formation.continue'),
            'primary_text' => 'Formation continue',
            'primary_icon' => 'fa-book-open',
            'secondary_url' => '#documents-isabee',
            'secondary_text' => 'Documents PDF',
            'secondary_icon' => 'fa-download',
        ],
    ];
@endphp

{{-- HERO SLIDER --}}
<section class="hero-section reveal-zoom">
    <div class="hero-slider">
        @foreach($heroSlides as $index => $slide)
            <div class="hero-slide {{ $index === 0 ? 'active' : '' }}">
                <img src="{{ asset('images/slider/' . $slide['image']) }}" alt="{{ $slide['title'] }}">

                <div class="hero-overlay"></div>

                <div class="hero-content">
                    <span>{{ $slide['badge'] }}</span>

                    <h2>{{ $slide['title'] }}</h2>

                    <p>{{ $slide['text'] }}</p>

                    <div class="hero-actions">
                        <a href="{{ $slide['primary_url'] }}" class="btn btn-red">
                            <i class="fa-solid {{ $slide['primary_icon'] }}"></i>
                            {{ $slide['primary_text'] }}
                        </a>

                        <a href="{{ $slide['secondary_url'] }}" class="btn btn-green">
                            <i class="fa-solid {{ $slide['secondary_icon'] }}"></i>
                            {{ $slide['secondary_text'] }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <button class="hero-arrow hero-prev" id="heroPrev" type="button" aria-label="Image précédente">
        <i class="fa-solid fa-chevron-left"></i>
    </button>

    <button class="hero-arrow hero-next" id="heroNext" type="button" aria-label="Image suivante">
        <i class="fa-solid fa-chevron-right"></i>
    </button>

    <div class="hero-dots">
        @foreach($heroSlides as $index => $slide)
            <button class="hero-dot {{ $index === 0 ? 'active' : '' }}" type="button" aria-label="Aller à l’image {{ $index + 1 }}"></button>
        @endforeach
    </div>
</section>

{{-- CONCOURS 2026 --}}
<section class="concours-highlight reveal" id="concours-2026">
    <div class="container concours-highlight-grid">

        <div class="concours-highlight-card">
            <span class="mini-label">Concours ISABEE 2026</span>

            <h2>Entrée en première et troisième année</h2>

            <p>
                Le concours ISABEE 2026 est ouvert aux candidats souhaitant intégrer les cycles
                d’ingénieurs, d’architectes et d’urbanistes de l’Université d’Ebolowa.
                Les frais de concours sont payables à la CCA Bank Cameroun contre récépissé.
            </p>

            <div class="date-grid">
                <div>
                    <strong>25 Octobre 2026</strong>
                    <span>Date du concours</span>
                </div>

                <div>
                    <strong>22 Octobre 2026</strong>
                    <span>Date limite de dépôt des dossiers</span>
                </div>
            </div>

            <a href="{{ route('concours.inscription') }}" class="highlight-btn">
                Commencer l’inscription
            </a>
        </div>

        <div class="places-grid">
            <div>
                <strong>325</strong>
                <span>Places élèves-ingénieurs</span>
            </div>

            <div>
                <strong>25</strong>
                <span>Places élèves-architectes</span>
            </div>

            <div>
                <strong>20</strong>
                <span>Places élèves-urbanistes</span>
            </div>

            <div>
                <strong>20 000 FCFA</strong>
                <span>Frais de concours</span>
            </div>
        </div>

    </div>
</section>

{{-- DOCUMENTS PDF --}}
@include('partials.home_documents_section')

{{-- STATISTIQUES --}}
<section class="stats-section reveal">
    <div class="container stats-grid">

        <div class="stat-card">
            <i class="fa-solid fa-school"></i>
            <h3 class="counter" data-target="2">0</h3>
            <p>Campus</p>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-user-graduate"></i>
            <h3 class="counter" data-target="2494">0</h3>
            <p>Étudiants internes</p>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-users"></i>
            <h3 class="counter" data-target="1208">0</h3>
            <p>Étudiants externes</p>
        </div>

        <div class="stat-card">
            <i class="fa-solid fa-layer-group"></i>
            <h3 class="counter" data-target="10">0</h3>
            <p>Domaines de formation</p>
        </div>

    </div>
</section>

{{-- PRÉSENTATION --}}
<section class="director-section reveal" id="presentation-isabee">
    <div class="container director-grid">

        <div class="director-text">
            <span class="section-label">Présentation officielle</span>

            <h2>Bienvenue à l’ISABEE</h2>

            <div id="directorShort">
                <p>
                    L’Institut Supérieur d’Agriculture, du Bois, de l’Eau et de l’Environnement
                    de l’Université d’Ebolowa est un établissement à vocation scientifique,
                    technologique et professionnelle.
                </p>

                <p>
                    Sa mission est de former des ingénieurs, architectes et urbanistes capables
                    de répondre aux défis du développement durable, de la gestion de l’eau,
                    de la protection de l’environnement, de l’agriculture et de l’innovation.
                </p>
            </div>

            <div id="directorFull" class="hidden-message">
                <p>
                    L’ISABEE propose des formations dans les domaines de l’agriculture, de l’élevage,
                    des sciences halieutiques, de la foresterie, des technologies du bois,
                    de l’hydraulique, des énergies renouvelables, de l’environnement,
                    de la météorologie, de l’urbanisme, de l’architecture et du génie rural.
                </p>

                <p>
                    L’institut dispose de deux lieux de formation : le campus de Metyikpwalè
                    à Ebolowa et le campus de Meyomessala.
                </p>
            </div>

            <button class="director-btn" id="directorBtn" type="button">
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
            @forelse(($annonces ?? collect()) as $annonce)
                <div class="annonce-card">
                    <div class="icon">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>

                    <a href="{{ $annonce->lien ?? '#' }}">{{ $annonce->titre }}</a>
                </div>
            @empty
                <div class="annonce-card">
                    <div class="icon">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>

                    <a href="{{ route('concours.inscription') }}">
                        Concours ISABEE 2026 : les inscriptions en ligne sont ouvertes.
                    </a>
                </div>

                <div class="annonce-card">
                    <div class="icon">
                        <i class="fa-solid fa-file-pdf"></i>
                    </div>

                    <a href="#documents-isabee">
                        Téléchargez les documents officiels du concours et de présentation.
                    </a>
                </div>
            @endforelse
        </div>

    </div>
</section>

{{-- FORMATIONS --}}
<section class="formations-section reveal" id="formations-isabee">
    <div class="container formation-grid">

        <div class="formation-left">
            <span class="section-label">Parcours académiques</span>

            <h2>Formations et filières</h2>

            <p>
                L’ISABEE propose des formations adaptées aux besoins du développement durable,
                de l’innovation agricole, de l’environnement, de l’eau, du bois et des métiers
                d’ingénierie.
            </p>

            <div class="formation-list">
                <div><i class="fa-solid fa-check"></i> Agriculture, Élevage et Sciences Halieutiques</div>
                <div><i class="fa-solid fa-check"></i> Hydraulique, Sciences et Technologies de l’Eau</div>
                <div><i class="fa-solid fa-check"></i> Foresterie, Sciences et Technologies du Bois</div>
                <div><i class="fa-solid fa-check"></i> Énergies Renouvelables et Sciences de l’Environnement</div>
                <div><i class="fa-solid fa-check"></i> Génie de l’Habitat, Architecture et Urbanisme</div>
            </div>
        </div>

        <div class="accordion">

            <div class="accordion-item">
                <button class="accordion-header" type="button">
                    Cycle Ingénieur
                    <i class="fa-solid fa-plus"></i>
                </button>

                <div class="accordion-body">
                    Formation initiale orientée vers les sciences de l’ingénieur, les travaux pratiques,
                    les stages et le projet de fin de formation.
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header" type="button">
                    Architecture et Urbanisme
                    <i class="fa-solid fa-plus"></i>
                </button>

                <div class="accordion-body">
                    Formation des architectes et urbanistes capables de contribuer à l’aménagement durable
                    des villes et des territoires.
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header" type="button">
                    Formation Continue
                    <i class="fa-solid fa-plus"></i>
                </button>

                <div class="accordion-body">
                    Programmes de certification, BTS/HND, Licences professionnelles,
                    Masters professionnels et formations spécialisées.
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-header" type="button">
                    Campus
                    <i class="fa-solid fa-plus"></i>
                </button>

                <div class="accordion-body">
                    Les formations se déroulent principalement au campus de Metyikpwalè à Ebolowa
                    et au campus de Meyomessala.
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ACTUALITÉS --}}
<section class="news-section reveal">
    <div class="container">

        <div class="section-title">
            <span>Actualités</span>
            <h2>Vie de l’institut</h2>
            <p>Suivez les informations académiques, scientifiques et institutionnelles de l’ISABEE.</p>
        </div>

        <div class="news-grid">
            <div class="news-card">
                <h3>Concours ISABEE 2026</h3>

                <p>
                    Les candidats peuvent effectuer leur préinscription en ligne après paiement
                    des frais de concours à la CCA Bank Cameroun.
                </p>

                <a href="{{ route('concours.inscription') }}">
                    Commencer l’inscription
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div class="news-card">
                <h3>Documents officiels</h3>

                <p>
                    Les flyers, livrets de présentation et documents de formation sont disponibles
                    en téléchargement sur la page d’accueil.
                </p>

                <a href="#documents-isabee">
                    Télécharger les documents
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div class="news-card">
                <h3>Formation continue</h3>

                <p>
                    Découvrez les programmes de formation continue, les certifications,
                    les BTS/HND et les masters professionnels proposés par l’institut.
                </p>

                <a href="{{ route('formation.continue') }}">
                    Voir la formation continue
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

    </div>
</section>

@endsection
