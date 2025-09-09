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
    

    <div class="stats-container">
    </div>


        <div class="table-container">
            <div class="table_responsive">
                <h1>STUDENT CREDENTIALS</h1>
                <hr>
            </div>

            
             <div class="table_responsive">
    <table>
        <tr>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Section</th>
            <th>Grade Level</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td>example@email.com</td>
            <td>John</td>
            <td>Doe</td>
            <td>Section A</td>
            <td>10</td>
            <td>••••••</td>
            <td>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
            </td>
        </tr>
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
