<?php
// Admin page to view contact form inquiries
session_start();

// Simple authentication (you should implement proper authentication)
$admin_password = 'admin123'; // Change this to a secure password

if (isset($_POST['password']) && $_POST['password'] === $admin_password) {
    $_SESSION['admin_logged_in'] = true;
}

if (!isset($_SESSION['admin_logged_in'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Admin Login - Photo Factory Studio</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-lock me-2"></i>Admin Login</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: inquiries.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Inquiries - Photo Factory Studio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-envelope me-2"></i>Contact Form Inquiries</h2>
            <div>
                <a href="?logout=1" class="btn btn-outline-danger">
                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                </a>
            </div>
        </div>
        
        <?php
        // Try to get inquiries from database first
        $inquiries = [];
        $source = 'database';
        
        try {
            require_once '../includes/db.php';
            $stmt = $pdo->query("SELECT * FROM inquiries ORDER BY submitted_at DESC");
            $inquiries = $stmt->fetchAll();
        } catch (Exception $e) {
            // If database fails, try to read from file
            $source = 'file';
            $inquiries_file = '../inquiries.txt';
            if (file_exists($inquiries_file)) {
                $lines = file($inquiries_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lines as $line) {
                    $inquiry = json_decode($line, true);
                    if ($inquiry) {
                        $inquiries[] = $inquiry;
                    }
                }
            }
        }
        ?>
        
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>
            Showing inquiries from: <strong><?php echo ucfirst($source); ?></strong>
            (<?php echo count($inquiries); ?> total inquiries)
        </div>
        
        <?php if (empty($inquiries)): ?>
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                No inquiries found.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Shoot Type</th>
                            <th>Services</th>
                            <th>Submitted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inquiries as $inquiry): ?>
                            <tr>
                                <td><?php echo $inquiry['id'] ?? 'N/A'; ?></td>
                                <td><?php echo htmlspecialchars($inquiry['name']); ?></td>
                                <td>
                                    <a href="mailto:<?php echo htmlspecialchars($inquiry['email']); ?>">
                                        <?php echo htmlspecialchars($inquiry['email']); ?>
                                    </a>
                                </td>
                                <td>
                                    <?php if (!empty($inquiry['phone'])): ?>
                                        <a href="tel:<?php echo htmlspecialchars($inquiry['phone']); ?>">
                                            <?php echo htmlspecialchars($inquiry['phone']); ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted">Not provided</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($inquiry['shoot_type']); ?></td>
                                <td>
                                    <?php if (!empty($inquiry['services'])): ?>
                                        <small><?php echo htmlspecialchars($inquiry['services']); ?></small>
                                    <?php else: ?>
                                        <span class="text-muted">None selected</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <small><?php echo date('M j, Y g:i A', strtotime($inquiry['submitted_at'])); ?></small>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="showMessage('<?php echo addslashes($inquiry['message']); ?>')">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- Message Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Message Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="messageContent"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function showMessage(message) {
            document.getElementById('messageContent').textContent = message;
            new bootstrap.Modal(document.getElementById('messageModal')).show();
        }
    </script>
</body>
</html> 