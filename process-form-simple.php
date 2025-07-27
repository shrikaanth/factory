<?php
// Simplified form processing for testing
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log the request
error_log("Form submission received: " . json_encode($_POST));

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
                
                // Check if table exists
                $stmt = $pdo->query("SHOW TABLES LIKE 'inquiries'");
                if ($stmt->rowCount() > 0) {
                    $stmt = $pdo->prepare('INSERT INTO inquiries (name, email, phone, shoot_type, no_of_days, services, message, submitted_at, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?)');
                    $stmt->execute([$name, $email, $phone, $shootType, $no_of_days, $services, $message, $_SERVER['REMOTE_ADDR'] ?? 'Unknown']);
                    $saved = true;
                    error_log("Data saved to database successfully");
                } else {
                    error_log("Inquiries table does not exist");
                }
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

        // Send email notification (if mail function is available)
        $to = 'mail.photofactory@gmail.com';
        $subject = 'New Contact Form Submission - Photo Factory Studio';
        $email_body = "New inquiry received:\n\n";
        $email_body .= "Name: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Phone: $phone\n";
        $email_body .= "Shoot Type: $shootType\n";
        $email_body .= "Number of Days: $no_of_days\n";
        $email_body .= "Services: $services\n";
        $email_body .= "Message: $message\n";
        $email_body .= "Submitted: " . date('Y-m-d H:i:s') . "\n";

        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $email_sent = @mail($to, $subject, $email_body, $headers);
        error_log("Email sent: " . ($email_sent ? 'Yes' : 'No'));

        echo json_encode([
            'success' => true,
            'message' => 'Thank you for contacting us! We will get back to you within 24 hours.',
            'saved_to_db' => $saved,
            'email_sent' => $email_sent
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'errors' => $errors
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'errors' => ['Invalid request method']
    ]);
}
?> 