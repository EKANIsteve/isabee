let steps = document.querySelectorAll(".step");
let progress = document.querySelectorAll(".progress div");

let current = 0;

function nextStep(){
steps[current].classList.remove("active");
progress[current].classList.remove("active");

current++;

steps[current].classList.add("active");
progress[current].classList.add("active");
}

function prevStep(){
steps[current].classList.remove("active");
progress[current].classList.remove("active");

current--;

steps[current].classList.add("active");
progress[current].classList.add("active");
}

// preview photo
document.getElementById("photo").onchange = function(e){
let reader = new FileReader();
reader.onload = function(){
document.getElementById("preview").src = reader.result;
}
reader.readAsDataURL(e.target.files[0]);
}