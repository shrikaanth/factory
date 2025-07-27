<?php
// Simple form test
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h2>Form Data Received:</h2>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    // Test database connection
    try {
        require_once 'includes/db.php';
        echo "<h3>Database Test:</h3>";
        
        // Check if inquiries table exists
        $stmt = $pdo->query("SHOW TABLES LIKE 'inquiries'");
        if ($stmt->rowCount() > 0) {
            echo "<p style='color: green;'>✓ Inquiries table exists</p>";
            
            // Try to insert test data
            $stmt = $pdo->prepare('INSERT INTO inquiries (name, email, phone, shoot_type, no_of_days, services, message, submitted_at, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?)');
            $result = $stmt->execute([
                $_POST['name'] ?? 'Test',
                $_POST['email'] ?? 'test@test.com',
                $_POST['phone'] ?? '',
                $_POST['shootType'] ?? 'test',
                $_POST['no_of_days'] ?? '',
                $_POST['services'] ?? '',
                $_POST['message'] ?? 'Test message',
                $_SERVER['REMOTE_ADDR'] ?? 'Unknown'
            ]);
            
            if ($result) {
                echo "<p style='color: green;'>✓ Data inserted successfully</p>";
            } else {
                echo "<p style='color: red;'>✗ Failed to insert data</p>";
            }
        } else {
            echo "<p style='color: red;'>✗ Inquiries table does not exist</p>";
        }
    } catch (Exception $e) {
        echo "<p style='color: red;'>✗ Database Error: " . $e->getMessage() . "</p>";
    }
    
    // Test file backup
    $inquiry = [
        'name' => $_POST['name'] ?? 'Test',
        'email' => $_POST['email'] ?? 'test@test.com',
        'phone' => $_POST['phone'] ?? '',
        'shoot_type' => $_POST['shootType'] ?? 'test',
        'no_of_days' => $_POST['no_of_days'] ?? '',
        'services' => $_POST['services'] ?? '',
        'message' => $_POST['message'] ?? 'Test message',
        'submitted_at' => date('Y-m-d H:i:s'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'Unknown'
    ];
    
    $inquiries_file = 'inquiries.txt';
    $inquiry_line = json_encode($inquiry) . "\n";
    if (file_put_contents($inquiries_file, $inquiry_line, FILE_APPEND | LOCK_EX)) {
        echo "<p style='color: green;'>✓ Data saved to file backup</p>";
    } else {
        echo "<p style='color: red;'>✗ Failed to save to file</p>";
    }
    
    echo "<hr>";
    echo "<a href='test-simple-form.php'>Test Again</a>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Form Test</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1>Simple Form Test</h1>
        <p>This page tests the basic form processing without JavaScript.</p>
        
        <form method="POST" class="mt-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name *</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="shootType" class="form-label">Shoot Type *</label>
                    <select class="form-control" id="shootType" name="shootType" required>
                        <option value="">Select Type</option>
                        <option value="wedding">Wedding</option>
                        <option value="pre-wedding">Pre-Wedding</option>
                        <option value="portrait">Portrait</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="message" class="form-label">Message *</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit Test</button>
        </form>
        
        <div class="mt-4">
            <h3>Other Test Pages:</h3>
            <ul>
                <li><a href="debug-contact-form.php">Debug Contact Form</a></li>
                <li><a href="setup-database.php">Database Setup</a></li>
                <li><a href="admin/inquiries.php">Admin Panel</a></li>
                <li><a href="contact.php">Main Contact Page</a></li>
            </ul>
        </div>
    </div>
</body>
</html> 