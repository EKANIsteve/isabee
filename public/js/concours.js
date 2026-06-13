document.addEventListener("DOMContentLoaded", () => {

let current = 0;
const steps = document.querySelectorAll(".form-step");
const progress = document.querySelectorAll(".progress-step");

function showStep(index){
    steps.forEach(step => step.classList.remove("active"));
    progress.forEach(step => step.classList.remove("active"));

    steps[index].classList.add("active");
    progress[index].classList.add("active");
}

document.querySelectorAll(".next").forEach(btn=>{
    btn.addEventListener("click", ()=>{
        if(current < steps.length-1){
            current++;
            showStep(current);
        }
    });
});

document.querySelectorAll(".prev").forEach(btn=>{
    btn.addEventListener("click", ()=>{
        if(current > 0){
            current--;
            showStep(current);
        }
    });
});

showStep(current);

/* =========================
   Fonction AJAX générique
========================= */
async function loadOptions(url, select, label){
    select.innerHTML = `<option>Chargement...</option>`;

    try{
        const res = await fetch(url);
        const data = await res.json();

        select.innerHTML = `<option value="">${label}</option>`;

        data.forEach(item=>{
            let option = document.createElement("option");
            option.value = item.id;
            option.textContent = item.nom || item.nom_region || item.nom_departement || item.nom_arrondissement || item.nom_filiere || item.nom_specialite;
            select.appendChild(option);
        });

    }catch(e){
        select.innerHTML = `<option>Erreur chargement</option>`;
    }
}

/* =========================
   FORMATION
========================= */

const cycle = document.getElementById("cycle_select");
const filiere = document.getElementById("filiere_select");
const specialite = document.getElementById("specialite_select");

cycle?.addEventListener("change", ()=>{
    if(cycle.value){
        loadOptions(`/ajax/filieres/${cycle.value}`, filiere, "Choisir");
    }
});

filiere?.addEventListener("change", ()=>{
    if(filiere.value){
        loadOptions(`/ajax/specialites/${filiere.value}`, specialite, "Choisir");
    }
});

/* =========================
   LOCALISATION
========================= */

const pays = document.getElementById("pays_select");
const region = document.getElementById("region_select");
const departement = document.getElementById("departement_select");
const arrondissement = document.getElementById("arrondissement_select");

const CAMEROUN_ID = 31;

pays?.addEventListener("change", ()=>{
    if(pays.value == CAMEROUN_ID){
        loadOptions(`/ajax/regions/${pays.value}`, region, "Région");
    }
});

region?.addEventListener("change", ()=>{
    loadOptions(`/ajax/departements/${region.value}`, departement, "Département");
});

departement?.addEventListener("change", ()=>{
    loadOptions(`/ajax/arrondissements/${departement.value}`, arrondissement, "Arrondissement");
});

});

document.querySelector("form").addEventListener("submit", () => {
    document.querySelectorAll(".form-step").forEach(step => {
        step.style.position = "relative";
        step.style.opacity = "1";
        step.style.pointerEvents = "auto";
    });
});
document.addEventListener("DOMContentLoaded", () => {

    const fields = [
        document.getElementById("cycle_select"),
        document.getElementById("filiere_select"),
        document.getElementById("specialite_select"),
        document.getElementById("centre_examen")
    ];

    const btn = document.getElementById("btnFormation");

    function checkFormation() {

        let valid = true;

        fields.forEach(field => {

            if(field.value === ""){

                valid = false;
                field.classList.remove("valid");

            }else{

                field.classList.add("valid");
            }
        });

        btn.disabled = !valid;
    }

    fields.forEach(field => {
        field.addEventListener("change", checkFormation);
    });

    checkFormation();
});