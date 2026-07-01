<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste répartie - {{ $centre }}</title>

    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            color: #111827;
            background: #ffffff;
            margin: 0;
            padding: 24px;
            font-size: 12px;
        }

        .print-header {
            text-align: center;
            border-bottom: 3px solid #0b7a4b;
            padding-bottom: 14px;
            margin-bottom: 22px;
        }

        .print-header h1 {
            margin: 0;
            color: #063f2b;
            font-size: 22px;
            text-transform: uppercase;
        }

        .print-header h2 {
            margin: 6px 0 0;
            color: #0b7a4b;
            font-size: 17px;
        }

        .print-header p {
            margin: 6px 0 0;
            color: #475569;
            font-size: 13px;
        }

        .summary-box {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 20px;
        }

        .summary-box strong {
            color: #063f2b;
        }

        .cycle-block {
            margin-top: 26px;
            page-break-inside: avoid;
        }

        .cycle-title {
            background: #063f2b;
            color: white;
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
        }

        .filiere-title {
            background: #0b7a4b;
            color: white;
            padding: 8px 12px;
            margin-top: 12px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: bold;
        }

        .specialite-title {
            background: #fef3c7;
            color: #78350f;
            padding: 7px 10px;
            margin-top: 10px;
            border-left: 5px solid #f4c430;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            margin-bottom: 12px;
        }

        th {
            background: #f1f5f9;
            color: #063f2b;
            border: 1px solid #cbd5e1;
            padding: 7px;
            text-align: left;
            font-size: 11px;
        }

        td {
            border: 1px solid #e2e8f0;
            padding: 6px;
            vertical-align: top;
            font-size: 11px;
        }

        tr:nth-child(even) td {
            background: #f8fafc;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #991b1b;
            font-weight: bold;
            border: 1px solid #fecaca;
            background: #fee2e2;
            border-radius: 10px;
        }

        .print-footer {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            color: #475569;
            font-size: 11px;
        }

        .no-print {
            margin-bottom: 18px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .no-print button {
            background: #0b7a4b;
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        @media print {
            body {
                padding: 0;
            }

            .no-print {
                display: none;
            }

            .cycle-block {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>

<div class="no-print">
    <button onclick="window.print()">Imprimer</button>
    <button onclick="window.close()">Fermer</button>
</div>

<div class="print-header">
    <h1>ISABEE - Université d’Ebolowa</h1>
    <h2>Liste répartie des candidats par centre, cycle, filière et spécialité</h2>
    <p>Centre d’examen : <strong>{{ $centre }}</strong></p>
</div>

<div class="summary-box">
    <div>
        <strong>Centre :</strong>
        {{ $centre }}
    </div>

    <div>
        <strong>Total candidats :</strong>
        {{ $candidats->count() }}
    </div>

    <div>
        <strong>Date d’impression :</strong>
        {{ now()->format('d/m/Y H:i') }}
    </div>
</div>

@if($candidats->count() === 0)
    <div class="empty">
        Aucun candidat trouvé pour le centre d’examen {{ $centre }}.
    </div>
@else

    @foreach($groupedCandidats as $cycleName => $filieres)
        @php
            $cycleTotal = 0;

            foreach ($filieres as $specialites) {
                foreach ($specialites as $items) {
                    $cycleTotal += $items->count();
                }
            }
        @endphp

        <div class="cycle-block">
            <div class="cycle-title">
                <span>Cycle : {{ $cycleName }}</span>
                <span>{{ $cycleTotal }} candidat(s)</span>
            </div>

            @foreach($filieres as $filiereName => $specialites)
                <div class="filiere-title">
                    Filière : {{ $filiereName }}
                </div>

                @foreach($specialites as $specialiteName => $items)
                    <div class="specialite-title">
                        Spécialité : {{ $specialiteName }} — {{ $items->count() }} candidat(s)
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th style="width: 35px;">N°</th>
                                <th>N° reçu</th>
                                <th>N° candidat</th>
                                <th>Nom complet</th>
                                <th>Sexe</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Handicap</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($items as $index => $candidat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $candidat->numero_recu ?? '---' }}</td>
                                    <td>{{ $candidat->numero_candidat ?? '---' }}</td>
                                    <td>{{ $candidat->nom_complet ?? '---' }}</td>
                                    <td>{{ $candidat->sexe ?? '---' }}</td>
                                    <td>{{ $candidat->numero_telephone_candidat ?? $candidat->telephone ?? '---' }}</td>
                                    <td>{{ $candidat->email ?? '---' }}</td>
                                    <td>{{ $candidat->handicape ?? '---' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            @endforeach
        </div>
    @endforeach

@endif

<div class="print-footer">
    <div>ISABEE - Université d’Ebolowa</div>
    <div>Document généré automatiquement</div>
</div>

<script>
    window.addEventListener('load', function () {
        setTimeout(function () {
            window.print();
        }, 600);
    });
</script>

</body>
</html>