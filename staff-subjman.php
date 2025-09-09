<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="staff-subjman.css">
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
            <button class="stat-btn" onclick="openModal('subjectModal')">ADD SUBJECT</button>
        </div>
    </div>

    <div class="stat">
        <div class="stat-content">
            <button class="stat-btn" onclick="openModal('assignModal')">ASSIGN SUBJECT</button>
        </div>
    </div>
</div>



<!-- Add Subject Modal -->
<div id="subjectModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('subjectModal')">&times;</span>
        <h2>Add Subject</h2>
        <form>
            <label>Subject Name</label>
            <input type="text" placeholder="Enter subject name">

            <label>Grade Level</label>
            <select>
                <option value="" disabled selected>Select grade level</option>
                <option>Grade 7</option>
                <option>Grade 8</option>
                <option>Grade 9</option>
                <option>Grade 10</option>
            </select>

            <div class="modal-footer">
                <button type="button" class="create-btn">Create</button>
            </div>
        </form>
    </div>
</div>

<!-- Assign Subject Modal -->
<div id="assignModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('assignModal')">&times;</span>
        <h2>Assign Subject</h2>
        <form>
            <label>Teacher</label>
            <select>
                <option value="" disabled selected>Select teacher</option>
                <option>Mr. Smith</option>
                <option>Ms. Johnson</option>
                <option>Mrs. Lee</option>
            </select>

            <label>Subject</label>
            <select>
                <option value="" disabled selected>Select subject</option>
                <option>Mathematics</option>
                <option>Science</option>
                <option>English</option>
            </select>

            <div class="modal-footer">
                <button type="button" class="create-btn">Assign</button>
            </div>
        </form>
    </div>
</div>








       <div class="table-container">
  <div class="table_responsive">

    <!-- Top controls (right aligned) -->
    <div class="controls">
      <div class="dropdown">
        <button class="dropbtn">Subject ▼</button>
        <div class="dropdown-content">
          <a>Subject 1</a>
          <a>Subject 2</a>
          <a>Subject 3</a>
        </div>
      </div>

      <button class="filter-btn">Filter</button>
    </div>

    <!-- Table -->
    <table>
      <thead>
        <tr>
          <th>Subject Name</th>
          <th>Grade Level</th>
          <th>Assigned Teacher</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>CTIC411</td>
          <td>Grade 10</td>
          <td>Sir Delizious</td>
        </tr>
      </tbody>
    </table>

  </div>
</div>


        

    </section>

    <script src="staff-subjman.js"></script>

</body>
</html>
