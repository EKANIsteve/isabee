<div class="form-step">

    <div class="step-heading">
        <div class="step-icon">
            <i class="fa-solid fa-award"></i>
        </div>

        <div>
            <h3>Diplôme et pièces jointes</h3>
            <p>Renseignez les informations relatives au diplôme et aux fichiers.</p>
        </div>
    </div>

    <div class="subsection-title">
        <i class="fa-solid fa-certificate"></i>
        Informations sur le diplôme d’entrée
    </div>

    <div class="grid grid-3">

        <div class="field">
            <label>Diplôme d’entrée</label>
            <div class="input-icon">
                <i class="fa-solid fa-graduation-cap"></i>
                <input type="text"
                       name="diplome_entre"
                       value="{{ old('diplome_entre', $candidat->diplome_entre ?? '') }}"
                       placeholder="Ex : Baccalauréat, BTS, Licence">
            </div>
        </div>

        <div class="field">
            <label>Série du diplôme</label>
            <div class="input-icon">
                <i class="fa-solid fa-list"></i>
                <input type="text"
                       name="serie_diplome"
                       value="{{ old('serie_diplome', $candidat->serie_diplome ?? '') }}"
                       placeholder="Ex : C, D, F, A4">
            </div>
        </div>

        <div class="field">
            <label>Année d’obtention</label>
            <div class="input-icon">
                <i class="fa-solid fa-calendar"></i>
                <input type="text"
                       name="annee_obtention_diplome"
                       value="{{ old('annee_obtention_diplome', $candidat->annee_obtention_diplome ?? '') }}"
                       placeholder="Ex : 2024">
            </div>
        </div>

    </div>

    <div class="grid grid-3">

        <div class="field">
            <label>Établissement / Émetteur</label>
            <div class="input-icon">
                <i class="fa-solid fa-school"></i>
                <input type="text"
                       name="emetteur_entre_diplome"
                       value="{{ old('emetteur_entre_diplome', $candidat->emetteur_entre_diplome ?? '') }}"
                       placeholder="Nom de l’établissement">
            </div>
        </div>

        <div class="field">
            <label>Moyenne obtenue</label>
            <div class="input-icon">
                <i class="fa-solid fa-percent"></i>
                <input type="text"
                       name="moyenne_obtenu_diplome"
                       value="{{ old('moyenne_obtenu_diplome', $candidat->moyenne_obtenu_diplome ?? '') }}"
                       placeholder="Ex : 12.50">
            </div>
        </div>

        <div class="field">
            <label>Numéro du diplôme</label>
            <div class="input-icon">
                <i class="fa-solid fa-hashtag"></i>
                <input type="text"
                       name="numero_diplome_entre"
                       value="{{ old('numero_diplome_entre', $candidat->numero_diplome_entre ?? '') }}"
                       placeholder="Numéro du diplôme">
            </div>
        </div>

    </div>

    <div class="subsection-title">
        <i class="fa-solid fa-circle-info"></i>
        Autres informations
    </div>

    <div class="grid grid-2">

        <div class="field">
            <label>Sport pratiqué</label>
            <div class="input-icon">
                <i class="fa-solid fa-person-running"></i>
                <input type="text"
                       name="sport_pratique"
                       value="{{ old('sport_pratique', $candidat->sport_pratique ?? '') }}"
                       placeholder="Ex : Football">
            </div>
        </div>

        <div class="field">
            <label>Handicap</label>
            <div class="input-icon">
                <i class="fa-solid fa-wheelchair"></i>
                <select name="handicape">
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

    </div>

    <div class="subsection-title">
        <i class="fa-solid fa-folder-open"></i>
        Fichiers à joindre
    </div>

    <div class="grid grid-2">

        <div class="field file-field">
            <label>Photo du candidat</label>

            <div class="input-icon file-input-icon">
                <i class="fa-solid fa-image"></i>
                <input type="file"
                       name="photo_etudiant"
                       accept="image/png,image/jpeg,image/jpg">
            </div>

            @if(isset($candidat) && $candidat->photo_etudiant)
                <small>Photo actuelle : <strong>{{ $candidat->photo_etudiant }}</strong></small>
            @else
                <small>Formats acceptés : JPG, JPEG, PNG. Taille maximale : 2 Mo.</small>
            @endif
        </div>

       <div class="field file-field">
    <label>Document scanné</label>

    <div class="input-icon file-input-icon">
        <i class="fa-solid fa-image"></i>

        <input type="file"
               name="document_scanner"
               accept="image/png,image/jpeg,image/jpg">
    </div>

    @if(isset($candidat) && $candidat->document_scanner)
        <small>
            Document actuel :
            <strong>{{ $candidat->document_scanner }}</strong>
        </small>
    @else
        <small>
            Formats acceptés : JPG, JPEG, PNG. Taille maximale : 2 Mo.
        </small>
    @endif
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