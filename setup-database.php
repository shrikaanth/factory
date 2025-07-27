<?php
// Database setup script for Photo Factory Studio
// Run this file once to set up the database table

echo "<h2>Photo Factory Studio - Database Setup</h2>";

// Check if database connection is available
if (!file_exists('includes/db.php')) {
    echo "<p style='color: red;'>Database configuration file (includes/db.php) not found.</p>";
    echo "<p>Please create the database configuration file first.</p>";
    exit;
}

try {
    require_once 'includes/db.php';
    echo "<p style='color: green;'>✓ Database connection successful!</p>";

    // Create inquiries table if it doesn't exist
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
    echo "<p style='color: green;'>✓ Inquiries table created successfully!</p>";

    // Check if table has data
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM inquiries");
    $count = $stmt->fetch()['count'];
    echo "<p>Current inquiries in database: $count</p>";

    echo "<h3>Database Setup Complete!</h3>";
    echo "<p>The contact form will now save submissions to the database.</p>";
    echo "<p><a href='contact.php'>Go to Contact Page</a></p>";

} catch (PDOException $e) {
    echo "<p style='color: red;'>✗ Database Error: " . $e->getMessage() . "</p>";
    echo "<p>The contact form will still work by saving to a text file and sending email notifications.</p>";
    echo "<p><a href='contact.php'>Go to Contact Page</a></p>";
}
?> 