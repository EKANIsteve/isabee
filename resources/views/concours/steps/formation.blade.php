<div class="form-step active">

    <div class="step-heading">
        <div class="step-icon">
            <i class="fa-solid fa-layer-group"></i>
        </div>

        <div>
            <h3>Formation sollicitée</h3>
            <p>Choisissez le cycle, la filière, la spécialité et le centre d’examen.</p>
        </div>
    </div>

    @php
        $centres = $centresExamen ?? [
            'Bertoua' => 'Bertoua',
            'Douala' => 'Douala',
            'Dschang' => 'Dschang',
            'Ebolowa' => 'Ebolowa',
            'Garoua' => 'Garoua',
            'Meyomessala' => 'Meyomessala',
            'Yaounde' => 'Yaoundé',
        ];
    @endphp

    <div class="grid grid-2">

        <div class="field">
            <label for="cycle_select">Cycle <span>*</span></label>

            <div class="input-icon">
                <i class="fa-solid fa-layer-group"></i>

                <select name="cycle_id" id="cycle_select" required>
                    <option value="">Sélectionner un cycle</option>

                    @foreach($cycles as $cycle)
                        <option value="{{ $cycle->id }}"
                            {{ old('cycle_id', $candidat->cycle_id ?? '') == $cycle->id ? 'selected' : '' }}>
                            {{ $cycle->nom_cycle }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="field">
            <label for="filiere_select">Filière <span>*</span></label>

            <div class="input-icon">
                <i class="fa-solid fa-sitemap"></i>

                <select name="filiere_id"
                        id="filiere_select"
                        data-selected="{{ old('filiere_id', $candidat->filiere_id ?? '') }}"
                        required>

                    <option value="">Sélectionner une filière</option>

                    @isset($filieres)
                        @foreach($filieres as $filiere)
                            <option value="{{ $filiere->id }}"
                                {{ old('filiere_id', $candidat->filiere_id ?? '') == $filiere->id ? 'selected' : '' }}>
                                {{ $filiere->nom_filiere }}
                            </option>
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>

        <div class="field">
            <label for="specialite_select">Spécialité <span>*</span></label>

            <div class="input-icon">
                <i class="fa-solid fa-graduation-cap"></i>

                <select name="specialite_id"
                        id="specialite_select"
                        data-selected="{{ old('specialite_id', $candidat->specialite_id ?? '') }}"
                        required>

                    <option value="">Sélectionner une spécialité</option>

                    @isset($specialites)
                        @foreach($specialites as $specialite)
                            <option value="{{ $specialite->id }}"
                                {{ old('specialite_id', $candidat->specialite_id ?? '') == $specialite->id ? 'selected' : '' }}>
                                {{ $specialite->nom_specialite }}
                            </option>
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>

        <div class="field">
            <label for="centre_examen">Centre d’examen <span>*</span></label>

            <div class="input-icon">
                <i class="fa-solid fa-location-dot"></i>

                <select name="centre_examen" id="centre_examen" required>
                    <option value="">Choisir un centre</option>

                    @foreach($centres as $key => $value)
                        <option value="{{ $key }}"
                            {{ old('centre_examen', $candidat->centre_examen ?? '') == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <div></div>

        <button type="button" class="btn next" id="btnFormation">
            Suivant
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>

</div>