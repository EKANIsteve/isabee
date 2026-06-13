<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">

<style>
@page {
    margin: 18px 22px 82px 22px;
}

* {
    box-sizing: border-box;
}

body {
    font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
    font-size: 10px;
    color: #111827;
    background: #ffffff;
}

/* =========================
   COULEURS ISABEE
========================= */

:root {
    --green: #0b7a4b;
    --dark-green: #063f2b;
    --light-green: #eaf8f0;
    --yellow: #f4c430;
    --blue: #28a9e0;
    --gray: #6b7280;
    --border: #d1d5db;
}

/* =========================
   WATERMARK
========================= */

.watermark {
    position: fixed;
    top: 38%;
    left: 0;
    width: 100%;
    text-align: center;
    font-size: 78px;
    color: #0b7a4b;
    opacity: 0.055;
    transform: rotate(-35deg);
    z-index: -1;
    font-weight: bold;
}

/* =========================
   HEADER OFFICIEL
========================= */

.official-header {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 6px;
}

.official-header td {
    width: 33.33%;
    vertical-align: middle;
    text-align: center;
    font-size: 8.5px;
    line-height: 11.5px;
}

.logo-zone {
    text-align: center;
}

.logo-box {
    display: inline-block;
    border: 1.5px solid #0b7a4b;
    border-radius: 8px;
    padding: 5px;
    background: #ffffff;
}

.logo-box img {
    max-height: 68px;
    max-width: 90px;
}

.school-name {
    margin-top: 4px;
    font-size: 10px;
    font-weight: bold;
    color: #063f2b;
}

.header-line {
    width: 100%;
    height: 5px;
    margin: 6px 0 8px;
    background: #0b7a4b;
    border-bottom: 2px solid #f4c430;
}

/* =========================
   TITRE DOCUMENT
========================= */

.document-title {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 8px;
}

.title-main {
    background: #063f2b;
    color: white;
    text-align: center;
    padding: 9px 10px;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
    border-radius: 6px 6px 0 0;
}

.title-sub {
    background: #0b7a4b;
    color: #eaf8f0;
    text-align: center;
    padding: 5px 10px;
    font-size: 8.5px;
    font-style: italic;
    border-radius: 0 0 6px 6px;
}

/* =========================
   BARRE NUMERO
========================= */

.meta-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 8px;
}

.meta-table td {
    border: 1px solid #d1d5db;
    padding: 6px;
    vertical-align: middle;
}

.meta-label {
    font-weight: bold;
    color: #063f2b;
}

.numero-box {
    background: #f4c430;
    color: #063f2b;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 1px;
}

/* =========================
   CARTE PRINCIPALE
========================= */

.profile-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 9px;
}

.profile-table td {
    border: 1px solid #d1d5db;
    vertical-align: top;
}

.photo-cell {
    width: 23%;
    text-align: center;
    padding: 7px;
    background: #f9fafb;
}

.photo-frame {
    width: 120px;
    height: 140px;
    border: 2px solid #0b7a4b;
    border-radius: 6px;
    margin: 0 auto 6px;
    text-align: center;
    vertical-align: middle;
    overflow: hidden;
    background: #ffffff;
}

.photo-frame img {
    width: 116px;
    height: 136px;
    object-fit: cover;
}

.photo-placeholder {
    padding-top: 55px;
    font-weight: bold;
    color: #6b7280;
}

.photo-caption {
    font-size: 8px;
    color: #6b7280;
}

.profile-info {
    width: 77%;
    padding: 0;
}

.info-summary-table {
    width: 100%;
    border-collapse: collapse;
}

.info-summary-table td {
    border: 1px solid #e5e7eb;
    padding: 6px;
}

.summary-label {
    color: #063f2b;
    font-weight: bold;
}

.summary-value {
    font-weight: bold;
    color: #111827;
}

/* =========================
   SECTIONS
========================= */

.section-title {
    background: #063f2b;
    color: white;
    padding: 6px 8px;
    font-size: 10px;
    font-weight: bold;
    margin-top: 8px;
    border-left: 6px solid #f4c430;
    text-transform: uppercase;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table td {
    border: 1px solid #d1d5db;
    padding: 5.5px;
    vertical-align: top;
    line-height: 13px;
}

.data-table .label {
    font-weight: bold;
    color: #063f2b;
}

.data-table .value {
    color: #111827;
}

/* =========================
   DOCUMENTS
========================= */

.document-status {
    display: inline-block;
    background: #eaf8f0;
    color: #063f2b;
    border: 1px solid #0b7a4b;
    padding: 3px 6px;
    border-radius: 4px;
    font-weight: bold;
}

/* =========================
   DECLARATION
========================= */

.declaration-box {
    margin-top: 10px;
    border: 1px solid #0b7a4b;
    background: #f8fafc;
    padding: 8px;
    line-height: 14px;
    border-radius: 6px;
    font-size: 9.5px;
}

.declaration-box strong {
    color: #063f2b;
}

/* =========================
   SIGNATURES
========================= */

.signature-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 12px;
}

.signature-table td {
    width: 33.33%;
    text-align: center;
    vertical-align: top;
    padding: 8px 5px 0;
    font-size: 9px;
}

.signature-line {
    margin-top: 28px;
    border-top: 1px solid #111827;
    padding-top: 4px;
    font-weight: bold;
}

/* =========================
   QR CODE
========================= */

.qr-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 6px;
}

.qr-table td {
    vertical-align: bottom;
}

.qr-note {
    font-size: 8.5px;
    color: #6b7280;
    line-height: 12px;
}

.qr-box {
    text-align: right;
}

.qr-box img {
    width: 72px;
}

/* =========================
   FOOTER FIXE
========================= */

footer {
    position: fixed;
    bottom: -65px;
    left: 0;
    right: 0;
    font-size: 8.5px;
}

.footer-line {
    height: 4px;
    background: #0b7a4b;
    border-bottom: 2px solid #f4c430;
    margin-bottom: 4px;
}

.footer-table {
    width: 100%;
    border-collapse: collapse;
}

.footer-table td {
    padding: 2px;
    vertical-align: middle;
}

.text-center {
    text-align: center;
}

.text-right {
    text-align: right;
}

.barcode-img {
    width: 125px;
    height: 12px;
}

.page-number {
    font-size: 8px;
}
</style>
</head>

<body>

<div class="watermark">ISABEE 2026</div>

{{-- =========================
     HEADER OFFICIEL
========================= --}}
<table class="official-header">
    <tr>
        <td>
            <strong>République du Cameroun</strong><br>
            Paix – Travail – Patrie<br>
            ****<br>
            Ministère de l’Enseignement Supérieur<br>
            ****<br>
            <strong>UNIVERSITÉ D’EBOLOWA</strong><br>
            ****<br>
            Institut Supérieur d’Agriculture, du Bois,<br>
            de l’Eau et de l’Environnement<br>
            BP : 118 Ebolowa<br>
            Tél : 694193607 / 677079747
        </td>

        <td class="logo-zone">
            <div class="logo-box">
                @if(file_exists(public_path('images/logo.jpg')))
                    <img src="{{ public_path('images/logo.jpg') }}">
                @elseif(file_exists(public_path('images/logo2.jpg')))
                    <img src="{{ public_path('images/logo2.jpg') }}">
                @endif
            </div>

            <div class="school-name">
                ISABEE<br>
                Université d’Ebolowa
            </div>
        </td>

        <td>
            <strong>Republic of Cameroon</strong><br>
            Peace – Work – Fatherland<br>
            ****<br>
            Ministry of Higher Education<br>
            ****<br>
            <strong>UNIVERSITY OF EBOLOWA</strong><br>
            ****<br>
            Higher Institute of Agriculture, Forestry,<br>
            Water and Environment<br>
            PO BOX : 118 Ebolowa<br>
            Phone : 694193607 / 677079747
        </td>
    </tr>
</table>

<div class="header-line"></div>

{{-- =========================
     TITRE
========================= --}}
<table class="document-title">
    <tr>
        <td class="title-main">
            Récépissé de dépôt du dossier au concours d’entrée ISABEE 2026
        </td>
    </tr>
    <tr>
        <td class="title-sub">
            Registration receipt for the entrance examination into ISABEE
        </td>
    </tr>
</table>

{{-- =========================
     META
========================= --}}
<table class="meta-table">
    <tr>
        <td width="30%">
            <span class="meta-label">Fiche N° :</span>
            {{ $candidat->numero_candidat ?? 'N/A' }}
        </td>

        <td width="40%" class="numero-box">
            {{ $candidat->numero_candidat ?? 'N/A' }}
        </td>

        <td width="30%" class="text-right">
            <span class="meta-label">Date :</span>
            {{ date('d/m/Y') }}
        </td>
    </tr>
</table>

{{-- =========================
     PROFIL CANDIDAT
========================= --}}
<table class="profile-table">
    <tr>
        <td class="photo-cell">
            <div class="photo-frame">
                @php
                    $photoPath = public_path('uploads/photos_etudiants/' . $candidat->photo_etudiant);
                @endphp

                @if($candidat->photo_etudiant && file_exists($photoPath))
                    @php
                        $type = pathinfo($photoPath, PATHINFO_EXTENSION);
                        $data = file_get_contents($photoPath);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    @endphp

                    <img src="{{ $base64 }}">
                @else
                    <div class="photo-placeholder">PHOTO 4x4</div>
                @endif
            </div>

            <div class="photo-caption">
                Photo du candidat
            </div>
        </td>

        <td class="profile-info">
            <table class="info-summary-table">
                <tr>
                    <td width="35%">
                        <span class="summary-label">Nom complet</span>
                    </td>
                    <td width="65%">
                        <span class="summary-value">{{ $candidat->nom_complet ?? 'N/A' }}</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="summary-label">Cycle</span>
                    </td>
                    <td>
                        {{ $candidat->cycle->nom_cycle ?? 'N/A' }}
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="summary-label">Filière</span>
                    </td>
                    <td>
                        {{ $candidat->filiere->nom_filiere ?? 'N/A' }}
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="summary-label">Spécialité</span>
                    </td>
                    <td>
                        {{ $candidat->specialite->nom_specialite ?? 'N/A' }}
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="summary-label">Centre d’examen</span>
                    </td>
                    <td>
                        {{ $candidat->centre_examen ?? 'N/A' }}
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="summary-label">Langue de composition</span>
                    </td>
                    <td>
                        {{ $candidat->langue_composition ?? 'N/A' }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

{{-- =========================
     IDENTIFICATION
========================= --}}
<div class="section-title">1. Identification du candidat / Candidate identification</div>

<table class="data-table">
    <tr>
        <td width="50%">
            <span class="label">Nom complet :</span>
            <span class="value">{{ $candidat->nom_complet ?? 'N/A' }}</span>
        </td>
        <td width="25%">
            <span class="label">Sexe :</span>
            <span class="value">{{ $candidat->sexe ?? 'N/A' }}</span>
        </td>
        <td width="25%">
            <span class="label">État civil :</span>
            <span class="value">{{ $candidat->marital ?? 'N/A' }}</span>
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Date de naissance :</span>
            <span class="value">{{ $candidat->date_naissance ?? 'N/A' }}</span>
        </td>
        <td colspan="2">
            <span class="label">Lieu de naissance :</span>
            <span class="value">{{ $candidat->lieu_naissance ?? 'N/A' }}</span>
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Numéro CNI :</span>
            <span class="value">{{ $candidat->numero_nci ?? 'N/A' }}</span>
        </td>
        <td colspan="2">
            <span class="label">Nationalité :</span>
            <span class="value">{{ $candidat->nationalite ?? 'N/A' }}</span>
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Téléphone :</span>
            <span class="value">{{ $candidat->telephone ?? 'N/A' }}</span>
        </td>
        <td colspan="2">
            <span class="label">Téléphone candidat :</span>
            <span class="value">{{ $candidat->numero_telephone_candidat ?? 'N/A' }}</span>
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Email :</span>
            <span class="value">{{ $candidat->email ?? 'N/A' }}</span>
        </td>
        <td colspan="2">
            <span class="label">Profession :</span>
            <span class="value">{{ $candidat->profession ?? 'N/A' }}</span>
        </td>
    </tr>
</table>

{{-- =========================
     FORMATION
========================= --}}
<div class="section-title">2. Formation sollicitée / Requested programme</div>

<table class="data-table">
    <tr>
        <td width="25%">
            <span class="label">Cycle :</span>
            {{ $candidat->cycle->nom_cycle ?? 'N/A' }}
        </td>
        <td width="35%">
            <span class="label">Filière :</span>
            {{ $candidat->filiere->nom_filiere ?? 'N/A' }}
        </td>
        <td width="40%">
            <span class="label">Spécialité :</span>
            {{ $candidat->specialite->nom_specialite ?? 'N/A' }}
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Centre :</span>
            {{ $candidat->centre_examen ?? 'N/A' }}
        </td>
        <td>
            <span class="label">Langue :</span>
            {{ $candidat->langue_composition ?? 'N/A' }}
        </td>
        <td>
            <span class="label">N° candidat :</span>
            {{ $candidat->numero_candidat ?? 'N/A' }}
        </td>
    </tr>
</table>

{{-- =========================
     LOCALISATION
========================= --}}
<div class="section-title">3. Localisation / Address information</div>

<table class="data-table">
    <tr>
        <td width="25%">
            <span class="label">Pays :</span>
            {{ $candidat->pays->nom_pays ?? 'N/A' }}
        </td>
        <td width="25%">
            <span class="label">Région :</span>
            {{ $candidat->region->nom_region ?? 'N/A' }}
        </td>
        <td width="25%">
            <span class="label">Département :</span>
            {{ $candidat->departement->nom_departement ?? 'N/A' }}
        </td>
        <td width="25%">
            <span class="label">Arrondissement :</span>
            {{ $candidat->arrondissement->nom_arrondissement ?? 'N/A' }}
        </td>
    </tr>
</table>

{{-- =========================
     FAMILLE
========================= --}}
<div class="section-title">4. Parents et contact d’urgence / Parents and emergency contact</div>

<table class="data-table">
    <tr>
        <td width="34%">
            <span class="label">Nom du père :</span>
            {{ $candidat->nom_pere ?? 'N/A' }}
        </td>
        <td width="33%">
            <span class="label">Profession :</span>
            {{ $candidat->profession_pere ?? 'N/A' }}
        </td>
        <td width="33%">
            <span class="label">Téléphone :</span>
            {{ $candidat->numero_telephone_pere ?? 'N/A' }}
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Nom de la mère :</span>
            {{ $candidat->nom_mere ?? 'N/A' }}
        </td>
        <td>
            <span class="label">Profession :</span>
            {{ $candidat->profession_mere ?? 'N/A' }}
        </td>
        <td>
            <span class="label">Téléphone :</span>
            {{ $candidat->numero_telephone_mere ?? 'N/A' }}
        </td>
    </tr>

    <tr>
        <td colspan="3">
            <span class="label">Ville des parents :</span>
            {{ $candidat->ville_parents ?? 'N/A' }}
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Contact urgence :</span>
            {{ $candidat->Personne_a_contacter_cas_urgent ?? 'N/A' }}
        </td>
        <td>
            <span class="label">Téléphone :</span>
            {{ $candidat->numero_telephone_Personne_a_contacte_urgent ?? 'N/A' }}
        </td>
        <td>
            <span class="label">Ville :</span>
            {{ $candidat->ville_Personne_a_contacte_cas_urgent ?? 'N/A' }}
        </td>
    </tr>
</table>

{{-- =========================
     DIPLOME
========================= --}}
<div class="section-title">5. Diplôme et pièces jointes / Diploma and attachments</div>

<table class="data-table">
    <tr>
        <td width="34%">
            <span class="label">Diplôme présenté :</span>
            {{ $candidat->diplome_entre ?? 'N/A' }}
        </td>
        <td width="33%">
            <span class="label">Série / Option :</span>
            {{ $candidat->serie_diplome ?? 'N/A' }}
        </td>
        <td width="33%">
            <span class="label">Année :</span>
            {{ $candidat->annee_obtention_diplome ?? 'N/A' }}
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Organisme émetteur :</span>
            {{ $candidat->emetteur_entre_diplome ?? 'N/A' }}
        </td>
        <td>
            <span class="label">Moyenne :</span>
            {{ $candidat->moyenne_obtenu_diplome ?? 'N/A' }}
        </td>
        <td>
            <span class="label">N° diplôme :</span>
            {{ $candidat->numero_diplome_entre ?? 'N/A' }}
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Sport pratiqué :</span>
            {{ $candidat->sport_pratique ?? 'N/A' }}
        </td>
        <td>
            <span class="label">Handicap :</span>
            {{ $candidat->handicape ?? 'N/A' }}
        </td>
        <td>
            <span class="label">Document scanné :</span>
            @if($candidat->document_scanner)
                <span class="document-status">Fourni</span>
            @else
                N/A
            @endif
        </td>
    </tr>
</table>

{{-- =========================
     DECLARATION
========================= --}}
<div class="declaration-box">
    <strong>Déclaration du candidat :</strong>
    Je soussigné(e), certifie sur l’honneur que les informations fournies dans cette fiche sont exactes.
    Toute fausse déclaration expose le candidat à l’annulation de son inscription au concours.
</div>

{{-- =========================
     SIGNATURES
========================= --}}
<table class="signature-table">
    <tr>
        <td>
            <div class="signature-line">Signature du candidat</div>
        </td>

        <td>
            <div class="signature-line">Visa du Service des Concours</div>
        </td>

        <td>
            <div class="signature-line">Examinateur du dossier</div>
        </td>
    </tr>
</table>

{{-- =========================
     QR CODE
========================= --}}
<table class="qr-table">
    <tr>
        <td width="70%" class="qr-note">
            Ce document est généré automatiquement par la plateforme officielle de préinscription ISABEE.
            Le QR Code et le code-barres permettent de vérifier l’authenticité du dossier.
        </td>

        <td width="30%" class="qr-box">
            @if(isset($qrCode))
                <img src="data:image/png;base64,{{ $qrCode }}">
                <br>
                <span style="font-size:8px;">QR Code de vérification</span>
            @endif
        </td>
    </tr>
</table>

{{-- =========================
     FOOTER
========================= --}}
<footer>
    <div class="footer-line"></div>

    <table class="footer-table">
        <tr>
            <td width="25%">
                <strong>CONCOURS ISABEE 2026</strong>
            </td>

            <td width="50%" class="text-center">
                Cycle :
                <strong>{{ $candidat->cycle->nom_cycle ?? 'N/A' }}</strong>
                |
                Filière :
                <strong>{{ $candidat->filiere->nom_filiere ?? 'N/A' }}</strong>
            </td>

            <td width="25%" class="text-right">
                N°
                <strong>{{ $candidat->numero_candidat ?? 'N/A' }}</strong>
            </td>
        </tr>

        @if(isset($barcode))
            <tr>
                <td colspan="3" class="text-center">
                    <img src="data:image/png;base64,{{ $barcode }}" class="barcode-img">
                </td>
            </tr>
        @endif

        <tr>
            <td colspan="3" class="text-center">
                ISABEE - Université d’Ebolowa |
                Document généré automatiquement le
                <strong>{{ $generated_at ?? date('d/m/Y H:i:s') }}</strong>
            </td>
        </tr>
    </table>
</footer>

<script type="text/php">
if (isset($pdf)) {
    $font = $fontMetrics->get_font("Helvetica", "normal");
    $pdf->page_text(500, 790, "Page {PAGE_NUM}/{PAGE_COUNT}", $font, 8, array(0,0,0));
}
</script>

</body>
</html>