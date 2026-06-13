@extends('layouts.app')

@section('content')

<style>
/* ================= GLOBAL ================= */
body{
    font-family:'Segoe UI',sans-serif;
    margin:0;
    background:#f5f7fb;
}

/* ================= HEADER SLIDER ================= */
.hero-slider{
    position:relative;
    height:520px;
    overflow:hidden;
}
.hero-slide{
    position:absolute;
    width:100%;
    height:100%;
    opacity:0;
    transition:opacity 1.5s;
}
.hero-slide.active{
    opacity:1;
}
.hero-slide img{
    width:100%;
    height:100%;
    object-fit:cover;
}
.hero-slide::after{
    content:"";
    position:absolute;
    top:0; left:0;
    width:100%; height:100%;
    background:rgba(0,0,0,0.5);
}
.hero-text{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    color:white;
    text-align:center;
    z-index:2;
    max-width:700px;
}
.hero-text h1{
    font-size:55px;
    margin-bottom:10px;
}
.hero-text p{
    font-size:20px;
    line-height:1.6;
}

/* ================= MOT DES RESPONSABLES ================= */
.leaders-section{
    padding:80px 8%;
    background:white;
    text-align:center;
}
.leaders-title{
    font-size:36px;
    color:#0d47a1;
    margin-bottom:60px;
}
.leaders-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:40px;
}
.leader-card{
    background:#f8f9fc;
    padding:30px;
    border-radius:10px;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
    transition:0.3s;
}
.leader-card:hover{
    transform:translateY(-8px);
}
.leader-card img{
    width:140px;
    height:140px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:20px;
}
.leader-card h3{
    margin:5px 0;
    color:#0d47a1;
}
.leader-card h4{
    font-size:14px;
    color:#666;
    margin-bottom:10px;
}
.leader-card p{
    font-size:14px;
    color:#555;
    line-height:1.6;
}

/* ================= PAGE LAYOUT ================= */
.page{
    display:flex;
    gap:40px;
    padding:70px 8%;
}
.main{
    flex:3;
}
.sidebar{
    flex:1;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 5px 20px rgba(0,0,0,0.1);
    position:sticky;
    top:20px;
    height:fit-content;
}
.sidebar h3{
    margin-bottom:20px;
    color:#0d47a1;
}
.sidebar li{
    padding:8px;
    border-bottom:1px solid #eee;
    font-size:14px;
}

/* ================= FORMATIONS ================= */
.section{
    margin-bottom:90px;
}
.section-title{
    font-size:32px;
    color:#0d47a1;
    margin-bottom:25px;
}
.image-slider{
    position:relative;
    height:300px;
    overflow:hidden;
    border-radius:10px;
    margin-bottom:20px;
}
.image-slider-inner{
    display:flex;
    width:100%;
    height:100%;
    transition:transform 0.7s ease-in-out;
}
.slide-img-container{
    position:relative;
    flex-shrink:0;
    width:100%;
    height:100%;
}
.slide-img{
    width:100%;
    height:100%;
   object-fit:contain;
    background:#000; /* optionnel pour éviter les bandes blanches */
    border-radius:10px;
}

/* ================= TEXTE SUR IMAGE AVEC HOVER ================= */
.slider-text{
    position:absolute;
    bottom:20px;
    left:50%;
    transform:translateX(-50%) translateY(20px);
    background:rgba(0,0,0,0.5);
    color:white;
    padding:15px 25px;
    border-radius:10px;
    text-align:center;
    max-width:90%;
    opacity:0;
    transition: all 0.5s ease;
}
.slide-img-container:hover .slider-text{
    opacity:1;
    transform:translateX(-50%) translateY(0);
}
.slider-text h3{
    margin:0;
    font-size:24px;
}
.slider-text p{
    font-size:16px;
    margin:5px 0;
}
.slider-text ul{
    text-align:left;
    margin-top:8px;
    padding-left:18px;
    font-size:14px;
}

/* ================= FLECHES ================= */
.slider-arrow{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    background:rgba(0,0,0,0.4);
    color:white;
    border:none;
    font-size:28px;
    width:40px;
    height:40px;
    border-radius:50%;
    cursor:pointer;
    z-index:5;
}
.slider-arrow:hover{ background:#0d47a1; }
.arrow-left{ left:10px; }
.arrow-right{ right:10px; }

/* ================= STATISTIQUES ================= */
.stats{
    background:#0d47a1;
    color:white;
    display:flex;
    justify-content:space-around;
    padding:60px 10%;
    text-align:center;
}
.stat h2{
    font-size:45px;
    margin-bottom:10px;
}
</style>

{{-- ================= HEADER SLIDER ================= --}}
<div class="hero-slider">
    <div class="hero-slide active">
        <img src="/images/agro.jpg">
        <div class="hero-text">
            <h1>Agropastoral</h1>
            <p>Production animale, végétale et aquaculture</p>
        </div>
    </div>
    <div class="hero-slide">
        <img src="/images/eau.jpg">
        <div class="hero-text">
            <h1>Eau et Environnement</h1>
            <p>Gestion durable des ressources hydriques</p>
        </div>
    </div>
    <div class="hero-slide">
        <img src="/images/civil.jpg">
        <div class="hero-text">
            <h1>Génie Civil</h1>
            <p>Bâtiment, travaux publics et urbanisme</p>
        </div>
    </div>
    <div class="hero-slide">
        <img src="/images/energie.jpg">
        <div class="hero-text">
            <h1>Energies Renouvelables</h1>
            <p>Technologies énergétiques modernes</p>
        </div>
    </div>
</div>

{{-- ================= MOT DES RESPONSABLES ================= --}}
<section class="leaders-section">
    <h2 class="leaders-title">Mot des Responsables</h2>
    <div class="leaders-grid">
        <div class="leader-card">
            <img src="/images/recteur.jpg">
            <h3>Pr. ETOA</h3>
            <h4>Recteur</h4>
            <p>Bienvenue à l'ISABEE. Notre institution s'engage à offrir
            des formations de qualité dans les domaines de l'agriculture,
            de l'environnement et des technologies modernes.</p>
        </div>
        <div class="leader-card">
            <img src="/images/directeur.jpg">
            <h3>Pr. Philippe</h3>
            <h4>Directeur de l'ISABEE</h4>
            <p>La formation continue de l'ISABEE vise à renforcer
            le développement durable de notre société.</p>
        </div>
        <div class="leader-card">
            <img src="/images/chef.jpg">
            <h3>Pr MOUSSA II</h3>
            <h4>Chef de Division de la Formation Continue</h4>
            <p>Nous mettons à disposition des programmes
            innovants et adaptés aux besoins du marché.</p>
        </div>
    </div>
</section>

{{-- ================= PAGE FORMATIONS + SIDEBAR ================= --}}
<div class="page">
    <div class="main">

        @php
        $formations = [
            [
                'title'=>'Agropastoral',
                'images'=>['/images/agro1.jpeg','/images/agro2.jpeg','/images/agro3.jpg'],
                'description'=>'Développer une agriculture moderne et durable.',
                'debouches'=>['Agriculteur','Technicien agricole','Entrepreneur rural']
            ],
            [
                'title'=>'Eau et Environnement',
                'images'=>['/images/eau1.jpg','/images/eau2.jpg','/images/eau3.jpg','/images/eau4.jpg'],
                'description'=>'Gestion durable des ressources hydriques.',
                'debouches'=>['Hydrologue','Technicien environnement','Chargé de projet écologique']
            ],
            [
                'title'=>'Génie Civil',
                'images'=>['/images/civil1.jpg','/images/civil2.jpg','/images/civil3.jpg','/images/civil4.jpg'],
                'description'=>'Conception et réalisation d’infrastructures modernes.',
                'debouches'=>['Ingénieur civil','Conducteur de travaux','Urbaniste']
            ],
            [
                'title'=>'Industrie et Technologie',
                'images'=>['/images/energie1.jpeg','/images/energie2.jpeg','/images/energie3.jpeg'],
                'description'=>'Technologies énergétiques modernes et systèmes thermiques.',
                'debouches'=>['Technicien énergie','Ingénieur thermique','Consultant en énergie']
            ],
        ];
        @endphp

        @foreach($formations as $formation)
        <div class="section">
            <div class="image-slider">
                <button class="slider-arrow arrow-left">&#10094;</button>
                <button class="slider-arrow arrow-right">&#10095;</button>
                <div class="image-slider-inner">
                    @foreach($formation['images'] as $img)
                    <div class="slide-img-container">
                        <img src="{{ $img }}" class="slide-img" alt="{{ $formation['title'] }}">
                        <div class="slider-text">
                            <h3>{{ $formation['title'] }}</h3>
                            <p>{{ $formation['description'] }}</p>
                            <ul>
                                @foreach($formation['debouches'] as $debouche)
                                    <li>{{ $debouche }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="sidebar">
        <h3>Toutes les formations</h3>
        <ul>
            <li>Production Animale</li>
            <li>Production Végétale</li>
            <li>Aquaculture</li>
            <li>Infrastructures rurales</li>
            <li>Hydrologie</li>
            <li>Hydrogéologie</li>
            <li>Génie thermique</li>
            <li>Bâtiment</li>
            <li>Travaux publics</li>
            <li>Géotechnique</li>
            <li>Urbanisme</li>
            <li>Energies renouvelables</li>
        </ul>
    </div>
</div>

{{-- ================= STATISTIQUES ================= --}}
<div class="stats">
    <div class="stat">
        <h2>580</h2>
        <p>Places disponibles</p>
    </div>
    <div class="stat">
        <h2>25+</h2>
        <p>Formations</p>
    </div>
    <div class="stat">
        <h2>4</h2>
        <p>Domaines</p>
    </div>
</div>

<script>
/* HEADER SLIDER */
let heroSlides=document.querySelectorAll('.hero-slide');
let heroIndex=0;
setInterval(()=>{
    heroSlides[heroIndex].classList.remove('active');
    heroIndex++;
    if(heroIndex>=heroSlides.length) heroIndex=0;
    heroSlides[heroIndex].classList.add('active');
},4000);

/* FORMATIONS SLIDERS */
document.querySelectorAll('.image-slider').forEach(slider=>{
    const inner=slider.querySelector('.image-slider-inner');
    const slides=inner.querySelectorAll('.slide-img-container');
    let index=0;
    const prev=slider.querySelector('.arrow-left');
    const next=slider.querySelector('.arrow-right');

    function showSlide(i){
        inner.style.transform=`translateX(-${i*100}%)`;
    }

    prev.onclick=()=>{
        index--;
        if(index<0) index=slides.length-1;
        showSlide(index);
    }
    next.onclick=()=>{
        index++;
        if(index>=slides.length) index=0;
        showSlide(index);
    }

    setInterval(()=>{
        index++;
        if(index>=slides.length) index=0;
        showSlide(index);
    },7000);
});
</script>

@endsection