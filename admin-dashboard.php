<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'lars_db');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get staff, teacher, student counts and names
$staffCount = 0;
$teacherCount = 0;
$studentCount = 0;
$staffNames = [];
$teacherNames = [];
$studentNames = [];

$result = $conn->query("SELECT first_name, last_name FROM users WHERE role_id = 2");
if ($result) {
    $staffCount = $result->num_rows;
    while ($row = $result->fetch_assoc()) {
        $staffNames[] = $row['first_name'] . ' ' . $row['last_name'];
    }
}

$result = $conn->query("SELECT first_name, last_name FROM users WHERE role_id = 3");
if ($result) {
    $teacherCount = $result->num_rows;
    while ($row = $result->fetch_assoc()) {
        $teacherNames[] = $row['first_name'] . ' ' . $row['last_name'];
    }
}

$result = $conn->query("SELECT first_name, last_name FROM users WHERE role_id = 4");
if ($result) {
    $studentCount = $result->num_rows;
    while ($row = $result->fetch_assoc()) {
        $studentNames[] = $row['first_name'] . ' ' . $row['last_name'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-dashboard.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="assets/larslogo.png" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="profession">Admin Dashboard</span>
                    <span class="name">Hello [NAME]</span>
                </div>
            </div>
            <hr>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <button class="tablinks" id="defaultTab"><a href="admin-dashboard.php" class="tablinks">Dashboard</a></button>
                    </li>

                    <li class="nav-link">
                        <button class="tablinks"><a href="admin-userman.php" class="tablinks">User Management</a></button>
                    </li>        
                    
                    <li class="nav-link">
                        <button class="tablinks"><a href="admin-studacc.php" class="tablinks">Student Accounts</a></button>
                    </li> 

                     <li class="nav-link">
                        <button class="tablinks"><a href="admin-subjman.php" class="tablinks">Subject Management</a></button>
                    </li> 

                     <li class="nav-link">
                        <button class="tablinks"><a href="admin-usrlog.php" class="tablinks">User Logs</a></button>
                    </li> 
                    
                </ul>
            </div>

            <div class="bottom-content">
            <li class="nav-link">
                        <button class="tablinks"><a href="logout_admin.php" class="tablinks">Logout</a></button>
                    </li>
            </div>
        </div>
    </nav>

   <section class="home" id="home-section">
    

    <div class="stats-container">
        <div class="stat">
            <div class="stat-content">
                <h1><?= $staffCount ?></h1>
                <h3>Staff</h3>
            </div>
        </div>

        <div class="stat">
            <div class="stat-content">
                <h1><?= $teacherCount ?></h1>
                <h3>Teachers</h3>
            </div>
        </div>

        <div class="stat">
            <div class="stat-content">
                <h1><?= $studentCount ?></h1>
                <h3>Student</h3>
            </div>
        </div>
    </div>


        <div class="table-container">
            <div class="table-container">
                <div class="table_responsive" style="display: flex; gap: 20px;">
                    <div class="stat" style="flex:1;">
                        <div class="stat-content">
                            <h3>Staff Name</h3>
                            <?php if ($staffCount): ?>
                                <ul style="margin:0; padding-left:20px;">
                                    <?php foreach ($staffNames as $name): ?>
                                        <li><?= htmlspecialchars($name) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>No staff accounts.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="stat" style="flex:1;">
                        <div class="stat-content">
                            <h3>Teacher Name</h3>
                            <?php if ($teacherCount): ?>
                                <ul style="margin:0; padding-left:20px;">
                                    <?php foreach ($teacherNames as $name): ?>
                                        <li><?= htmlspecialchars($name) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>No teacher accounts.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="stat" style="flex:1;">
                        <div class="stat-content">
                            <h3>Student Name</h3>
                            <?php if ($studentCount): ?>
                                <ul style="margin:0; padding-left:20px;">
                                    <?php foreach ($studentNames as $name): ?>
                                        <li><?= htmlspecialchars($name) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>No student accounts.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
                


        </div>
        

    </section>

    <script src="admin-dashboard.js"></script>

</body>
</html>
