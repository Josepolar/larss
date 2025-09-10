<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'lars_db');
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

if (isset($_GET['id'])) {
    $user_id = $conn->real_escape_string($_GET['id']);
    $query = "SELECT user_id, first_name, last_name, username, email, grade_level, role_id 
              FROM users WHERE user_id = '$user_id'";
    
    $result = $conn->query($query);
    if ($result && $row = $result->fetch_assoc()) {
        // Remove sensitive data like password
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
} else {
    echo json_encode(['error' => 'No user ID provided']);
}

$conn->close();
?>
