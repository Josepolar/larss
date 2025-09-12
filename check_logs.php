<?php
header('Content-Type: application/json');

try {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'lars_db');
    if ($conn->connect_error) {
        throw new Exception('Connection failed: ' . $conn->connect_error);
    }

    // Validate date parameter
    $date = $_GET['date'] ?? date('Y-m-d');
    if (!strtotime($date)) {
        throw new Exception('Invalid date format');
    }

    // Check if user_logs table exists
    $tableCheck = $conn->query("SHOW TABLES LIKE 'user_logs'");
    if ($tableCheck->num_rows === 0) {
        throw new Exception('User logs table does not exist');
    }

    // Check if there are any logs for the given date
    $query = "SELECT COUNT(*) as count FROM user_logs WHERE DATE(action_timestamp) = ?";
    
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        throw new Exception('Query preparation failed: ' . $conn->error);
    }

    $stmt->bind_param('s', $date);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    echo json_encode([
        'status' => 'success',
        'hasLogs' => $row['count'] > 0,
        'count' => $row['count']
    ]);

    $stmt->close();
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>
