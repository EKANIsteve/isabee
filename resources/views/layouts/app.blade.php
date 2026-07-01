<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <title>@yield('title', 'ISABEE - Université d’Ebolowa')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- CSS public concours si ton formulaire concours l’utilise encore --}}
    <link rel="stylesheet" href="{{ asset('css/concours.css') }}?v={{ time() }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @stack('styles')
</head>

<body>

{{-- PRELOADER --}}
<div id="preloader" class="preloader">
    <div class="preloader-card">
        <img src="{{ asset('images/logo.jpg') }}" alt="ISABEE">
        <div class="loader-ring"></div>
        <p>Chargement de la page...</p>
    </div>
</div>

{{-- TOP BAR --}}
<div class="topbar">
    <div class="topbar-text">
        Bienvenue à l’Institut Supérieur d’Agriculture, du Bois, de l’Eau et de l’Environnement de l’Université d’Ebolowa
    </div>
</div>

{{-- INFO BAR --}}
<div class="info-bar">
    <div class="info-contact">
        <span><i class="fa-solid fa-location-dot"></i> BP: 118 Ebolowa, Cameroun</span>
        <span><i class="fa-solid fa-phone"></i> +237 694 193 607 / 677 079 747</span>
        <span><i class="fa-solid fa-envelope"></i> contact@isabee.cm</span>
    </div>

    <div class="info-news">
        <marquee behavior="scroll" direction="left">
            @isset($annonces)
                @forelse($annonces as $annonce)
                    <a href="{{ $annonce->lien ?? '#' }}">{{ $annonce->titre }}</a>
                    &nbsp; — &nbsp;
                @empty
                    Concours ISABEE 2026 — Inscriptions ouvertes — Date du concours : 25 octobre 2026 —
                @endforelse
            @else
                Concours ISABEE 2026 — Inscriptions ouvertes — Date du concours : 25 octobre 2026 —
            @endisset
        </marquee>
    </div>
</div>

{{-- HEADER --}}
<header class="main-header">
    <div class="container header-inner">

        <a href="{{ url('/') }}" class="brand">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo ISABEE">

            <div>
                <h1>ISABEE</h1>
                <p>Université d’Ebolowa</p>
            </div>
        </a>

        <button class="menu-toggle" id="menuToggle" type="button">
            <i class="fa-solid fa-bars"></i>
        </button>

        <nav class="main-nav" id="mainNav">
            <ul>
                <li>
                    <a href="{{ url('/') }}">Accueil</a>
                </li>

                <li class="dropdown">
                    <a href="#">
                        Formations
                        <i class="fa-solid fa-angle-down"></i>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="#">Cycle Ingénieur</a></li>
                        <li><a href="#">Architecture</a></li>
                        <li><a href="#">Urbanisme</a></li>
                        <li><a href="{{ route('formation.continue') }}">Formation Continue</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">
                        Départements
                        <i class="fa-solid fa-angle-down"></i>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="#">Agriculture, Élevage et Sciences Halieutiques</a></li>
                        <li><a href="#">Foresterie et Sciences du Bois</a></li>
                        <li><a href="#">Hydraulique et Sciences de l’Eau</a></li>
                        <li><a href="#">Sciences de l’Environnement</a></li>
                        <li><a href="#">Énergies Renouvelables</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">Scolarité</a>
                </li>

                <li class="dropdown">
                    <a href="#">
                        Concours
                        <i class="fa-solid fa-angle-down"></i>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/concours/admission') }}">Admission</a></li>
                        <li><a href="{{ url('/concours/communique') }}">Communiqué</a></li>
                        <li><a href="{{ route('concours.inscription') }}">Inscription</a></li>
                        <li><a href="{{ url('/concours/liste-provisoire') }}">Liste provisoire</a></li>
                        <li><a href="{{ url('/concours/resultat') }}">Résultat</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">Actualités</a>
                </li>

                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </nav>

    </div>
</header>

{{-- CONTENU --}}
<main>
    @yield('content')
</main>

{{-- FOOTER --}}
{{-- FOOTER --}}
<footer class="footer-pro" id="footerPro">

    <div class="footer-wave">
        <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0,64 C240,120 480,0 720,48 C960,96 1200,16 1440,72 L1440,120 L0,120 Z"></path>
        </svg>
    </div>

    <div class="footer-animated-bg">
        <span class="footer-orb orb-1"></span>
        <span class="footer-orb orb-2"></span>
        <span class="footer-orb orb-3"></span>
        <i class="fa-solid fa-leaf footer-floating-icon icon-1"></i>
        <i class="fa-solid fa-water footer-floating-icon icon-2"></i>
        <i class="fa-solid fa-seedling footer-floating-icon icon-3"></i>
    </div>

    <div class="container footer-main">

        <div class="footer-brand footer-animate">
            <div class="footer-logo-box">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo ISABEE">

                <div>
                    <h3>ISABEE</h3>
                    <span>Université d’Ebolowa</span>
                </div>
            </div>

            <p>
                Institut Supérieur d’Agriculture, du Bois, de l’Eau et de l’Environnement.
                Un pôle polytechnique d’excellence dédié à la formation, la recherche,
                l’innovation et au développement durable.
            </p>

            <div class="footer-socials">
                <a href="#" aria-label="Facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="#" aria-label="X">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>

                <a href="#" aria-label="LinkedIn">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>

                <a href="#" aria-label="YouTube">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </div>
        </div>

        <div class="footer-column footer-animate">
            <h4>Liens rapides</h4>

            <ul>
                <li>
                    <a href="{{ url('/') }}">
                        <i class="fa-solid fa-angle-right"></i>
                        Accueil
                    </a>
                </li>

                <li>
                    <a href="#formations-isabee">
                        <i class="fa-solid fa-angle-right"></i>
                        Formations
                    </a>
                </li>

                <li>
                    <a href="#documents-isabee">
                        <i class="fa-solid fa-angle-right"></i>
                        Documents officiels
                    </a>
                </li>

                <li>
                    <a href="{{ route('concours.inscription') }}">
                        <i class="fa-solid fa-angle-right"></i>
                        Inscription concours
                    </a>
                </li>

                <li>
                    <a href="#presentation-isabee">
                        <i class="fa-solid fa-angle-right"></i>
                        Présentation
                    </a>
                </li>
            </ul>
        </div>

        <div class="footer-column footer-animate">
            <h4>Formations</h4>

            <ul>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-angle-right"></i>
                        Agriculture & Élevage
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa-solid fa-angle-right"></i>
                        Sciences du bois
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa-solid fa-angle-right"></i>
                        Gestion de l’eau
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa-solid fa-angle-right"></i>
                        Environnement
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa-solid fa-angle-right"></i>
                        Génie Civil & Habitat
                    </a>
                </li>
            </ul>
        </div>

        <div class="footer-contact footer-animate">
            <h4>Contact</h4>

            <div class="contact-item">
                <i class="fa-solid fa-location-dot"></i>

                <div>
                    <strong>Adresse</strong>
                    <span>BP 118, Ebolowa, Cameroun</span>
                </div>
            </div>

            <div class="contact-item">
                <i class="fa-solid fa-envelope"></i>

                <div>
                    <strong>Email</strong>
                    <span>contact@isabee.cm</span>
                </div>
            </div>

            <div class="contact-item">
                <i class="fa-solid fa-phone"></i>

                <div>
                    <strong>Téléphone</strong>
                    <span>+237 694 193 607 / 677 079 747</span>
                </div>
            </div>

            <div class="footer-cta-box">
                <span>Admissions 2026–2027</span>

                <a href="{{ route('concours.inscription') }}">
                    Postuler maintenant
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

    </div>

    <div class="footer-bottom-pro">
        <div class="container footer-bottom-inner">
            <p>
                © {{ date('Y') }} ISABEE Ebolowa - Tous droits réservés.
            </p>

            <div>
                <a href="#">Politique de confidentialité</a>
                <span>|</span>
                <a href="#">Mentions légales</a>
            </div>
        </div>
    </div>

    <button id="backToTop" class="back-to-top" type="button" aria-label="Retour en haut">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

</footer>

{{-- JS public si tes pages concours en dépendent encore --}}
<script src="{{ asset('js/concours.js') }}" defer></script>
<script src="{{ asset('js/inscription.js') }}" defer></script>

@stack('scripts')

</body>
</html>