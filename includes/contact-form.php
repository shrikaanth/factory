<?php
// Required CSS (include in <head> of parent page):
// - https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css
// - https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css
// - https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap
// - assets/css/styles.css
// - (optionally) assets/css/contact.css, assets/css/pre-wedding.css, assets/css/destination-wedding.css
//
// Required JS (include before </body> of parent page):
// - https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js
// - (optionally) assets/js/contact.js
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Photo Factory Studio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/contact.css">
</head>

<noscript><div class="alert alert-warning">JavaScript is required for full form functionality.</div></noscript>
<form id="contactForm" class="contact-form" method="POST">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="name" class="form-label">
                    <i class="fas fa-user me-2"></i>Full Name *
                </label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope me-2"></i>Email Address *
                </label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="phone" class="form-label">
                    <i class="fas fa-phone me-2"></i>Phone Number
                </label>
                <input type="tel" class="form-control" id="phone" name="phone">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="shootType" class="form-label">
                    <i class="fas fa-camera me-2"></i>Shoot Type *
                </label>
                <select class="form-control" id="shootType" name="shootType" required>
                    <option value="">Select Shoot Type</option>
                    <option value="wedding">Wedding Photography</option>
                    <option value="pre-wedding">Pre-Wedding Shoot</option>
                    <option value="maternity">Maternity & Baby Shoot</option>
                    <option value="portrait">Portrait Session</option>
                    <option value="corporate">Corporate Photography</option>
                    <option value="product">Product Photography</option>
                    <option value="event">Event Photography</option>
                    <option value="real-estate">Real Estate Photography</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="no_of_days" class="form-label">
                    <i class="fas fa-calendar-day me-2"></i>Number of Days
                </label>
                <input type="number" class="form-control" id="no_of_days" name="no_of_days" min="1">
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-list me-2"></i>Services Required
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Traditional Photo" id="service1">
                    <label class="form-check-label" for="service1">Traditional Photo</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Traditional Video" id="service2">
                    <label class="form-check-label" for="service2">Traditional Video</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Candid" id="service3">
                    <label class="form-check-label" for="service3">Candid</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Cinematography" id="service4">
                    <label class="form-check-label" for="service4">Cinematography</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Extra Photos" id="service5">
                    <label class="form-check-label" for="service5">Extra Photos</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Extra Videos" id="service6">
                    <label class="form-check-label" for="service6">Extra Videos</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Pre-wedding Extra Photos" id="service7">
                    <label class="form-check-label" for="service7">Pre-wedding Extra Photos</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" value="Pre-wedding Extra Videos" id="service8">
                    <label class="form-check-label" for="service8">Pre-wedding Extra Videos</label>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <div class="form-group">
            <label for="message" class="form-label">
                <i class="fas fa-comment me-2"></i>Message *
            </label>
            <textarea class="form-control" id="message" name="message" rows="6" placeholder="Tell us about your vision, preferred dates, location, and any special requirements..." required></textarea>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn-submit">
            <span class="btn-text">
                <i class="fas fa-paper-plane me-2"></i>Send Message
            </span>
            <span class="btn-loading" style="display: none;">
                <i class="fas fa-spinner fa-spin me-2"></i>Sending...
            </span>
        </button>
    </div>
</form>

<!-- Success Message -->
<div id="formSuccess" class="form-success" style="display: none;">
    <div class="success-content text-center">
        <i class="fas fa-check-circle success-icon"></i>
        <h3 class="font-playfair">Thank You!</h3>
        <p>Your message has been sent successfully. We'll get back to you within 24 hours.</p>
        <button class="btn btn-outline-custom" onclick="resetForm()">
            <i class="fas fa-plus me-2"></i>Send Another Message
        </button>
    </div>
</div> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/contact.js"></script>