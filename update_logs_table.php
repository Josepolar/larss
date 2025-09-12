<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'lars_db');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Add affected_user_id column if it doesn't exist
$result = $conn->query("SHOW COLUMNS FROM user_logs LIKE 'affected_user_id'");
if ($result->num_rows == 0) {
    $conn->query("ALTER TABLE user_logs ADD affected_user_id INT DEFAULT NULL");
    $conn->query("ALTER TABLE user_logs ADD FOREIGN KEY (affected_user_id) REFERENCES users(user_id)");
    echo "Added affected_user_id column\n";
}

$conn->close();
echo "Database update completed\n";
?>