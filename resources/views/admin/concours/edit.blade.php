@extends('layouts.app')

@section('title', 'Modifier inscription candidat')

@section('content')

<section class="admin-dashboard">
    <div class="container dashboard-container">

        <div class="dashboard-card">
            <h3>
                <i class="fa-solid fa-pen-to-square"></i>
                Modifier l’inscription
            </h3>

            @if($errors->any())
                <div class="alert-error-pro">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.concours.update', $concours->id) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="admin-form">

                @csrf
                @method('PUT')

                <label>Photo actuelle</label>
                <img src="{{ $concours->photo_url }}"
                     alt="Photo candidat"
                     class="candidate-photo"
                     style="width:90px;height:90px;margin-bottom:15px;">

                <label>Changer la photo</label>
                <input type="file" name="photo_etudiant" accept="image/*">

                <label>Numéro de reçu</label>
                <input type="text" name="numero_recu" value="{{ old('numero_recu', $concours->numero_recu) }}">

                <label>Numéro candidat</label>
                <input type="text" name="numero_candidat" value="{{ old('numero_candidat', $concours->numero_candidat) }}">

                <label>Nom complet</label>
                <input type="text" name="nom_complet" value="{{ old('nom_complet', $concours->nom_complet) }}" required>

                <label>Date de naissance</label>
                <input type="date" name="date_naissance" value="{{ old('date_naissance', optional($concours->date_naissance)->format('Y-m-d')) }}">

                <label>Lieu de naissance</label>
                <input type="text" name="lieu_naissance" value="{{ old('lieu_naissance', $concours->lieu_naissance) }}">

                <label>Numéro CNI</label>
                <input type="text" name="numero_nci" value="{{ old('numero_nci', $concours->numero_nci) }}">

                <label>Sexe</label>
                <select name="sexe">
                    <option value="">Choisir</option>
                    <option value="Masculin" {{ old('sexe', $concours->sexe) == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                    <option value="Féminin" {{ old('sexe', $concours->sexe) == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                </select>

                <label>Téléphone</label>
                <input type="text" name="telephone" value="{{ old('telephone', $concours->telephone) }}">

                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $concours->email) }}">

                <label>Centre d’examen</label>
                <input type="text" name="centre_examen" value="{{ old('centre_examen', $concours->centre_examen) }}">

                <label>Profession</label>
                <input type="text" name="profession" value="{{ old('profession', $concours->profession) }}">

                <label>Handicapé ?</label>
                <select name="handicape">
                    <option value="Non" {{ old('handicape', $concours->handicape) == 'Non' ? 'selected' : '' }}>Non</option>
                    <option value="Oui" {{ old('handicape', $concours->handicape) == 'Oui' ? 'selected' : '' }}>Oui</option>
                </select>

                <label>Type de handicap</label>
                <input type="text"
                       name="type_handicap"
                       value="{{ old('type_handicap', $concours->type_handicap) }}"
                       placeholder="Exemple : moteur, visuel, auditif, autre">

                <label>Document scanné actuel</label>
                @if($concours->document_url)
                    <p>
                        <a href="{{ $concours->document_url }}" target="_blank" class="btn-mini">
                            Voir le document actuel
                        </a>
                    </p>
                @else
                    <p>Aucun document enregistré.</p>
                @endif

                <label>Changer le document scanné</label>
                <input type="file" name="document_scanner" accept=".pdf,.jpg,.jpeg,.png">

                <button type="submit">
                    Enregistrer les modifications
                </button>

                <a href="{{ route('admin.dashboard') }}" class="btn-mini">
                    Retour
                </a>
            </form>
        </div>

    </div>
</section>

@endsection