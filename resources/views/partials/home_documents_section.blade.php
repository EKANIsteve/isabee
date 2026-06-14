{{-- DOCUMENTS PDF --}}
<section class="documents-section reveal" id="documents-isabee">
    <div class="container">

        <div class="section-title">
            <span>Documents officiels</span>
            <h2>Télécharger les documents</h2>
            <p>
                Téléchargez les documents officiels du concours ISABEE 2026 et les livrets de présentation.
            </p>
        </div>

        <div class="documents-grid">

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
                    <a href="{{ asset('documents/flyer-concours-isabee-2026.pdf') }}" class="download-btn" download>
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
                    <a href="{{ asset('documents/communique-concours-isabee-premiere-annee-2026.pdf') }}" class="download-btn" download>
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
                    <a href="{{ asset('documents/communique-concours-isabee-troisieme-annee-2026.pdf') }}" class="download-btn" download>
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
                    <a href="{{ asset('documents/livret-isabee-2026-anglais.pdf') }}" class="download-btn" download>
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

                <h3>Master International ANC</h3>

                <p>
                    Document du programme de Master International en Assainissement Non Collectif,
                    avec les objectifs, conditions et informations de candidature.
                </p>

                @if(file_exists(public_path('documents/livret-master-international-anc.pdf')))
                    <a href="{{ asset('documents/livret-master-international-anc.pdf') }}" class="download-btn" download>
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
