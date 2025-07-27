<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Photo Factory Studio</title>
    
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
    <section class="contact-hero">
        <div class="hero-background"></div>
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="breadcrumb-nav">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
            <div class="contact-hero-content fade-in-up">
                <h1 class="hero-title font-playfair">Let's Create Something Beautiful Together!</h1>
                <p class="hero-subtitle">Whether you're planning your big day or need a corporate shoot, we're just a message away. Drop us a line or walk into our studio.</p>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
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

    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 fade-in-left">
                    <div class="contact-details">
                        <h3 class="font-playfair mb-4">Visit Our Studio</h3>
                        <p class="mb-4">Step into our creative space where magic happens. Our studio is equipped with state-of-the-art equipment and designed to make you feel comfortable during your shoot.</p>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-content">
                                <h5>Location</h5>
                                <p>99 B L.N. City, Gandhi Nagar Airport Road<br>Indore, 453112<br>Madhya Pradesh, India</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-content">
                                <h5>Phone</h5>
                                <p><a href="tel:+919993590196">+91 99935-90196</a></p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-content">
                                <h5>Email</h5>
                                <p><a href="mailto:mail.photofactory@gmail.com">mail.photofactory@gmail.com</a></p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-content">
                                <h5>Working Hours</h5>
                                <p>Monday - Saturday: 9:00 AM - 8:00 PM<br>
                                   Sunday: 10:00 AM - 6:00 PM<br>
                                   <small class="text-muted">Available for shoots 24/7 by appointment</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 fade-in-right">
                    <div class="map-container">
                        <div class="map-wrapper">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.1234567890123!2d75.12345678901234!3d22.12345678901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962c1234567890%3A0x1234567890abcdef!2sGandhi%20Nagar%20Airport%20Road%2C%20Indore%2C%20Madhya%20Pradesh!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin"
                                width="100%" 
                                height="450" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="map-overlay">
                            <div class="map-info">
                                <h4 class="font-playfair">Photo Factory Studio</h4>
                                <p><i class="fas fa-map-marker-alt me-2"></i>Gandhi Nagar Airport Road, Indore</p>
                                <a href="https://maps.google.com/?q=Gandhi+Nagar+Airport+Road+Indore+Madhya+Pradesh" target="_blank" class="btn-directions">
                                    <i class="fas fa-directions me-2"></i>Get Directions
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Contact Section -->
    <section class="quick-contact-section">
        <div class="container">
            <div class="quick-contact-wrapper fade-in-up">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h3 class="font-playfair mb-3">Need Immediate Assistance?</h3>
                        <p class="mb-0">For urgent bookings or quick questions, reach out to us directly through these channels.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <div class="quick-contact-buttons">
                            <a href="tel:+919993590196" class="btn-quick-contact">
                                <i class="fas fa-phone"></i>
                                <span>Call Now</span>
                            </a>
                            <a href="https://wa.me/919993590196" target="_blank" class="btn-quick-contact whatsapp">
                                <i class="fab fa-whatsapp"></i>
                                <span>WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <?php include('includes/footer.php');?>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/contact.js"></script>
</body>
</html>