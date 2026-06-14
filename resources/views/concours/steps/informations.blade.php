<div class="form-step">

    <div class="step-heading">
        <div class="step-icon">
            <i class="fa-solid fa-user"></i>
        </div>

        <div>
            <h3>Informations personnelles</h3>
            <p>Renseignez les informations d’identification du candidat.</p>
        </div>
    </div>

    <div class="grid grid-2">

        <div class="field">
            <label>Nom complet <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-user"></i>
                <input type="text"
                       name="nom_complet"
                       value="{{ old('nom_complet', $candidat->nom_complet ?? '') }}"
                       placeholder="Nom et prénoms"
                       required>
            </div>
        </div>

        <div class="field">
            <label>Date de naissance <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-calendar-days"></i>
                <input type="date"
                       name="date_naissance"
                       value="{{ old('date_naissance', isset($candidat) && $candidat->date_naissance ? \Carbon\Carbon::parse($candidat->date_naissance)->format('Y-m-d') : '') }}"
                       required>
            </div>
        </div>

        <div class="field">
            <label>Lieu de naissance <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-location-dot"></i>
                <input type="text"
                       name="lieu_naissance"
                       value="{{ old('lieu_naissance', $candidat->lieu_naissance ?? '') }}"
                       placeholder="Ville de naissance"
                       required>
            </div>
        </div>

        <div class="field">
            <label>Numéro CNI</label>
            <div class="input-icon">
                <i class="fa-solid fa-id-card"></i>
                <input type="text"
                       name="numero_nci"
                       value="{{ old('numero_nci', $candidat->numero_nci ?? '') }}"
                       placeholder="Numéro de CNI">
            </div>
        </div>

        <div class="field">
            <label>Sexe <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-venus-mars"></i>
                <select name="sexe" required>
                    <option value="">Choisir</option>

                    <option value="Masculin"
                        {{ old('sexe', $candidat->sexe ?? '') == 'Masculin' ? 'selected' : '' }}>
                        Masculin
                    </option>

                    <option value="Féminin"
                        {{ old('sexe', $candidat->sexe ?? '') == 'Féminin' ? 'selected' : '' }}>
                        Féminin
                    </option>
                </select>
            </div>
        </div>

        <div class="field">
            <label>Téléphone candidat <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-mobile-screen"></i>
                <input type="text"
                       name="numero_telephone_candidat"
                       value="{{ old('numero_telephone_candidat', $candidat->numero_telephone_candidat ?? '') }}"
                       placeholder="Ex : 673045601"
                       pattern="[0-9]{9}"
                       minlength="9"
                       maxlength="9"
                       inputmode="numeric"
                       required>
            </div>
        </div>

        <div class="field">
            <label>Adresse e-mail</label>
            <div class="input-icon">
                <i class="fa-solid fa-envelope"></i>
                <input type="email"
                       name="email"
                       value="{{ old('email', $candidat->email ?? '') }}"
                       placeholder="exemple@email.com">
            </div>
        </div>

        <div class="field">
            <label>Nationalité</label>
            <div class="input-icon">
                <i class="fa-solid fa-flag"></i>
                <input type="text"
                       name="nationalite"
                       value="{{ old('nationalite', $candidat->nationalite ?? 'Camerounaise') }}"
                       placeholder="Nationalité">
            </div>
        </div>

        <div class="field">
            <label>État civil</label>
            <div class="input-icon">
                <i class="fa-solid fa-ring"></i>
                <select name="marital">
                    <option value="">Choisir</option>

                    <option value="CELIBATAIRE"
                        {{ old('marital', $candidat->marital ?? '') == 'CELIBATAIRE' ? 'selected' : '' }}>
                        Célibataire
                    </option>

                    <option value="MARIE"
                        {{ old('marital', $candidat->marital ?? '') == 'MARIE' ? 'selected' : '' }}>
                        Marié(e)
                    </option>

                    <option value="DIVORCE"
                        {{ old('marital', $candidat->marital ?? '') == 'DIVORCE' ? 'selected' : '' }}>
                        Divorcé(e)
                    </option>

                    <option value="VEUF"
                        {{ old('marital', $candidat->marital ?? '') == 'VEUF' ? 'selected' : '' }}>
                        Veuf/Veuve
                    </option>
                </select>
            </div>
        </div>

        <div class="field">
            <label>Profession <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-briefcase"></i>

                <select name="profession" required>
                    <option value="">Choisir</option>

                    <option value="ETUDIANT"
                        {{ old('profession', $candidat->profession ?? '') == 'ETUDIANT' ? 'selected' : '' }}>
                        Étudiant
                    </option>

                    <option value="FONCTIONNAIRE"
                        {{ old('profession', $candidat->profession ?? '') == 'FONCTIONNAIRE' ? 'selected' : '' }}>
                        Fonctionnaire
                    </option>

                    <option value="AUTRE"
                        {{ old('profession', $candidat->profession ?? '') == 'AUTRE' ? 'selected' : '' }}>
                        Autre
                    </option>
                </select>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="button" class="btn prev">
            <i class="fa-solid fa-arrow-left"></i>
            Retour
        </button>

        <button type="button" class="btn next">
            Suivant
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>

</div>