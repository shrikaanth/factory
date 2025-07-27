# Form Processing System Documentation

## Overview
The Photo Factory Studio website includes a complete form processing system that handles contact form submissions with database storage, email notifications, and file backup.

## System Components

### 1. Database Configuration (`includes/db.php`)
```php
<?php
// Database connection settings
$host = 'localhost';
$db   = 'u134758228_pfstudio';
$user = 'u134758228_pfstudio';
$pass = 'Photofactorystudio@2025#sandeep';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
```

### 2. Form Processing (`process-form.php`)
The main form processing script that:
- Validates form data
- Saves to database
- Creates file backup
- Sends email notifications
- Returns JSON response

**Key Features:**
- ✅ **Input Validation**: Required fields, email format validation
- ✅ **Database Storage**: Saves to `inquiries` table
- ✅ **File Backup**: Creates `inquiries.txt` as backup
- ✅ **Email Notifications**: Sends to `mail.photofactory@gmail.com`
- ✅ **IP Tracking**: Records visitor IP address
- ✅ **Error Handling**: Graceful fallback if database fails

### 3. Database Setup (`setup-database.php`)
Creates the `inquiries` table with the following structure:
```sql
CREATE TABLE inquiries (
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
)
```

### 4. Admin Panel (`admin/inquiries.php`)
Password-protected admin interface to view submitted inquiries.

**Features:**
- ✅ **Simple Authentication**: Password: `admin123`
- ✅ **Database/File Fallback**: Shows data from database or file
- ✅ **Contact Integration**: Click to call/email
- ✅ **Message Viewer**: Modal to view full messages
- ✅ **Responsive Design**: Works on all devices

## Form Fields

### Required Fields:
- **Name**: Full name of the person
- **Email**: Valid email address
- **Shoot Type**: Type of photography service needed
- **Message**: Detailed description of requirements

### Optional Fields:
- **Phone**: Contact phone number
- **Number of Days**: Duration of the shoot
- **Services**: Checkboxes for additional services

## Form Submission Process

### 1. Client-Side Validation
```javascript
// Validates required fields and email format
function validateForm() {
    // Checks all required fields
    // Validates email format
    // Returns true/false
}
```

### 2. Server-Side Processing
```php
// 1. Validate input data
// 2. Try to save to database
// 3. Create file backup
// 4. Send email notification
// 5. Return JSON response
```

### 3. Response Handling
```javascript
// Handles success/error responses
// Shows loading states
// Displays success/error messages
// Resets form after success
```

## Database Schema

### `inquiries` Table
| Field | Type | Description |
|-------|------|-------------|
| `id` | INT AUTO_INCREMENT | Primary key |
| `name` | VARCHAR(255) | Customer name |
| `email` | VARCHAR(255) | Customer email |
| `phone` | VARCHAR(50) | Customer phone |
| `shoot_type` | VARCHAR(100) | Type of shoot |
| `no_of_days` | VARCHAR(50) | Duration |
| `services` | TEXT | Selected services |
| `message` | TEXT | Customer message |
| `submitted_at` | TIMESTAMP | Submission time |
| `ip_address` | VARCHAR(45) | Visitor IP |
| `status` | ENUM | Inquiry status |

## Email Notifications

### Email Configuration:
- **To**: `mail.photofactory@gmail.com`
- **Subject**: "New Contact Form Submission - Photo Factory Studio"
- **Content**: All form data in readable format

### Email Template:
```
New inquiry received:

Name: [Customer Name]
Email: [Customer Email]
Phone: [Customer Phone]
Shoot Type: [Shoot Type]
Number of Days: [Duration]
Services: [Selected Services]
Message: [Customer Message]
Submitted: [Timestamp]
```

## File Backup System

### Backup File: `inquiries.txt`
- **Format**: JSON lines (one per submission)
- **Location**: Root directory
- **Purpose**: Backup if database fails
- **Structure**: Each line contains complete inquiry data

### Example Backup Entry:
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "+91 99935-90196",
    "shoot_type": "wedding",
    "no_of_days": "2",
    "services": "Traditional Photo, Candid",
    "message": "Looking for wedding photography",
    "submitted_at": "2025-01-15 14:30:00",
    "ip": "192.168.1.1"
}
```

## Security Features

### 1. Input Validation
- ✅ **Required Field Validation**
- ✅ **Email Format Validation**
- ✅ **SQL Injection Prevention** (PDO prepared statements)
- ✅ **XSS Prevention** (htmlspecialchars)

### 2. Error Handling
- ✅ **Graceful Database Failures**
- ✅ **File Backup System**
- ✅ **Detailed Error Logging**
- ✅ **User-Friendly Error Messages**

### 3. Admin Security
- ✅ **Password Protection**
- ✅ **Session Management**
- ✅ **Secure Logout**

## Testing

### Test Files Created:
1. **`test-form-processing.html`** - Comprehensive form testing
2. **`final-contact-test.html`** - Contact form validation
3. **`test-contact-simple.html`** - Simple form test

### How to Test:
1. **Open `test-form-processing.html`**
2. **Fill out the form**
3. **Submit and check results**
4. **Verify database storage**
5. **Check admin panel**

## Setup Instructions

### 1. Database Setup
```bash
# Run the database setup script
http://yourdomain.com/setup-database.php
```

### 2. Admin Access
```bash
# Access admin panel
http://yourdomain.com/admin/inquiries.php
# Password: admin123
```

### 3. Test Form Submission
```bash
# Test the complete system
http://yourdomain.com/test-form-processing.html
```

## Troubleshooting

### Common Issues:

#### Database Connection Failed
- Check database credentials in `includes/db.php`
- Verify database server is running
- Ensure database exists

#### Form Not Submitting
- Check JavaScript console for errors
- Verify `process-form.php` exists
- Check file permissions

#### Email Not Sending
- Verify mail server configuration
- Check spam folder
- Test with different email address

#### Admin Panel Not Working
- Verify password is correct
- Check session configuration
- Ensure file permissions

## File Structure
```
factory/
├── includes/
│   ├── db.php              # Database configuration
│   ├── contact-form.php    # Form HTML component
│   ├── navbar.php          # Navigation component
│   └── footer.php          # Footer component
├── admin/
│   └── inquiries.php       # Admin panel
├── assets/
│   ├── css/
│   │   └── contact.css     # Form styles
│   └── js/
│       └── contact.js      # Form JavaScript
├── process-form.php        # Form processing script
├── setup-database.php      # Database setup script
├── inquiries.txt           # Backup file
└── test-form-processing.html # Test page
```

## Summary
The form processing system is complete and includes:
- ✅ **Database Storage** with fallback
- ✅ **Email Notifications**
- ✅ **Admin Panel**
- ✅ **Security Features**
- ✅ **Testing Tools**
- ✅ **Error Handling**

All components are properly integrated and ready for production use. 