<?php
// Test database connection first
echo "<h2>Database Connection Test</h2>";
try {
    require_once 'includes/db.php';
    echo "<p style='color: green;'>✓ Database connected successfully!</p>";
    
    // Check if inquiries table exists
    $stmt = $pdo->query("SHOW TABLES LIKE 'inquiries'");
    if ($stmt->rowCount() > 0) {
        echo "<p style='color: green;'>✓ Inquiries table exists!</p>";
        
        // Count existing inquiries
        $stmt = $pdo->query("SELECT COUNT(*) as count FROM inquiries");
        $count = $stmt->fetch()['count'];
        echo "<p>Current inquiries in database: $count</p>";
    } else {
        echo "<p style='color: orange;'>⚠ Inquiries table does not exist - will be created automatically</p>";
    }
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Database Error: " . $e->getMessage() . "</p>";
}

// Test file permissions
echo "<h2>File Permissions Test</h2>";
$files_to_check = [
    'process-form.php',
    'includes/db.php',
    'includes/contact-form.php',
    'assets/js/contact.js',
    'assets/css/contact.css'
];

foreach ($files_to_check as $file) {
    if (file_exists($file)) {
        $readable = is_readable($file);
        echo "<p>✓ $file exists (readable: " . ($readable ? 'Yes' : 'No') . ")</p>";
    } else {
        echo "<p style='color: red;'>✗ $file not found</p>";
    }
}

// Test inquiries.txt file
$inquiries_file = 'inquiries.txt';
if (file_exists($inquiries_file)) {
    $writable = is_writable($inquiries_file);
    echo "<p>inquiries.txt exists (writable: " . ($writable ? 'Yes' : 'No') . ")</p>";
} else {
    // Try to create the file
    if (file_put_contents($inquiries_file, "Test file created\n")) {
        echo "<p style='color: green;'>✓ Created inquiries.txt successfully</p>";
    } else {
        echo "<p style='color: red;'>✗ Cannot create inquiries.txt</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Contact Form Test - Photo Factory Studio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <style>
        body { padding: 20px; background: #f4f7f6; }
        .test-container { max-width: 1200px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .test-section { margin: 20px 0; padding: 20px; border: 1px solid #e0e0e0; border-radius: 8px; background: #f9f9f9; }
        .console-log { background: #000; color: #0f0; padding: 10px; border-radius: 5px; font-family: monospace; font-size: 12px; max-height: 300px; overflow-y: auto; margin: 10px 0; }
        .form-test { background: white; padding: 20px; border-radius: 8px; border: 2px solid #e0e0e0; }
        .status-message { margin: 10px 0; padding: 10px; border-radius: 5px; }
        .status-success { background: #d4edda; color: #155724; }
        .status-error { background: #f8d7da; color: #721c24; }
        .status-info { background: #d1ecf1; color: #0c5460; }
        .status-warning { background: #fff3cd; color: #856404; }
    </style>
</head>
<body>
    <div class="test-container">
        <h1 class="text-center mb-4">Complete Contact Form Test</h1>
        
        <div class="test-section">
            <h3>1. System Status</h3>
            <div id="systemStatus">
                <div class="status-message status-info">Checking system status...</div>
            </div>
        </div>
        
        <div class="test-section">
            <h3>2. Contact Form Test</h3>
            <div class="form-test">
                <?php include('includes/contact-form.php'); ?>
            </div>
        </div>
        
        <div class="test-section">
            <h3>3. Test Results</h3>
            <div id="testResults">
                <div class="status-message status-info">Fill out the form above to test submission...</div>
            </div>
        </div>
        
        <div class="test-section">
            <h3>4. Console Log</h3>
            <div id="consoleLog" class="console-log">Console logs will appear here...</div>
        </div>
        
        <div class="test-section">
            <h3>5. Quick Actions</h3>
            <div class="row">
                <div class="col-md-3">
                    <a href="setup-database.php" class="btn btn-primary w-100 mb-2" target="_blank">
                        <i class="fas fa-database me-2"></i>Setup DB
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="admin/inquiries.php" class="btn btn-success w-100 mb-2" target="_blank">
                        <i class="fas fa-eye me-2"></i>View Inquiries
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="contact.php" class="btn btn-info w-100 mb-2" target="_blank">
                        <i class="fas fa-envelope me-2"></i>Contact Page
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="index.php" class="btn btn-secondary w-100 mb-2" target="_blank">
                        <i class="fas fa-home me-2"></i>Home Page
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/contact.js"></script>
    
    <script>
        // Override console.log to capture logs
        const originalLog = console.log;
        const originalError = console.error;
        const originalWarn = console.warn;
        
        function addToConsole(message, type = 'log') {
            const logDiv = document.getElementById('consoleLog');
            const timestamp = new Date().toLocaleTimeString();
            const color = type === 'error' ? '#ff6b6b' : type === 'warn' ? '#ffd93d' : '#0f0';
            logDiv.innerHTML += `<span style="color: ${color}">[${timestamp}] ${message}</span>\n`;
            logDiv.scrollTop = logDiv.scrollHeight;
        }
        
        console.log = function(...args) {
            originalLog.apply(console, args);
            addToConsole(args.join(' '), 'log');
        };
        
        console.error = function(...args) {
            originalError.apply(console, args);
            addToConsole('ERROR: ' + args.join(' '), 'error');
        };
        
        console.warn = function(...args) {
            originalWarn.apply(console, args);
            addToConsole('WARN: ' + args.join(' '), 'warn');
        };
        
        // System status check
        function checkSystemStatus() {
            const statusDiv = document.getElementById('systemStatus');
            
            // Check if contact form exists
            const form = document.getElementById('contactForm');
            if (form) {
                statusDiv.innerHTML += '<div class="status-message status-success">✓ Contact form found</div>';
            } else {
                statusDiv.innerHTML += '<div class="status-message status-error">✗ Contact form not found</div>';
            }
            
            // Check if contact.js is loaded
            if (typeof validateForm === 'function') {
                statusDiv.innerHTML += '<div class="status-message status-success">✓ Contact JavaScript loaded</div>';
            } else {
                statusDiv.innerHTML += '<div class="status-message status-error">✗ Contact JavaScript not loaded</div>';
            }
            
            // Check if process-form.php exists
            fetch('process-form.php')
                .then(response => {
                    if (response.ok) {
                        statusDiv.innerHTML += '<div class="status-message status-success">✓ Form processing script accessible</div>';
                    } else {
                        statusDiv.innerHTML += '<div class="status-message status-error">✗ Form processing script not accessible</div>';
                    }
                })
                .catch(error => {
                    statusDiv.innerHTML += '<div class="status-message status-error">✗ Cannot access form processing script</div>';
                });
        }
        
        // Enhanced form monitoring
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Complete contact form test page loaded');
            
            const form = document.getElementById('contactForm');
            const resultsDiv = document.getElementById('testResults');
            
            if (form) {
                console.log('Contact form found and ready for testing');
                
                // Monitor form submission
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    console.log('Form submit event triggered');
                    resultsDiv.innerHTML = '<div class="status-message status-info">✓ Form submit event triggered</div>';
                    
                    // Test validation
                    if (typeof validateForm === 'function') {
                        console.log('validateForm function exists');
                        if (validateForm()) {
                            resultsDiv.innerHTML += '<div class="status-message status-success">✓ Form validation passed</div>';
                            
                            // Show form data
                            const formData = new FormData(form);
                            let dataText = '<strong>Form Data:</strong><br>';
                            for (let [key, value] of formData.entries()) {
                                dataText += `<small>${key}: ${value}</small><br>`;
                            }
                            resultsDiv.innerHTML += dataText;
                            
                            // Test submission
                            resultsDiv.innerHTML += '<div class="status-message status-info">✓ Attempting form submission...</div>';
                            
                            fetch('process-form.php', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => {
                                console.log('Response status:', response.status);
                                resultsDiv.innerHTML += '<div class="status-message status-info">✓ Server response received</div>';
                                return response.json();
                            })
                            .then(data => {
                                console.log('Response data:', data);
                                
                                if (data.success) {
                                    resultsDiv.innerHTML += '<div class="status-message status-success">✓ Form submitted successfully!</div>';
                                    resultsDiv.innerHTML += `<div class="status-message status-success">Message: ${data.message}</div>`;
                                    resultsDiv.innerHTML += `<div class="status-message ${data.saved_to_db ? 'status-success' : 'status-warning'}">Database saved: ${data.saved_to_db ? 'Yes' : 'No'}</div>`;
                                    resultsDiv.innerHTML += `<div class="status-message ${data.email_sent ? 'status-success' : 'status-warning'}">Email sent: ${data.email_sent ? 'Yes' : 'No'}</div>`;
                                    
                                    if (data.saved_to_db) {
                                        resultsDiv.innerHTML += '<div class="status-message status-success">✓ Data saved to database successfully!</div>';
                                    } else {
                                        resultsDiv.innerHTML += '<div class="status-message status-warning">⚠ Data saved to file backup only</div>';
                                    }
                                    
                                    if (data.email_sent) {
                                        resultsDiv.innerHTML += '<div class="status-message status-success">✓ Email sent successfully!</div>';
                                    } else {
                                        resultsDiv.innerHTML += '<div class="status-message status-warning">⚠ Email not sent (check mail server)</div>';
                                    }
                                } else {
                                    resultsDiv.innerHTML += '<div class="status-message status-error">✗ Form submission failed</div>';
                                    if (data.errors) {
                                        data.errors.forEach(error => {
                                            resultsDiv.innerHTML += `<div class="status-message status-error">Error: ${error}</div>`;
                                        });
                                    }
                                }
                            })
                            .catch(error => {
                                console.error('Fetch error:', error);
                                resultsDiv.innerHTML += `<div class="status-message status-error">✗ Network error: ${error.message}</div>`;
                            });
                        } else {
                            resultsDiv.innerHTML += '<div class="status-message status-error">✗ Form validation failed</div>';
                        }
                    } else {
                        console.error('validateForm function not found');
                        resultsDiv.innerHTML += '<div class="status-message status-error">✗ validateForm function not found</div>';
                    }
                });
                
                // Test form elements
                const requiredFields = form.querySelectorAll('[required]');
                console.log(`Found ${requiredFields.length} required fields`);
                
                const submitBtn = form.querySelector('.btn-submit');
                if (submitBtn) {
                    console.log('Submit button found');
                } else {
                    console.error('Submit button not found');
                }
                
            } else {
                console.error('Contact form not found');
                resultsDiv.innerHTML = '<div class="status-message status-error">✗ Contact form not found</div>';
            }
            
            // Check system status
            checkSystemStatus();
        });
    </script>
</body>
</html> 