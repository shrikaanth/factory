<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Factory Studio - Premium Photography Services</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- Navigation -->
      <?php include('includes/navbar.php');?>
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="font-playfair">Capturing Life's Most Beautiful Moments</h1>
            <p>Professional photography services that turn your precious memories into timeless art</p>
            <div class="hero-buttons">
                <a href="contact.php" class="btn btn-primary-custom">
                    <i class="fas fa-calendar me-2"></i>Book Your Session
                </a>
                <button class="btn btn-outline-custom" onclick="scrollToSection('gallery')">
                    <i class="fas fa-images me-2"></i>View Gallery
                </button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2 class="font-playfair">About Photo Factory Studio</h2>
                        <p>At Photo Factory Studio, we believe every moment tells a story. With over a decade of experience in professional photography, we specialize in capturing the essence of your most cherished moments.</p>
                        <p>Our team of skilled photographers combines artistic vision with technical expertise to create stunning visual narratives that you'll treasure forever.</p>
                        <div class="stats-row">
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="stat-number">500+</div>
                                    <div class="stat-label">Happy Clients</div>
                                </div>
                                <div class="col-4">
                                    <div class="stat-number">1000+</div>
                                    <div class="stat-label">Events Covered</div>
                                </div>
                                <div class="col-4">
                                    <div class="stat-number">13+</div>
                                    <div class="stat-label">Years Experience</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="https://ik.imagekit.io/movodevmaz/img/WhatsApp%20Image%202025-07-27%20at%201.17.30%20PM.jpeg" alt="About Us" class="img-fluid" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery-section">
        <div class="container">
            <div class="gallery-title">
                <h2 class="font-playfair">Our Portfolio</h2>
                <p>Discover the magic we create through our lens</p>
            </div>
        </div>
        
        <div class="infinite-gallery">
            <div class="scroll-container" id="scrollContainer1">
                <!-- First set of images -->
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/jpw/WhatsApp%20Image%202025-06-10%20at%2017.41.01_426a7ce4.jpg?updatedAt=1752734505543" alt="Wedding Photography" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/DSC03021.JPG?updatedAt=1753623949602" alt="Portrait Photography" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/jpw/1.jpg?updatedAt=1752734490145" alt="Pre-wedding Photography" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/jpw/WhatsApp%20Image%202025-06-10%20at%2017.41.01_426a7ce4.jpg?updatedAt=1752734505543" alt="Destination Wedding" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/npw/3.jpg?updatedAt=1752734542550" alt="Portrait Session" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08732.jpg?updatedAt=1752734602496" alt="Maternity Photography" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/swp/1L2A9949.jpg?updatedAt=1752734897985" alt="Product Photography" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/swp/1L2A9416.jpg?updatedAt=1752734871913" alt="Interior Photography">
                </div>
                <!-- Duplicate set for seamless loop -->
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/swp/1L2A9392.jpg?updatedAt=1752734866108" alt="Wedding Photography" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764.jpg?updatedAt=1752734526046" alt="Portrait Photography" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00770.jpg?updatedAt=1752734529072" alt="Pre-wedding Photography" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/npw/DSC08651.jpg?updatedAt=1752734579373" alt="Destination Wedding" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/npw/3.jpg?updatedAt=1752734542550" alt="Portrait Session" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764.jpg?updatedAt=1752734526046" alt="Maternity Photography" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://ik.imagekit.io/movodevmaz/img/pfs/kwp/DSC00764%20New.jpg?updatedAt=1752734527239" alt="Product Photography" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Interior Photography">
                </div>
            </div>
        </div>
        
        
        <div class="explore-btn">
            <button class="btn btn-explore" onclick="openPhotoGallery()">
                <i class="fas fa-images me-2"></i>Explore More
            </button>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <h2 class="font-playfair text-center mb-5">Our Services</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>Destination Wedding</h4>
                        <p>Capture your dream wedding in the most beautiful locations around the world with our expert destination wedding photography.</p>
                    <div> <a href="destination-wedding.php"> <button class="btn btn-primary-custom" onclick="scrollToSection('contact')">
                    <i class="fas fa-calendar me-2"></i>Explore Now!
                </button></a>
               </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-camera-retro"></i>
                        </div>
                        <h4>Pre Wedding</h4>
                        <p>Romantic and creative pre-wedding shoots that tell your unique love story in the most beautiful way.</p>
                    <div> <a href="pre-wedding.php"> <button class="btn btn-primary-custom" onclick="scrollToSection('contact')">
                    <i class="fas fa-calendar me-2"></i>Explore Now!
                </button></a>
               </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-rings-wedding"></i>
                        </div>
                        <h4>Wedding</h4>
                        <p>Complete wedding photography coverage for your special day, capturing every precious moment and emotion.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-birthday-cake"></i>
                        </div>
                        <h4>Birthday</h4>
                        <p>Celebrate life's milestones with vibrant and joyful photography that captures the essence of your special day.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-baby"></i>
                        </div>
                        <h4>Maternity & Baby Shoot</h4>
                        <p>Tender moments of motherhood and precious newborn memories captured with care and artistic vision.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4>Home Inauguration</h4>
                        <p>Document the beginning of your new chapter with beautiful home photography that captures this milestone.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-couch"></i>
                        </div>
                        <h4>Interior Shoot</h4>
                        <p>Showcase your space with professional interior photography that highlights design and ambiance.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <h4>Product Shoot</h4>
                        <p>High-quality product photography for your business needs, showcasing your products in the best light.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h4>Commercial Aerial Shoot</h4>
                        <p>Stunning aerial photography for real estate and commercial properties using advanced drone technology.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <h2 class="font-playfair text-center mb-5">What Our Clients Say</h2>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card">
                        <div class="testimonial-stars mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="testimonial-text">
                            "Photo Factory Studio captured our wedding day perfectly. Every emotion, every moment was preserved beautifully. We couldn't be happier with the results!"
                        </div>
                        <div class="testimonial-author">- Sarah & Michael Johnson</div>
                        <div class="testimonial-role">Wedding Clients</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card">
                        <div class="testimonial-stars mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="testimonial-text">
                            "The team was professional, creative, and made us feel so comfortable during our maternity shoot. The photos are absolutely stunning and we'll treasure them forever!"
                        </div>
                        <div class="testimonial-author">- Priya Sharma</div>
                        <div class="testimonial-role">Maternity Client</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card">
                        <div class="testimonial-stars mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="testimonial-text">
                            "Outstanding work on our corporate event. The photos perfectly captured the essence of our company culture and the professionalism was top-notch."
                        </div>
                        <div class="testimonial-author">- Tech Solutions Inc.</div>
                        <div class="testimonial-role">Corporate Client</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="contact-form-wrapper fade-in-up">
                        <div class="form-header text-center mb-5">
                            <h2 class="font-playfair">Get In Touch</h2>
                            <p>Ready to capture your special moments? Fill out the form below and we'll get back to you within 24 hours.</p>
                        </div>
                        <?php include('includes/contact-form.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Photo Gallery Modal -->
    <div class="photo-gallery" id="photoGallery">
        <div class="gallery-header">
            <div class="container">
                <h3 class="font-playfair text-white text-center">Our Complete Gallery</h3>
                <div class="close-gallery" onclick="closePhotoGallery()">
                    <i class="fas fa-times"></i>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="photo-grid" id="photoGrid">
                <!-- Photos will be loaded here -->
            </div>
            
            <div class="loading" id="loading">
                <div class="spinner"></div>
                <p>Loading more photos...</p>
            </div>
            
            <div class="contact-cta text-center mt-5">
                <button class="btn btn-primary-custom btn-lg" onclick="scrollToSection('contact'); closePhotoGallery();">
                    <i class="fas fa-phone me-2"></i>Book Your Session
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
     <?php include('includes/footer.php');?>
   <script>
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

    <!-- Photo Gallery Modal -->
    <div id="photoGallery" class="photo-gallery-modal">
        <div class="gallery-header">
            <h3 class="font-playfair">Photo Gallery</h3>
            <button class="gallery-close" onclick="closePhotoGallery()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="gallery-content">
            <div id="photoGrid" class="photo-grid">
                <!-- Photos will be loaded here -->
            </div>
            <div id="loading" class="loading-spinner" style="display: none;">
                <i class="fas fa-spinner fa-spin"></i>
                <p>Loading more photos...</p>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>