<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Factory Studio - Premium Photography Services</title>
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/contact.css">
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
                    <div>
                        <a href="destination-wedding.php" class="btn btn-primary-custom">
                            <i class="fas fa-calendar me-2"></i>Explore Now!
                        </a>
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
                    <div>
                        <a href="pre-wedding.php" class="btn btn-primary-custom">
                            <i class="fas fa-calendar me-2"></i>Explore Now!
                        </a>
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
                        <div>
                            <a href="contact.php" class="btn btn-primary-custom">
                                <i class="fas fa-calendar me-2"></i>Book Now!
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-birthday-cake"></i>
                        </div>
                        <h4>Birthday</h4>
                        <p>Celebrate life's milestones with vibrant and joyful photography that captures the essence of your special day.</p>
                        <div>
                            <a href="contact.php" class="btn btn-primary-custom">
                                <i class="fas fa-calendar me-2"></i>Book Now!
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-baby"></i>
                        </div>
                        <h4>Maternity & Baby Shoot</h4>
                        <p>Tender moments of motherhood and precious newborn memories captured with care and artistic vision.</p>
                        <div>
                            <a href="contact.php" class="btn btn-primary-custom">
                                <i class="fas fa-calendar me-2"></i>Book Now!
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4>Home Inauguration</h4>
                        <p>Document the beginning of your new chapter with beautiful home photography that captures this milestone.</p>
                        <div>
                            <a href="contact.php" class="btn btn-primary-custom">
                                <i class="fas fa-calendar me-2"></i>Book Now!
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-couch"></i>
                        </div>
                        <h4>Interior Shoot</h4>
                        <p>Showcase your space with professional interior photography that highlights design and ambiance.</p>
                        <div>
                            <a href="contact.php" class="btn btn-primary-custom">
                                <i class="fas fa-calendar me-2"></i>Book Now!
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <h4>Product Shoot</h4>
                        <p>High-quality product photography for your business needs, showcasing your products in the best light.</p>
                        <div>
                            <a href="contact.php" class="btn btn-primary-custom">
                                <i class="fas fa-calendar me-2"></i>Book Now!
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h4>Commercial Aerial Shoot</h4>
                        <p>Stunning aerial photography for real estate and commercial properties using advanced drone technology.</p>
                        <div>
                            <a href="contact.php" class="btn btn-primary-custom">
                                <i class="fas fa-calendar me-2"></i>Book Now!
                            </a>
                        </div>
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
                        
                        <?php
                        // Display success message
                        if (isset($_GET['success'])) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <strong>Thank you!</strong> Your message has been sent successfully. We\'ll get back to you within 24 hours.';
                            if (isset($_GET['db_error'])) {
                                echo '<br><small class="text-muted">Note: There was an issue saving to database, but your message was sent via email.</small>';
                            }
                            if (isset($_GET['email_error'])) {
                                echo '<br><small class="text-muted">Note: There was an issue sending email, but your message was saved to our system.</small>';
                            }
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                  </div>';
                        }
                        
                        // Display error message
                        if (isset($_GET['error'])) {
                            $error = urldecode($_GET['error']);
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>Error:</strong> ' . htmlspecialchars($error) . '
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                  </div>';
                        }
                        ?>
                        
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
   
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/contact.js"></script>
</body>
</html>