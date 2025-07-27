<?php
// Set error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log the request for debugging
error_log("Form submission received: " . json_encode($_POST));

// Check if this is an AJAX request
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $shootType = trim($_POST['shootType'] ?? '');
    $no_of_days = trim($_POST['no_of_days'] ?? '');
    $services = isset($_POST['services']) ? implode(', ', $_POST['services']) : '';
    $message = trim($_POST['message'] ?? '');

    // Validation
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    
    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address';
    }
    
    if (empty($shootType)) {
        $errors[] = 'Shoot type is required';
    }
    
    if (empty($message)) {
        $errors[] = 'Message is required';
    }

    if (empty($errors)) {
        // Try to save to database if available
        $saved = false;
        try {
            if (file_exists('includes/db.php')) {
                require_once 'includes/db.php';
                
                // Check if table exists, if not create it
                $stmt = $pdo->query("SHOW TABLES LIKE 'inquiries'");
                if ($stmt->rowCount() == 0) {
                    // Create the inquiries table
                    $sql = "CREATE TABLE IF NOT EXISTS inquiries (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(255) NOT NULL,
                        email VARCHAR(255) NOT NULL,
                        phone VARCHAR(50),
                        shoot_type VARCHAR(100) NOT NULL,
                        no_of_days VARCHAR(50),
                        services TEXT,
                        message TEXT NOT NULL,
                        submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        ip_address VARCHAR(45),
                        status ENUM('new', 'contacted', 'booked', 'completed') DEFAULT 'new'
                    )";
                    $pdo->exec($sql);
                    error_log("Inquiries table created successfully");
                }
                
                // Insert the data
                $stmt = $pdo->prepare('INSERT INTO inquiries (name, email, phone, shoot_type, no_of_days, services, message, submitted_at, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?)');
                $stmt->execute([$name, $email, $phone, $shootType, $no_of_days, $services, $message, $_SERVER['REMOTE_ADDR'] ?? 'Unknown']);
                $saved = true;
                error_log("Data saved to database successfully");
            } else {
                error_log("Database file not found");
            }
        } catch (Exception $e) {
            error_log("Database error: " . $e->getMessage());
        }

        // Always save to file as backup
        $inquiry = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'shoot_type' => $shootType,
            'no_of_days' => $no_of_days,
            'services' => $services,
            'message' => $message,
            'submitted_at' => date('Y-m-d H:i:s'),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'Unknown'
        ];

        $inquiries_file = 'inquiries.txt';
        $inquiry_line = json_encode($inquiry) . "\n";
        if (file_put_contents($inquiries_file, $inquiry_line, FILE_APPEND | LOCK_EX)) {
            error_log("Data saved to file successfully");
        } else {
            error_log("Failed to save to file");
        }

        // Send email notification
        $email_sent = sendEmailNotification($name, $email, $phone, $shootType, $no_of_days, $services, $message);

        if ($isAjax) {
            // Return JSON response for AJAX requests
            echo json_encode([
                'success' => true,
                'message' => 'Thank you for contacting us! We will get back to you within 24 hours.',
                'saved_to_db' => $saved,
                'email_sent' => $email_sent
            ]);
        } else {
            // Redirect for regular form submissions
            $redirect_url = 'contact.php?success=1';
            if (!$saved) {
                $redirect_url .= '&db_error=1';
            }
            if (!$email_sent) {
                $redirect_url .= '&email_error=1';
            }
            header('Location: ' . $redirect_url);
            exit;
        }
    } else {
        if ($isAjax) {
            echo json_encode([
                'success' => false,
                'errors' => $errors
            ]);
        } else {
            // For regular form submissions, redirect back with errors
            $error_string = urlencode(implode(', ', $errors));
            header('Location: contact.php?error=' . $error_string);
            exit;
        }
    }
} else {
    if ($isAjax) {
        echo json_encode([
            'success' => false,
            'errors' => ['Invalid request method']
        ]);
    } else {
        header('Location: contact.php?error=Invalid+request+method');
        exit;
    }
}

// Function to send email notification
function sendEmailNotification($name, $email, $phone, $shootType, $no_of_days, $services, $message) {
    $to = 'mail.photofactory@gmail.com';
    $subject = 'New Contact Form Submission - Photo Factory Studio';
    
    // Create HTML email body
    $email_body = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
            .field { margin-bottom: 15px; }
            .field-label { font-weight: bold; color: #555; }
            .field-value { margin-top: 5px; }
            .message-box { background: #f8f9fa; padding: 15px; border-radius: 5px; margin-top: 10px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Contact Form Submission</h2>
                <p>Photo Factory Studio has received a new inquiry.</p>
            </div>
            
            <div class='field'>
                <div class='field-label'>Name:</div>
                <div class='field-value'>$name</div>
            </div>
            
            <div class='field'>
                <div class='field-label'>Email:</div>
                <div class='field-value'><a href='mailto:$email'>$email</a></div>
            </div>
            
            <div class='field'>
                <div class='field-label'>Phone:</div>
                <div class='field-value'>$phone</div>
            </div>
            
            <div class='field'>
                <div class='field-label'>Shoot Type:</div>
                <div class='field-value'>$shootType</div>
            </div>
            
            <div class='field'>
                <div class='field-label'>Number of Days:</div>
                <div class='field-value'>$no_of_days</div>
            </div>
            
            <div class='field'>
                <div class='field-label'>Services Required:</div>
                <div class='field-value'>$services</div>
            </div>
            
            <div class='field'>
                <div class='field-label'>Message:</div>
                <div class='message-box'>" . nl2br(htmlspecialchars($message)) . "</div>
            </div>
            
            <div class='field'>
                <div class='field-label'>Submitted:</div>
                <div class='field-value'>" . date('Y-m-d H:i:s') . "</div>
            </div>
            
            <div class='field'>
                <div class='field-label'>IP Address:</div>
                <div class='field-value'>" . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "</div>
            </div>
        </div>
    </body>
    </html>
    ";

    // Email headers
    $headers = array();
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=UTF-8';
    $headers[] = 'From: Photo Factory Studio <noreply@photofactorystudio.com>';
    $headers[] = 'Reply-To: ' . $email;
    $headers[] = 'X-Mailer: PHP/' . phpversion();

    // Send email
    $email_sent = @mail($to, $subject, $email_body, implode("\r\n", $headers));
    error_log("Email sent: " . ($email_sent ? 'Yes' : 'No'));
    
    return $email_sent;
}
?> 