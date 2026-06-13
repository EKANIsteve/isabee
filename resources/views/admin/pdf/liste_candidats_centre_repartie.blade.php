<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des candidats par centre</title>

    <style>
        @page {
            margin: 18px 22px;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 10.5px;
            color: #111827;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .header-table td {
            vertical-align: top;
            font-size: 9.5px;
            line-height: 1.35;
        }

        .main-title {
            text-align: center;
            font-size: 17px;
            font-weight: bold;
            color: #063f2b;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .subtitle {
            text-align: center;
            font-size: 12px;
            font-weight: bold;
            color: #0b7a4b;
            margin-bottom: 10px;
        }

        .info-box {
            border: 1px solid #cbd5e1;
            background: #f8fafc;
            padding: 8px 10px;
            margin-bottom: 12px;
            font-size: 11px;
        }

        .info-box strong {
            color: #063f2b;
        }

        .cycle-title {
            background: #063f2b;
            color: white;
            font-size: 13px;
            font-weight: bold;
            padding: 7px 9px;
            margin-top: 12px;
            text-transform: uppercase;
        }

        .filiere-title {
            background: #0b7a4b;
            color: white;
            font-size: 11.5px;
            font-weight: bold;
            padding: 6px 9px;
            margin-top: 8px;
        }

        .specialite-title {
            background: #fff7cc;
            color: #5c4700;
            border: 1px solid #f4c430;
            font-size: 11px;
            font-weight: bold;
            padding: 6px 9px;
            margin-top: 7px;
        }

        table.list-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        table.list-table th {
            background: #1f2937;
            color: white;
            border: 1px solid #1f2937;
            padding: 5px;
            font-size: 9px;
            text-align: left;
        }

        table.list-table td {
            border: 1px solid #cbd5e1;
            padding: 4.5px;
            font-size: 8.8px;
            vertical-align: top;
        }

        .center {
            text-align: center;
        }

        .total-line {
            font-weight: bold;
            color: #063f2b;
            margin-bottom: 5px;
            font-size: 10px;
        }

        .page-break {
            page-break-after: always;
        }

        .empty {
            text-align: center;
            padding: 20px;
            color: #991b1b;
            font-weight: bold;
            border: 1px solid #fecaca;
            background: #fff1f2;
        }

        .footer {
            position: fixed;
            bottom: 7px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 8.8px;
            color: #475569;
            border-top: 1px solid #cbd5e1;
            padding-top: 4px;
        }
    </style>
</head>

<body>

<table class="header-table">
    <tr>
        <td style="width: 33%;">
            <strong>République du Cameroun</strong><br>
            Paix - Travail - Patrie<br>
            Ministère de l’Enseignement Supérieur<br>
            Université d’Ebolowa
        </td>

        <td style="width: 34%; text-align:center;">
            <strong>ISABEE</strong><br>
            Institut Supérieur d’Agriculture,<br>
            du Bois, de l’Eau et de l’Environnement
        </td>

        <td style="width: 33%; text-align:right;">
            <strong>Republic of Cameroon</strong><br>
            Peace - Work - Fatherland<br>
            Ministry of Higher Education<br>
            The University of Ebolowa
        </td>
    </tr>
</table>

<div class="main-title">
    Liste des candidats au concours ISABEE
</div>

<div class="subtitle">
    Répartition par centre d’examen, cycle, filière et spécialité
</div>

<div class="info-box">
    <strong>Centre d’examen :</strong> {{ $centre === 'Yaounde' ? 'Yaoundé' : $centre }} <br>
    <strong>Nombre total de candidats :</strong> {{ $totalCandidats }} <br>
    <strong>Date d’impression :</strong> {{ $generated_at }}
</div>

@if($totalCandidats > 0)

    @foreach($groupes as $cycleNom => $filieres)

        <div class="cycle-title">
            Cycle : {{ $cycleNom }}
        </div>

        @foreach($filieres as $filiereNom => $specialites)

            <div class="filiere-title">
                Filière : {{ $filiereNom }}
            </div>

            @foreach($specialites as $specialiteNom => $candidats)

                <div class="specialite-title">
                    Spécialité : {{ $specialiteNom }}
                </div>

                <div class="total-line">
                    Total spécialité : {{ $candidats->count() }} candidat(s)
                </div>

                <table class="list-table">
                    <thead>
                        <tr>
                            <th class="center">N°</th>
                            <th>N° candidat</th>
                            <th>Nom complet</th>
                            <th>Sexe</th>
                            <th>Date naissance</th>
                            <th>Lieu naissance</th>
                            <th>Région</th>
                            <th>Téléphone</th>
                            <th>Profession</th>
                            <th>Langue</th>
                            <th>Émargement</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($candidats as $index => $candidat)
                            <tr>
                                <td class="center">{{ $index + 1 }}</td>

                                <td>{{ $candidat->numero_candidat ?? '' }}</td>

                                <td>{{ $candidat->nom_complet ?? '' }}</td>

                                <td>{{ $candidat->sexe ?? '' }}</td>

                                <td>
                                    {{ $candidat->date_naissance ? \Carbon\Carbon::parse($candidat->date_naissance)->format('d/m/Y') : '' }}
                                </td>

                                <td>{{ $candidat->lieu_naissance ?? '' }}</td>

                                <td>{{ $candidat->region->nom_region ?? '' }}</td>

                                <td>{{ $candidat->telephone ?? $candidat->numero_telephone_candidat ?? '' }}</td>

                                <td>{{ $candidat->profession ?? '' }}</td>

                                <td>{{ $candidat->langue_composition ?? '' }}</td>

                                <td style="height: 22px;"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @endforeach

        @endforeach

    @endforeach

@else

    <div class="empty">
        Aucun candidat trouvé pour ce centre d’examen.
    </div>

@endif

<div class="footer">
    ISABEE - Université d’Ebolowa |
    Liste générée automatiquement le {{ $generated_at }}
</div>

</body>
</html>