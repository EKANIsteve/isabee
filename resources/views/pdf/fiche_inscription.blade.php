<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">

<style>
@page {
    margin: 18px 22px 72px 22px;
}

* {
    box-sizing: border-box;
}

body {
    font-family: DejaVu Sans, Arial, sans-serif;
    font-size: 9.5px;
    color: #111827;
    background: #ffffff;
}

.watermark {
    position: fixed;
    top: 38%;
    left: 0;
    width: 100%;
    text-align: center;
    font-size: 72px;
    color: #0b7a4b;
    opacity: 0.045;
    transform: rotate(-35deg);
    z-index: -1;
    font-weight: bold;
}

.header-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 6px;
}

.header-table td {
    width: 33.33%;
    vertical-align: top;
    text-align: center;
    font-size: 8px;
    line-height: 11px;
}

.logo-box {
    text-align: center;
}

.logo-box img {
    max-height: 68px;
    max-width: 90px;
}

.school-title {
    margin-top: 4px;
    font-size: 10px;
    font-weight: bold;
    color: #064e3b;
}

.line-green {
    height: 5px;
    background: #0b7a4b;
    border-bottom: 2px solid #f4c430;
    margin: 6px 0 8px;
}

.doc-title {
    background: #064e3b;
    color: #ffffff;
    text-align: center;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
    padding: 8px;
    border-radius: 6px 6px 0 0;
}

.doc-subtitle {
    background: #0b7a4b;
    color: #ffffff;
    text-align: center;
    font-size: 8.5px;
    padding: 5px;
    border-radius: 0 0 6px 6px;
    margin-bottom: 8px;
}

.meta-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 8px;
}

.meta-table td {
    border: 1px solid #d1d5db;
    padding: 6px;
}

.meta-label {
    font-weight: bold;
    color: #064e3b;
}

.numero-box {
    background: #f4c430;
    color: #064e3b;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 1px;
}

.profile-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 8px;
}

.profile-table td {
    border: 1px solid #d1d5db;
    vertical-align: top;
}

.photo-cell {
    width: 22%;
    text-align: center;
    padding: 6px;
    background: #f9fafb;
}

.photo-frame {
    width: 115px;
    height: 135px;
    border: 2px solid #0b7a4b;
    margin: 0 auto 5px;
    overflow: hidden;
    background: #ffffff;
}

.photo-frame img {
    width: 111px;
    height: 131px;
}

.photo-placeholder {
    padding-top: 54px;
    font-weight: bold;
    color: #6b7280;
}

.profile-info {
    width: 78%;
}

.info-table {
    width: 100%;
    border-collapse: collapse;
}

.info-table td {
    border: 1px solid #e5e7eb;
    padding: 5px;
}

.label {
    font-weight: bold;
    color: #064e3b;
}

.value {
    color: #111827;
    font-weight: normal;
}

.section-title {
    background: #064e3b;
    color: #ffffff;
    padding: 6px 8px;
    font-size: 9.5px;
    font-weight: bold;
    margin-top: 7px;
    border-left: 6px solid #f4c430;
    text-transform: uppercase;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table td {
    border: 1px solid #d1d5db;
    padding: 5px;
    vertical-align: top;
    line-height: 12px;
}

.badge-ok {
    display: inline-block;
    background: #eaf8f0;
    color: #064e3b;
    border: 1px solid #0b7a4b;
    padding: 3px 6px;
    border-radius: 4px;
    font-weight: bold;
}

.badge-warn {
    display: inline-block;
    background: #fff7ed;
    color: #9a3412;
    border: 1px solid #fb923c;
    padding: 3px 6px;
    border-radius: 4px;
    font-weight: bold;
}

.declaration {
    margin-top: 9px;
    border: 1px solid #0b7a4b;
    background: #f8fafc;
    padding: 7px;
    line-height: 13px;
    font-size: 9px;
}

.signature-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.signature-table td {
    width: 33.33%;
    text-align: center;
    padding: 7px 5px 0;
    font-size: 8.5px;
}

.signature-line {
    margin-top: 26px;
    border-top: 1px solid #111827;
    padding-top: 4px;
    font-weight: bold;
}

.qr-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 8px;
}

.qr-table td {
    vertical-align: bottom;
}

.qr-note {
    font-size: 8px;
    color: #6b7280;
    line-height: 11px;
}

.qr-box {
    text-align: right;
}

.qr-box img {
    width: 70px;
}

footer {
    position: fixed;
    bottom: -58px;
    left: 0;
    right: 0;
    font-size: 8px;
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
</style>
</head>

<body>

<div class="watermark">ISABEE 2026</div>

<table class="header-table">
    <tr>
        <td>
            <strong>RÉPUBLIQUE DU CAMEROUN</strong><br>
            Paix – Travail – Patrie<br>
            ********<br>
            Ministère de l’Enseignement Supérieur<br>
            ********<br>
            <strong>UNIVERSITÉ D’EBOLOWA</strong><br>
            ********<br>
            Institut Supérieur d’Agriculture, du Bois,<br>
            de l’Eau et de l’Environnement<br>
            BP : 118 Ebolowa
        </td>

        <td class="logo-box">
            @if(file_exists(public_path('images/logo.jpg')))
                <img src="{{ public_path('images/logo.jpg') }}">
            @elseif(file_exists(public_path('images/logo2.jpg')))
                <img src="{{ public_path('images/logo2.jpg') }}">
            @endif

            <div class="school-title">
                ISABEE<br>
                Université d’Ebolowa
            </div>
        </td>

        <td>
            <strong>REPUBLIC OF CAMEROON</strong><br>
            Peace – Work – Fatherland<br>
            ********<br>
            Ministry of Higher Education<br>
            ********<br>
            <strong>UNIVERSITY OF EBOLOWA</strong><br>
            ********<br>
            Higher Institute of Agriculture, Forestry,<br>
            Water and Environment<br>
            PO BOX : 118 Ebolowa
        </td>
    </tr>
</table>

<div class="line-green"></div>

<div class="doc-title">
    Fiche officielle d’inscription au concours ISABEE 2026
</div>

<div class="doc-subtitle">
    Récépissé généré automatiquement après validation de la préinscription en ligne
</div>

<table class="meta-table">
    <tr>
        <td width="30%">
            <span class="meta-label">N° reçu CCA :</span><br>
            {{ $candidat->numero_recu ?? 'N/A' }}
        </td>

        <td width="40%" class="numero-box">
            {{ $candidat->numero_candidat ?? 'N/A' }}
        </td>

        <td width="30%" class="text-right">
            <span class="meta-label">Date de génération :</span><br>
            {{ $generated_at ?? date('d/m/Y H:i:s') }}
        </td>
    </tr>
</table>

<table class="profile-table">
    <tr>
        <td class="photo-cell">
            <div class="photo-frame">
                @php
                    $photoPath = $candidat->photo_etudiant
                        ? public_path('uploads/photos_etudiants/' . $candidat->photo_etudiant)
                        : null;
                @endphp

                @if($photoPath && file_exists($photoPath))
                    @php
                        $type = pathinfo($photoPath, PATHINFO_EXTENSION);
                        $data = file_get_contents($photoPath);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    @endphp

                    <img src="{{ $base64 }}">
                @else
                    <div class="photo-placeholder">PHOTO</div>
                @endif
            </div>

            <div>Photo du candidat</div>
        </td>

        <td class="profile-info">
            <table class="info-table">
                <tr>
                    <td width="32%"><span class="label">Nom complet</span></td>
                    <td width="68%"><strong>{{ $candidat->nom_complet ?? 'N/A' }}</strong></td>
                </tr>

                <tr>
                    <td><span class="label">Cycle</span></td>
                    <td>{{ $candidat->cycle->nom_cycle ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <td><span class="label">Filière</span></td>
                    <td>{{ $candidat->filiere->nom_filiere ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <td><span class="label">Spécialité / Option</span></td>
                    <td>{{ $candidat->specialite->nom_specialite ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <td><span class="label">Centre d’examen</span></td>
                    <td>{{ $candidat->centre_examen ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <td><span class="label">Langue de composition</span></td>
                    <td>{{ $candidat->langue_composition ?? 'N/A' }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<div class="section-title">1. Identification du candidat</div>

<table class="data-table">
    <tr>
        <td width="40%">
            <span class="label">Nom complet :</span>
            {{ $candidat->nom_complet ?? 'N/A' }}
        </td>

        <td width="30%">
            <span class="label">Date de naissance :</span>
            {{ $candidat->date_naissance ? \Carbon\Carbon::parse($candidat->date_naissance)->format('d/m/Y') : 'N/A' }}
        </td>

        <td width="30%">
            <span class="label">Lieu :</span>
            {{ $candidat->lieu_naissance ?? 'N/A' }}
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Sexe :</span>
            {{ $candidat->sexe ?? 'N/A' }}
        </td>

        <td>
            <span class="label">CNI :</span>
            {{ $candidat->numero_nci ?? 'N/A' }}
        </td>

        <td>
            <span class="label">Nationalité :</span>
            {{ $candidat->nationalite ?? 'N/A' }}
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Téléphone candidat :</span>
            {{ $candidat->numero_telephone_candidat ?? 'N/A' }}
        </td>

        <td>
            <span class="label">Email :</span>
            {{ $candidat->email ?? 'N/A' }}
        </td>

        <td>
            <span class="label">Profession :</span>
            {{ $candidat->profession ?? 'N/A' }}
        </td>
    </tr>
</table>

<div class="section-title">2. Formation sollicitée selon la décision du concours</div>

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
            <span class="label">Spécialité / Option :</span>
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

<div class="section-title">3. Localisation</div>

<table class="data-table">
    <tr>
        <td width="25%">
            <span class="label">Pays :</span>
            {{ $candidat->pays->nom_pays ?? 'N/A' }}
        </td>

        <td width="25%">
            <span class="label">Région :</span>
            {{ $candidat->region->nom_region ?? 'Non applicable' }}
        </td>

        <td width="25%">
            <span class="label">Département :</span>
            {{ $candidat->departement->nom_departement ?? 'Non applicable' }}
        </td>

        <td width="25%">
            <span class="label">Arrondissement :</span>
            {{ $candidat->arrondissement->nom_arrondissement ?? 'Non applicable' }}
        </td>
    </tr>
</table>

<div class="section-title">4. Informations familiales et contact d’urgence</div>

<table class="data-table">
    <tr>
        <td width="34%">
            <span class="label">Nom du père :</span>
            {{ $candidat->nom_pere ?? 'N/A' }}
        </td>

        <td width="33%">
            <span class="label">Téléphone :</span>
            {{ $candidat->numero_telephone_pere ?? 'N/A' }}
        </td>

        <td width="33%">
            <span class="label">Profession :</span>
            {{ $candidat->profession_pere ?? 'N/A' }}
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Nom de la mère :</span>
            {{ $candidat->nom_mere ?? 'N/A' }}
        </td>

        <td>
            <span class="label">Téléphone :</span>
            {{ $candidat->numero_telephone_mere ?? 'N/A' }}
        </td>

        <td>
            <span class="label">Profession :</span>
            {{ $candidat->profession_mere ?? 'N/A' }}
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Ville des parents :</span>
            {{ $candidat->ville_parents ?? 'N/A' }}
        </td>

        <td>
            <span class="label">Contact urgence :</span>
            {{ $candidat->Personne_a_contacter_cas_urgent ?? 'N/A' }}
        </td>

        <td>
            <span class="label">Téléphone urgence :</span>
            {{ $candidat->numero_telephone_Personne_a_contacte_urgent ?? 'N/A' }}
        </td>
    </tr>
</table>

<div class="section-title">5. Diplôme d’entrée et pièces jointes</div>

<table class="data-table">
    <tr>
        <td width="34%">
            <span class="label">Diplôme d’entrée :</span>
            {{ $candidat->diplome_entre ?? 'N/A' }}
        </td>

        <td width="33%">
            <span class="label">Série / Option :</span>
            {{ $candidat->serie_diplome ?? 'N/A' }}
        </td>

        <td width="33%">
            <span class="label">Année d’obtention :</span>
            {{ $candidat->annee_obtention_diplome ?? 'N/A' }}
        </td>
    </tr>

    <tr>
        <td>
            <span class="label">Établissement / Émetteur :</span>
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
            <span class="label">Reçu CCA scanné :</span>
            @if($candidat->document_scanner)
                <span class="badge-ok">Fourni</span>
            @else
                <span class="badge-warn">Non fourni</span>
            @endif
        </td>
    </tr>
</table>

<div class="declaration">
    <strong>Déclaration du candidat :</strong>
    Je soussigné(e), certifie sur l’honneur que les informations fournies dans cette fiche sont exactes.
    Toute fausse déclaration ou tout reçu non conforme peut entraîner le rejet du dossier.
</div>

<table class="signature-table">
    <tr>
        <td>
            <div class="signature-line">Signature du candidat</div>
        </td>

        <td>
            <div class="signature-line">Visa du Service des Concours</div>
        </td>

        <td>
            <div class="signature-line">Contrôle du dossier</div>
        </td>
    </tr>
</table>

<table class="qr-table">
    <tr>
        <td width="70%" class="qr-note">
            Cette fiche est générée automatiquement par la plateforme officielle de préinscription ISABEE.
            Elle doit être imprimée et jointe au dossier physique avec le reçu de paiement CCA Bank Cameroun.
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

<footer>
    <div class="footer-line"></div>

    <table class="footer-table">
        <tr>
            <td width="28%">
                <strong>CONCOURS ISABEE 2026</strong>
            </td>

            <td width="44%" class="text-center">
                {{ $candidat->cycle->nom_cycle ?? 'N/A' }}
                |
                {{ $candidat->filiere->nom_filiere ?? 'N/A' }}
            </td>

            <td width="28%" class="text-right">
                N° <strong>{{ $candidat->numero_candidat ?? 'N/A' }}</strong>
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
                Document généré le <strong>{{ $generated_at ?? date('d/m/Y H:i:s') }}</strong>
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