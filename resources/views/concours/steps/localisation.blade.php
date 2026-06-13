<div class="form-step">

    <div class="step-heading">
        <div class="step-icon">
            <i class="fa-solid fa-location-dot"></i>
        </div>

        <div>
            <h3>Localisation du candidat</h3>
            <p>Renseignez le pays, la région, le département et l’arrondissement.</p>
        </div>
    </div>

    <div class="grid grid-2">

        <div class="field">
            <label for="pays_select">Pays <span>*</span></label>

            <div class="input-icon">
                <i class="fa-solid fa-earth-africa"></i>

                <select name="pays_id" id="pays_select" required>
                    <option value="">Sélectionner un pays</option>

                    @foreach($pays as $item)
                        <option value="{{ $item->id }}"
                            {{ old('pays_id', $candidat->pays_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->nom_pays }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label for="region_select">Région <span>*</span></label>

            <div class="input-icon">
                <i class="fa-solid fa-map-location-dot"></i>

                <select name="region_id" id="region_select" required>
                    <option value="">Sélectionner une région</option>

                    @isset($regions)
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}"
                                {{ old('region_id', $candidat->region_id ?? '') == $region->id ? 'selected' : '' }}>
                                {{ $region->nom_region }}
                            </option>
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>

        <div class="field">
            <label for="departement_select">Département <span>*</span></label>

            <div class="input-icon">
                <i class="fa-solid fa-map"></i>

                <select name="departement_id" id="departement_select" required>
                    <option value="">Sélectionner un département</option>

                    @isset($departements)
                        @foreach($departements as $departement)
                            <option value="{{ $departement->id }}"
                                {{ old('departement_id', $candidat->departement_id ?? '') == $departement->id ? 'selected' : '' }}>
                                {{ $departement->nom_departement }}
                            </option>
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>

        <div class="field">
            <label for="arrondissement_select">Arrondissement <span>*</span></label>

            <div class="input-icon">
                <i class="fa-solid fa-location-crosshairs"></i>

                <select name="arrondissement_id" id="arrondissement_select" required>
                    <option value="">Sélectionner un arrondissement</option>

                    @isset($arrondissements)
                        @foreach($arrondissements as $arrondissement)
                            <option value="{{ $arrondissement->id }}"
                                {{ old('arrondissement_id', $candidat->arrondissement_id ?? '') == $arrondissement->id ? 'selected' : '' }}>
                                {{ $arrondissement->nom_arrondissement }}
                            </option>
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="button" class="btn prev">
            <i class="fa-solid fa-arrow-left"></i>
            Précédent
        </button>

        <button type="button" class="btn next">
            Suivant
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>

</div>