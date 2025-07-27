// Destination Wedding Page Functionality
document.addEventListener('DOMContentLoaded', function() {
    initAnimations();
    initNavbarEffects();
    initParallaxEffect();
    initTestimonialCarousel();
    initGalleryInteractions();
    initBookingTracking();
});

// Animation initialization
function initAnimations() {
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

// Navbar scroll effects
function initNavbarEffects() {
    const navbar = document.querySelector('.navbar');
    
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

// Parallax effect for hero section
function initParallaxEffect() {
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('.destination-hero');
        const heroBackground = document.querySelector('.hero-background');
        
        if (hero && heroBackground && scrolled < window.innerHeight) {
            heroBackground.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
}

// Testimonial carousel functionality
let currentTestimonialIndex = 0;
const testimonials = document.querySelectorAll('.testimonial-slide');
const dots = document.querySelectorAll('.dot');

function initTestimonialCarousel() {
    // Auto-advance testimonials
    setInterval(() => {
        changeTestimonial(1);
    }, 8000);
    
    // Touch/swipe support for mobile
    let startX = 0;
    let endX = 0;
    
    const carousel = document.querySelector('.testimonials-carousel');
    
    carousel.addEventListener('touchstart', function(e) {
        startX = e.touches[0].clientX;
    });
    
    carousel.addEventListener('touchend', function(e) {
        endX = e.changedTouches[0].clientX;
        handleSwipe();
    });
    
    function handleSwipe() {
        const threshold = 50;
        const diff = startX - endX;
        
        if (Math.abs(diff) > threshold) {
            if (diff > 0) {
                changeTestimonial(1); // Swipe left - next
            } else {
                changeTestimonial(-1); // Swipe right - previous
            }
        }
    }
}

function changeTestimonial(direction) {
    testimonials[currentTestimonialIndex].classList.remove('active');
    dots[currentTestimonialIndex].classList.remove('active');
    
    currentTestimonialIndex += direction;
    
    if (currentTestimonialIndex >= testimonials.length) {
        currentTestimonialIndex = 0;
    } else if (currentTestimonialIndex < 0) {
        currentTestimonialIndex = testimonials.length - 1;
    }
    
    testimonials[currentTestimonialIndex].classList.add('active');
    dots[currentTestimonialIndex].classList.add('active');
    
    // Track testimonial interaction
    trackEvent('testimonial_viewed', {
        testimonial_index: currentTestimonialIndex,
        interaction_type: direction > 0 ? 'next' : 'previous'
    });
}

function currentTestimonial(index) {
    testimonials[currentTestimonialIndex].classList.remove('active');
    dots[currentTestimonialIndex].classList.remove('active');
    
    currentTestimonialIndex = index - 1;
    
    testimonials[currentTestimonialIndex].classList.add('active');
    dots[currentTestimonialIndex].classList.add('active');
    
    // Track testimonial interaction
    trackEvent('testimonial_viewed', {
        testimonial_index: currentTestimonialIndex,
        interaction_type: 'dot_click'
    });
}

// Gallery interactions
function initGalleryInteractions() {
    // Pause gallery animation on hover
    const galleryRows = document.querySelectorAll('.gallery-row');
    
    galleryRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
    });
    
    // Portfolio item click handlers
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    portfolioItems.forEach((item, index) => {
        item.addEventListener('click', function() {
            const img = this.querySelector('img');
            const info = this.querySelector('.portfolio-info');
            
            if (img && info) {
                openImageModal(img.src, info.querySelector('h4').textContent, info.querySelector('p').textContent);
                
                // Track gallery interaction
                trackEvent('gallery_image_clicked', {
                    image_index: index,
                    location: info.querySelector('p').textContent
                });
            }
        });
    });
    
    // Destination card interactions
    const destinationCards = document.querySelectorAll('.destination-card');
    destinationCards.forEach((card, index) => {
        card.addEventListener('click', function() {
            const destination = this.querySelector('h3').textContent;
            
            // Track destination interest
            trackEvent('destination_clicked', {
                destination: destination,
                card_index: index
            });
            
            // Scroll to booking section
            document.getElementById('booking').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
}

// Open image modal
function openImageModal(src, title, location) {
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
    
    const content = document.createElement('div');
    content.style.cssText = `
        max-width: 90%;
        max-height: 90%;
        text-align: center;
        transform: scale(0.5);
        transition: transform 0.3s ease;
    `;
    
    const img = document.createElement('img');
    img.src = src;
    img.style.cssText = `
        max-width: 100%;
        max-height: 80vh;
        object-fit: contain;
        border-radius: 10px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        margin-bottom: 20px;
    `;
    
    const info = document.createElement('div');
    info.style.cssText = `
        color: white;
        font-family: 'Playfair Display', serif;
    `;
    info.innerHTML = `
        <h3 style="color: var(--accent-color); margin-bottom: 10px; font-size: 1.5rem;">${title}</h3>
        <p style="color: rgba(255, 255, 255, 0.8); font-size: 1.1rem;">${location}</p>
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
        this.style.background = 'rgba(201, 169, 110, 0.8)';
    });
    
    closeBtn.addEventListener('mouseleave', function() {
        this.style.background = 'rgba(0, 0, 0, 0.5)';
    });
    
    content.appendChild(img);
    content.appendChild(info);
    modal.appendChild(content);
    modal.appendChild(closeBtn);
    document.body.appendChild(modal);
    
    // Animate modal appearance
    setTimeout(() => {
        modal.style.opacity = '1';
        content.style.transform = 'scale(1)';
    }, 10);
    
    // Close modal function
    function closeModal() {
        modal.style.opacity = '0';
        content.style.transform = 'scale(0.5)';
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

// Full gallery modal
function openFullGallery() {
    const galleryModal = document.createElement('div');
    galleryModal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--primary-color);
        z-index: 1500;
        overflow-y: auto;
        padding: 100px 0 60px;
        opacity: 0;
        transition: opacity 0.3s ease;
    `;
    
    galleryModal.innerHTML = `
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h2 class="font-playfair text-light">Complete Portfolio</h2>
                <button class="btn-close-gallery" onclick="closeFullGallery()" style="
                    background: rgba(255, 255, 255, 0.1);
                    border: 1px solid rgba(201, 169, 110, 0.3);
                    color: var(--accent-color);
                    width: 50px;
                    height: 50px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    transition: all 0.3s ease;
                ">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="row">
                ${generateGalleryImages()}
            </div>
        </div>
    `;
    
    document.body.appendChild(galleryModal);
    document.body.style.overflow = 'hidden';
    
    setTimeout(() => {
        galleryModal.style.opacity = '1';
    }, 10);
    
    // Track gallery opening
    trackEvent('full_gallery_opened', {
        source: 'destination_wedding_page'
    });
}

function closeFullGallery() {
    const galleryModal = document.querySelector('.container').parentElement;
    galleryModal.style.opacity = '0';
    document.body.style.overflow = 'auto';
    
    setTimeout(() => {
        if (document.body.contains(galleryModal)) {
            document.body.removeChild(galleryModal);
        }
    }, 300);
}

function generateGalleryImages() {
    const images = [
        { src: 'https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', title: 'Beach Ceremony', location: 'Goa, India' },
        { src: 'https://images.unsplash.com/photo-1464207687429-7505649dae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', title: 'Palace Wedding', location: 'Udaipur, India' },
        { src: 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', title: 'Vineyard Romance', location: 'Tuscany, Italy' },
        { src: 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', title: 'Sacred Temple', location: 'Bali, Indonesia' },
        { src: 'https://images.unsplash.com/photo-1540979388789-6cee28a1cdc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', title: 'Sunset Vows', location: 'Santorini, Greece' },
        { src: 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', title: 'Garden Paradise', location: 'Kerala, India' },
        { src: 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', title: 'Desert Dreams', location: 'Jaisalmer, India' },
        { src: 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80', title: 'Fairytale Castle', location: 'Scotland, UK' }
    ];
    
    return images.map((img, index) => `
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="portfolio-item" onclick="openImageModal('${img.src}', '${img.title}', '${img.location}')" style="
                width: 100%;
                height: 300px;
                border-radius: var(--border-radius-lg);
                overflow: hidden;
                position: relative;
                cursor: pointer;
                transition: all 0.4s ease;
                box-shadow: var(--shadow-medium);
            ">
                <img src="${img.src}" alt="${img.title}" style="
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    transition: transform 0.4s ease;
                ">
                <div class="portfolio-overlay" style="
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
                    padding: 40px 20px 20px;
                    color: white;
                    transform: translateY(100%);
                    transition: transform 0.3s ease;
                ">
                    <div class="portfolio-info">
                        <h4 style="color: var(--accent-color); margin-bottom: 5px;">${img.title}</h4>
                        <p style="color: rgba(255, 255, 255, 0.8); margin-bottom: 0;">${img.location}</p>
                    </div>
                </div>
            </div>
        </div>
    `).join('');
}

// Booking tracking and interactions
function initBookingTracking() {
    // Track booking button clicks
    const bookingButtons = document.querySelectorAll('a[href*="contact"], a[href*="tel:"], a[href*="wa.me"]');
    
    bookingButtons.forEach(button => {
        button.addEventListener('click', function() {
            const buttonType = this.href.includes('contact') ? 'consultation' :
                              this.href.includes('tel:') ? 'phone' : 'whatsapp';
            
            trackEvent('booking_action', {
                action_type: buttonType,
                service: 'destination_wedding',
                source: 'destination_wedding_page'
            });
        });
    });
    
    // Track scroll depth
    let maxScrollDepth = 0;
    const sections = ['hero', 'experience', 'destinations', 'gallery', 'testimonials', 'booking'];
    
    window.addEventListener('scroll', debounce(function() {
        const scrollPercent = Math.round((window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100);
        
        if (scrollPercent > maxScrollDepth) {
            maxScrollDepth = scrollPercent;
            
            // Track milestone scroll depths
            if (scrollPercent >= 25 && maxScrollDepth < 25) {
                trackEvent('scroll_depth', { depth: '25%', page: 'destination_wedding' });
            } else if (scrollPercent >= 50 && maxScrollDepth < 50) {
                trackEvent('scroll_depth', { depth: '50%', page: 'destination_wedding' });
            } else if (scrollPercent >= 75 && maxScrollDepth < 75) {
                trackEvent('scroll_depth', { depth: '75%', page: 'destination_wedding' });
            } else if (scrollPercent >= 90 && maxScrollDepth < 90) {
                trackEvent('scroll_depth', { depth: '90%', page: 'destination_wedding' });
            }
        }
    }, 500));
}

// Smooth scrolling for anchor links
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            
            if (href === '#') {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
                return;
            }
            
            const target = document.querySelector(href);
            if (target) {
                const offsetTop = target.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
});

// Enhanced hover effects
document.addEventListener('DOMContentLoaded', function() {
    // Destination cards
    const destinationCards = document.querySelectorAll('.destination-card');
    destinationCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-12px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Experience highlights
    const highlightItems = document.querySelectorAll('.highlight-item');
    highlightItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});

// Analytics tracking
function trackEvent(eventName, eventData) {
    console.log('Event tracked:', eventName, eventData);
    
    // Google Analytics 4 tracking (if implemented)
    if (typeof gtag !== 'undefined') {
        gtag('event', eventName, eventData);
    }
    
    // Facebook Pixel tracking (if implemented)
    if (typeof fbq !== 'undefined') {
        fbq('track', eventName, eventData);
    }
}

// Performance optimization
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

// Accessibility improvements
document.addEventListener('DOMContentLoaded', function() {
    // Add keyboard navigation for carousel
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            changeTestimonial(-1);
        } else if (e.key === 'ArrowRight') {
            changeTestimonial(1);
        }
    });
    
    // Add ARIA labels
    const navButtons = document.querySelectorAll('.nav-btn');
    navButtons.forEach((btn, index) => {
        btn.setAttribute('aria-label', index === 0 ? 'Previous testimonial' : 'Next testimonial');
    });
    
    const dots = document.querySelectorAll('.dot');
    dots.forEach((dot, index) => {
        dot.setAttribute('aria-label', `Go to testimonial ${index + 1}`);
        dot.setAttribute('role', 'button');
        dot.setAttribute('tabindex', '0');
        
        dot.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                currentTestimonial(index + 1);
            }
        });
    });
});

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

// Page load performance tracking
window.addEventListener('load', function() {
    const loadTime = performance.now();
    
    trackEvent('page_load_time', {
        page: 'destination_wedding',
        load_time: Math.round(loadTime),
        user_agent: navigator.userAgent
    });
});

// Exit intent tracking (desktop only)
if (!navigator.userAgent.match(/Mobile|Android|iPhone|iPad/)) {
    document.addEventListener('mouseleave', function(e) {
        if (e.clientY <= 0) {
            trackEvent('exit_intent', {
                page: 'destination_wedding',
                time_on_page: Math.round(performance.now() / 1000)
            });
        }
    });
}