<?php
session_start();

// Store the role before destroying the session
$role = isset($_SESSION['role_id']) ? $_SESSION['role_id'] : null;

// Clear and destroy session
session_unset();
session_destroy();

// Redirect based on user role
if ($role == 2) {
    // Staff
    header('Location: staff-login.php');
} elseif ($role == 3) {
    // Teacher
    header('Location: teacher-login.php');
} elseif ($role == 4) {
    // Student
    header('Location: stud-login.php');
} else {
    // Admin or unknown role
    header('Location: login.php');
}
exit();
?>
