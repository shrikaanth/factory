// Contact Form Functionality
document.addEventListener('DOMContentLoaded', function() {
    initContactForm();
    initAnimations();
    initNavbarEffects();
    initParallaxEffect();
    initFormValidation();
});

// Initialize contact form
function initContactForm() {
    const form = document.getElementById('contactForm');
    const submitBtn = form.querySelector('.btn-submit');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');
    const formSuccess = document.getElementById('formSuccess');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateForm()) {
            submitForm();
        }
    });
    
    function submitForm() {
        // Show loading state
        submitBtn.disabled = true;
        btnText.style.display = 'none';
        btnLoading.style.display = 'inline-flex';
        
        // Get form data
        const formData = new FormData(form);
        
        // Submit form via AJAX
        fetch('process-form.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Hide form and show success message
                form.style.display = 'none';
                formSuccess.style.display = 'block';
                
                // Scroll to success message
                formSuccess.scrollIntoView({ behavior: 'smooth', block: 'center' });
                
                // Track form submission
                trackEvent('form_submission', {
                    form_type: 'contact',
                    shoot_type: form.shootType.value,
                    saved_to_db: data.saved_to_db
                });
                
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
            handleFormError(error);
        });
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

// Form validation
function initFormValidation() {
    const form = document.getElementById('contactForm');
    const inputs = form.querySelectorAll('input, select, textarea');
    
    inputs.forEach(input => {
        input.addEventListener('blur', () => validateField(input));
        input.addEventListener('input', () => clearFieldError(input));
    });
}

function validateField(field) {
    const value = field.value.trim();
    const feedback = field.parentNode.querySelector('.form-feedback');
    let isValid = true;
    let message = '';
    
    // Required field validation
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        message = 'This field is required.';
    }
    
    // Email validation
    if (field.type === 'email' && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            isValid = false;
            message = 'Please enter a valid email address.';
        }
    }
    
    // Phone validation
    if (field.type === 'tel' && value) {
        const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
        if (!phoneRegex.test(value.replace(/[\s\-\(\)]/g, ''))) {
            isValid = false;
            message = 'Please enter a valid phone number.';
        }
    }
    
    // Name validation
    if (field.name === 'name' && value) {
        if (value.length < 2) {
            isValid = false;
            message = 'Name must be at least 2 characters long.';
        }
    }
    
    // Message validation
    if (field.name === 'message' && value) {
        if (value.length < 10) {
            isValid = false;
            message = 'Message must be at least 10 characters long.';
        }
    }
    
    // Update field appearance
    if (isValid) {
        field.classList.remove('is-invalid');
        field.classList.add('is-valid');
        feedback.textContent = '';
        feedback.className = 'form-feedback valid';
    } else {
        field.classList.remove('is-valid');
        field.classList.add('is-invalid');
        feedback.textContent = message;
        feedback.className = 'form-feedback invalid';
    }
    
    return isValid;
}

function clearFieldError(field) {
    if (field.classList.contains('is-invalid')) {
        field.classList.remove('is-invalid');
        const feedback = field.parentNode.querySelector('.form-feedback');
        feedback.textContent = '';
        feedback.className = 'form-feedback';
    }
}

function validateForm() {
    const form = document.getElementById('contactForm');
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!validateField(field)) {
            isValid = false;
        }
    });
    
    // Validate optional fields that have values
    const optionalFields = form.querySelectorAll('input:not([required]), select:not([required]), textarea:not([required])');
    optionalFields.forEach(field => {
        if (field.value.trim()) {
            validateField(field);
        }
    });
    
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
    const feedbacks = form.querySelectorAll('.form-feedback');
    
    fields.forEach(field => {
        field.classList.remove('is-valid', 'is-invalid');
    });
    
    feedbacks.forEach(feedback => {
        feedback.textContent = '';
        feedback.className = 'form-feedback';
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

// Enhanced form interactions
document.addEventListener('DOMContentLoaded', function() {
    const formControls = document.querySelectorAll('.form-control');
    
    formControls.forEach(control => {
        // Add floating label effect
        control.addEventListener('focus', function() {
            this.parentNode.classList.add('focused');
        });
        
        control.addEventListener('blur', function() {
            if (!this.value) {
                this.parentNode.classList.remove('focused');
            }
        });
        
        // Check if field has value on load
        if (control.value) {
            control.parentNode.classList.add('focused');
        }
    });
    
    // Auto-resize textarea
    const textarea = document.querySelector('textarea');
    if (textarea) {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    }
});

// Phone number formatting
document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('phone');
    
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            // Format Indian phone numbers
            if (value.length > 0) {
                if (value.startsWith('91')) {
                    value = '+91 ' + value.substring(2);
                } else if (value.length === 10) {
                    value = '+91 ' + value;
                }
            }
            
            e.target.value = value;
        });
    }
});

// Map interaction enhancements
document.addEventListener('DOMContentLoaded', function() {
    const mapContainer = document.querySelector('.map-container');
    const mapIframe = document.querySelector('.map-wrapper iframe');
    
    if (mapContainer && mapIframe) {
        // Prevent scroll zoom on map
        mapContainer.addEventListener('wheel', function(e) {
            if (!e.ctrlKey) {
                e.preventDefault();
                window.scrollBy(0, e.deltaY);
            }
        });
        
        // Add click to activate message
        const overlay = document.createElement('div');
        overlay.className = 'map-click-overlay';
        overlay.innerHTML = '<p><i class="fas fa-mouse-pointer me-2"></i>Click to interact with map</p>';
        overlay.style.cssText = `
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.3s ease;
            z-index: 10;
        `;
        
        mapContainer.appendChild(overlay);
        
        overlay.addEventListener('click', function() {
            this.style.opacity = '0';
            setTimeout(() => {
                this.style.display = 'none';
            }, 300);
        });
    }
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

// Error handling for form submission
function handleFormError(error) {
    console.error('Form submission error:', error);
    
    const form = document.getElementById('contactForm');
    const submitBtn = form.querySelector('.btn-submit');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');
    
    // Reset button state
    submitBtn.disabled = false;
    btnText.style.display = 'inline-flex';
    btnLoading.style.display = 'none';
    
    // Show error message
    const errorDiv = document.createElement('div');
    errorDiv.className = 'alert alert-danger mt-3';
    errorDiv.innerHTML = `
        <i class="fas fa-exclamation-triangle me-2"></i>
        Sorry, there was an error sending your message. Please try again or contact us directly.
    `;
    
    form.appendChild(errorDiv);
    
    // Remove error message after 5 seconds
    setTimeout(() => {
        if (errorDiv.parentNode) {
            errorDiv.parentNode.removeChild(errorDiv);
        }
    }, 5000);
}

// Accessibility improvements
document.addEventListener('DOMContentLoaded', function() {
    // Add ARIA labels to form fields
    const formFields = document.querySelectorAll('.form-control');
    formFields.forEach(field => {
        const label = field.parentNode.querySelector('.form-label');
        if (label) {
            const labelText = label.textContent.replace(/\*/g, '').trim();
            field.setAttribute('aria-label', labelText);
        }
    });
    
    // Add keyboard navigation for custom elements
    const customButtons = document.querySelectorAll('.btn-quick-contact, .btn-directions');
    customButtons.forEach(btn => {
        btn.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });
});

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

// Apply debouncing to scroll events
const debouncedScrollHandler = debounce(function() {
    // Handle scroll events here if needed
}, 100);

window.addEventListener('scroll', debouncedScrollHandler);

// Local storage for form data (auto-save)
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const formFields = form.querySelectorAll('input, select, textarea');
    
    // Load saved data
    formFields.forEach(field => {
        const savedValue = localStorage.getItem(`contact_form_${field.name}`);
        if (savedValue && field.type !== 'submit') {
            field.value = savedValue;
        }
    });
    
    // Save data on input
    formFields.forEach(field => {
        field.addEventListener('input', debounce(function() {
            if (this.value.trim()) {
                localStorage.setItem(`contact_form_${this.name}`, this.value);
            } else {
                localStorage.removeItem(`contact_form_${this.name}`);
            }
        }, 500));
    });
    
    // Clear saved data on successful submission
    form.addEventListener('submit', function() {
        formFields.forEach(field => {
            localStorage.removeItem(`contact_form_${field.name}`);
        });
    });
});