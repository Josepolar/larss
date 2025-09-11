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

    // Check if required tables exist
    $tables = ['user_logs', 'users', 'roles'];
    foreach ($tables as $table) {
        $tableCheck = $conn->query("SHOW TABLES LIKE '$table'");
        if ($tableCheck->num_rows === 0) {
            throw new Exception("Table '$table' does not exist");
        }
    }

    // Get logs for the specified date
    $query = "SELECT 
                ul.log_id,
                CONCAT(u.first_name, ' ', u.last_name) as user_name,
                r.role_name as role,
                ul.action,
                DATE_FORMAT(ul.action_timestamp, '%h:%i %p') as time
              FROM user_logs ul
              JOIN users u ON ul.user_id = u.user_id
              JOIN roles r ON u.role_id = r.role_id
              WHERE DATE(ul.action_timestamp) = ?
              ORDER BY ul.action_timestamp DESC";

    $stmt = $conn->prepare($query);
    if (!$stmt) {
        throw new Exception('Query preparation failed: ' . $conn->error);
    }

    $stmt->bind_param('s', $date);
    $stmt->execute();
    $result = $stmt->get_result();

    $logs = [];
    while ($row = $result->fetch_assoc()) {
        $logs[] = [
            'user_name' => $row['user_name'],
            'role' => $row['role'],
            'action' => $row['action'],
            'time' => $row['time']
        ];
    }

    echo json_encode([
        'status' => 'success',
        'data' => $logs
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
