<div class="form-step">

    <div class="step-heading">
        <div class="step-icon">
            <i class="fa-solid fa-location-dot"></i>
        </div>

        <div>
            <h3>Localisation du candidat</h3>
            <p>
                Sélectionnez le pays. Si le pays est Cameroon, les régions, départements
                et arrondissements seront chargés automatiquement.
            </p>
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
                            data-cameroon="{{ in_array($item->nom_pays, ['Cameroon', 'Cameroun']) ? '1' : '0' }}"
                            {{ old('pays_id', $candidat->pays_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->nom_pays }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label for="region_select">Région</label>

            <div class="input-icon">
                <i class="fa-solid fa-map-location-dot"></i>

                <select name="region_id"
                        id="region_select"
                        data-selected="{{ old('region_id', $candidat->region_id ?? '') }}">
                    <option value="">Sélectionner une région</option>
                </select>
            </div>
        </div>

        <div class="field">
            <label for="departement_select">Département</label>

            <div class="input-icon">
                <i class="fa-solid fa-map"></i>

                <select name="departement_id"
                        id="departement_select"
                        data-selected="{{ old('departement_id', $candidat->departement_id ?? '') }}">
                    <option value="">Sélectionner un département</option>
                </select>
            </div>
        </div>

        <div class="field">
            <label for="arrondissement_select">Arrondissement</label>

            <div class="input-icon">
                <i class="fa-solid fa-location-crosshairs"></i>

                <select name="arrondissement_id"
                        id="arrondissement_select"
                        data-selected="{{ old('arrondissement_id', $candidat->arrondissement_id ?? '') }}">
                    <option value="">Sélectionner un arrondissement</option>
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