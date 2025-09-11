
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="teacher-acts.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Teacher Dashboard</title>
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="assets/larslogo.png" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="profession">Teacher Dashboard</span>
                </div>
            </div>
            <hr>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <button class="tablinks" id="defaultTab"><a href="teacher-dashboard.php" class="tablinks">Dashboard</a></button>
                    </li>

                    <li class="nav-link">
                        <button class="tablinks"><a href="teacher-acts.php" class="tablinks">Activities</a></button>
                    </li>        
                    
                    <li class="nav-link">
                        <button class="tablinks"><a href="teacher-studs.php" class="tablinks">Students</a></button>
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
                <h1>0</h1>
                <h3>Total Recitations</h3>
            </div>
        </div>

        <div class="stat">
            <div class="stat-content">
                <h1>0</h1>
                <h3>Total Activities</h3>
            </div>
        </div>

    </div>


<div class="stats-container">

 <div class="stat">
            <div class="stat-content">
                <h1>TOP 2</h1>
                <h3>Student Name</h3>
            </div>
        </div>

        <div class="stat">
            <div class="stat-content">
                <h1>TOP 1</h1>
                <h3>Student Name</h3>
            </div>
        </div>

        <div class="stat">
            <div class="stat-content">
                <h1>TOP 3</h1>
                <h3>Student Name</h3>
            </div>
        </div>

    </div>



        <div class="table-container">
            <div class="table_responsive">
                <h1>ACTIVITIES</h1>
                <hr>
            
    </div>

            
             <div class="table_responsive">
    <table>
    <thead>
        <tr>
            <th>Subject</th>
            <th>Recitation</th>
            <th>Total Questions</th>
            <th>Total Points</th>
            <th>Submissions</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Science</th>
            <td>Sample Recitation 1</td>
            <td>10</td>
            <td>100</td>
            <td>25</td>
            <td><button class="view-btn" onclick="window.location.href='teacher-view.php'">View</button></td>
        </tr>
        <tr>
            <th>Math</th>
            <td>Sample Recitation 2</td>
            <td>15</td>
            <td>150</td>
            <td>30</td>
            <td><button class="view-btn" onclick="window.location.href='teacher-view.php'">View</button></td>
        </tr>
        <tr>
            <th>English</th>
            <td>Sample Recitation 3</td>
            <td>20</td>
            <td>200</td>
            <td>40</td>
            <td><button class="view-btn" onclick="window.location.href='teacher-view.php'">View</button></td>
        </tr>
    </tbody>
</table>

</div>



                <div class="table_responsive">
                <h1></h1>
            </div>
                


        </div>
        

    </section>

    <script src="teacher-dashboard.js"></script>

</body>
</html>
