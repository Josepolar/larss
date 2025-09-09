<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="staff-userman.css">
    <title>Staff Dashboard</title>
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="assets/larslogo.png" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="profession">Staff Dashboard</span>
                    <span class="name">Hello [NAME]</span>
                </div>
            </div>
            <hr>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <button class="tablinks" id="defaultTab"><a href="staff-dashboard.php" class="tablinks">Dashboard</a></button>
                    </li>

                    <li class="nav-link">
                        <button class="tablinks"><a href="staff-userman.php" class="tablinks">User Management</a></button>
                    </li>        

                     <li class="nav-link">
                        <button class="tablinks"><a href="staff-subjman.php" class="tablinks">Subject Management</a></button>
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
            <button class="stat-btn" onclick="openModal('teacherModal')">ADD TEACHERS</button>
        </div>
    </div>

    <div class="stat">
        <div class="stat-content">
            <button class="stat-btn" onclick="openModal('studentModal')">ADD STUDENT</button>
        </div>
    </div>
</div>




<!-- Teacher Modal -->
<div id="teacherModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('teacherModal')">&times;</span>
        <h2>Add Teacher</h2>
        <HR>
        <form>
            <label>First Name</label>
            <input type="text" placeholder="Enter first name">

            <label>Last Name</label>
            <input type="text" placeholder="Enter last name">

            <label>Email</label>
            <input type="email" placeholder="Enter email">

            <label>Password</label>
            <input type="password" placeholder="Enter password">
            <BR>
            <div class="modal-footer">
                <button type="button" class="create-btn">Create</button>
            </div>
        </form>
    </div>
</div>

<!-- Student Modal -->
<div id="studentModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('studentModal')">&times;</span>
        <h2>Add Student</h2>
        <HR>
        <form>
            <label>First Name</label>
            <input type="text" placeholder="Enter first name">

            <label>Last Name</label>
            <input type="text" placeholder="Enter last name">

            <label>Email</label>
            <input type="email" placeholder="Enter email">

            <label>Password</label>
            <input type="password" placeholder="Enter password">
            <BR>
            <div class="modal-footer">
                <button type="button" class="create-btn">Create</button>
            </div>
        </form>
    </div>
</div>








       <div class="table-container">
  <div class="table_responsive">

    <!-- Top controls (right aligned) -->
    <div class="controls">
      <div class="dropdown">
        <button class="dropbtn">Teacher ▼</button>
        <div class="dropdown-content">
          <a>Teacher 1</a>
          <a>Teacher 2</a>
          <a>Teacher 3</a>
        </div>
      </div>

      <div class="dropdown">
        <button class="dropbtn">Student ▼</button>
        <div class="dropdown-content">
          <a>Student 1</a>
          <a>Student 2</a>
          <a>Student 3</a>
        </div>
      </div>

      <button class="filter-btn">Filter</button>
    </div>

    <!-- Table -->
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Grade Level</th>
          <th>Subject</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Doe</td>
          <td>Grade 10</td>
          <td>Math</td>
        </tr>
        <tr>
          <td>Jane Smith</td>
          <td>Grade 9</td>
          <td>English</td>
        </tr>
      </tbody>
    </table>

  </div>
</div>


        

    </section>

    <script src="staff-userman.js"></script>

</body>
</html>
 