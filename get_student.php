<?php
header('Content-Type: application/json');

// Database connection
$conn = new mysqli('localhost', 'root', '', 'lars_db');
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

if (isset($_GET['id'])) {
    $user_id = $conn->real_escape_string($_GET['id']);
    $query = "SELECT user_id, first_name, last_name, username, grade_level 
              FROM users 
              WHERE user_id = '$user_id' AND role_id = 4";
    
    $result = $conn->query($query);
    
    if ($result && $result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['error' => 'Student not found']);
    }
} else {
    echo json_encode(['error' => 'No ID provided']);
}

$conn->close();
?>
