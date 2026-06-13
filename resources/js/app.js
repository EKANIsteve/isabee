import './bootstrap';

/* =====================================================
   PRELOADER SAFE
===================================================== */

function hidePreloader() {
    const preloader = document.getElementById('preloader');

    if (preloader) {
        preloader.classList.add('hide');

        setTimeout(() => {
            preloader.style.display = 'none';
        }, 500);
    }

    document.body.classList.add('loaded');
}

window.addEventListener('load', hidePreloader);

document.addEventListener('DOMContentLoaded', function () {
    setTimeout(hidePreloader, 500);
});

setTimeout(hidePreloader, 2500);


/* =====================================================
   MAIN SCRIPT
===================================================== */

document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       MENU MOBILE
    ===================================================== */

    const menuToggle = document.getElementById('menuToggle');
    const mainNav = document.getElementById('mainNav');

    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', function () {
            mainNav.classList.toggle('active');
        });
    }


    /* =====================================================
       HERO SLIDER
    ===================================================== */

    const slides = document.querySelectorAll('.hero-slide');
    const prevBtn = document.getElementById('heroPrev');
    const nextBtn = document.getElementById('heroNext');

    let currentSlide = 0;

    function showSlide(index) {
        if (!slides.length) return;

        slides.forEach(slide => {
            slide.classList.remove('active');
        });

        slides[index].classList.add('active');
    }

    function nextSlide() {
        if (!slides.length) return;

        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        if (!slides.length) return;

        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    if (slides.length) {
        showSlide(currentSlide);
        setInterval(nextSlide, 5000);
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', nextSlide);
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', prevSlide);
    }


    /* =====================================================
       ANIMATIONS AU SCROLL
    ===================================================== */

    const animatedElements = document.querySelectorAll(
        '.reveal, .reveal-left, .reveal-right, .reveal-zoom'
    );

    if (animatedElements.length) {
        const animationObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, {
            threshold: 0.15
        });

        animatedElements.forEach(element => {
            animationObserver.observe(element);
        });
    }


    /* =====================================================
       MOT DU DIRECTEUR
    ===================================================== */

    const directorBtn = document.getElementById('directorBtn');
    const directorShort = document.getElementById('directorShort');
    const directorFull = document.getElementById('directorFull');

    if (directorBtn && directorShort && directorFull) {
        directorBtn.addEventListener('click', function () {
            const isHidden = directorFull.style.display === '' || directorFull.style.display === 'none';

            if (isHidden) {
                directorFull.style.display = 'block';
                directorShort.style.display = 'none';
                directorBtn.textContent = 'Réduire le message';
            } else {
                directorFull.style.display = 'none';
                directorShort.style.display = 'block';
                directorBtn.textContent = 'Lire le message complet';
            }
        });
    }


    /* =====================================================
       ACCORDÉON
    ===================================================== */

    const accordionHeaders = document.querySelectorAll('.accordion-header');

    accordionHeaders.forEach(header => {
        header.addEventListener('click', function () {
            const body = this.nextElementSibling;
            const icon = this.querySelector('i');

            accordionHeaders.forEach(otherHeader => {
                if (otherHeader !== this) {
                    otherHeader.classList.remove('active');

                    const otherBody = otherHeader.nextElementSibling;
                    const otherIcon = otherHeader.querySelector('i');

                    if (otherBody) {
                        otherBody.classList.remove('active');
                    }

                    if (otherIcon) {
                        otherIcon.classList.remove('fa-minus');
                        otherIcon.classList.add('fa-plus');
                    }
                }
            });

            this.classList.toggle('active');

            if (body) {
                body.classList.toggle('active');
            }

            if (icon) {
                icon.classList.toggle('fa-plus');
                icon.classList.toggle('fa-minus');
            }
        });
    });


    /* =====================================================
       COUNTERS
    ===================================================== */

    const counters = document.querySelectorAll('.counter');
    const statsSection = document.querySelector('.stats-section');
    let counterStarted = false;

    function startCounters() {
        counters.forEach(counter => {
            const target = Number(counter.dataset.target);
            let count = 0;
            const increment = target / 120;

            function updateCounter() {
                if (count < target) {
                    count += increment;
                    counter.textContent = Math.floor(count);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            }

            updateCounter();
        });
    }

    if (statsSection && counters.length) {
        const statsObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !counterStarted) {
                    startCounters();
                    counterStarted = true;
                }
            });
        }, {
            threshold: 0.35
        });

        statsObserver.observe(statsSection);
    }


    /* =====================================================
       FOOTER ANIMÉ + BACK TO TOP
    ===================================================== */

    const footerPro = document.querySelector('.footer-pro');
    const backToTop = document.getElementById('backToTop');

    if (footerPro) {
        const footerObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    footerPro.classList.add('active');
                }
            });
        }, {
            threshold: 0.15
        });

        footerObserver.observe(footerPro);
    }

    if (backToTop) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 500) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        backToTop.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }


    /* =====================================================
       FORMULAIRE MINI : COMMENCER / MODIFIER / VÉRIFIER
    ===================================================== */

    const openStartInscription = document.getElementById('openStartInscription');
    const openEditInscription = document.getElementById('openEditInscription');
    const openCheckInscription = document.getElementById('openCheckInscription');

    const startInscriptionBox = document.getElementById('startInscriptionBox');
    const editInscriptionBox = document.getElementById('editInscriptionBox');
    const checkInscriptionBox = document.getElementById('checkInscriptionBox');

    function closeConcoursMiniForms() {
        if (startInscriptionBox) {
            startInscriptionBox.classList.remove('show');
        }

        if (editInscriptionBox) {
            editInscriptionBox.classList.remove('show');
        }

        if (checkInscriptionBox) {
            checkInscriptionBox.classList.remove('show');
        }
    }

    if (openStartInscription && startInscriptionBox) {
        openStartInscription.addEventListener('click', function () {
            const isOpen = startInscriptionBox.classList.contains('show');

            closeConcoursMiniForms();

            if (!isOpen) {
                startInscriptionBox.classList.add('show');

                startInscriptionBox.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });
    }

    if (openEditInscription && editInscriptionBox) {
        openEditInscription.addEventListener('click', function () {
            const isOpen = editInscriptionBox.classList.contains('show');

            closeConcoursMiniForms();

            if (!isOpen) {
                editInscriptionBox.classList.add('show');

                editInscriptionBox.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });
    }

    if (openCheckInscription && checkInscriptionBox) {
        openCheckInscription.addEventListener('click', function () {
            const isOpen = checkInscriptionBox.classList.contains('show');

            closeConcoursMiniForms();

            if (!isOpen) {
                checkInscriptionBox.classList.add('show');

                checkInscriptionBox.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });
    }


    /* =====================================================
       FORMULAIRE MULTI-ÉTAPES CONCOURS
    ===================================================== */

    const concoursForm = document.getElementById('concoursForm');
    const formSteps = document.querySelectorAll('.form-step');
    const progressSteps = document.querySelectorAll('.progress-step');
    const nextButtons = document.querySelectorAll('.btn.next');
    const prevButtons = document.querySelectorAll('.btn.prev');

    let currentFormStep = 0;

    function showFormStep(index) {
        if (!concoursForm || !formSteps.length) return;

        formSteps.forEach((step, stepIndex) => {
            step.classList.toggle('active', stepIndex === index);
        });

        progressSteps.forEach((progress, progressIndex) => {
            progress.classList.remove('active', 'completed');

            if (progressIndex < index) {
                progress.classList.add('completed');
            }

            if (progressIndex === index) {
                progress.classList.add('active');
            }
        });

        window.scrollTo({
            top: concoursForm.offsetTop - 120,
            behavior: 'smooth'
        });
    }

    function validateCurrentStep() {
        if (!formSteps.length) return true;

        const currentStep = formSteps[currentFormStep];

        if (!currentStep) return true;

        const requiredFields = currentStep.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value || !field.value.trim()) {
                field.classList.add('invalid');
                field.classList.remove('valid');
                isValid = false;
            } else {
                field.classList.remove('invalid');
                field.classList.add('valid');
            }
        });

        return isValid;
    }

    nextButtons.forEach(button => {
        button.addEventListener('click', function () {
            if (!validateCurrentStep()) {
                alert('Veuillez remplir tous les champs obligatoires avant de continuer.');
                return;
            }

            if (currentFormStep < formSteps.length - 1) {
                currentFormStep++;
                showFormStep(currentFormStep);
            }
        });
    });

    prevButtons.forEach(button => {
        button.addEventListener('click', function () {
            if (currentFormStep > 0) {
                currentFormStep--;
                showFormStep(currentFormStep);
            }
        });
    });

    document.querySelectorAll('.field input, .field select').forEach(field => {
        field.addEventListener('input', function () {
            if (field.hasAttribute('required')) {
                if (field.value && field.value.trim()) {
                    field.classList.add('valid');
                    field.classList.remove('invalid');
                } else {
                    field.classList.add('invalid');
                    field.classList.remove('valid');
                }
            }
        });

        field.addEventListener('change', function () {
            if (field.hasAttribute('required')) {
                if (field.value && field.value.trim()) {
                    field.classList.add('valid');
                    field.classList.remove('invalid');
                } else {
                    field.classList.add('invalid');
                    field.classList.remove('valid');
                }
            }
        });
    });

    if (concoursForm && formSteps.length) {
        showFormStep(currentFormStep);
    }


    /* =====================================================
       VALIDATION ÉTAPE FORMATION
    ===================================================== */

    const cycleSelect = document.getElementById('cycle_select');
    const filiereSelect = document.getElementById('filiere_select');
    const specialiteSelect = document.getElementById('specialite_select');
    const centreExamen = document.getElementById('centre_examen');
    const btnFormation = document.getElementById('btnFormation');

    function checkFormationStep() {
        if (!btnFormation) return;

        const isReady =
            cycleSelect?.value &&
            filiereSelect?.value &&
            specialiteSelect?.value &&
            centreExamen?.value;

        btnFormation.disabled = !isReady;
    }

    [cycleSelect, filiereSelect, specialiteSelect, centreExamen].forEach(select => {
        if (select) {
            select.addEventListener('change', checkFormationStep);
        }
    });

    checkFormationStep();


    /* =====================================================
       AJAX FORMATION
    ===================================================== */

    if (cycleSelect && filiereSelect) {
        cycleSelect.addEventListener('change', function () {
            const cycleId = this.value;

            filiereSelect.innerHTML = '<option value="">Chargement...</option>';

            if (specialiteSelect) {
                specialiteSelect.innerHTML = '<option value="">Sélectionner une spécialité</option>';
            }

            checkFormationStep();

            if (!cycleId) {
                filiereSelect.innerHTML = '<option value="">Sélectionner une filière</option>';
                return;
            }

            fetch(`/ajax/filieres/${cycleId}`)
                .then(response => response.json())
                .then(data => {
                    filiereSelect.innerHTML = '<option value="">Sélectionner une filière</option>';

                    data.forEach(item => {
                        filiereSelect.innerHTML += `
                            <option value="${item.id}">
                                ${item.nom_filiere}
                            </option>
                        `;
                    });

                    checkFormationStep();
                })
                .catch(() => {
                    filiereSelect.innerHTML = '<option value="">Erreur de chargement</option>';
                });
        });
    }

    if (filiereSelect && specialiteSelect) {
        filiereSelect.addEventListener('change', function () {
            const filiereId = this.value;

            specialiteSelect.innerHTML = '<option value="">Chargement...</option>';

            checkFormationStep();

            if (!filiereId) {
                specialiteSelect.innerHTML = '<option value="">Sélectionner une spécialité</option>';
                return;
            }

            fetch(`/ajax/specialites/${filiereId}`)
                .then(response => response.json())
                .then(data => {
                    specialiteSelect.innerHTML = '<option value="">Sélectionner une spécialité</option>';

                    data.forEach(item => {
                        specialiteSelect.innerHTML += `
                            <option value="${item.id}">
                                ${item.nom_specialite}
                            </option>
                        `;
                    });

                    checkFormationStep();
                })
                .catch(() => {
                    specialiteSelect.innerHTML = '<option value="">Erreur de chargement</option>';
                });
        });
    }


    /* =====================================================
       AJAX LOCALISATION
    ===================================================== */

    const paysSelect = document.getElementById('pays_select');
    const regionSelect = document.getElementById('region_select');
    const departementSelect = document.getElementById('departement_select');
    const arrondissementSelect = document.getElementById('arrondissement_select');

    if (paysSelect && regionSelect) {
        paysSelect.addEventListener('change', function () {
            const paysId = this.value;

            regionSelect.innerHTML = '<option value="">Chargement...</option>';

            if (departementSelect) {
                departementSelect.innerHTML = '<option value="">Sélectionner un département</option>';
            }

            if (arrondissementSelect) {
                arrondissementSelect.innerHTML = '<option value="">Sélectionner un arrondissement</option>';
            }

            if (!paysId) {
                regionSelect.innerHTML = '<option value="">Sélectionner une région</option>';
                return;
            }

            fetch(`/ajax/regions/${paysId}`)
                .then(response => response.json())
                .then(data => {
                    regionSelect.innerHTML = '<option value="">Sélectionner une région</option>';

                    data.forEach(item => {
                        regionSelect.innerHTML += `
                            <option value="${item.id}">
                                ${item.nom_region}
                            </option>
                        `;
                    });
                })
                .catch(() => {
                    regionSelect.innerHTML = '<option value="">Erreur de chargement</option>';
                });
        });
    }

    if (regionSelect && departementSelect) {
        regionSelect.addEventListener('change', function () {
            const regionId = this.value;

            departementSelect.innerHTML = '<option value="">Chargement...</option>';

            if (arrondissementSelect) {
                arrondissementSelect.innerHTML = '<option value="">Sélectionner un arrondissement</option>';
            }

            if (!regionId) {
                departementSelect.innerHTML = '<option value="">Sélectionner un département</option>';
                return;
            }

            fetch(`/ajax/departements/${regionId}`)
                .then(response => response.json())
                .then(data => {
                    departementSelect.innerHTML = '<option value="">Sélectionner un département</option>';

                    data.forEach(item => {
                        departementSelect.innerHTML += `
                            <option value="${item.id}">
                                ${item.nom_departement}
                            </option>
                        `;
                    });
                })
                .catch(() => {
                    departementSelect.innerHTML = '<option value="">Erreur de chargement</option>';
                });
        });
    }

    if (departementSelect && arrondissementSelect) {
        departementSelect.addEventListener('change', function () {
            const departementId = this.value;

            arrondissementSelect.innerHTML = '<option value="">Chargement...</option>';

            if (!departementId) {
                arrondissementSelect.innerHTML = '<option value="">Sélectionner un arrondissement</option>';
                return;
            }

            fetch(`/ajax/arrondissements/${departementId}`)
                .then(response => response.json())
                .then(data => {
                    arrondissementSelect.innerHTML = '<option value="">Sélectionner un arrondissement</option>';

                    data.forEach(item => {
                        arrondissementSelect.innerHTML += `
                            <option value="${item.id}">
                                ${item.nom_arrondissement}
                            </option>
                        `;
                    });
                })
                .catch(() => {
                    arrondissementSelect.innerHTML = '<option value="">Erreur de chargement</option>';
                });
        });
    }

});