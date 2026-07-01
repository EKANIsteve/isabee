<div class="form-step">

    <div class="step-heading">
        <div class="step-icon">
            <i class="fa-solid fa-people-roof"></i>
        </div>

        <div>
            <h3>Informations familiales</h3>
            <p>Renseignez les informations sur les parents et le contact d’urgence.</p>
        </div>
    </div>

    <div class="subsection-title">
        <i class="fa-solid fa-person"></i>
        Informations sur le père
    </div>

    <div class="grid grid-3">

        <div class="field">
            <label>Nom du père</label>
            <div class="input-icon">
                <i class="fa-solid fa-user"></i>
                <input type="text"
                       name="nom_pere"
                       value="{{ old('nom_pere', $candidat->nom_pere ?? '') }}"
                       placeholder="Nom complet du père">
            </div>
        </div>

        <div class="field">
            <label>Téléphone du père</label>
            <div class="input-icon">
                <i class="fa-solid fa-phone"></i>
                <input type="text"
                       name="numero_telephone_pere"
                       value="{{ old('numero_telephone_pere', $candidat->numero_telephone_pere ?? '') }}"
                       placeholder="6XXXXXXXX">
            </div>
        </div>

        <div class="field">
            <label>Profession du père</label>
            <div class="input-icon">
                <i class="fa-solid fa-briefcase"></i>
                <input type="text"
                       name="profession_pere"
                       value="{{ old('profession_pere', $candidat->profession_pere ?? '') }}"
                       placeholder="Profession du père">
            </div>
        </div>

    </div>

    <div class="subsection-title">
        <i class="fa-solid fa-person-dress"></i>
        Informations sur la mère
    </div>

    <div class="grid grid-3">

        <div class="field">
            <label>Nom de la mère</label>
            <div class="input-icon">
                <i class="fa-solid fa-user"></i>
                <input type="text"
                       name="nom_mere"
                       value="{{ old('nom_mere', $candidat->nom_mere ?? '') }}"
                       placeholder="Nom complet de la mère">
            </div>
        </div>

        <div class="field">
            <label>Téléphone de la mère</label>
            <div class="input-icon">
                <i class="fa-solid fa-phone"></i>
                <input type="text"
                       name="numero_telephone_mere"
                       value="{{ old('numero_telephone_mere', $candidat->numero_telephone_mere ?? '') }}"
                       placeholder="6XXXXXXXX">
            </div>
        </div>

        <div class="field">
            <label>Profession de la mère</label>
            <div class="input-icon">
                <i class="fa-solid fa-briefcase"></i>
                <input type="text"
                       name="profession_mere"
                       value="{{ old('profession_mere', $candidat->profession_mere ?? '') }}"
                       placeholder="Profession de la mère">
            </div>
        </div>

    </div>

    <div class="grid grid-1">
        <div class="field">
            <label>Ville de résidence des parents</label>
            <div class="input-icon">
                <i class="fa-solid fa-city"></i>
                <input type="text"
                       name="ville_parents"
                       value="{{ old('ville_parents', $candidat->ville_parents ?? '') }}"
                       placeholder="Ville de résidence des parents">
            </div>
        </div>
    </div>

    <div class="subsection-title">
        <i class="fa-solid fa-triangle-exclamation"></i>
        Personne à contacter en cas d’urgence
    </div>

    <div class="grid grid-3">

        <div class="field">
            <label>Nom de la personne à contacter</label>
            <div class="input-icon">
                <i class="fa-solid fa-user-shield"></i>
                <input type="text"
                       name="Personne_a_contacter_cas_urgent"
                       value="{{ old('Personne_a_contacter_cas_urgent', $candidat->Personne_a_contacter_cas_urgent ?? '') }}"
                       placeholder="Nom complet">
            </div>
        </div>

        <div class="field">
            <label>Téléphone de la personne</label>
            <div class="input-icon">
                <i class="fa-solid fa-phone-volume"></i>
                <input type="text"
                       name="numero_telephone_Personne_a_contacte_urgent"
                       value="{{ old('numero_telephone_Personne_a_contacte_urgent', $candidat->numero_telephone_Personne_a_contacte_urgent ?? '') }}"
                       placeholder="6XXXXXXXX">
            </div>
        </div>

        <div class="field">
            <label>Ville de la personne</label>
            <div class="input-icon">
                <i class="fa-solid fa-location-dot"></i>
                <input type="text"
                       name="ville_Personne_a_contacte_cas_urgent"
                       value="{{ old('ville_Personne_a_contacte_cas_urgent', $candidat->ville_Personne_a_contacte_cas_urgent ?? '') }}"
                       placeholder="Ville">
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

</div><div class="form-step">

    <div class="step-heading">
        <div class="step-icon">
            <i class="fa-solid fa-people-roof"></i>
        </div>

        <div>
            <h3>Informations familiales</h3>
            <p>Renseignez les informations sur les parents et le contact d’urgence. Tous les champs sont obligatoires.</p>
        </div>
    </div>

    <div class="subsection-title">
        <i class="fa-solid fa-person"></i>
        Informations sur le père
    </div>

    <div class="grid grid-3">

        <div class="field">
            <label>Nom du père <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-user"></i>
                <input type="text"
                       name="nom_pere"
                       value="{{ old('nom_pere', $candidat->nom_pere ?? '') }}"
                       placeholder="Nom complet du père"
                       required>
            </div>
        </div>

        <div class="field">
            <label>Téléphone du père <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-phone"></i>
                <input type="text"
                       name="numero_telephone_pere"
                       value="{{ old('numero_telephone_pere', $candidat->numero_telephone_pere ?? '') }}"
                       placeholder="6XXXXXXXX"
                       pattern="[0-9]{9}"
                       minlength="9"
                       maxlength="9"
                       inputmode="numeric"
                       required>
            </div>
        </div>

        <div class="field">
            <label>Profession du père <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-briefcase"></i>
                <input type="text"
                       name="profession_pere"
                       value="{{ old('profession_pere', $candidat->profession_pere ?? '') }}"
                       placeholder="Profession du père"
                       required>
            </div>
        </div>

    </div>

    <div class="subsection-title">
        <i class="fa-solid fa-person-dress"></i>
        Informations sur la mère
    </div>

    <div class="grid grid-3">

        <div class="field">
            <label>Nom de la mère <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-user"></i>
                <input type="text"
                       name="nom_mere"
                       value="{{ old('nom_mere', $candidat->nom_mere ?? '') }}"
                       placeholder="Nom complet de la mère"
                       required>
            </div>
        </div>

        <div class="field">
            <label>Téléphone de la mère <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-phone"></i>
                <input type="text"
                       name="numero_telephone_mere"
                       value="{{ old('numero_telephone_mere', $candidat->numero_telephone_mere ?? '') }}"
                       placeholder="6XXXXXXXX"
                       pattern="[0-9]{9}"
                       minlength="9"
                       maxlength="9"
                       inputmode="numeric"
                       required>
            </div>
        </div>

        <div class="field">
            <label>Profession de la mère <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-briefcase"></i>
                <input type="text"
                       name="profession_mere"
                       value="{{ old('profession_mere', $candidat->profession_mere ?? '') }}"
                       placeholder="Profession de la mère"
                       required>
            </div>
        </div>

    </div>

    <div class="grid grid-1">
        <div class="field">
            <label>Ville de résidence des parents <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-city"></i>
                <input type="text"
                       name="ville_parents"
                       value="{{ old('ville_parents', $candidat->ville_parents ?? '') }}"
                       placeholder="Ville de résidence des parents"
                       required>
            </div>
        </div>
    </div>

    <div class="subsection-title">
        <i class="fa-solid fa-triangle-exclamation"></i>
        Personne à contacter en cas d’urgence
    </div>

    <div class="grid grid-3">

        <div class="field">
            <label>Nom de la personne à contacter <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-user-shield"></i>
                <input type="text"
                       name="Personne_a_contacter_cas_urgent"
                       value="{{ old('Personne_a_contacter_cas_urgent', $candidat->Personne_a_contacter_cas_urgent ?? '') }}"
                       placeholder="Nom complet"
                       required>
            </div>
        </div>

        <div class="field">
            <label>Téléphone de la personne <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-phone-volume"></i>
                <input type="text"
                       name="numero_telephone_Personne_a_contacte_urgent"
                       value="{{ old('numero_telephone_Personne_a_contacte_urgent', $candidat->numero_telephone_Personne_a_contacte_urgent ?? '') }}"
                       placeholder="6XXXXXXXX"
                       pattern="[0-9]{9}"
                       minlength="9"
                       maxlength="9"
                       inputmode="numeric"
                       required>
            </div>
        </div>

        <div class="field">
            <label>Ville de la personne <span>*</span></label>
            <div class="input-icon">
                <i class="fa-solid fa-location-dot"></i>
                <input type="text"
                       name="ville_Personne_a_contacte_cas_urgent"
                       value="{{ old('ville_Personne_a_contacte_cas_urgent', $candidat->ville_Personne_a_contacte_cas_urgent ?? '') }}"
                       placeholder="Ville"
                       required>
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