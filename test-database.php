<?php
// Test database connection and table creation
echo "<h2>Database Connection Test</h2>";

try {
    require_once 'includes/db.php';
    echo "<p style='color: green;'>✓ Database connection successful!</p>";
    
    // Test table creation
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
    echo "<p style='color: green;'>✓ Inquiries table created/verified successfully!</p>";
    
    // Check if table has data
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM inquiries");
    $count = $stmt->fetch()['count'];
    echo "<p>Current inquiries in database: $count</p>";
    
    // Test insert
    $test_stmt = $pdo->prepare('INSERT INTO inquiries (name, email, phone, shoot_type, no_of_days, services, message, submitted_at, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?)');
    $test_stmt->execute(['Test User', 'test@example.com', '1234567890', 'wedding', '1', 'Traditional Photo', 'Test message', '127.0.0.1']);
    echo "<p style='color: green;'>✓ Test insert successful!</p>";
    
    // Clean up test data
    $pdo->exec("DELETE FROM inquiries WHERE email = 'test@example.com'");
    echo "<p style='color: blue;'>✓ Test data cleaned up!</p>";
    
    echo "<h3>Database Test Complete!</h3>";
    echo "<p><a href='contact.php'>Go to Contact Page</a></p>";
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>✗ Database Error: " . $e->getMessage() . "</p>";
    echo "<p>Please check your database configuration in includes/db.php</p>";
}
?> 