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
    "https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00756.jpg?updatedAt=1752734526194",
    "https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00770.jpg?updatedAt=1752734529072",
    "https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08651.jpg?updatedAt=1752734579373",
    "https://ik.imagekit.io/movodevmaz/img/pfs/npw/3.jpg?updatedAt=1752734542550",
    "https://images.unsplash.com/photo-1523438885200-e635ba2c371e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80",
   
];

let currentPhotoIndex = 0;
let isLoading = false;
const photosPerLoad = 12;

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initSmoothScrolling();
    initNavbarEffects();
    initGalleryAnimations();
    initScrollAnimations();
    initParallaxEffect();
    initLazyLoading();
});

// Smooth scrolling for navigation links
function initSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            
            // Handle case where href is just "#" (scroll to top)
            if (href === '#') {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
                return;
            }
            
            const target = document.querySelector(href);
            if (target) {
                const offsetTop = target.offsetTop - 80; // Account for fixed navbar
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Scroll to section function
function scrollToSection(sectionId) {
    const target = document.getElementById(sectionId);
    if (target) {
        const offsetTop = target.offsetTop - 80;
        window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
        });
    }
}

// Navbar scroll effects
function initNavbarEffects() {
    const navbar = document.querySelector('.navbar');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.style.background = 'rgba(26, 26, 26, 0.98)';
            navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.3)';
        } else {
            navbar.style.background = 'rgba(26, 26, 26, 0.95)';
            navbar.style.boxShadow = 'none';
        }
    });
}

// Gallery animations and interactions
function initGalleryAnimations() {
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    galleryItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
        
        // Pause animation on hover
        item.addEventListener('mouseenter', function() {
            const container = this.closest('.scroll-container');
            if (container) {
                container.style.animationPlayState = 'paused';
            }
        });
        
        item.addEventListener('mouseleave', function() {
            const container = this.closest('.scroll-container');
            if (container) {
                container.style.animationPlayState = 'running';
            }
        });
    });
}

// Scroll-triggered animations
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

    // Observe elements for animation
    const animateElements = document.querySelectorAll('.service-card, .testimonial-card, .about-content, .about-image');
    animateElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        observer.observe(el);
    });
}

// Parallax effect for hero section
function initParallaxEffect() {
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('.hero');
        if (hero && scrolled < window.innerHeight) {
            hero.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
}

// Open photo gallery modal
function openPhotoGallery() {
    const gallery = document.getElementById('photoGallery');
    gallery.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    // Reset and load initial photos
    currentPhotoIndex = 0;
    document.getElementById('photoGrid').innerHTML = '';
    loadPhotos();
    
    // Add scroll listener for infinite scroll
    gallery.addEventListener('scroll', handleScroll);
    
    // Add escape key listener
    document.addEventListener('keydown', handleEscapeKey);
}

// Close photo gallery modal
function closePhotoGallery() {
    const gallery = document.getElementById('photoGallery');
    gallery.classList.remove('active');
    document.body.style.overflow = 'auto';
    
    // Remove event listeners
    gallery.removeEventListener('scroll', handleScroll);
    document.removeEventListener('keydown', handleEscapeKey);
    
    // Reset gallery state
    currentPhotoIndex = 0;
    document.getElementById('photoGrid').innerHTML = '';
}

// Handle escape key to close gallery
function handleEscapeKey(event) {
    if (event.key === 'Escape') {
        closePhotoGallery();
    }
}

// Load photos into the gallery with infinite scroll
function loadPhotos() {
    if (isLoading) return;
    
    isLoading = true;
    const loading = document.getElementById('loading');
    loading.style.display = 'block';
    
    // Simulate loading delay for better UX
    setTimeout(() => {
        const photoGrid = document.getElementById('photoGrid');
        const endIndex = Math.min(currentPhotoIndex + photosPerLoad, photos.length);
        
        for (let i = currentPhotoIndex; i < endIndex; i++) {
            const photoItem = document.createElement('div');
            photoItem.className = 'photo-item';
            photoItem.innerHTML = `<img src="${photos[i]}" alt="Gallery Photo ${i + 1}" loading="lazy">`;
            
            // Add click event to enlarge photo
            photoItem.addEventListener('click', function() {
                enlargePhoto(photos[i]);
            });
            
            photoGrid.appendChild(photoItem);
            
            // Animate the new photo
            setTimeout(() => {
                photoItem.style.opacity = '1';
                photoItem.style.transform = 'scale(1)';
            }, (i - currentPhotoIndex) * 100);
            
            // Set initial styles for animation
            photoItem.style.opacity = '0';
            photoItem.style.transform = 'scale(0.8)';
            photoItem.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        }
        
        currentPhotoIndex = endIndex;
        loading.style.display = 'none';
        isLoading = false;
        
        // If we've loaded all photos, show completion message
        if (currentPhotoIndex >= photos.length) {
            const endMessage = document.createElement('div');
            endMessage.className = 'text-center mt-4';
            endMessage.innerHTML = `
                <p class="text-light mb-3">You've seen all our amazing work!</p>
                <p class="text-light">Ready to create your own memories?</p>
            `;
            photoGrid.appendChild(endMessage);
        }
    }, 800);
}

// Handle scroll for infinite loading
function handleScroll() {
    const gallery = document.getElementById('photoGallery');
    const scrollTop = gallery.scrollTop;
    const scrollHeight = gallery.scrollHeight;
    const clientHeight = gallery.clientHeight;
    
    if (scrollTop + clientHeight >= scrollHeight - 200 && !isLoading && currentPhotoIndex < photos.length) {
        loadPhotos();
    }
}

// Enlarge photo in modal
function enlargePhoto(src) {
    const modal = document.createElement('div');
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2000;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.3s ease;
    `;
    
    const img = document.createElement('img');
    img.src = src;
    img.style.cssText = `
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
        border-radius: 10px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        transform: scale(0.5);
        transition: transform 0.3s ease;
    `;
    
    const closeBtn = document.createElement('div');
    closeBtn.innerHTML = '<i class="fas fa-times"></i>';
    closeBtn.style.cssText = `
        position: absolute;
        top: 30px;
        right: 30px;
        font-size: 2rem;
        color: white;
        cursor: pointer;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.5);
        transition: background 0.3s ease;
    `;
    
    closeBtn.addEventListener('mouseenter', function() {
        this.style.background = 'rgba(212, 175, 55, 0.8)';
    });
    
    closeBtn.addEventListener('mouseleave', function() {
        this.style.background = 'rgba(0, 0, 0, 0.5)';
    });
    
    modal.appendChild(img);
    modal.appendChild(closeBtn);
    document.body.appendChild(modal);
    
    // Animate modal appearance
    setTimeout(() => {
        modal.style.opacity = '1';
        img.style.transform = 'scale(1)';
    }, 10);
    
    // Close modal function
    function closeModal() {
        modal.style.opacity = '0';
        img.style.transform = 'scale(0.5)';
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

// Service card hover effects
document.addEventListener('DOMContentLoaded', function() {
    const serviceCards = document.querySelectorAll('.service-card');
    
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});

// Testimonial card hover effects
document.addEventListener('DOMContentLoaded', function() {
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    
    testimonialCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});

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

// Contact form handling
function handleContactForm(event) {
    event.preventDefault();
    // Add your form submission logic here
    alert('Thank you for your inquiry! We will get back to you soon.');
}

// Analytics tracking
function trackEvent(eventName, eventData) {
    console.log('Event tracked:', eventName, eventData);
    // Add your analytics tracking code here
}

// Performance optimization: Debounce scroll events
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Apply debouncing to scroll events
const debouncedScrollHandler = debounce(function() {
    // Handle scroll events here if needed
}, 100);

window.addEventListener('scroll', debouncedScrollHandler);



// Error handling for images
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img');
    
    images.forEach(img => {
        img.addEventListener('error', function() {
            this.style.display = 'none';
            console.warn('Failed to load image:', this.src);
        });
    });
});

// Accessibility improvements
document.addEventListener('DOMContentLoaded', function() {
    // Add keyboard navigation for gallery
    document.addEventListener('keydown', function(e) {
        const photoGallery = document.getElementById('photoGallery');
        if (photoGallery && photoGallery.classList.contains('active')) {
            if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
                // Add navigation logic here if needed
                e.preventDefault();
            }
        }
    });
    
    // Add focus management for modal
    const focusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
    
    function trapFocus(element) {
        const focusableContent = element.querySelectorAll(focusableElements);
        const firstFocusableElement = focusableContent[0];
        const lastFocusableElement = focusableContent[focusableContent.length - 1];
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                if (e.shiftKey) {
                    if (document.activeElement === firstFocusableElement) {
                        lastFocusableElement.focus();
                        e.preventDefault();
                    }
                } else {
                    if (document.activeElement === lastFocusableElement) {
                        firstFocusableElement.focus();
                        e.preventDefault();
                    }
                }
            }
        });
    }
});