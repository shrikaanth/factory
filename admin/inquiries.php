<?php
// Admin page to view inquiries
session_start();

// Simple authentication (you should implement proper authentication)
$admin_password = 'admin123'; // Change this to a secure password

if (isset($_POST['password']) && $_POST['password'] === $admin_password) {
    $_SESSION['admin_logged_in'] = true;
}

if (!isset($_SESSION['admin_logged_in'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login - Photo Factory Studio</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Admin Login</h4>
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

// Handle status updates
if (isset($_POST['update_status']) && isset($_POST['inquiry_id']) && isset($_POST['status'])) {
    try {
        require_once '../includes/db.php';
        $stmt = $pdo->prepare('UPDATE inquiries SET status = ? WHERE id = ?');
        $stmt->execute([$_POST['status'], $_POST['inquiry_id']]);
        $update_message = "Status updated successfully!";
    } catch (Exception $e) {
        $update_error = "Error updating status: " . $e->getMessage();
    }
}

// Get inquiries from database
$inquiries = [];
try {
    require_once '../includes/db.php';
    $stmt = $pdo->query('SELECT * FROM inquiries ORDER BY submitted_at DESC');
    $inquiries = $stmt->fetchAll();
} catch (Exception $e) {
    $db_error = "Database error: " . $e->getMessage();
}

// Get inquiries from file as backup
$file_inquiries = [];
if (file_exists('../inquiries.txt')) {
    $lines = file('../inquiries.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $file_inquiries[] = json_decode($line, true);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiries - Photo Factory Studio Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2><i class="fas fa-inbox me-2"></i>Contact Form Inquiries</h2>
                    <div>
                        <a href="../contact.php" class="btn btn-outline-primary me-2">
                            <i class="fas fa-arrow-left me-1"></i>Back to Site
                        </a>
                        <a href="?logout=1" class="btn btn-outline-danger">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </a>
                    </div>
                </div>

                <?php if (isset($update_message)): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $update_message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (isset($update_error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $update_error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <!-- Database Inquiries -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5><i class="fas fa-database me-2"></i>Database Inquiries (<?php echo count($inquiries); ?>)</h5>
                    </div>
                    <div class="card-body">
                        <?php if (isset($db_error)): ?>
                            <div class="alert alert-warning"><?php echo $db_error; ?></div>
                        <?php elseif (empty($inquiries)): ?>
                            <p class="text-muted">No inquiries found in database.</p>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Shoot Type</th>
                                            <th>Services</th>
                                            <th>Status</th>
                                            <th>Submitted</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($inquiries as $inquiry): ?>
                                            <tr>
                                                <td><?php echo $inquiry['id']; ?></td>
                                                <td>
                                                    <strong><?php echo htmlspecialchars($inquiry['name']); ?></strong>
                                                    <br><small class="text-muted"><?php echo htmlspecialchars($inquiry['message']); ?></small>
                                                </td>
                                                <td>
                                                    <a href="mailto:<?php echo htmlspecialchars($inquiry['email']); ?>">
                                                        <?php echo htmlspecialchars($inquiry['email']); ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php if ($inquiry['phone']): ?>
                                                        <a href="tel:<?php echo htmlspecialchars($inquiry['phone']); ?>">
                                                            <?php echo htmlspecialchars($inquiry['phone']); ?>
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo htmlspecialchars($inquiry['shoot_type']); ?></td>
                                                <td>
                                                    <?php if ($inquiry['services']): ?>
                                                        <small><?php echo htmlspecialchars($inquiry['services']); ?></small>
                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <form method="POST" class="d-inline">
                                                        <input type="hidden" name="inquiry_id" value="<?php echo $inquiry['id']; ?>">
                                                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                            <option value="new" <?php echo $inquiry['status'] == 'new' ? 'selected' : ''; ?>>New</option>
                                                            <option value="contacted" <?php echo $inquiry['status'] == 'contacted' ? 'selected' : ''; ?>>Contacted</option>
                                                            <option value="booked" <?php echo $inquiry['status'] == 'booked' ? 'selected' : ''; ?>>Booked</option>
                                                            <option value="completed" <?php echo $inquiry['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                                                        </select>
                                                        <input type="hidden" name="update_status" value="1">
                                                    </form>
                                                </td>
                                                <td>
                                                    <small><?php echo date('M j, Y g:i A', strtotime($inquiry['submitted_at'])); ?></small>
                                                </td>
                                                <td>
                                                    <a href="mailto:<?php echo htmlspecialchars($inquiry['email']); ?>" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-envelope"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- File Inquiries (Backup) -->
                <?php if (!empty($file_inquiries)): ?>
                    <div class="card">
                        <div class="card-header">
                            <h5><i class="fas fa-file-alt me-2"></i>File Backup Inquiries (<?php echo count($file_inquiries); ?>)</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Shoot Type</th>
                                            <th>Services</th>
                                            <th>Submitted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($file_inquiries as $inquiry): ?>
                                            <tr>
                                                <td>
                                                    <strong><?php echo htmlspecialchars($inquiry['name']); ?></strong>
                                                    <br><small class="text-muted"><?php echo htmlspecialchars($inquiry['message']); ?></small>
                                                </td>
                                                <td>
                                                    <a href="mailto:<?php echo htmlspecialchars($inquiry['email']); ?>">
                                                        <?php echo htmlspecialchars($inquiry['email']); ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php if ($inquiry['phone']): ?>
                                                        <a href="tel:<?php echo htmlspecialchars($inquiry['phone']); ?>">
                                                            <?php echo htmlspecialchars($inquiry['phone']); ?>
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo htmlspecialchars($inquiry['shoot_type']); ?></td>
                                                <td>
                                                    <?php if ($inquiry['services']): ?>
                                                        <small><?php echo htmlspecialchars($inquiry['services']); ?></small>
                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <small><?php echo date('M j, Y g:i A', strtotime($inquiry['submitted_at'])); ?></small>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html> 