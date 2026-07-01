<div class="form-step">

    <div class="step-heading">
        <div class="step-icon">
            <i class="fa-solid fa-award"></i>
        </div>

        <div>
            <h3>Diplôme et pièces jointes</h3>
            <p>Renseignez les informations relatives au diplôme, au sport et aux fichiers. Tous les champs sont obligatoires.</p>
        </div>
    </div>

    <div class="subsection-title">
        <i class="fa-solid fa-certificate"></i>
        Informations sur le diplôme d’entrée
    </div>

    <div class="grid grid-3">

        <div class="field">
            <label for="diplome_entre_select">Diplôme d’entrée <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-graduation-cap"></i>

                <select name="diplome_entre"
                        id="diplome_entre_select"
                        data-selected="{{ old('diplome_entre', $candidat->diplome_entre ?? '') }}"
                        required>
                    <option value="">Choisir d’abord le cycle</option>
                </select>
            </div>
        </div>

        <div class="field">
            <label>Série du diplôme <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-list"></i>
                <input type="text"
                       name="serie_diplome"
                       value="{{ old('serie_diplome', $candidat->serie_diplome ?? '') }}"
                       placeholder="Ex : C, D, TI, F4, Agricole..."
                       required>
            </div>
        </div>

        <div class="field">
            <label>Année d’obtention <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-calendar"></i>
                <input type="number"
                       name="annee_obtention_diplome"
                       value="{{ old('annee_obtention_diplome', $candidat->annee_obtention_diplome ?? '') }}"
                       placeholder="Ex : 2024"
                       min="1990"
                       max="2100"
                       required>
            </div>
        </div>

    </div>

    <div class="grid grid-3">

        <div class="field">
            <label>Établissement / Émetteur <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-school"></i>
                <input type="text"
                       name="emetteur_entre_diplome"
                       value="{{ old('emetteur_entre_diplome', $candidat->emetteur_entre_diplome ?? '') }}"
                       placeholder="Nom de l’établissement"
                       required>
            </div>
        </div>

        <div class="field">
            <label>Moyenne obtenue <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-percent"></i>
                <input type="text"
                       name="moyenne_obtenu_diplome"
                       value="{{ old('moyenne_obtenu_diplome', $candidat->moyenne_obtenu_diplome ?? '') }}"
                       placeholder="Ex : 12.50"
                       required>
            </div>
        </div>

        <div class="field">
            <label>Numéro du diplôme <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-hashtag"></i>
                <input type="text"
                       name="numero_diplome_entre"
                       value="{{ old('numero_diplome_entre', $candidat->numero_diplome_entre ?? '') }}"
                       placeholder="Numéro du diplôme"
                       required>
            </div>
        </div>

    </div>

    <div class="subsection-title">
        <i class="fa-solid fa-circle-info"></i>
        Autres informations
    </div>

    <div class="grid grid-3">

        <div class="field">
            <label>Sport pratiqué <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-person-running"></i>

                <select name="sport_pratique" required>
                    <option value="">Choisir un sport</option>

                    @php
                        $sportValue = old('sport_pratique', $candidat->sport_pratique ?? '');
                    @endphp

                    <option value="Football" {{ $sportValue == 'Football' ? 'selected' : '' }}>Football</option>
                    <option value="Basketball" {{ $sportValue == 'Basketball' ? 'selected' : '' }}>Basketball</option>
                    <option value="Handball" {{ $sportValue == 'Handball' ? 'selected' : '' }}>Handball</option>
                    <option value="Athlétisme" {{ $sportValue == 'Athlétisme' ? 'selected' : '' }}>Athlétisme</option>
                    <option value="Volleyball" {{ $sportValue == 'Volleyball' ? 'selected' : '' }}>Volleyball</option>
                    <option value="Autre" {{ $sportValue == 'Autre' ? 'selected' : '' }}>Autre</option>
                </select>
            </div>
        </div>

        <div class="field">
            <label>Handicap <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-wheelchair"></i>

                <select name="handicape" required>
                    <option value="">Choisir</option>

                    <option value="Non"
                        {{ old('handicape', $candidat->handicape ?? '') == 'Non' ? 'selected' : '' }}>
                        Non
                    </option>

                    <option value="Oui"
                        {{ old('handicape', $candidat->handicape ?? '') == 'Oui' ? 'selected' : '' }}>
                        Oui
                    </option>
                </select>
            </div>
        </div>

        <div class="field">
            <label>Type de handicap / précision <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-notes-medical"></i>
                <input type="text"
                       name="type_handicap"
                       value="{{ old('type_handicap', $candidat->type_handicap ?? '') }}"
                       placeholder="Écrire Aucun si non concerné"
                       required>
            </div>
        </div>

    </div>

    <div class="subsection-title">
        <i class="fa-solid fa-folder-open"></i>
        Fichiers à joindre
    </div>

    <div class="grid grid-2">

        <div class="field file-field">
            <label>Photo du candidat <span>*</span></label>

            <div class="input-icon file-input-icon">
                <i class="fa-solid fa-image"></i>

                <input type="file"
                       name="photo_etudiant"
                       id="photo_etudiant"
                       accept="image/png,image/jpeg,image/jpg"
                       @if(!isset($candidat) || !$candidat->photo_etudiant) required @endif>
            </div>

            @if(isset($candidat) && $candidat->photo_etudiant)
                <small>
                    Photo actuelle :
                    <strong>{{ $candidat->photo_etudiant }}</strong>.
                    Laissez vide si vous ne voulez pas la remplacer.
                </small>
            @else
                <small>Formats acceptés : JPG, JPEG, PNG. Taille maximale : 1 Mo.</small>
            @endif
        </div>

        <div class="field file-field">
            <label>Reçu scanné <span>*</span></label>

            <div class="input-icon file-input-icon">
                <i class="fa-solid fa-receipt"></i>

                <input type="file"
                       name="document_scanner"
                       id="document_scanner"
                       accept="image/png,image/jpeg,image/jpg"
                       @if(!isset($candidat) || !$candidat->document_scanner) required @endif>
            </div>

            @if(isset($candidat) && $candidat->document_scanner)
                <small>
                    Reçu actuel :
                    <strong>{{ $candidat->document_scanner }}</strong>.
                    Laissez vide si vous ne voulez pas le remplacer.
                </small>
            @else
                <small>Le reçu doit être clair et lisible. Formats acceptés : JPG, JPEG, PNG. Taille maximale : 1 Mo.</small>
            @endif
        </div>

    </div>

    <div class="submit-warning">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <span>Vérifiez soigneusement vos informations avant de valider.</span>
    </div>

    <div class="form-actions">
        <button type="button" class="btn prev">
            <i class="fa-solid fa-arrow-left"></i>
            Précédent
        </button>

        <button type="submit" class="btn-submit">
            <i class="fa-solid fa-floppy-disk"></i>
            {{ isset($candidat) ? 'Modifier mon inscription' : 'Valider mon inscription' }}
        </button>
    </div>

</div>