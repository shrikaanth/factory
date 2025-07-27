// Contact Form Functionality
document.addEventListener('DOMContentLoaded', function() {
    initContactForm();
    initAnimations();
    initNavbarEffects();
    initParallaxEffect();
});

// Initialize contact form
function initContactForm() {
    const form = document.getElementById('contactForm');
    if (!form) {
        console.error('Contact form not found');
        return;
    }
    
    const submitBtn = form.querySelector('.btn-submit');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');
    const formSuccess = document.getElementById('formSuccess');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('Form submit event triggered');
        
        if (validateForm()) {
            // Check if JavaScript is enabled and try AJAX first
            if (window.fetch) {
                submitFormAjax();
            } else {
                // Fallback to regular form submission
                submitFormRegular();
            }
        }
    });
    
    function submitFormAjax() {
        console.log('Submitting form via AJAX...');
        
        // Show loading state
        submitBtn.disabled = true;
        btnText.style.display = 'none';
        btnLoading.style.display = 'inline-flex';
        
        // Get form data
        const formData = new FormData(form);
        
        // Log form data for debugging
        for (let [key, value] of formData.entries()) {
            console.log(`${key}: ${value}`);
        }
        
        // Submit form via AJAX
        fetch('process-form.php', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            console.log('Response received:', response);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                // Hide form and show success message
                form.style.display = 'none';
                formSuccess.style.display = 'block';
                
                // Scroll to success message
                formSuccess.scrollIntoView({ behavior: 'smooth', block: 'center' });
                
                // Track form submission
                if (typeof trackEvent === 'function') {
                    trackEvent('form_submission', {
                        form_type: 'contact',
                        shoot_type: form.shootType.value,
                        saved_to_db: data.saved_to_db,
                        email_sent: data.email_sent
                    });
                }
                
                // Reset form after delay
                setTimeout(() => {
                    resetForm();
                }, 5000);
            } else {
                // Show validation errors
                showFormErrors(data.errors);
                
                // Reset button state
                submitBtn.disabled = false;
                btnText.style.display = 'inline-flex';
                btnLoading.style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Form submission error:', error);
            // Fallback to regular form submission
            console.log('Falling back to regular form submission...');
            submitFormRegular();
        });
    }
    
    function submitFormRegular() {
        console.log('Submitting form via regular submission...');
        // Remove the preventDefault and let the form submit naturally
        form.removeEventListener('submit', arguments.callee);
        form.submit();
    }
    
    function showFormErrors(errors) {
        // Clear previous errors
        clearValidation();
        
        // Show errors
        errors.forEach(error => {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-danger mt-3';
            alertDiv.innerHTML = `<i class="fas fa-exclamation-triangle me-2"></i>${error}`;
            form.appendChild(alertDiv);
        });
    }
    
    function resetForm() {
        form.reset();
        form.style.display = 'block';
        formSuccess.style.display = 'none';
        submitBtn.disabled = false;
        btnText.style.display = 'inline-flex';
        btnLoading.style.display = 'none';
        clearValidation();
    }
}

// Simple form validation
function validateForm() {
    const form = document.getElementById('contactForm');
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    // Clear previous validation
    clearValidation();
    
    requiredFields.forEach(field => {
        const value = field.value.trim();
        
        if (!value) {
            isValid = false;
            field.classList.add('is-invalid');
            
            // Add error message
            const errorDiv = document.createElement('div');
            errorDiv.className = 'invalid-feedback';
            errorDiv.textContent = 'This field is required.';
            field.parentNode.appendChild(errorDiv);
        } else {
            field.classList.add('is-valid');
        }
    });
    
    // Email validation
    const emailField = form.querySelector('#email');
    if (emailField && emailField.value.trim()) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailField.value.trim())) {
            isValid = false;
            emailField.classList.remove('is-valid');
            emailField.classList.add('is-invalid');
            
            // Remove existing error message
            const existingError = emailField.parentNode.querySelector('.invalid-feedback');
            if (existingError) {
                existingError.remove();
            }
            
            // Add error message
            const errorDiv = document.createElement('div');
            errorDiv.className = 'invalid-feedback';
            errorDiv.textContent = 'Please enter a valid email address.';
            emailField.parentNode.appendChild(errorDiv);
        }
    }
    
    if (!isValid) {
        // Scroll to first invalid field
        const firstInvalid = form.querySelector('.is-invalid');
        if (firstInvalid) {
            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstInvalid.focus();
        }
    }
    
    return isValid;
}

function clearValidation() {
    const form = document.getElementById('contactForm');
    const fields = form.querySelectorAll('input, select, textarea');
    const errorMessages = form.querySelectorAll('.invalid-feedback');
    
    fields.forEach(field => {
        field.classList.remove('is-valid', 'is-invalid');
    });
    
    errorMessages.forEach(error => {
        error.remove();
    });
}

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

// Parallax effect for hero section
function initParallaxEffect() {
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('.contact-hero');
        const heroBackground = document.querySelector('.hero-background');
        
        if (hero && heroBackground && scrolled < window.innerHeight) {
            heroBackground.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
}

// Global reset form function
function resetForm() {
    const form = document.getElementById('contactForm');
    const formSuccess = document.getElementById('formSuccess');
    const submitBtn = form.querySelector('.btn-submit');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');
    
    if (form && formSuccess && submitBtn) {
        form.reset();
        form.style.display = 'block';
        formSuccess.style.display = 'none';
        submitBtn.disabled = false;
        btnText.style.display = 'inline-flex';
        btnLoading.style.display = 'none';
        clearValidation();
    }
}

// Event tracking function
function trackEvent(eventName, eventData) {
    console.log('Event tracked:', eventName, eventData);
    // Add your analytics tracking code here
}

// Error handling function
function handleFormError(error) {
    console.error('Form error:', error);
    
    const form = document.getElementById('contactForm');
    if (form) {
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-danger mt-3';
        alertDiv.innerHTML = `
            <i class="fas fa-exclamation-triangle me-2"></i>
            An error occurred while submitting the form. Please try again or contact us directly.
        `;
        form.appendChild(alertDiv);
    }
}

// Debounce function
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