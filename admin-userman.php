<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'lars_db');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$message = '';

// Add/Edit user/teacher
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? '';
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $role_id = ($type === 'user') ? 2 : (($type === 'teacher') ? 3 : 0);

    if (isset($_POST['edit_index'])) {
        // Update
        $user_id = intval($_POST['edit_index']);
        if ($user_id && $role_id) {
            $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, email=?, password=? WHERE user_id=? AND role_id=?");
            $stmt->bind_param('ssssii', $firstname, $lastname, $email, $password, $user_id, $role_id);
            $stmt->execute();
            $stmt->close();
            header('Location: admin-userman.php');
            exit();
        }
    } else {
        // Add
        if ($firstname && $lastname && $role_id) {
            $email = $email ?: strtolower($firstname . '.' . $lastname . '@email.com');
            $password = $password ?: substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
            $username = strtolower($firstname . $lastname . rand(1000,9999));
            $stmt = $conn->prepare("INSERT INTO users (username, password, email, role_id, first_name, last_name) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('sssiss', $username, $password, $email, $role_id, $firstname, $lastname);
            $stmt->execute();
            $stmt->close();
            header('Location: admin-userman.php');
            exit();
        }
    }
}

// Delete user/teacher
if (isset($_GET['delete']) && isset($_GET['type'])) {
    $type = $_GET['type'];
    $role_id = ($type === 'user') ? 2 : (($type === 'teacher') ? 3 : 0);
    $user_id = intval($_GET['delete']);
    if ($user_id && $role_id) {
        $stmt = $conn->prepare("DELETE FROM users WHERE user_id=? AND role_id=?");
        $stmt->bind_param('ii', $user_id, $role_id);
        $stmt->execute();
        $stmt->close();
        header('Location: admin-userman.php');
        exit();
    }
}

// Fetch users and teachers
$users = [];
$teachers = [];
$result = $conn->query("SELECT * FROM users WHERE role_id=2");
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}
$result = $conn->query("SELECT * FROM users WHERE role_id=3");
while ($row = $result->fetch_assoc()) {
    $teachers[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-userman.css">
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
        <?php if ($message) { echo '<div style="color:green;">'.$message.'</div>'; } ?>
    </div>


        <div class="table-container">


 <div class="table_responsive">
    <table>
        <tr>
            <th>
                <div class="th-content">
                    <span>STAFF</span>
                    <button class="table-btn" onclick="openModal('staffModal')">ADD STAFF</button>
                </div>
            </th>
            <th>
                <div class="th-content">
                    <span>TEACHERS</span>
                    <button class="table-btn" onclick="openModal('teachersModal')">ADD TEACHERS</button>
                </div>
            </th>
        </tr>
    </table>
</div>





<!-- Staff Modal -->
<div id="staffModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('staffModal')">&times;</span>
        <h2>Add Staff</h2>
        <hr>
        <form method="post">
            <input type="hidden" name="type" value="user">
            <label>Firstname</label>
            <input type="text" name="firstname" placeholder="Enter firstname" required>

            <label>Lastname</label>
            <input type="text" name="lastname" placeholder="Enter lastname" required>

            <div class="modal-footer">
                <button type="submit" class="create-btn">Create</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Staff Modal -->
<div id="editStaffModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editStaffModal')">&times;</span>
        <h2>Edit Staff</h2>
        <hr>
        <form method="post" id="editStaffForm">
            <input type="hidden" name="type" value="user">
            <input type="hidden" name="edit_index" id="editStaffIndex">
            <label>Firstname</label>
            <input type="text" name="firstname" id="editStaffFirstname" required>

            <label>Lastname</label>
            <input type="text" name="lastname" id="editStaffLastname" required>

            <label>Email</label>
            <input type="email" name="email" id="editStaffEmail" required>

            <label>Password</label>
            <input type="text" name="password" id="editStaffPassword" required>

            <div class="modal-footer">
                <button type="submit" class="create-btn">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Teachers Modal -->
<div id="teachersModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('teachersModal')">&times;</span>
        <h2>Add Teacher</h2>
        <hr>
        <form method="post">
            <input type="hidden" name="type" value="teacher">
            <label>Firstname</label>
            <input type="text" name="firstname" placeholder="Enter firstname" required>

            <label>Lastname</label>
            <input type="text" name="lastname" placeholder="Enter lastname" required>

            <div class="modal-footer">
                <button type="submit" class="create-btn">Create</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Teacher Modal -->
<div id="editTeacherModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editTeacherModal')">&times;</span>
        <h2>Edit Teacher</h2>
        <hr>
        <form method="post" id="editTeacherForm">
            <input type="hidden" name="type" value="teacher">
            <input type="hidden" name="edit_index" id="editTeacherIndex">
            <label>Firstname</label>
            <input type="text" name="firstname" id="editTeacherFirstname" required>

            <label>Lastname</label>
            <input type="text" name="lastname" id="editTeacherLastname" required>

            <label>Email</label>
            <input type="email" name="email" id="editTeacherEmail" required>

            <label>Password</label>
            <input type="text" name="password" id="editTeacherPassword" required>

            <div class="modal-footer">
                <button type="submit" class="create-btn">Update</button>
            </div>
        </form>
    </div>
</div>






                <div class="table_creds">
    <div class="table_credss"> 
        <table>
            <tr>
                <!-- First main column -->
                <th>
                    <div class="th-content">
                        <table class="inner-table">
                            <thead>
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $i => $user): ?>
                                <tr>
                                    <td><?= htmlspecialchars($user['first_name']) ?></td>
                                    <td><?= htmlspecialchars($user['last_name']) ?></td>
                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                    <td><?= htmlspecialchars($user['password']) ?></td>
                                    <td>
                                        <button class="btn edit-btn" onclick="editEntry('user', <?= $user['user_id'] ?>)">Edit</button>
                                        <button class="btn delete-btn" onclick="confirmDelete('user', <?= $user['user_id'] ?>)">Delete</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </th>

                <!-- Second main column -->
                <th>
                    <div class="th-content">
                        <table class="inner-table">
                            <thead>
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($teachers as $i => $teacher): ?>
                                <tr>
                                    <td><?= htmlspecialchars($teacher['first_name']) ?></td>
                                    <td><?= htmlspecialchars($teacher['last_name']) ?></td>
                                    <td><?= htmlspecialchars($teacher['email']) ?></td>
                                    <td><?= htmlspecialchars($teacher['password']) ?></td>
                                    <td>
                                        <button class="btn edit-btn" onclick="editEntry('teacher', <?= $teacher['user_id'] ?>)">Edit</button>
                                        <button class="btn delete-btn" onclick="confirmDelete('teacher', <?= $teacher['user_id'] ?>)">Delete</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </th>
            </tr>
        </table>
    </div>
</div>
                


        </div>
        

    </section>

    <script>
    // Data for instant edit modal
    var users = <?php echo json_encode($users); ?>;
    var teachers = <?php echo json_encode($teachers); ?>;

    function confirmDelete(type, index) {
        if (confirm('Are you sure you want to delete this ' + (type === 'user' ? 'staff' : 'teacher') + '?')) {
            window.location.href = 'admin-userman.php?delete=' + index + '&type=' + type;
        }
    }

    function editEntry(type, userId) {
        if (type === 'user') {
            var user = users.find(function(u) { return u.user_id == userId; });
            if (!user) return;
            document.getElementById('editStaffIndex').value = user.user_id;
            document.getElementById('editStaffFirstname').value = user.first_name;
            document.getElementById('editStaffLastname').value = user.last_name;
            document.getElementById('editStaffEmail').value = user.email;
            document.getElementById('editStaffPassword').value = user.password;
            document.getElementById('editStaffModal').style.display = 'block';
        } else {
            var teacher = teachers.find(function(t) { return t.user_id == userId; });
            if (!teacher) return;
            document.getElementById('editTeacherIndex').value = teacher.user_id;
            document.getElementById('editTeacherFirstname').value = teacher.first_name;
            document.getElementById('editTeacherLastname').value = teacher.last_name;
            document.getElementById('editTeacherEmail').value = teacher.email;
            document.getElementById('editTeacherPassword').value = teacher.password;
            document.getElementById('editTeacherModal').style.display = 'block';
        }
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
    </script>
    <script src="admin-userman.js"></script>

</body>
</html>
