{{-- DOCUMENTS PDF --}}
<section class="documents-section reveal" id="documents-isabee">
    <div class="container">

        <div class="section-title">
            <span>Documents officiels</span>
            <h2>Télécharger les documents</h2>
            <p>
                Téléchargez les communiqués officiels, les appels à candidatures et les documents
                de présentation de l’ISABEE pour l’année académique 2026–2027.
            </p>
        </div>

        <div class="documents-grid">

            {{-- FLYER PUBLICITAIRE --}}
            <div class="document-card">
                <div class="document-icon">
                    <i class="fa-solid fa-image"></i>
                </div>

                <h3>Flyer ISABEE 2026–2027</h3>

                <p>
                    Affiche professionnelle de l’appel à candidatures, téléchargeable et partageable
                    dans les groupes WhatsApp, Facebook et autres plateformes.
                </p>

                @if(file_exists(public_path('images/flyers/flyer-isabee-2026-2027.png')))
                    <a href="{{ asset('images/flyers/flyer-isabee-2026-2027.png') }}"
                       class="download-btn"
                       download>
                        <i class="fa-solid fa-download"></i>
                        Télécharger
                    </a>
                @else
                    <span class="download-btn disabled">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Flyer non disponible
                    </span>
                @endif
            </div>

            {{-- BTS --}}
            <div class="document-card">
                <div class="document-icon">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>

                <h3>Communiqué BTS 2026–2027</h3>

                <p>
                    Appel à candidature pour le recrutement de 320 étudiants en première année
                    du cycle BTS en Formation Continue.
                </p>

                @if(file_exists(public_path('documents/communiques/communique-bts-isabee-2026-2027.pdf')))
                    <a href="{{ asset('documents/communiques/communique-bts-isabee-2026-2027.pdf') }}"
                       class="download-btn"
                       download>
                        <i class="fa-solid fa-download"></i>
                        Télécharger
                    </a>
                @else
                    <span class="download-btn disabled">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Document non disponible
                    </span>
                @endif
            </div>

            {{-- LICENCE PROFESSIONNELLE --}}
            <div class="document-card">
                <div class="document-icon">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>

                <h3>Communiqué Licence Professionnelle</h3>

                <p>
                    Appel à candidature pour le recrutement de 220 étudiants en troisième année
                    de Licence Professionnelle.
                </p>

                @if(file_exists(public_path('documents/communiques/communique-licence-professionnelle-isabee-2026-2027.pdf')))
                    <a href="{{ asset('documents/communiques/communique-licence-professionnelle-isabee-2026-2027.pdf') }}"
                       class="download-btn"
                       download>
                        <i class="fa-solid fa-download"></i>
                        Télécharger
                    </a>
                @else
                    <span class="download-btn disabled">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Document non disponible
                    </span>
                @endif
            </div>

            {{-- MASTER PROFESSIONNEL --}}
            <div class="document-card">
                <div class="document-icon">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>

                <h3>Communiqué Master Professionnel</h3>

                <p>
                    Appel à candidature pour le recrutement de 180 étudiants en première année
                    de Master Professionnel.
                </p>

                @if(file_exists(public_path('documents/communiques/communique-master-professionnel-isabee-2026-2027.pdf')))
                    <a href="{{ asset('documents/communiques/communique-master-professionnel-isabee-2026-2027.pdf') }}"
                       class="download-btn"
                       download>
                        <i class="fa-solid fa-download"></i>
                        Télécharger
                    </a>
                @else
                    <span class="download-btn disabled">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Document non disponible
                    </span>
                @endif
            </div>

            {{-- MASTER INTERNATIONAL ANC --}}
            <div class="document-card">
                <div class="document-icon">
                    <i class="fa-solid fa-water"></i>
                </div>

                <h3>Master International ANC</h3>

                <p>
                    Appel à candidature pour le recrutement de 30 étudiants en Master International
                    en Assainissement Non Collectif.
                </p>

                @if(file_exists(public_path('documents/communiques/communique-master-international-anc-isabee-2026-2027.pdf')))
                    <a href="{{ asset('documents/communiques/communique-master-international-anc-isabee-2026-2027.pdf') }}"
                       class="download-btn"
                       download>
                        <i class="fa-solid fa-download"></i>
                        Télécharger
                    </a>
                @else
                    <span class="download-btn disabled">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Document non disponible
                    </span>
                @endif
            </div>

            {{-- FORMATION CERTIFIANTE --}}
            <div class="document-card">
                <div class="document-icon">
                    <i class="fa-solid fa-certificate"></i>
                </div>

                <h3>Communiqué Formation Certifiante</h3>

                <p>
                    Appel à candidature pour le recrutement de 105 postulants en cycle de formation
                    certifiante.
                </p>

                @if(file_exists(public_path('documents/communiques/communique-formation-certifiante-isabee-2026-2027.pdf')))
                    <a href="{{ asset('documents/communiques/communique-formation-certifiante-isabee-2026-2027.pdf') }}"
                       class="download-btn"
                       download>
                        <i class="fa-solid fa-download"></i>
                        Télécharger
                    </a>
                @else
                    <span class="download-btn disabled">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Document non disponible
                    </span>
                @endif
            </div>

            {{-- ANCIENS DOCUMENTS SI TU VEUX LES GARDER --}}
            <div class="document-card">
                <div class="document-icon">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>

                <h3>Flyer Concours ISABEE 2026</h3>

                <p>
                    Flyer officiel du concours : filières, places disponibles, frais,
                    épreuves, centres et composition du dossier.
                </p>

                @if(file_exists(public_path('documents/flyer-concours-isabee-2026.pdf')))
                    <a href="{{ asset('documents/flyer-concours-isabee-2026.pdf') }}"
                       class="download-btn"
                       download>
                        <i class="fa-solid fa-download"></i>
                        Télécharger
                    </a>
                @else
                    <span class="download-btn disabled">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Document non disponible
                    </span>
                @endif
            </div>

            <div class="document-card">
                <div class="document-icon">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>

                <h3>Communiqué - Première année</h3>

                <p>
                    Décision officielle portant ouverture du concours d’entrée en première année :
                    conditions d’accès, épreuves et places disponibles.
                </p>

                @if(file_exists(public_path('documents/communique-concours-isabee-premiere-annee-2026.pdf')))
                    <a href="{{ asset('documents/communique-concours-isabee-premiere-annee-2026.pdf') }}"
                       class="download-btn"
                       download>
                        <i class="fa-solid fa-download"></i>
                        Télécharger
                    </a>
                @else
                    <span class="download-btn disabled">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Document non disponible
                    </span>
                @endif
            </div>

            <div class="document-card">
                <div class="document-icon">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>

                <h3>Communiqué - Troisième année</h3>

                <p>
                    Décision officielle portant ouverture du concours d’entrée en troisième année :
                    diplômes requis, épreuves et places disponibles.
                </p>

                @if(file_exists(public_path('documents/communique-concours-isabee-troisieme-annee-2026.pdf')))
                    <a href="{{ asset('documents/communique-concours-isabee-troisieme-annee-2026.pdf') }}"
                       class="download-btn"
                       download>
                        <i class="fa-solid fa-download"></i>
                        Télécharger
                    </a>
                @else
                    <span class="download-btn disabled">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Document non disponible
                    </span>
                @endif
            </div>

            <div class="document-card">
                <div class="document-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <h3>Livret de présentation ISABEE</h3>

                <p>
                    Présentation de l’institut, des campus, des formations, des missions,
                    des statistiques et de l’organisation de l’école.
                </p>

                @if(file_exists(public_path('documents/livret-isabee-2026-anglais.pdf')))
                    <a href="{{ asset('documents/livret-isabee-2026-anglais.pdf') }}"
                       class="download-btn"
                       download>
                        <i class="fa-solid fa-download"></i>
                        Télécharger
                    </a>
                @else
                    <span class="download-btn disabled">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Document non disponible
                    </span>
                @endif
            </div>

            <div class="document-card">
                <div class="document-icon">
                    <i class="fa-solid fa-water"></i>
                </div>

                <h3>Livret Master International ANC</h3>

                <p>
                    Document du programme de Master International en Assainissement Non Collectif,
                    avec les objectifs, conditions et informations de candidature.
                </p>

                @if(file_exists(public_path('documents/livret-master-international-anc.pdf')))
                    <a href="{{ asset('documents/livret-master-international-anc.pdf') }}"
                       class="download-btn"
                       download>
                        <i class="fa-solid fa-download"></i>
                        Télécharger
                    </a>
                @else
                    <span class="download-btn disabled">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Document non disponible
                    </span>
                @endif
            </div>

        </div>
    </div>
</section>