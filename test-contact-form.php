<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Test - Photo Factory Studio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/contact.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-test-tube me-2"></i>Contact Form Test</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <h5><i class="fas fa-info-circle me-2"></i>Test Instructions</h5>
                            <ol>
                                <li>Fill out the form below with test data</li>
                                <li>Submit the form to test both AJAX and regular submission</li>
                                <li>Check if data is saved to database and email is sent</li>
                                <li>View results in <a href="admin/inquiries.php" target="_blank">Admin Panel</a></li>
                            </ol>
                        </div>
                        
                        <?php
                        // Display success message
                        if (isset($_GET['success'])) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <strong>Test Successful!</strong> Your message has been sent successfully.';
                            if (isset($_GET['db_error'])) {
                                echo '<br><small class="text-muted">Note: There was an issue saving to database, but your message was sent via email.</small>';
                            }
                            if (isset($_GET['email_error'])) {
                                echo '<br><small class="text-muted">Note: There was an issue sending email, but your message was saved to our system.</small>';
                            }
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                  </div>';
                        }
                        
                        // Display error message
                        if (isset($_GET['error'])) {
                            $error = urldecode($_GET['error']);
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>Error:</strong> ' . htmlspecialchars($error) . '
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                  </div>';
                        }
                        ?>
                        
                        <?php include('includes/contact-form.php'); ?>
                        
                        <hr class="my-4">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h5><i class="fas fa-database me-2"></i>Database Test</h5>
                                <a href="test-database.php" class="btn btn-outline-primary" target="_blank">
                                    <i class="fas fa-cog me-2"></i>Test Database Connection
                                </a>
                            </div>
                            <div class="col-md-6">
                                <h5><i class="fas fa-eye me-2"></i>View Results</h5>
                                <a href="admin/inquiries.php" class="btn btn-outline-success" target="_blank">
                                    <i class="fas fa-chart-bar me-2"></i>Admin Panel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/contact.js"></script>
</body>
</html> 