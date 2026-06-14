<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">

<style>
@page {
    margin: 10px 12px 36px 12px;
}

* {
    box-sizing: border-box;
}

body {
    font-family: DejaVu Sans, Arial, sans-serif;
    font-size: 7.4px;
    color: #111827;
    line-height: 1.15;
}

.watermark {
    position: fixed;
    top: 38%;
    left: 0;
    width: 100%;
    text-align: center;
    font-size: 54px;
    color: #0b7a4b;
    opacity: 0.035;
    transform: rotate(-35deg);
    z-index: -1;
    font-weight: bold;
}

.header-table,
.meta-table,
.main-table,
.data-table,
.signature-table,
.footer-table {
    width: 100%;
    border-collapse: collapse;
}

.header-table td {
    width: 33.33%;
    text-align: center;
    vertical-align: middle;
    font-size: 6.6px;
    line-height: 8.5px;
}

.logo img {
    max-height: 48px;
    max-width: 65px;
}

.school-name {
    font-size: 8px;
    font-weight: bold;
    color: #064e3b;
    margin-top: 2px;
}

.green-line {
    height: 4px;
    background: #0b7a4b;
    border-bottom: 1.5px solid #f4c430;
    margin: 4px 0 5px;
}

.title {
    background: #064e3b;
    color: white;
    text-align: center;
    font-size: 9.3px;
    font-weight: bold;
    padding: 5px;
    text-transform: uppercase;
}

.subtitle {
    background: #0b7a4b;
    color: white;
    text-align: center;
    font-size: 6.8px;
    padding: 3px;
    margin-bottom: 5px;
}

.meta-table td {
    border: 1px solid #d1d5db;
    padding: 3.5px;
    vertical-align: middle;
}

.meta-label {
    font-weight: bold;
    color: #064e3b;
}

.numero-box {
    background: #f4c430;
    color: #064e3b;
    text-align: center;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 1px;
}

.profile-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 4px;
    margin-bottom: 4px;
}

.profile-table td {
    border: 1px solid #d1d5db;
    vertical-align: top;
}

.photo-cell {
    width: 17%;
    text-align: center;
    padding: 4px;
    background: #f9fafb;
}

.photo-frame {
    width: 72px;
    height: 84px;
    border: 1.4px solid #0b7a4b;
    margin: 0 auto 3px;
    overflow: hidden;
    background: white;
}

.photo-frame img {
    width: 70px;
    height: 82px;
}

.photo-placeholder {
    padding-top: 35px;
    font-weight: bold;
    color: #6b7280;
}

.profile-info {
    width: 83%;
}

.profile-info table {
    width: 100%;
    border-collapse: collapse;
}

.profile-info td {
    border: 1px solid #e5e7eb;
    padding: 3px;
}

.section-title {
    background: #064e3b;
    color: white;
    padding: 3.5px 5px;
    font-size: 7.5px;
    font-weight: bold;
    margin-top: 4px;
    border-left: 4px solid #f4c430;
    text-transform: uppercase;
}

.data-table td {
    border: 1px solid #d1d5db;
    padding: 3px;
    vertical-align: top;
}

.label {
    font-weight: bold;
    color: #064e3b;
}

.badge-ok {
    display: inline-block;
    background: #eaf8f0;
    color: #064e3b;
    border: 1px solid #0b7a4b;
    padding: 1.5px 4px;
    font-weight: bold;
}

.badge-warn {
    display: inline-block;
    background: #fff7ed;
    color: #9a3412;
    border: 1px solid #fb923c;
    padding: 1.5px 4px;
    font-weight: bold;
}

.declaration {
    margin-top: 5px;
    border: 1px solid #0b7a4b;
    background: #f8fafc;
    padding: 4px;
    font-size: 7px;
}

.bottom-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 5px;
}

.bottom-table td {
    vertical-align: top;
}

.signature-table td {
    width: 33.33%;
    text-align: center;
    padding: 2px 4px 0;
    font-size: 6.8px;
}

.signature-line {
    margin-top: 18px;
    border-top: 1px solid #111827;
    padding-top: 2px;
    font-weight: bold;
}

.qr-box {
    text-align: right;
}

.qr-box img {
    width: 52px;
}

.qr-note {
    font-size: 6.8px;
    color: #6b7280;
    line-height: 8.5px;
}

footer {
    position: fixed;
    bottom: -28px;
    left: 0;
    right: 0;
    font-size: 6.8px;
}

.footer-line {
    height: 3px;
    background: #0b7a4b;
    border-bottom: 1.5px solid #f4c430;
    margin-bottom: 2px;
}

.footer-table td {
    padding: 1px;
}

.text-center {
    text-align: center;
}

.text-right {
    text-align: right;
}

.barcode-img {
    width: 105px;
    height: 10px;
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
            Ministère de l’Enseignement Supérieur<br>
            <strong>UNIVERSITÉ D’EBOLOWA</strong><br>
            ISABEE - BP 118 Ebolowa
        </td>

        <td class="logo">
            @if(file_exists(public_path('images/logo.jpg')))
                <img src="{{ public_path('images/logo.jpg') }}">
            @elseif(file_exists(public_path('images/logo2.jpg')))
                <img src="{{ public_path('images/logo2.jpg') }}">
            @endif

            <div class="school-name">
                ISABEE<br>
                Université d’Ebolowa
            </div>
        </td>

        <td>
            <strong>REPUBLIC OF CAMEROON</strong><br>
            Peace – Work – Fatherland<br>
            Ministry of Higher Education<br>
            <strong>UNIVERSITY OF EBOLOWA</strong><br>
            ISABEE - PO BOX 118 Ebolowa
        </td>
    </tr>
</table>

<div class="green-line"></div>

<div class="title">
    Fiche officielle d’inscription au concours ISABEE 2026
</div>

<div class="subtitle">
    Récépissé généré automatiquement après validation de la préinscription en ligne
</div>

<table class="meta-table">
    <tr>
        <td width="30%">
            <span class="meta-label">N° reçu CCA :</span>
            {{ $candidat->numero_recu ?? 'N/A' }}
        </td>

        <td width="40%" class="numero-box">
            {{ $candidat->numero_candidat ?? 'N/A' }}
        </td>

        <td width="30%" class="text-right">
            <span class="meta-label">Date :</span>
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
            Photo candidat
        </td>

        <td class="profile-info">
            <table>
                <tr>
                    <td width="22%"><span class="label">Nom complet</span></td>
                    <td width="78%" colspan="3"><strong>{{ $candidat->nom_complet ?? 'N/A' }}</strong></td>
                </tr>

                <tr>
                    <td><span class="label">Cycle</span></td>
                    <td>{{ $candidat->cycle->nom_cycle ?? 'N/A' }}</td>
                    <td><span class="label">Centre</span></td>
                    <td>{{ $candidat->centre_examen ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <td><span class="label">Filière</span></td>
                    <td colspan="3">{{ $candidat->filiere->nom_filiere ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <td><span class="label">Spécialité / Option</span></td>
                    <td colspan="3">{{ $candidat->specialite->nom_specialite ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <td><span class="label">Langue</span></td>
                    <td>{{ $candidat->langue_composition ?? 'N/A' }}</td>
                    <td><span class="label">N° candidat</span></td>
                    <td><strong>{{ $candidat->numero_candidat ?? 'N/A' }}</strong></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<div class="section-title">1. Identification du candidat</div>

<table class="data-table">
    <tr>
        <td width="34%"><span class="label">Date naissance :</span> {{ $candidat->date_naissance ? \Carbon\Carbon::parse($candidat->date_naissance)->format('d/m/Y') : 'N/A' }}</td>
        <td width="33%"><span class="label">Lieu :</span> {{ $candidat->lieu_naissance ?? 'N/A' }}</td>
        <td width="33%"><span class="label">Sexe :</span> {{ $candidat->sexe ?? 'N/A' }}</td>
    </tr>

    <tr>
        <td><span class="label">CNI :</span> {{ $candidat->numero_nci ?? 'N/A' }}</td>
        <td><span class="label">Nationalité :</span> {{ $candidat->nationalite ?? 'N/A' }}</td>
        <td><span class="label">État civil :</span> {{ $candidat->marital ?? 'N/A' }}</td>
    </tr>

    <tr>
        <td><span class="label">Téléphone :</span> {{ $candidat->numero_telephone_candidat ?? 'N/A' }}</td>
        <td><span class="label">Email :</span> {{ $candidat->email ?? 'N/A' }}</td>
        <td><span class="label">Profession :</span> {{ $candidat->profession ?? 'N/A' }}</td>
    </tr>
</table>

<div class="section-title">2. Localisation</div>

<table class="data-table">
    <tr>
        <td width="25%"><span class="label">Pays :</span> {{ $candidat->pays->nom_pays ?? 'N/A' }}</td>
        <td width="25%"><span class="label">Région :</span> {{ $candidat->region->nom_region ?? 'Non applicable' }}</td>
        <td width="25%"><span class="label">Département :</span> {{ $candidat->departement->nom_departement ?? 'Non applicable' }}</td>
        <td width="25%"><span class="label">Arrondissement :</span> {{ $candidat->arrondissement->nom_arrondissement ?? 'Non applicable' }}</td>
    </tr>
</table>

<div class="section-title">3. Parents et contact d’urgence</div>

<table class="data-table">
    <tr>
        <td width="34%"><span class="label">Père :</span> {{ $candidat->nom_pere ?? 'N/A' }}</td>
        <td width="33%"><span class="label">Tél père :</span> {{ $candidat->numero_telephone_pere ?? 'N/A' }}</td>
        <td width="33%"><span class="label">Prof. père :</span> {{ $candidat->profession_pere ?? 'N/A' }}</td>
    </tr>

    <tr>
        <td><span class="label">Mère :</span> {{ $candidat->nom_mere ?? 'N/A' }}</td>
        <td><span class="label">Tél mère :</span> {{ $candidat->numero_telephone_mere ?? 'N/A' }}</td>
        <td><span class="label">Prof. mère :</span> {{ $candidat->profession_mere ?? 'N/A' }}</td>
    </tr>

    <tr>
        <td><span class="label">Ville parents :</span> {{ $candidat->ville_parents ?? 'N/A' }}</td>
        <td><span class="label">Contact urgence :</span> {{ $candidat->Personne_a_contacter_cas_urgent ?? 'N/A' }}</td>
        <td><span class="label">Tél urgence :</span> {{ $candidat->numero_telephone_Personne_a_contacte_urgent ?? 'N/A' }}</td>
    </tr>
</table>

<div class="section-title">4. Diplôme d’entrée et pièces jointes</div>

<table class="data-table">
    <tr>
        <td width="34%"><span class="label">Diplôme :</span> {{ $candidat->diplome_entre ?? 'N/A' }}</td>
        <td width="33%"><span class="label">Série / Option :</span> {{ $candidat->serie_diplome ?? 'N/A' }}</td>
        <td width="33%"><span class="label">Année :</span> {{ $candidat->annee_obtention_diplome ?? 'N/A' }}</td>
    </tr>

    <tr>
        <td><span class="label">Établissement :</span> {{ $candidat->emetteur_entre_diplome ?? 'N/A' }}</td>
        <td><span class="label">Moyenne :</span> {{ $candidat->moyenne_obtenu_diplome ?? 'N/A' }}</td>
        <td><span class="label">N° diplôme :</span> {{ $candidat->numero_diplome_entre ?? 'N/A' }}</td>
    </tr>

    <tr>
        <td><span class="label">Sport :</span> {{ $candidat->sport_pratique ?? 'N/A' }}</td>
        <td><span class="label">Handicap :</span> {{ $candidat->handicape ?? 'N/A' }}</td>
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
    <strong>Déclaration :</strong>
    Je certifie sur l’honneur que les informations fournies sont exactes.
    Toute fausse déclaration ou tout reçu non conforme peut entraîner le rejet du dossier.
</div>

<table class="bottom-table">
    <tr>
        <td width="70%">
            <table class="signature-table">
                <tr>
                    <td><div class="signature-line">Signature candidat</div></td>
                    <td><div class="signature-line">Service concours</div></td>
                    <td><div class="signature-line">Contrôle dossier</div></td>
                </tr>
            </table>
        </td>

        <td width="30%" class="qr-box">
            @if(isset($qrCode))
                <img src="data:image/png;base64,{{ $qrCode }}">
                <br>
                <span style="font-size:6.5px;">QR vérification</span>
            @endif
        </td>
    </tr>
</table>

<footer>
    <div class="footer-line"></div>

    <table class="footer-table">
        <tr>
            <td width="30%"><strong>CONCOURS ISABEE 2026</strong></td>

            <td width="40%" class="text-center">
                {{ $candidat->cycle->nom_cycle ?? 'N/A' }} |
                {{ $candidat->centre_examen ?? 'N/A' }}
            </td>

            <td width="30%" class="text-right">
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
    </table>
</footer>

<script type="text/php">
if (isset($pdf)) {
    $font = $fontMetrics->get_font("Helvetica", "normal");
    $pdf->page_text(520, 815, "Page {PAGE_NUM}/{PAGE_COUNT}", $font, 7, array(0,0,0));
}
</script>

</body>
</html>