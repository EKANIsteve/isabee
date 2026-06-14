import './bootstrap';

/* =====================================================
   PRELOADER
===================================================== */

function hidePreloader() {
    const preloader = document.getElementById('preloader');

    if (preloader) {
        preloader.classList.add('hide');

        setTimeout(function () {
            preloader.style.display = 'none';
        }, 500);
    }

    document.body.classList.add('loaded');
}

window.addEventListener('load', hidePreloader);
setTimeout(hidePreloader, 2500);

/* =====================================================
   MAIN SCRIPT
===================================================== */

document.addEventListener('DOMContentLoaded', function () {

    setTimeout(hidePreloader, 700);

    /* MENU MOBILE */
    const menuToggle = document.getElementById('menuToggle');
    const mainNav = document.getElementById('mainNav');

    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', function () {
            mainNav.classList.toggle('active');
        });
    }

    /* DROPDOWN MOBILE */
    const dropdownLinks = document.querySelectorAll('.main-nav .dropdown > a');

    dropdownLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            if (window.innerWidth <= 992) {
                event.preventDefault();

                const parent = link.closest('.dropdown');

                if (parent) {
                    parent.classList.toggle('open');
                }
            }
        });
    });

    /* HERO SLIDER AUTO */
    const heroSection = document.querySelector('.hero-section');
    const slides = document.querySelectorAll('.hero-slide');
    const prevBtn = document.getElementById('heroPrev');
    const nextBtn = document.getElementById('heroNext');
    const dots = document.querySelectorAll('.hero-dot');

    let currentSlide = 0;
    let sliderInterval = null;

    function showSlide(index) {
        if (!slides.length) return;

        slides.forEach(function (slide) {
            slide.classList.remove('active');
        });

        dots.forEach(function (dot) {
            dot.classList.remove('active');
        });

        slides[index].classList.add('active');

        if (dots[index]) {
            dots[index].classList.add('active');
        }

        currentSlide = index;
    }

    function nextSlide() {
        if (!slides.length) return;

        let next = currentSlide + 1;

        if (next >= slides.length) {
            next = 0;
        }

        showSlide(next);
    }

    function prevSlide() {
        if (!slides.length) return;

        let previous = currentSlide - 1;

        if (previous < 0) {
            previous = slides.length - 1;
        }

        showSlide(previous);
    }

    function startSlider() {
        if (!slides.length) return;

        stopSlider();

        sliderInterval = setInterval(nextSlide, 5000);
    }

    function stopSlider() {
        if (sliderInterval) {
            clearInterval(sliderInterval);
        }
    }

    if (slides.length) {
        showSlide(0);
        startSlider();

        if (heroSection) {
            heroSection.addEventListener('mouseenter', stopSlider);
            heroSection.addEventListener('mouseleave', startSlider);
        }
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            nextSlide();
            startSlider();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            prevSlide();
            startSlider();
        });
    }

    dots.forEach(function (dot, index) {
        dot.addEventListener('click', function () {
            showSlide(index);
            startSlider();
        });
    });

    /* REVEAL ANIMATION */
    const animatedElements = document.querySelectorAll(
        '.reveal, .reveal-left, .reveal-right, .reveal-zoom'
    );

    if (animatedElements.length) {
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, {
            threshold: 0.15
        });

        animatedElements.forEach(function (element) {
            observer.observe(element);
        });
    }

    /* MOT DU DIRECTEUR */
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

    /* ACCORDÉON */
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    accordionHeaders.forEach(function (header) {
        header.addEventListener('click', function () {
            const body = header.nextElementSibling;
            const icon = header.querySelector('i');

            accordionHeaders.forEach(function (otherHeader) {
                if (otherHeader !== header) {
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

            header.classList.toggle('active');

            if (body) {
                body.classList.toggle('active');
            }

            if (icon) {
                icon.classList.toggle('fa-plus');
                icon.classList.toggle('fa-minus');
            }
        });
    });

    /* COUNTERS */
    const counters = document.querySelectorAll('.counter');
    const statsSection = document.querySelector('.stats-section');
    let counterStarted = false;

    function startCounters() {
        counters.forEach(function (counter) {
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
        const statsObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
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

    /* BACK TO TOP */
    const backToTop = document.getElementById('backToTop');

    if (backToTop) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 400) {
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

    /* MINI FORMULAIRES CONCOURS */
    const openStartInscription = document.getElementById('openStartInscription');
    const openEditInscription = document.getElementById('openEditInscription');
    const openCheckInscription = document.getElementById('openCheckInscription');

    const startInscriptionBox = document.getElementById('startInscriptionBox');
    const editInscriptionBox = document.getElementById('editInscriptionBox');
    const checkInscriptionBox = document.getElementById('checkInscriptionBox');

    function closeConcoursMiniForms() {
        if (startInscriptionBox) startInscriptionBox.classList.remove('show');
        if (editInscriptionBox) editInscriptionBox.classList.remove('show');
        if (checkInscriptionBox) checkInscriptionBox.classList.remove('show');
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
});