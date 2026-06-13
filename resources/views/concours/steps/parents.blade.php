<div class="form-step">

    <h3 class="step-title">👨‍👩‍👧 Informations parentales</h3>

    <div class="grid grid-2">

        <div>
            <label>Nom du père</label>
            <input type="text"
                   name="nom_pere"
                   placeholder="Nom complet du père">
        </div>

        <div>
            <label>Téléphone du père</label>
            <input type="text"
                   name="numero_telephone_pere"
                   placeholder="6XXXXXXXX">
        </div>

        <div>
            <label>Nom de la mère</label>
            <input type="text"
                   name="nom_mere"
                   placeholder="Nom complet de la mère">
        </div>

        <div>
            <label>Téléphone de la mère</label>
            <input type="text"
                   name="numero_telephone_mere"
                   placeholder="6XXXXXXXX">
        </div>

        <div>
            <label>Diplôme présenté</label>
            <input type="text"
                   name="diplome_entre"
                   placeholder="Baccalauréat, Licence, BTS...">
        </div>

        <div>
            <label>Série ou Option</label>
            <input type="text"
                   name="serie_diplome"
                   placeholder="C, D, TI, F4, Génie Civil...">
        </div>
        <h3 class="step-title">
    👨‍👩‍👧 Informations parentales et académiques
</h3>

<div class="grid grid-2">

    <div>
        <label>Nom du père</label>
        <input type="text" name="nom_pere">
    </div>

    <div>
        <label>Téléphone du père</label>
        <input type="text" name="numero_telephone_pere">
    </div>

    <div>
        <label>Nom de la mère</label>
        <input type="text" name="nom_mere">
    </div>

    <div>
        <label>Téléphone de la mère</label>
        <input type="text" name="numero_telephone_mere">
    </div>

    <div>
        <label>Ville des parents</label>
        <input type="text" name="ville_parents">
    </div>

</div>

<hr>

<h4>🎓 Diplôme présenté</h4>

<div class="grid grid-3">

    <div>
        <label>Diplôme</label>
        <input type="text"
               name="diplome_entre"
               placeholder="Baccalauréat, BTS, Licence...">
    </div>

    <div>
        <label>Série du diplôme</label>
        <input type="text"
               name="serie_diplome"
               placeholder="C, D, TI, F4...">
    </div>

    <div>
        <label>Année d'obtention</label>
        <input type="number"
               name="annee_obtention_diplome"
               min="1990"
               max="2100">
    </div>

</div>

<hr>

<h4>🚨 Contact en cas d'urgence</h4>

<div class="grid grid-3">

    <div>
        <label>Personne à contacter</label>
        <input type="text"
               name="contact_urgence">
    </div>

    <div>
        <label>Téléphone urgence</label>
        <input type="text"
               name="telephone_urgence">
    </div>

    <div>
        <label>Ville</label>
        <input type="text"
               name="ville_urgence">
    </div>

</div>

<hr>

<h4>⚽ Informations complémentaires</h4>

<div class="grid grid-2">

    <div>
        <label>Sport pratiqué</label>
        <input type="text"
               name="sport_pratique"
               placeholder="Football, Basketball...">
    </div>

    <div>
        <label>Handicap</label>
        <select name="handicape">
            <option value="Non">Non</option>
            <option value="Oui">Oui</option>
        </select>
    </div>

</div>

    </div>
<div class="form-actions">
    <button type="button" class="btn prev">← Retour</button>
    <button type="button" class="btn next">Suivant →</button>
</div>

</div>