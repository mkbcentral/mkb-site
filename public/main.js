// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Active link handling
function setActiveNavLink() {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');

    let currentPos = window.scrollY;

    currentPos += 100;

    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        const sectionId = section.getAttribute('id');

        if (currentPos >= sectionTop && currentPos <= sectionTop + sectionHeight) {
            navLinks.forEach(link => {
                link.classList.remove('active');
            });

            const correspondingLink = document.querySelector(`.nav-link[href="#${sectionId}"]`);
            if (correspondingLink) {
                correspondingLink.classList.add('active');
            }
        }
    });

    if (currentPos < 100) {
        navLinks.forEach(link => {
            link.classList.remove('active');
        });
        document.querySelector('.nav-link[href="#home"]').classList.add('active');
    }
}

window.addEventListener('scroll', setActiveNavLink);
document.addEventListener('DOMContentLoaded', setActiveNavLink);

document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', (e) => {
        document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
        link.classList.add('active');
    });
});

// Add scroll animation for elements
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('opacity-100', 'translate-y-0');
            entry.target.classList.remove('opacity-0', 'translate-y-10');
        }
    });
}, {
    threshold: 0.1
});

document.querySelectorAll('section').forEach((section) => {
    section.classList.add('opacity-0', 'translate-y-10', 'transition', 'duration-1000');
    observer.observe(section);
});

// Carousel functionality
const carousel = document.getElementById('carousel');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const dots = document.querySelectorAll('.carousel-dot');
let currentSlide = 0;
const slideCount = 5;

function updateCarousel() {
    carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
    dots.forEach((dot, index) => {
        dot.classList.toggle('bg-blue-600', index === currentSlide);
        dot.classList.toggle('bg-blue-400', index !== currentSlide);
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slideCount;
    updateCarousel();
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slideCount) % slideCount;
    updateCarousel();
}

prevBtn.addEventListener('click', prevSlide);
nextBtn.addEventListener('click', nextSlide);

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        currentSlide = index;
        updateCarousel();
    });
});

let autoplayInterval = setInterval(nextSlide, 5000);

carousel.parentElement.addEventListener('mouseenter', () => {
    clearInterval(autoplayInterval);
});

carousel.parentElement.addEventListener('mouseleave', () => {
    autoplayInterval = setInterval(nextSlide, 5000);
});

// Theme Toggle Functionality
const themeToggle = document.getElementById('themeToggle');
const themeIcon = document.getElementById('themeIcon');
const root = document.documentElement;

const savedTheme = localStorage.getItem('theme') || 'dark';
setTheme(savedTheme);

themeToggle.addEventListener('click', () => {
    const currentTheme = root.getAttribute('data-theme');
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    setTheme(newTheme);
    localStorage.setItem('theme', newTheme);
});

function setTheme(theme) {
    root.setAttribute('data-theme', theme);
    themeIcon.className = theme === 'light' ? 'fas fa-moon text-blue-400' : 'fas fa-sun text-blue-400';

    if (theme === 'light') {
        document.querySelector('nav').classList.remove('bg-gray-900/90');
        document.querySelector('nav').classList.add('bg-white/90');
        document.querySelector('#home').classList.remove('from-gray-900', 'to-blue-900');
        document.querySelector('#home').classList.add('from-blue-50', 'to-blue-200');
        document.querySelectorAll('.bg-gray-900').forEach(el => {
            if (!el.closest('nav') && !el.closest('#home')) {
                el.classList.remove('bg-gray-900');
                el.classList.add('bg-white');
            }
        });
        document.querySelectorAll('.bg-gray-800').forEach(el => {
            el.classList.remove('bg-gray-800');
            el.classList.add('bg-gray-100');
        });
        document.querySelectorAll('.text-blue-200').forEach(el => {
            el.classList.remove('text-blue-200');
            el.classList.add('text-gray-600');
        });
        document.querySelectorAll('.text-white').forEach(el => {
            if (!el.closest('#home')) {
                el.classList.remove('text-white');
                el.classList.add('text-gray-900');
            }
        });
    } else {
        document.querySelector('nav').classList.remove('bg-white/90');
        document.querySelector('nav').classList.add('bg-gray-900/90');
        document.querySelector('#home').classList.remove('from-blue-50', 'to-blue-200');
        document.querySelector('#home').classList.add('from-gray-900', 'to-blue-900');
        document.querySelectorAll('.bg-white').forEach(el => {
            if (!el.closest('nav') && !el.closest('#home')) {
                el.classList.remove('bg-white');
                el.classList.add('bg-gray-900');
            }
        });
        document.querySelectorAll('.bg-gray-100').forEach(el => {
            el.classList.remove('bg-gray-100');
            el.classList.add('bg-gray-800');
        });
        document.querySelectorAll('.text-gray-600').forEach(el => {
            el.classList.remove('text-gray-600');
            el.classList.add('text-blue-200');
        });
        document.querySelectorAll('.text-gray-900').forEach(el => {
            if (!el.closest('#home')) {
                el.classList.remove('text-gray-900');
                el.classList.add('text-white');
            }
        });
    }
}

// Animate follower counts
function animateFollowerCount() {
    const counters = document.querySelectorAll('.follower-count');

    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 2000; // 2 seconds
        const step = target / (duration / 16); // 60fps
        let current = 0;

        const updateCount = () => {
            current += step;
            if (current < target) {
                counter.textContent = Math.floor(current).toLocaleString();
                requestAnimationFrame(updateCount);
            } else {
                counter.textContent = target.toLocaleString();
            }
        };

        updateCount();
    });
}

// Initialize follower count animation when section becomes visible
const followersSection = document.querySelector('.follower-count').closest('section');
const followersObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateFollowerCount();
            followersObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.1 });

followersObserver.observe(followersSection);

// Language translations
const translations = {
    en: {
        home: "Home",
        about: "About",
        projects: "Projects",
        videos: "Videos",
        contact: "Contact",
        heroTitle: "Creative Developer",
        heroSubtitle: "Turning ideas into reality through code",
        heroButton: "Get In Touch",
        aboutTitle: "About Me",
        aboutText: "I'm a passionate full-stack developer with expertise in modern web technologies. With years of experience in building robust and scalable applications, I strive to create beautiful and functional digital experiences.",
        frontend: "Frontend",
        backend: "Backend",
        projectsTitle: "Recent Projects",
        videosTitle: "Featured Videos",
        contactTitle: "Let's Connect",
    },
    fr: {
        home: "Accueil",
        about: "À Propos",
        projects: "Projets",
        videos: "Vidéos",
        contact: "Contact",
        heroTitle: "Développeur Créatif",
        heroSubtitle: "Transformer les idées en réalité par le code",
        heroButton: "Me Contacter",
        aboutTitle: "À Propos de Moi",
        aboutText: "Je suis un développeur full-stack passionné avec une expertise en technologies web modernes. Avec des années d'expérience dans la création d'applications robustes et évolutives, je m'efforce de créer des expériences numériques belles et fonctionnelles.",
        frontend: "Frontend",
        backend: "Backend",
        projectsTitle: "Projets Récents",
        videosTitle: "Vidéos en Vedette",
        contactTitle: "Restons en Contact",
    },
    es: {
        home: "Inicio",
        about: "Sobre Mí",
        projects: "Proyectos",
        videos: "Videos",
        contact: "Contacto",
        heroTitle: "Desarrollador Creativo",
        heroSubtitle: "Convirtiendo ideas en realidad a través del código",
        heroButton: "Contactar",
        aboutTitle: "Sobre Mí",
        aboutText: "Soy un desarrollador full-stack apasionado con experiencia en tecnologías web modernas. Con años de experiencia en la creación de aplicaciones robustas y escalables, me esfuerzo por crear experiencias digitales hermosas y funcionales.",
        frontend: "Frontend",
        backend: "Backend",
        projectsTitle: "Proyectos Recientes",
        videosTitle: "Videos Destacados",
        contactTitle: "Conectemos",
    }
}

// Language switching functionality
const languageSelect = document.getElementById('languageSelect');
let currentLanguage = localStorage.getItem('language') || 'fr';

// Initialize language
setLanguage(currentLanguage);
languageSelect.value = currentLanguage;

languageSelect.addEventListener('change', (e) => {
    currentLanguage = e.target.value;
    setLanguage(currentLanguage);
    localStorage.setItem('language', currentLanguage);
});

function setLanguage(lang) {
    currentLang.textContent = lang.toUpperCase();
    document.querySelector('a[href="#home"]').textContent = translations[lang].home;
    document.querySelector('a[href="#about"]').textContent = translations[lang].about;
    document.querySelector('a[href="#projects"]').textContent = translations[lang].projects;
    document.querySelector('a[href="#videos"]').textContent = translations[lang].videos;
    document.querySelector('a[href="#contact"]').textContent = translations[lang].contact;

    document.querySelector('.gradient-text').textContent = translations[lang].heroTitle;
    document.querySelector('#home p').textContent = translations[lang].heroSubtitle;
    document.querySelector('#home a').textContent = translations[lang].heroButton;

    document.querySelector('#about h2').textContent = translations[lang].aboutTitle;
    document.querySelector('#about p').textContent = translations[lang].aboutText;
    document.querySelector('#about .text-blue-400:first-of-type').textContent = translations[lang].frontend;
    document.querySelector('#about .text-blue-400:last-of-type').textContent = translations[lang].backend;

    document.querySelector('#projects h2').textContent = translations[lang].projectsTitle;
    document.querySelector('#videos h2').textContent = translations[lang].videosTitle;
    document.querySelector('#contact h2').textContent = translations[lang].contactTitle;
}
