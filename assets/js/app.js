// App.js - Main JavaScript file for Photo Factory Studio

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initNavbar();
    initSmoothScrolling();
    initNavbarEffects();
    initGalleryAnimations();
    initScrollAnimations();
    initParallaxEffect();
    initLazyLoading();
    initServiceCards();
    initTestimonialCards();
});

// Initialize Bootstrap navbar
function initNavbar() {
    // Ensure Bootstrap is loaded
    if (typeof bootstrap !== 'undefined') {
        // Initialize all collapse elements
        const collapseElements = document.querySelectorAll('.collapse');
        collapseElements.forEach(collapseEl => {
            new bootstrap.Collapse(collapseEl, {
                toggle: false
            });
        });
        
        // Initialize all dropdown elements
        const dropdownElements = document.querySelectorAll('.dropdown-toggle');
        dropdownElements.forEach(dropdownEl => {
            new bootstrap.Dropdown(dropdownEl);
        });
        
        console.log('Bootstrap navbar initialized');
    } else {
        console.warn('Bootstrap not loaded');
    }
}

// Smooth scrolling for navigation links
function initSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (target) {
                const offsetTop = target.offsetTop - 80; // Account for fixed navbar
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) {
                        bsCollapse.hide();
                    }
                }
            }
        });
    });
}

// Navbar scroll effects
function initNavbarEffects() {
    const navbar = document.querySelector('.navbar');
    if (!navbar) return;
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.style.background = 'rgba(10, 10, 10, 0.98)';
            navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.2)';
        } else {
            navbar.style.background = 'rgba(10, 10, 10, 0.95)';
            navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
        }
    });
}

// Gallery animations
function initGalleryAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    // Observe elements for animation
    const animateElements = document.querySelectorAll('.fade-in-up, .fade-in-left, .fade-in-right');
    animateElements.forEach(el => {
        observer.observe(el);
    });
}

// Scroll animations
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe elements for scroll animation
    const scrollElements = document.querySelectorAll('.service-card, .testimonial-card, .gallery-item');
    scrollElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
}

// Parallax effect for hero section
function initParallaxEffect() {
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('.hero');
        const heroBackground = document.querySelector('.hero-background');
        
        if (hero && heroBackground && scrolled < window.innerHeight) {
            heroBackground.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
}

// Lazy loading for images
function initLazyLoading() {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    observer.unobserve(img);
                }
            }
        });
    });

    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });
}

// Service card hover effects
function initServiceCards() {
    const serviceCards = document.querySelectorAll('.service-card');
    
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
}

// Testimonial card hover effects
function initTestimonialCards() {
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    
    testimonialCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
}

// Utility function to scroll to section
function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        const offsetTop = section.offsetTop - 80;
        window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
        });
    }
}

// Photo gallery functions
let currentPhotoIndex = 0;
let isLoading = false;
const photosPerLoad = 12;

// Sample photo data for the gallery
const photos = [
    "https://ik.imagekit.io/movodevmaz/img/pfs/jpw/1.jpg?updatedAt=1752734490145",
    "https://ik.imagekit.io/movodevmaz/img/pfs/jpw/WhatsApp%20Image%202025-06-10%20at%2017.41.01_426a7ce4.jpg?updatedAt=1752734505543",
    "https://ik.imagekit.io/movodevmaz/img/pfs/jpw/WhatsApp%20Image%202025-06-10%20at%2017.40.45_f4794223.jpg?updatedAt=1752734495411",
    "https://ik.imagekit.io/movodevmaz/img/pfs/jpw/WhatsApp%20Image%202025-06-10%20at%2017.41.01_426a7ce4.jpg?updatedAt=1752734505543",
    "https://ik.imagekit.io/movodevmaz/img/pfs/npw/3.jpg?updatedAt=1752734542550",
    "https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08732.jpg?updatedAt=1752734602496",
    "https://ik.imagekit.io/movodevmaz/img/pfs/swp/1L2A9949.jpg?updatedAt=1752734897985",
    "https://images.unsplash.com/photo-1523438885200-e635ba2c371e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80",
    "https://ik.imagekit.io/movodevmaz/img/pfs/swp/1L2A9416.jpg?updatedAt=1752734871913",
    "https://ik.imagekit.io/movodevmaz/img/pfs/swp/1L2A9392.jpg?updatedAt=1752734866108",
    "https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764.jpg?updatedAt=1752734526046",
    "assets/img/wedding/DSC08641.jpg",
    "https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00770.jpg?updatedAt=1752734529072",
    "https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08651.jpg?updatedAt=1752734579373",
    "https://ik.imagekit.io/movodevmaz/img/pfs/npw/3.jpg?updatedAt=1752734542550",
    "https://images.unsplash.com/photo-1523438885200-e635ba2c371e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80",
];

function openPhotoGallery() {
    const gallery = document.getElementById('photoGallery');
    if (gallery) {
        gallery.classList.add('active');
        document.body.style.overflow = 'hidden';
        loadPhotos();
    }
}

function closePhotoGallery() {
    const gallery = document.getElementById('photoGallery');
    if (gallery) {
        gallery.classList.remove('active');
        document.body.style.overflow = '';
    }
}

function loadPhotos() {
    const photoGrid = document.getElementById('photoGrid');
    const loading = document.getElementById('loading');
    
    if (!photoGrid) return;
    
    if (isLoading) return;
    isLoading = true;
    
    if (loading) loading.style.display = 'block';
    
    // Simulate loading delay
    setTimeout(() => {
        const endIndex = Math.min(currentPhotoIndex + photosPerLoad, photos.length);
        
        for (let i = currentPhotoIndex; i < endIndex; i++) {
            const photoItem = document.createElement('div');
            photoItem.className = 'photo-item';
            photoItem.innerHTML = `
                <img src="${photos[i]}" alt="Gallery Photo" loading="lazy">
            `;
            photoGrid.appendChild(photoItem);
        }
        
        currentPhotoIndex = endIndex;
        isLoading = false;
        
        if (loading) loading.style.display = 'none';
        
        // Hide loading if all photos are loaded
        if (currentPhotoIndex >= photos.length && loading) {
            loading.style.display = 'none';
        }
    }, 500);
}

// Event listeners for gallery
document.addEventListener('DOMContentLoaded', function() {
    // Gallery scroll event
    const gallery = document.getElementById('photoGallery');
    if (gallery) {
        gallery.addEventListener('scroll', function() {
            const { scrollTop, scrollHeight, clientHeight } = this;
            if (scrollTop + clientHeight >= scrollHeight - 100) {
                loadPhotos();
            }
        });
    }
    
    // Close gallery on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePhotoGallery();
        }
    });
});

// Modal functions
function showModal(title, content) {
    const modal = document.createElement('div');
    modal.className = 'modal-overlay';
    modal.innerHTML = `
        <div class="modal-content">
            <div class="modal-header">
                <h3>${title}</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                ${content}
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Animate in
    setTimeout(() => {
        modal.classList.add('active');
    }, 10);
    
    const closeBtn = modal.querySelector('.modal-close');
    
    function closeModal() {
        modal.classList.remove('active');
        setTimeout(() => {
            if (document.body.contains(modal)) {
                document.body.removeChild(modal);
            }
        }, 300);
    }
    
    // Close on click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    closeBtn.addEventListener('click', closeModal);
    
    // Close on escape key
    function handleEscape(e) {
        if (e.key === 'Escape') {
            closeModal();
            document.removeEventListener('keydown', handleEscape);
        }
    }
    document.addEventListener('keydown', handleEscape);
}