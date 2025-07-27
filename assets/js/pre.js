
// Pre-Wedding Page Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Performance optimizations first
    optimizeForMobile();
    initLazyLoading();
    
    // Initialize critical functions first
    initNavbarEffects();
    initPortfolioFilters();
    initPortfolioGrid();
    
    // Initialize non-critical functions with delay
    setTimeout(() => {
        initAnimations();
        initParallaxEffect();
        initFeaturedSlider();
        initThemeInteractions();
        initBookingTracking();
        
        // Add animation class to hero overlay after page loads
        const heroOverlay = document.querySelector('.hero-overlay');
        if (heroOverlay) {
            heroOverlay.classList.add('animated');
        }
    }, 100);
});

// Optimized portfolio data with fewer images and local assets
const portfolioData = {
    all: [
        { id: 1, category: 'nature', title: 'Garden Romance', location: 'Botanical Gardens', image: 'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00756.jpg?updatedAt=1752734526194' },
        { id: 2, category: 'urban', title: 'City Love', location: 'Downtown Mumbai', image: 'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764.jpg?updatedAt=1752734526046' },
        { id: 3, category: 'vintage', title: 'Timeless Elegance', location: 'Heritage Palace', image: 'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764%20New.jpg?updatedAt=1752734527239' },
        { id: 4, category: 'romantic', title: 'Sunset Dreams', location: 'Beach Resort', image: 'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00770.jpg?updatedAt=1752734529072' },
        { id: 5, category: 'cultural', title: 'Traditional Beauty', location: 'Temple Complex', image: 'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08679.jpg?updatedAt=1752734595568' },
        { id: 6, category: 'nature', title: 'Forest Whispers', location: 'National Park', image: 'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08732.jpg?updatedAt=1752734602496' }
    ]
};

// Optimized theme galleries with local images
const themeGalleries = {
    nature: [
            'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00756.jpg?updatedAt=1752734526194',
    'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08732.jpg?updatedAt=1752734602496',
    'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00770.jpg?updatedAt=1752734529072'
    ],
    urban: [
            'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764.jpg?updatedAt=1752734526046',
    'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764%20New.jpg?updatedAt=1752734527239',
    'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00770.jpg?updatedAt=1752734529072'
    ],
    vintage: [
            'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08679.jpg?updatedAt=1752734595568',
    'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08732.jpg?updatedAt=1752734602496',
    'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08751.jpg?updatedAt=1752734612482'
    ],
    romantic: [
            'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00756.jpg?updatedAt=1752734526194',
    'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764.jpg?updatedAt=1752734526046',
    'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764%20New.jpg?updatedAt=1752734527239'
    ],
    cultural: [
            'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08732.jpg?updatedAt=1752734602496',
    'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08751.jpg?updatedAt=1752734612482',
    'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08679.jpg?updatedAt=1752734595568'
    ],
    adventure: [
            'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00770.jpg?updatedAt=1752734529072',
    'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08732.jpg?updatedAt=1752734602496',
    'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08751.jpg?updatedAt=1752734612482'
    ]
};

// Optimized shoot galleries with local images
const shootGalleries = {
    'rahul-priya': [
            'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00756.jpg?updatedAt=1752734526194',
    'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764.jpg?updatedAt=1752734526046',
    'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764%20New.jpg?updatedAt=1752734527239'
    ],
    'arjun-sneha': [
            'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00770.jpg?updatedAt=1752734529072',
    'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08679.jpg?updatedAt=1752734595568',
    'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08732.jpg?updatedAt=1752734602496'
    ],
    'vikram-kavya': [
        'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08751.jpg?updatedAt=1752734612482',
        'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00756.jpg?updatedAt=1752734526194',
        'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764.jpg?updatedAt=1752734526046',
        'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764%20New.jpg?updatedAt=1752734527239',
        'https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00770.jpg?updatedAt=1752734529072',
        'https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08679.jpg?updatedAt=1752734595568'
    ]
};

// Global variables
let currentSlideIndex = 0;
let currentPortfolioPage = 0;
let currentFilter = 'all';
let currentLightboxImages = [];
let currentLightboxIndex = 0;

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
        const hero = document.querySelector('.pre-wedding-hero');
        const heroBackground = document.querySelector('.hero-background');
        
        if (hero && heroBackground && scrolled < window.innerHeight) {
            heroBackground.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
}

// Featured slider functionality
function initFeaturedSlider() {
    // Auto-advance slider
    setInterval(() => {
        changeSlide(1);
    }, 8000);
    
    // Touch/swipe support for mobile
    let startX = 0;
    let endX = 0;
    
    const slider = document.querySelector('.featured-slider');
    
    slider.addEventListener('touchstart', function(e) {
        startX = e.touches[0].clientX;
    });
    
    slider.addEventListener('touchend', function(e) {
        endX = e.changedTouches[0].clientX;
        handleSwipe();
    });
    
    function handleSwipe() {
        const threshold = 50;
        const diff = startX - endX;
        
        if (Math.abs(diff) > threshold) {
            if (diff > 0) {
                changeSlide(1); // Swipe left - next
            } else {
                changeSlide(-1); // Swipe right - previous
            }
        }
    }
}

function changeSlide(direction) {
    const slides = document.querySelectorAll('.featured-slide');
    const dots = document.querySelectorAll('.dot');
    
    slides[currentSlideIndex].classList.remove('active');
    dots[currentSlideIndex].classList.remove('active');
    
    currentSlideIndex += direction;
    
    if (currentSlideIndex >= slides.length) {
        currentSlideIndex = 0;
    } else if (currentSlideIndex < 0) {
        currentSlideIndex = slides.length - 1;
    }
    
    slides[currentSlideIndex].classList.add('active');
    dots[currentSlideIndex].classList.add('active');
    
    // Track slider interaction
    trackEvent('featured_slide_viewed', {
        slide_index: currentSlideIndex,
        interaction_type: direction > 0 ? 'next' : 'previous'
    });
}

function currentSlide(index) {
    const slides = document.querySelectorAll('.featured-slide');
    const dots = document.querySelectorAll('.dot');
    
    slides[currentSlideIndex].classList.remove('active');
    dots[currentSlideIndex].classList.remove('active');
    
    currentSlideIndex = index - 1;
    
    slides[currentSlideIndex].classList.add('active');
    dots[currentSlideIndex].classList.add('active');
    
    // Track slider interaction
    trackEvent('featured_slide_viewed', {
        slide_index: currentSlideIndex,
        interaction_type: 'dot_click'
    });
}

// Portfolio filters
function initPortfolioFilters() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter portfolio
            currentFilter = filter;
            currentPortfolioPage = 0;
            filterPortfolio(filter);
            
            // Track filter usage
            trackEvent('portfolio_filtered', {
                filter: filter
            });
        });
    });
}

function filterPortfolio(filter) {
    const portfolioGrid = document.getElementById('portfolioGrid');
    portfolioGrid.innerHTML = '';
    
    const filteredData = filter === 'all' ? portfolioData.all : portfolioData.all.filter(item => item.category === filter);
    const itemsToShow = Math.min(6, filteredData.length);
    
    for (let i = 0; i < itemsToShow; i++) {
        const item = filteredData[i];
        const portfolioItem = createPortfolioItem(item);
        portfolioGrid.appendChild(portfolioItem);
    }
    
    // Show/hide load more button
    const loadMoreBtn = document.querySelector('.btn-load-more');
    if (filteredData.length > itemsToShow) {
        loadMoreBtn.style.display = 'inline-flex';
    } else {
        loadMoreBtn.style.display = 'none';
    }
}

function createPortfolioItem(item) {
    const portfolioItem = document.createElement('div');
    portfolioItem.className = 'portfolio-item';
    portfolioItem.innerHTML = `
        <img src="${item.image}" alt="${item.title}" loading="lazy" onload="this.style.opacity='1'" style="opacity: 0; transition: opacity 0.3s ease;">
        <div class="portfolio-overlay">
            <div class="portfolio-info">
                <h4>${item.title}</h4>
                <p>${item.location}</p>
            </div>
        </div>
    `;
    
    // Add click event to open lightbox
    portfolioItem.addEventListener('click', function() {
        const filteredData = currentFilter === 'all' ? portfolioData.all : portfolioData.all.filter(i => i.category === currentFilter);
        currentLightboxImages = filteredData.map(i => i.image);
        currentLightboxIndex = filteredData.findIndex(i => i.id === item.id);
        openLightbox();
        
        // Track portfolio interaction
        trackEvent('portfolio_image_clicked', {
            image_id: item.id,
            category: item.category,
            title: item.title
        });
    });
    
    return portfolioItem;
}

// Initialize portfolio grid
function initPortfolioGrid() {
    filterPortfolio('all');
}

// Load more portfolio items
function loadMorePortfolio() {
    const portfolioGrid = document.getElementById('portfolioGrid');
    const filteredData = currentFilter === 'all' ? portfolioData.all : portfolioData.all.filter(item => item.category === currentFilter);
    
    currentPortfolioPage++;
    const startIndex = currentPortfolioPage * 6;
    const endIndex = Math.min(startIndex + 6, filteredData.length);
    
    for (let i = startIndex; i < endIndex; i++) {
        const item = filteredData[i];
        const portfolioItem = createPortfolioItem(item);
        portfolioGrid.appendChild(portfolioItem);
        
        // Animate new items
        setTimeout(() => {
            portfolioItem.style.opacity = '1';
            portfolioItem.style.transform = 'scale(1)';
        }, (i - startIndex) * 100);
        
        // Set initial styles for animation
        portfolioItem.style.opacity = '0';
        portfolioItem.style.transform = 'scale(0.8)';
        portfolioItem.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    }
    
    // Hide load more button if all items are loaded
    if (endIndex >= filteredData.length) {
        document.querySelector('.btn-load-more').style.display = 'none';
    }
    
    // Track load more usage
    trackEvent('portfolio_load_more', {
        filter: currentFilter,
        page: currentPortfolioPage
    });
}

// Theme interactions
function initThemeInteractions() {
    const themeCards = document.querySelectorAll('.theme-card');
    
    themeCards.forEach(card => {
        card.addEventListener('click', function() {
            const theme = this.getAttribute('data-theme');
            openThemePortfolio(theme);
        });
    });
}

// Open theme portfolio modal
function openThemePortfolio(theme) {
    const modal = document.getElementById('themePortfolioModal');
    const title = document.getElementById('themeModalTitle');
    const grid = document.getElementById('themeGalleryGrid');
    
    // Set title
    const themeNames = {
        nature: 'Nature & Outdoor Photography',
        urban: 'Urban & Modern Photography',
        vintage: 'Vintage & Classic Photography',
        romantic: 'Romantic & Dreamy Photography',
        cultural: 'Cultural & Traditional Photography',
        adventure: 'Adventure & Fun Photography'
    };
    
    title.textContent = themeNames[theme] || 'Theme Portfolio';
    
    // Clear and populate grid
    grid.innerHTML = '';
    const images = themeGalleries[theme] || [];
    
    images.forEach((image, index) => {
        const item = document.createElement('div');
        item.className = 'theme-gallery-item';
        item.innerHTML = `<img src="${image}" alt="${theme} ${index + 1}" loading="lazy">`;
        
        // Add click event to open lightbox
        item.addEventListener('click', function() {
            currentLightboxImages = images;
            currentLightboxIndex = index;
            openLightbox();
        });
        
        grid.appendChild(item);
    });
    
    // Show modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    // Track theme portfolio opening
    trackEvent('theme_portfolio_opened', {
        theme: theme
    });
}

// Close theme portfolio modal
function closeThemePortfolio() {
    const modal = document.getElementById('themePortfolioModal');
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

// Open shoot gallery modal
function openShootGallery(shootId) {
    const modal = document.getElementById('shootGalleryModal');
    const title = document.getElementById('shootModalTitle');
    const grid = document.getElementById('shootGalleryGrid');
    
    // Set title
    const shootNames = {
        'rahul-priya': 'Rahul & Priya - Complete Shoot',
        'arjun-sneha': 'Arjun & Sneha - Complete Shoot',
        'vikram-kavya': 'Vikram & Kavya - Complete Shoot'
    };
    
    title.textContent = shootNames[shootId] || 'Complete Shoot';
    
    // Clear and populate grid
    grid.innerHTML = '';
    const images = shootGalleries[shootId] || [];
    
    images.forEach((image, index) => {
        const item = document.createElement('div');
        item.className = 'shoot-gallery-item';
        item.innerHTML = `<img src="${image}" alt="Shoot ${index + 1}" loading="lazy">`;
        
        // Add click event to open lightbox
        item.addEventListener('click', function() {
            currentLightboxImages = images;
            currentLightboxIndex = index;
            openLightbox();
        });
        
        grid.appendChild(item);
    });
    
    // Show modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    // Track shoot gallery opening
    trackEvent('shoot_gallery_opened', {
        shoot_id: shootId
    });
}

// Close shoot gallery modal
function closeShootGallery() {
    const modal = document.getElementById('shootGalleryModal');
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

// Lightbox functionality
function openLightbox() {
    const lightbox = document.getElementById('imageLightbox');
    const image = document.getElementById('lightboxImage');
    
    image.src = currentLightboxImages[currentLightboxIndex];
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    // Add keyboard navigation
    document.addEventListener('keydown', handleLightboxKeyboard);
}

function closeLightbox() {
    const lightbox = document.getElementById('imageLightbox');
    lightbox.classList.remove('active');
    document.body.style.overflow = 'auto';
    
    // Remove keyboard navigation
    document.removeEventListener('keydown', handleLightboxKeyboard);
}

function prevLightboxImage() {
    currentLightboxIndex = currentLightboxIndex > 0 ? currentLightboxIndex - 1 : currentLightboxImages.length - 1;
    document.getElementById('lightboxImage').src = currentLightboxImages[currentLightboxIndex];
}

function nextLightboxImage() {
    currentLightboxIndex = currentLightboxIndex < currentLightboxImages.length - 1 ? currentLightboxIndex + 1 : 0;
    document.getElementById('lightboxImage').src = currentLightboxImages[currentLightboxIndex];
}

function handleLightboxKeyboard(e) {
    switch(e.key) {
        case 'Escape':
            closeLightbox();
            break;
        case 'ArrowLeft':
            prevLightboxImage();
            break;
        case 'ArrowRight':
            nextLightboxImage();
            break;
    }
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
                service: 'pre_wedding',
                source: 'pre_wedding_page'
            });
        });
    });
    
    // Track scroll depth
    let maxScrollDepth = 0;
    
    window.addEventListener('scroll', debounce(function() {
        const scrollPercent = Math.round((window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100);
        
        if (scrollPercent > maxScrollDepth) {
            maxScrollDepth = scrollPercent;
            
            // Track milestone scroll depths
            if (scrollPercent >= 25 && maxScrollDepth < 25) {
                trackEvent('scroll_depth', { depth: '25%', page: 'pre_wedding' });
            } else if (scrollPercent >= 50 && maxScrollDepth < 50) {
                trackEvent('scroll_depth', { depth: '50%', page: 'pre_wedding' });
            } else if (scrollPercent >= 75 && maxScrollDepth < 75) {
                trackEvent('scroll_depth', { depth: '75%', page: 'pre_wedding' });
            } else if (scrollPercent >= 90 && maxScrollDepth < 90) {
                trackEvent('scroll_depth', { depth: '90%', page: 'pre_wedding' });
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
    // Theme cards
    const themeCards = document.querySelectorAll('.theme-card');
    themeCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-12px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Story highlights
    const highlightItems = document.querySelectorAll('.highlight-item');
    highlightItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Portfolio items
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    portfolioItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.03)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
});

// Modal click outside to close
document.addEventListener('DOMContentLoaded', function() {
    const modals = document.querySelectorAll('.theme-portfolio-modal, .shoot-gallery-modal, .image-lightbox');
    
    modals.forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                if (modal.classList.contains('theme-portfolio-modal')) {
                    closeThemePortfolio();
                } else if (modal.classList.contains('shoot-gallery-modal')) {
                    closeShootGallery();
                } else if (modal.classList.contains('image-lightbox')) {
                    closeLightbox();
                }
            }
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

// Performance optimization: Lazy load images
function initLazyLoading() {
    const images = document.querySelectorAll('img[loading="lazy"]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src || img.src;
                img.classList.remove('lazy');
                observer.unobserve(img);
            }
        });
    });

    images.forEach(img => {
        imageObserver.observe(img);
    });
}

// Performance optimization: Reduce animation complexity on mobile
function optimizeForMobile() {
    if (window.innerWidth <= 768) {
        // Disable heavy animations on mobile
        document.body.classList.add('mobile-optimized');
        
        // Reduce parallax effect
        const heroBackground = document.querySelector('.hero-background');
        if (heroBackground) {
            heroBackground.style.transform = 'none';
        }
    }
}

// Accessibility improvements
document.addEventListener('DOMContentLoaded', function() {
    // Add keyboard navigation for slider
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            changeSlide(-1);
        } else if (e.key === 'ArrowRight') {
            changeSlide(1);
        }
    });
    
    // Add ARIA labels
    const navButtons = document.querySelectorAll('.slider-btn');
    navButtons.forEach((btn, index) => {
        btn.setAttribute('aria-label', index === 0 ? 'Previous slide' : 'Next slide');
    });
    
    const dots = document.querySelectorAll('.dot');
    dots.forEach((dot, index) => {
        dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
        dot.setAttribute('role', 'button');
        dot.setAttribute('tabindex', '0');
        
        dot.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                currentSlide(index + 1);
            }
        });
    });
    
    // Add ARIA labels to filter buttons
    const filterButtons = document.querySelectorAll('.filter-btn');
    filterButtons.forEach(button => {
        const filter = button.getAttribute('data-filter');
        button.setAttribute('aria-label', `Filter by ${filter}`);
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
        page: 'pre_wedding',
        load_time: Math.round(loadTime),
        user_agent: navigator.userAgent
    });
});

// Exit intent tracking (desktop only)
if (!navigator.userAgent.match(/Mobile|Android|iPhone|iPad/)) {
    document.addEventListener('mouseleave', function(e) {
        if (e.clientY <= 0) {
            trackEvent('exit_intent', {
                page: 'pre_wedding',
                time_on_page: Math.round(performance.now() / 1000)
            });
        }
    });
}