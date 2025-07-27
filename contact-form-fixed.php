<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Photo Factory Studio (Fixed)</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <style>
        .form-container { max-width: 800px; margin: 50px auto; padding: 30px; background: white; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .alert { margin-top: 20px; }
        .btn-submit { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; color: white; padding: 12px 30px; border-radius: 25px; font-weight: 600; transition: all 0.3s ease; }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        .btn-submit:disabled { opacity: 0.6; cursor: not-allowed; }
        .form-control:focus { border-color: #667eea; box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25); }
    </style>
</head>
<body style="background: #f4f7f6;">
    <div class="form-container">
        <h1 class="text-center mb-4">Contact Form Test (Fixed Version)</h1>
        
        <!-- Status Messages -->
        <div id="statusMessages"></div>
        
        <!-- Contact Form -->
        <form id="contactForm" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">
                        <i class="fas fa-user me-2"></i>Full Name *
                    </label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <div class="invalid-feedback">Please provide your name.</div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope me-2"></i>Email Address *
                    </label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback">Please provide a valid email address.</div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">
                        <i class="fas fa-phone me-2"></i>Phone Number
                    </label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="col-md-6 mb-3">
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
                    <div class="invalid-feedback">Please select a shoot type.</div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="no_of_days" class="form-label">
                        <i class="fas fa-calendar-day me-2"></i>Number of Days
                    </label>
                    <input type="number" class="form-control" id="no_of_days" name="no_of_days" min="1">
                </div>
                <div class="col-md-6 mb-3">
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
                </div>
            </div>
            
            <div class="mb-3">
                <label for="message" class="form-label">
                    <i class="fas fa-comment me-2"></i>Message *
                </label>
                <textarea class="form-control" id="message" name="message" rows="6" placeholder="Tell us about your vision, preferred dates, location, and any special requirements..." required></textarea>
                <div class="invalid-feedback">Please provide a message.</div>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-submit" id="submitBtn">
                    <span id="btnText">
                        <i class="fas fa-paper-plane me-2"></i>Send Message
                    </span>
                    <span id="btnLoading" style="display: none;">
                        <i class="fas fa-spinner fa-spin me-2"></i>Sending...
                    </span>
                </button>
            </div>
        </form>
        
        <!-- Success Message -->
        <div id="successMessage" class="alert alert-success text-center" style="display: none;">
            <i class="fas fa-check-circle me-2"></i>
            <strong>Thank You!</strong> Your message has been sent successfully. We'll get back to you within 24 hours.
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnLoading = document.getElementById('btnLoading');
            const successMessage = document.getElementById('successMessage');
            const statusMessages = document.getElementById('statusMessages');
            
            // Add status message
            function addStatusMessage(message, type = 'info') {
                const alertDiv = document.createElement('div');
                alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
                alertDiv.innerHTML = `
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                statusMessages.appendChild(alertDiv);
            }
            
            // Form validation
            function validateForm() {
                let isValid = true;
                const requiredFields = form.querySelectorAll('[required]');
                
                // Clear previous validation
                form.querySelectorAll('.is-invalid').forEach(field => {
                    field.classList.remove('is-invalid');
                });
                
                requiredFields.forEach(field => {
                    const value = field.value.trim();
                    
                    if (!value) {
                        field.classList.add('is-invalid');
                        isValid = false;
                    } else if (field.type === 'email') {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(value)) {
                            field.classList.add('is-invalid');
                            isValid = false;
                        }
                    }
                });
                
                return isValid;
            }
            
            // Handle form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                console.log('Form submission started');
                addStatusMessage('Form submission started...', 'info');
                
                if (!validateForm()) {
                    addStatusMessage('Please fill in all required fields correctly.', 'warning');
                    return;
                }
                
                // Show loading state
                submitBtn.disabled = true;
                btnText.style.display = 'none';
                btnLoading.style.display = 'inline';
                
                // Get form data
                const formData = new FormData(form);
                
                // Log form data
                console.log('Form data:');
                for (let [key, value] of formData.entries()) {
                    console.log(`${key}: ${value}`);
                }
                
                // Submit form
                fetch('process-form-simple.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    addStatusMessage(`Server response received (Status: ${response.status})`, 'info');
                    return response.json();
                })
                .then(data => {
                    console.log('Response data:', data);
                    
                    if (data.success) {
                        addStatusMessage('Form submitted successfully!', 'success');
                        addStatusMessage(`Database saved: ${data.saved_to_db ? 'Yes' : 'No'}`, data.saved_to_db ? 'success' : 'warning');
                        addStatusMessage(`Email sent: ${data.email_sent ? 'Yes' : 'No'}`, data.email_sent ? 'success' : 'warning');
                        
                        // Show success message
                        form.style.display = 'none';
                        successMessage.style.display = 'block';
                        
                        // Reset form after delay
                        setTimeout(() => {
                            form.reset();
                            form.style.display = 'block';
                            successMessage.style.display = 'none';
                        }, 5000);
                    } else {
                        addStatusMessage('Form submission failed!', 'danger');
                        if (data.errors) {
                            data.errors.forEach(error => {
                                addStatusMessage(`Error: ${error}`, 'danger');
                            });
                        }
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    addStatusMessage(`Network error: ${error.message}`, 'danger');
                })
                .finally(() => {
                    // Reset button state
                    submitBtn.disabled = false;
                    btnText.style.display = 'inline';
                    btnLoading.style.display = 'none';
                });
            });
            
            // Add initial status message
            addStatusMessage('Form loaded and ready for testing. Fill out the form and submit to test.', 'info');
        });
    </script>
</body>
</html> 