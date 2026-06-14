@extends('layouts.app')

@section('title', isset($candidat) ? 'Modifier inscription concours ISABEE' : 'Nouvelle inscription concours ISABEE')

@section('content')

<section class="isabee-form-page">

    <div class="form-hero">
        <div class="form-hero-overlay"></div>

        <div class="container form-hero-content">
            <div>
                <span class="form-hero-badge">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Concours ISABEE 2026
                </span>

                <h1>
                    {{ isset($candidat) ? 'Modification de votre inscription' : 'Inscription au concours ISABEE' }}
                </h1>

                <p>
                    {{ isset($candidat)
                        ? 'Votre formulaire est ouvert en mode édition. Les anciennes informations sont conservées.'
                        : 'Remplissez soigneusement toutes les informations demandées afin de générer votre fiche officielle.' }}
                </p>
            </div>

            <div class="form-hero-logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo ISABEE">
            </div>
        </div>
    </div>

    <div class="form-container">
        <div class="form-card">

            <div class="form-header">
                <div>
                    <span>
                        {{ isset($candidat) ? 'Mode édition' : 'Préinscription officielle' }}
                    </span>

                    <h2>
                        {{ isset($candidat) ? 'Modifier la fiche de candidature' : 'Formulaire de candidature' }}
                    </h2>
                </div>

                <div class="form-header-icon">
                    <i class="fa-solid fa-file-signature"></i>
                </div>
            </div>

            @if($errors->any())
                <div class="alert-error-pro">
                    <i class="fa-solid fa-circle-exclamation"></i>

                    <div>
                        <strong>Veuillez corriger les erreurs suivantes :</strong>
                        <ul style="margin-top:8px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('candidat_id'))
                <div class="print-zone">
                    <a href="{{ route('concours.fiche', session('candidat_id')) }}"
                       target="_blank"
                       class="btn-print">
                        <i class="fa-solid fa-print"></i>
                        Imprimer la fiche d’inscription
                    </a>
                </div>
            @endif

            <div class="receipt-box">
                <div>
                    <i class="fa-solid fa-building-columns"></i>
                </div>

                <div>
                    <strong>Numéro de transaction CCA Bank Cameroun</strong>
                    <p>
                        {{ old('numero_recu', $candidat->numero_recu ?? $numeroRecu ?? 'Non défini') }}
                    </p>
                    <small>
                        Ce numéro prouve le paiement. Il est unique pour chaque candidat.
                    </small>
                </div>
            </div>

            <div class="progress-bar">
                <div class="progress-step active">
                    <span>1</span>
                    Formation
                </div>

                <div class="progress-step">
                    <span>2</span>
                    Candidat
                </div>

                <div class="progress-step">
                    <span>3</span>
                    Localisation
                </div>

                <div class="progress-step">
                    <span>4</span>
                    Famille
                </div>

                <div class="progress-step">
                    <span>5</span>
                    Diplôme
                </div>
            </div>

            <form method="POST"
                  action="{{ isset($candidat) ? route('concours.update', $candidat->id) : route('concours.store') }}"
                  enctype="multipart/form-data"
                  id="concoursForm">

                @csrf

                @if(isset($candidat))
                    @method('PUT')
                @endif

                <input type="hidden"
                       name="numero_recu"
                       value="{{ old('numero_recu', $candidat->numero_recu ?? $numeroRecu ?? '') }}">

                @include('concours.steps.formation')
                @include('concours.steps.informations')
                @include('concours.steps.localisation')
                @include('concours.steps.famille')
                @include('concours.steps.diplome')


            </form>

        </div>
    </div>

</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const paysSelect = document.getElementById('pays_select');
    const regionSelect = document.getElementById('region_select');
    const departementSelect = document.getElementById('departement_select');
    const arrondissementSelect = document.getElementById('arrondissement_select');

    if (!paysSelect || !regionSelect || !departementSelect || !arrondissementSelect) {
        return;
    }

    function resetSelect(select, text) {
        select.innerHTML = `<option value="">${text}</option>`;
    }

    function disableLocalisation() {
        resetSelect(regionSelect, 'Non applicable');
        resetSelect(departementSelect, 'Non applicable');
        resetSelect(arrondissementSelect, 'Non applicable');

        regionSelect.disabled = true;
        departementSelect.disabled = true;
        arrondissementSelect.disabled = true;

        regionSelect.required = false;
        departementSelect.required = false;
        arrondissementSelect.required = false;
    }

    function enableLocalisation() {
        regionSelect.disabled = false;
        departementSelect.disabled = false;
        arrondissementSelect.disabled = false;

        regionSelect.required = true;
        departementSelect.required = true;
        arrondissementSelect.required = true;
    }

    function isCameroonSelected() {
        const option = paysSelect.options[paysSelect.selectedIndex];
        return option && option.dataset.cameroon === '1';
    }

    function loadRegions(selectedRegion = null) {
        const paysId = paysSelect.value;

        if (!paysId || !isCameroonSelected()) {
            disableLocalisation();
            return;
        }

        enableLocalisation();

        resetSelect(regionSelect, 'Chargement...');
        resetSelect(departementSelect, 'Sélectionner un département');
        resetSelect(arrondissementSelect, 'Sélectionner un arrondissement');

        fetch(`/localisation/regions/${paysId}`)
            .then(response => response.json())
            .then(data => {
                resetSelect(regionSelect, 'Sélectionner une région');

                data.forEach(region => {
                    const selected = selectedRegion == region.id ? 'selected' : '';

                    regionSelect.innerHTML += `
                        <option value="${region.id}" ${selected}>
                            ${region.nom_region}
                        </option>
                    `;
                });

                if (selectedRegion) {
                    loadDepartements(departementSelect.dataset.selected);
                }
            });
    }

    function loadDepartements(selectedDepartement = null) {
        const regionId = regionSelect.value;

        resetSelect(departementSelect, 'Chargement...');
        resetSelect(arrondissementSelect, 'Sélectionner un arrondissement');

        if (!regionId) {
            resetSelect(departementSelect, 'Sélectionner un département');
            return;
        }

        fetch(`/localisation/departements/${regionId}`)
            .then(response => response.json())
            .then(data => {
                resetSelect(departementSelect, 'Sélectionner un département');

                data.forEach(departement => {
                    const selected = selectedDepartement == departement.id ? 'selected' : '';

                    departementSelect.innerHTML += `
                        <option value="${departement.id}" ${selected}>
                            ${departement.nom_departement}
                        </option>
                    `;
                });

                if (selectedDepartement) {
                    loadArrondissements(arrondissementSelect.dataset.selected);
                }
            });
    }

    function loadArrondissements(selectedArrondissement = null) {
        const departementId = departementSelect.value;

        resetSelect(arrondissementSelect, 'Chargement...');

        if (!departementId) {
            resetSelect(arrondissementSelect, 'Sélectionner un arrondissement');
            return;
        }

        fetch(`/localisation/arrondissements/${departementId}`)
            .then(response => response.json())
            .then(data => {
                resetSelect(arrondissementSelect, 'Sélectionner un arrondissement');

                data.forEach(arrondissement => {
                    const selected = selectedArrondissement == arrondissement.id ? 'selected' : '';

                    arrondissementSelect.innerHTML += `
                        <option value="${arrondissement.id}" ${selected}>
                            ${arrondissement.nom_arrondissement}
                        </option>
                    `;
                });
            });
    }

    paysSelect.addEventListener('change', function () {
        regionSelect.dataset.selected = '';
        departementSelect.dataset.selected = '';
        arrondissementSelect.dataset.selected = '';
        loadRegions();
    });

    regionSelect.addEventListener('change', function () {
        departementSelect.dataset.selected = '';
        arrondissementSelect.dataset.selected = '';
        loadDepartements();
    });

    departementSelect.addEventListener('change', function () {
        arrondissementSelect.dataset.selected = '';
        loadArrondissements();
    });

    loadRegions(regionSelect.dataset.selected);
});
</script>
@endsection