@extends('layouts.app')

@section('title', 'Dashboard Administrateur')

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
                Gestion des inscriptions, statistiques des candidats et attribution des rôles.
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

        </div>

        <div class="dashboard-grid">

            <div class="dashboard-card">
                <h3>
                    <i class="fa-solid fa-graduation-cap"></i>
                    Statistiques par spécialité
                </h3>

                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Spécialité</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($statsSpecialites as $item)
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
                    <i class="fa-solid fa-briefcase"></i>
                    Statistiques par profession
                </h3>

                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Profession</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($statsProfessions as $item)
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

        <div class="print-field">
            <label>Centre d’examen</label>

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

        @if(auth()->user()->isSuperAdmin())
            <div class="dashboard-card role-card">
                <h3>
                    <i class="fa-solid fa-user-shield"></i>
                    Attribution des rôles
                </h3>

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
                        @foreach($users as $user)
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
                                                Viewer
                                            </option>
                                        </select>

                                        <button type="submit">
                                            Modifier
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>

</section>

@endsection