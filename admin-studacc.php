<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-studacc.css">
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
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'lars_db');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Get total number of students
    $countQuery = "SELECT COUNT(*) as total FROM users WHERE role_id = 4";
    $countResult = $conn->query($countQuery);
    $totalStudents = $countResult->fetch_assoc()['total'];
    ?>

    <div class="stats-container">
        <div class="stat-card">
            <h3>Total Students</h3>
            <p><?php echo $totalStudents; ?></p>
        </div>
    </div>

    <div class="table-container">
        <div class="table_responsive">
            <h1>STUDENT CREDENTIALS</h1>
            <hr>
        </div>

        <div class="grade-filters">
            <button class="filter-btn active" data-grade="all">All Grades</button>
            <button class="filter-btn" data-grade="7">Grade 7</button>
            <button class="filter-btn" data-grade="8">Grade 8</button>
            <button class="filter-btn" data-grade="9">Grade 9</button>
            <button class="filter-btn" data-grade="10">Grade 10</button>
        </div>
            
        <div class="table_responsive">
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Grade Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="student-list">
                    <?php
                    // Fetch students
                    $query = "SELECT user_id, email, first_name, last_name, username, grade_level 
                             FROM users 
                             WHERE role_id = 4 
                             ORDER BY grade_level, last_name, first_name";
                    $result = $conn->query($query);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr data-grade='{$row['grade_level']}'>";
                            echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                            echo "<td>Grade " . htmlspecialchars($row['grade_level']) . "</td>";
                            echo "<td>";
                            echo "<button class='edit-btn' onclick='openEditModal({$row['user_id']})'>Edit</button>";
                            echo "<button class='delete-btn' onclick='deleteStudent({$row['user_id']})'>Delete</button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='no-data'>No students found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>



                <div class="table_responsive">
                <h1></h1>
            </div>
                


        </div>
        

    </section>

    <script src="admin-studacc.js"></script>

</body>
</html>
