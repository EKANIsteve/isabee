@extends('layouts.app')

@section('title', 'Dashboard Administrateur')

@push('styles')
<style>
    .admin-dashboard {
        background: #f4f7fb;
        min-height: 100vh;
    }

    .admin-hero {
        background:
            radial-gradient(circle at top right, rgba(244,196,48,0.18), transparent 30%),
            linear-gradient(135deg, #063f2b, #0b7a4b);
        color: white;
        padding: 80px 0;
    }

    .admin-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255,255,255,0.14);
        padding: 9px 18px;
        border-radius: 50px;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .admin-hero h1 {
        font-size: 42px;
        font-weight: 900;
        margin-bottom: 12px;
    }

    .admin-hero p {
        font-size: 18px;
        opacity: 0.9;
    }

    .dashboard-container {
        padding: 50px 0;
    }

    .alert-success,
    .alert-error {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 16px 18px;
        border-radius: 16px;
        margin-bottom: 22px;
        font-weight: 800;
    }

    .alert-success {
        background: #dcfce7;
        color: #166534;
        border: 1px solid #bbf7d0;
    }

    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 22px;
        margin-bottom: 32px;
    }

    .stat-card {
        background: white;
        border-radius: 24px;
        padding: 26px;
        display: flex;
        align-items: center;
        gap: 18px;
        box-shadow: 0 16px 38px rgba(15, 23, 42, 0.08);
        border: 1px solid #e2e8f0;
    }

    .stat-icon {
        width: 62px;
        height: 62px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 26px;
        flex-shrink: 0;
    }

    .stat-icon.green { background: #0b7a4b; }
    .stat-icon.blue { background: #2563eb; }
    .stat-icon.pink { background: #db2777; }
    .stat-icon.orange { background: #f59e0b; }

    .stat-card span {
        color: #64748b;
        font-weight: 700;
    }

    .stat-card h2 {
        font-size: 34px;
        color: #063f2b;
        font-weight: 900;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
        margin-bottom: 28px;
    }

    .dashboard-card {
        background: white;
        border-radius: 24px;
        padding: 26px;
        box-shadow: 0 16px 38px rgba(15, 23, 42, 0.08);
        border: 1px solid #e2e8f0;
        margin-bottom: 28px;
    }

    .dashboard-card h3 {
        color: #063f2b;
        font-size: 21px;
        font-weight: 900;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .dashboard-card h3 i {
        color: #0b7a4b;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    .admin-table thead {
        background: #ecfdf5;
    }

    .admin-table th {
        color: #063f2b;
        font-weight: 900;
        text-align: left;
        padding: 14px;
        border-bottom: 1px solid #dbeafe;
        white-space: nowrap;
    }

    .admin-table td {
        padding: 13px 14px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        vertical-align: middle;
    }

    .admin-table tr:hover td {
        background: #f8fafc;
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .candidates-table {
        min-width: 1450px;
    }

    .candidate-photo {
        width: 54px;
        height: 54px;
        object-fit: cover;
        border-radius: 14px;
        border: 2px solid #e5e7eb;
        background: #f8fafc;
    }

    .filter-form,
    .admin-form,
    .role-form,
    .print-list-form {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        align-items: end;
    }

    .filter-form input,
    .filter-form select,
    .admin-form input,
    .admin-form select,
    .role-form select,
    .print-list-form select {
        height: 45px;
        border: 1px solid #cbd5e1;
        border-radius: 12px;
        padding: 0 13px;
        outline: none;
        background: white;
        color: #0f172a;
        font-weight: 600;
    }

    .filter-form input {
        min-width: 250px;
    }

    .filter-form button,
    .filter-form a,
    .admin-form button,
    .role-form button,
    .print-list-form button,
    .btn-mini {
        height: 42px;
        border: none;
        border-radius: 12px;
        padding: 0 15px;
        background: #0b7a4b;
        color: white !important;
        font-weight: 900;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        text-decoration: none !important;
        font-size: 13px;
    }

    .filter-form a {
        background: #64748b;
    }

    .btn-edit {
        background: #0369a1;
    }

    .btn-doc {
        background: #7c3aed;
    }

    .btn-delete {
        background: #dc2626;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        align-items: center;
    }

    .action-buttons form {
        margin: 0;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 11px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 900;
        white-space: nowrap;
    }

    .badge-success {
        background: #dcfce7;
        color: #166534;
    }

    .badge-warning {
        background: #fef3c7;
        color: #92400e;
    }

    .badge-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    .role-badge {
        display: inline-flex;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 900;
        background: #e0f2fe;
        color: #075985;
    }

    .role-super_admin {
        background: #fef3c7;
        color: #92400e;
    }

    .role-admin {
        background: #dcfce7;
        color: #166534;
    }

    .role-scolarite {
        background: #e0f2fe;
        color: #075985;
    }

    .role-viewer {
        background: #f1f5f9;
        color: #475569;
    }

    .pagination-wrap {
        margin-top: 20px;
    }
    .stats-by-cycle-card {
    grid-column: 1 / -1;
}

.cycle-stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
}

.cycle-stat-block {
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    overflow: hidden;
    background: #f8fafc;
}

.cycle-stat-header {
    background: linear-gradient(135deg, #063f2b, #0b7a4b);
    color: white;
    padding: 16px 18px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 14px;
}

.cycle-stat-header span {
    font-weight: 900;
    display: inline-flex;
    align-items: center;
    gap: 9px;
}

.cycle-stat-header strong {
    background: #f4c430;
    color: #063f2b;
    padding: 6px 11px;
    border-radius: 999px;
    font-size: 13px;
    white-space: nowrap;
}

.cycle-stat-body {
    padding: 14px;
}

.cycle-specialite-row {
    display: flex;
    justify-content: space-between;
    gap: 12px;
    padding: 12px 10px;
    border-bottom: 1px solid #e2e8f0;
    color: #334155;
}

.cycle-specialite-row:last-child {
    border-bottom: none;
}

.cycle-specialite-row span {
    font-weight: 700;
}

.cycle-specialite-row strong {
    color: #0b7a4b;
    font-weight: 900;
}

.export-toolbar {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 18px;
}

.btn-export-excel {
    background: #15803d;
}

.btn-export-zip {
    background: #7c3aed;
}

.btn-export-excel,
.btn-export-zip {
    height: 44px;
    border: none;
    border-radius: 13px;
    padding: 0 16px;
    color: white !important;
    font-weight: 900;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none !important;
    box-shadow: 0 12px 24px rgba(15, 23, 42, 0.12);
}

.btn-export-excel:hover,
.btn-export-zip:hover {
    transform: translateY(-2px);
}

@media(max-width: 900px) {
    .cycle-stats-grid {
        grid-template-columns: 1fr;
    }
}

    @media(max-width: 1100px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 650px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .admin-hero h1 {
            font-size: 32px;
        }

        .filter-form,
        .admin-form,
        .role-form,
        .print-list-form {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-form input,
        .filter-form select,
        .admin-form input,
        .admin-form select,
        .role-form select,
        .print-list-form select {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')

<section class="admin-dashboard">

    <div class="admin-hero">
        <div class="container">
            <span class="admin-badge">
                <i class="fa-solid fa-gauge-high"></i>
                Tableau de bord
            </span>

            <h1>Dashboard Administrateur ISABEE</h1>

            <p>
                Gestion des inscriptions, statistiques des candidats, photos, reçus et attribution des rôles.
            </p>
        </div>
    </div>

    <div class="container dashboard-container">

        @if(session('success'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <div>
                    <strong>Veuillez corriger :</strong>
                    <ul style="margin-top:8px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div>
                    <span>Total candidats</span>
                    <h2>{{ $totalCandidats }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="fa-solid fa-mars"></i>
                </div>

                <div>
                    <span>Hommes</span>
                    <h2>{{ $totalHommes }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon pink">
                    <i class="fa-solid fa-venus"></i>
                </div>

                <div>
                    <span>Femmes</span>
                    <h2>{{ $totalFemmes }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon orange">
                    <i class="fa-solid fa-wheelchair"></i>
                </div>

                <div>
                    <span>Handicapés</span>
                    <h2>{{ $totalHandicapes }}</h2>
                </div>
            </div>

        </div>

        <div class="dashboard-grid">

            <div class="dashboard-card stats-by-cycle-card">
    <h3>
        <i class="fa-solid fa-layer-group"></i>
        Statistiques par cycle et par spécialité
    </h3>

    <div class="cycle-stats-grid">
        @forelse($statsSpecialitesParCycle as $cycleStat)
            <div class="cycle-stat-block">
                <div class="cycle-stat-header">
                    <span>
                        <i class="fa-solid fa-graduation-cap"></i>
                        {{ $cycleStat->cycle }}
                    </span>

                    <strong>{{ $cycleStat->total }} candidat(s)</strong>
                </div>

                <div class="cycle-stat-body">
                    @forelse($cycleStat->specialites as $specialite)
                        <div class="cycle-specialite-row">
                            <span>{{ $specialite->label ?? 'Non défini' }}</span>
                            <strong>{{ $specialite->total }}</strong>
                        </div>
                    @empty
                        <div class="cycle-specialite-row">
                            <span>Aucune spécialité</span>
                            <strong>0</strong>
                        </div>
                    @endforelse
                </div>
            </div>
        @empty
            <div class="cycle-stat-block">
                <div class="cycle-stat-header">
                    <span>
                        <i class="fa-solid fa-circle-info"></i>
                        Aucune donnée disponible
                    </span>

                    <strong>0</strong>
                </div>

                <div class="cycle-stat-body">
                    <div class="cycle-specialite-row">
                        <span>Aucune inscription pour le moment.</span>
                        <strong>0</strong>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
            <div class="dashboard-card">
                <h3>
                    <i class="fa-solid fa-venus-mars"></i>
                    Statistiques par sexe
                </h3>

                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Sexe</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($statsSexe as $item)
                            <tr>
                                <td>{{ $item->label ?? 'Non défini' }}</td>
                                <td>{{ $item->total }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Aucune donnée disponible.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="dashboard-card">
                <h3>
                    <i class="fa-solid fa-map-location-dot"></i>
                    Statistiques par région
                </h3>

                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Région</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($statsRegions as $item)
                            <tr>
                                <td>{{ $item->label ?? 'Non défini' }}</td>
                                <td>{{ $item->total }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Aucune donnée disponible.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="dashboard-card">
                <h3>
                    <i class="fa-solid fa-wheelchair"></i>
                    Statistiques par type de handicap
                </h3>

                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Type handicap</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($statsHandicap as $item)
                            <tr>
                                <td>{{ $item->label ?? 'Non précisé' }}</td>
                                <td>{{ $item->total }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Aucune donnée disponible.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

        <div class="dashboard-card print-list-card">
            <h3>
                <i class="fa-solid fa-print"></i>
                Imprimer les listes par centre, cycle, filière et spécialité
            </h3>

            <p style="color:#64748b; font-weight:600; margin-bottom:18px;">
                Sélectionnez un centre d’examen pour générer une liste PDF répartie automatiquement par cycle, filière et spécialité.
            </p>

            <form action="{{ route('admin.imprimer.liste.centre.repartie') }}"
                  method="GET"
                  target="_blank"
                  class="print-list-form">

                <div>
                    <label>Centre d’examen</label><br>

                    <select name="centre_examen" required>
                        <option value="">Choisir un centre</option>
                        <option value="Bertoua">Bertoua</option>
                        <option value="Douala">Douala</option>
                        <option value="Dschang">Dschang</option>
                        <option value="Ebolowa">Ebolowa</option>
                        <option value="Garoua">Garoua</option>
                        <option value="Meyomessala">Meyomessala</option>
                        <option value="Yaounde">Yaoundé</option>
                    </select>
                </div>

                <button type="submit">
                    <i class="fa-solid fa-file-pdf"></i>
                    Imprimer la liste répartie
                </button>
            </form>
        </div>

        <div class="dashboard-card">
            <h3>
                <i class="fa-solid fa-filter"></i>
                Rechercher un candidat
            </h3>

            <form method="GET" action="{{ route('admin.dashboard') }}" class="filter-form">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Nom, reçu, numéro candidat, téléphone ou email">

                <select name="centre_examen">
                    <option value="">Tous les centres</option>
                    <option value="Bertoua" {{ request('centre_examen') == 'Bertoua' ? 'selected' : '' }}>Bertoua</option>
                    <option value="Douala" {{ request('centre_examen') == 'Douala' ? 'selected' : '' }}>Douala</option>
                    <option value="Dschang" {{ request('centre_examen') == 'Dschang' ? 'selected' : '' }}>Dschang</option>
                    <option value="Ebolowa" {{ request('centre_examen') == 'Ebolowa' ? 'selected' : '' }}>Ebolowa</option>
                    <option value="Garoua" {{ request('centre_examen') == 'Garoua' ? 'selected' : '' }}>Garoua</option>
                    <option value="Meyomessala" {{ request('centre_examen') == 'Meyomessala' ? 'selected' : '' }}>Meyomessala</option>
                    <option value="Yaounde" {{ request('centre_examen') == 'Yaounde' ? 'selected' : '' }}>Yaoundé</option>
                </select>

                <select name="sexe">
                    <option value="">Tous les sexes</option>
                    <option value="Masculin" {{ request('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                    <option value="Féminin" {{ request('sexe') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                </select>

                <select name="handicape">
                    <option value="">Tous</option>
                    <option value="Oui" {{ request('handicape') == 'Oui' ? 'selected' : '' }}>Handicapé</option>
                    <option value="Non" {{ request('handicape') == 'Non' ? 'selected' : '' }}>Non handicapé</option>
                </select>

                <button type="submit">
                    <i class="fa-solid fa-search"></i>
                    Rechercher
                </button>

                <a href="{{ route('admin.dashboard') }}">
                    Réinitialiser
                </a>
            </form>
        </div>

        <div class="dashboard-card candidates-list-card">
            <h3>
                <i class="fa-solid fa-list"></i>
                Liste complète des candidats inscrits
            </h3>
            <div class="export-toolbar">
    <a href="{{ route('admin.export.candidats.excel', request()->query()) }}"
       class="btn-export-excel">
        <i class="fa-solid fa-file-excel"></i>
        Exporter Excel
    </a>

    <a href="{{ route('admin.export.candidats.medias', request()->query()) }}"
       class="btn-export-zip">
        <i class="fa-solid fa-file-zipper"></i>
        Exporter photos + reçus scannés
    </a>
</div>
            <div class="table-responsive">
                <table class="admin-table candidates-table">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>N° reçu</th>
                            <th>N° candidat</th>
                            <th>Nom complet</th>
                            <th>Sexe</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Centre</th>
                            <th>Cycle</th>
                            <th>Filière</th>
                            <th>Spécialité</th>
                            <th>Handicap</th>
                            <th>Type handicap</th>
                            <th>Document</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($candidats as $candidat)
                            @php
                                $photoUrl = $candidat->photo_url;
                                $documentUrl = $candidat->document_url;

                                $handicapeValue = strtolower((string) $candidat->handicape);
                                $isHandicape = in_array($handicapeValue, ['oui', 'yes', '1', 'true']);
                            @endphp

                            <tr>
                                <td>
                                    <img src="{{ $photoUrl }}"
                                         alt="Photo candidat"
                                         class="candidate-photo"
                                         onerror="this.onerror=null;this.src='{{ asset('images/default-user.png') }}';">
                                </td>

                                <td>{{ $candidat->numero_recu ?? '---' }}</td>
                                <td>{{ $candidat->numero_candidat ?? '---' }}</td>
                                <td><strong>{{ $candidat->nom_complet ?? '---' }}</strong></td>
                                <td>{{ $candidat->sexe ?? '---' }}</td>
                                <td>{{ $candidat->telephone ?? $candidat->numero_telephone_candidat ?? '---' }}</td>
                                <td>{{ $candidat->email ?? '---' }}</td>
                                <td>{{ $candidat->centre_examen ?? '---' }}</td>

                                <td>{{ $candidat->cycle?->nom_cycle ?? '---' }}</td>

                                <td>
                                    {{ $candidat->filiere?->nom_filiere
                                        ?? $candidat->filiere?->nom
                                        ?? $candidat->filiere?->libelle
                                        ?? $candidat->filiere?->designation
                                        ?? '---' }}
                                </td>

                                <td>
                                    {{ $candidat->specialite?->nom_specialite
                                        ?? $candidat->specialite?->nom
                                        ?? $candidat->specialite?->libelle
                                        ?? $candidat->specialite?->designation
                                        ?? $candidat->specialite?->intitule
                                        ?? '---' }}
                                </td>

                                <td>
                                    @if($isHandicape)
                                        <span class="badge badge-warning">Oui</span>
                                    @else
                                        <span class="badge badge-success">Non</span>
                                    @endif
                                </td>

                                <td>{{ $candidat->type_handicap ?? '---' }}</td>

                                <td>
                                    @if($documentUrl)
                                        <a href="{{ $documentUrl }}" target="_blank" class="btn-mini btn-doc">
                                            Voir
                                        </a>
                                    @else
                                        ---
                                    @endif
                                </td>

                                <td>
                                    <div class="action-buttons">
                                        @if(Route::has('admin.concours.show'))
                                            <a href="{{ route('admin.concours.show', $candidat->id) }}" class="btn-mini">
                                                Voir
                                            </a>
                                        @endif

                                        @if(auth()->user()->isSuperAdmin() && Route::has('admin.concours.edit'))
                                            <a href="{{ route('admin.concours.edit', $candidat->id) }}" class="btn-mini btn-edit">
                                                Modifier
                                            </a>
                                        @endif

                                        @if(auth()->user()->isSuperAdmin() && Route::has('admin.concours.destroy'))
                                            <form action="{{ route('admin.concours.destroy', $candidat->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Voulez-vous vraiment supprimer ce candidat ? Cette action est définitive.');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn-mini btn-delete">
                                                    Supprimer
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="15">Aucun candidat inscrit pour le moment.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrap">
                {{ $candidats->links() }}
            </div>
        </div>

        @if(auth()->user()->isSuperAdmin())
            <div class="dashboard-card">
                <h3>
                    <i class="fa-solid fa-user-plus"></i>
                    Créer un utilisateur
                </h3>

                <form action="{{ route('admin.users.store') }}" method="POST" class="admin-form">
                    @csrf

                    <input type="text" name="name" placeholder="Nom complet" required>
                    <input type="email" name="email" placeholder="Adresse email" required>
                    <input type="password" name="password" placeholder="Mot de passe minimum 8 caractères" required>

                    <select name="role" required>
                        <option value="">Choisir un rôle</option>
                        <option value="super_admin">Super Admin</option>
                        <option value="admin">Admin</option>
                        <option value="scolarite">Scolarité</option>
                        <option value="viewer">Viewer - lecture seule</option>
                    </select>

                    <button type="submit">
                        <i class="fa-solid fa-save"></i>
                        Créer le compte
                    </button>
                </form>
            </div>
        @endif

        @if(auth()->user()->isSuperAdmin())
            <div class="dashboard-card role-card">
                <h3>
                    <i class="fa-solid fa-user-shield"></i>
                    Attribution des rôles
                </h3>

                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Rôle actuel</th>
                                <th>Changer le rôle</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        <span class="role-badge role-{{ $user->role }}">
                                            {{ strtoupper(str_replace('_', ' ', $user->role)) }}
                                        </span>
                                    </td>

                                    <td>
                                        <form action="{{ route('admin.users.role.update', $user->id) }}"
                                              method="POST"
                                              class="role-form">
                                            @csrf
                                            @method('PUT')

                                            <select name="role">
                                                <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>
                                                    Super Admin
                                                </option>

                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                                    Admin
                                                </option>

                                                <option value="scolarite" {{ $user->role == 'scolarite' ? 'selected' : '' }}>
                                                    Scolarité
                                                </option>

                                                <option value="viewer" {{ $user->role == 'viewer' ? 'selected' : '' }}>
                                                    Viewer - lecture seule
                                                </option>
                                            </select>

                                            <button type="submit">
                                                Modifier
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Aucun utilisateur trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>
</section>

@endsection