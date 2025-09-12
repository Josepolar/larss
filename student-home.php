    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Dashboard</title>
        <link rel="stylesheet" href="student-home.css">
    </head>
    <body>
        <!-- NAVBAR -->
        <nav class="navbar">
        <div class="logo">
        <img src="assets/lars.png" alt="Logo">
    </div>
        <div class="profile">
            <img src="profile.jpg" alt="Profile Picture" class="profile-pic">
            <div class="profile-info">
                <div class="profile-name">John Doe</div>
                <div class="profile-status online">Online</div>
            </div>
        </div>
<div class="dropdown">
                    <button class="dropbtn">☰</button>
                    <div class="dropdown-content">
                        <a href="student-viewprof.php">View Profile</a>
                        <a href="#">Settings</a>
                    </div>
                </div>
    </nav>

        <!-- BODY -->
        <div class="dashboard">
            <div class="left-column">


<!-- ======== PROFILE STATISTICS ======== -->
<div class="box scrollable" id="box1">
    <div class="profile-stats">
        <h3 class="student-name">FNAME</h3>
        <p class="student-section">SECTION NAME</p>
        
        <!-- Rewards (clickable) -->
        <div class="rewards">
            <button id="rewardsBtn">Rewards</button>
        </div>

        <!-- Total points -->
        <div class="total-points">
            <span class="label">Total Points:</span>
            <span class="points">1200</span>
        </div>
    </div>
</div>

<!-- ===== Modal for Rewards ===== -->
<div id="rewardsModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>My Rewards</h3>
        <hr> 
        <br>
        <ul class="rewards-list">
            <li>Reward 1 <span class="status claimed">Claimed</span></li>
            <li>Reward 2 <span class="status not-claimed">Not Yet Claimed</span></li>
            <li>Reward 3 <span class="status claimed">Claimed</span></li>
            <li>Reward 4 <span class="status not-claimed">Not Yet Claimed</span></li>
        </ul>
    </div>
</div>




<!-- ======== LIST OF SUBJECTS AND THEIR ACTIVE RECITS ======== -->
<div class="box scrollable" id="box2">
    <div class="active-recits">
        <h3 class="active-recits">Active Recits</h3>
        <ul class="subject-list">
            <li>
                <span class="subject-name">Math</span>
                <span class="recit-count">2</span>
                <button class="eye-btn" data-subject="Math">👁</button>
            </li>
            <li>
                <span class="subject-name">Science</span>
                <span class="recit-count">3</span>
                <button class="eye-btn" data-subject="Science">👁</button>
            </li>
            <li>
                <span class="subject-name">English</span>
                <span class="recit-count">1</span>
                <button class="eye-btn" data-subject="English">👁</button>
            </li>
            <li>
                <span class="subject-name">English</span>
                <span class="recit-count">1</span>
                <button class="eye-btn" data-subject="English">👁</button>
            </li>
            <li>
                <span class="subject-name">English</span>
                <span class="recit-count">1</span>
                <button class="eye-btn" data-subject="English">👁</button>
            </li>
            <li>
                <span class="subject-name">English</span>
                <span class="recit-count">1</span>
                <button class="eye-btn" data-subject="English">👁</button>
            </li>
        </ul>
    </div>
</div>

<!-- ===== Modal for Recits ===== -->
<div id="recitsModal" class="recits">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3 id="modal-subject-title">Recitations</h3>
        <hr>
        <ul class="recits-list">
            <!-- Recitations will be dynamically inserted here -->
        </ul>
    </div>
</div>




<!-- ======== RECITATION OF THE DAY ======== -->
<div class="box" id="box3">
    <div class="recit-day">
        <h3 class="recit-rotd">RECITATION OF THE DAY!</h3>
        <h3 class="recit-subject">Math</h3>
        <p class="recit-recitation">Algebra Recitation</p>
        <button class="take-now-btn">Take Now</button>
    </div>
</div>



            </div> <!-- DASHBOARD END DIV -->

            <div class="center-column">
                <!-- ======== RECIT BOXES ======== -->
<div class="detailed-recits">
    <div class="box recit-box">
        <h3 class="recit-subject">Math</h3>
        <p class="recit-teacher">Teacher: Mr. Smith</p>
        <p class="recit-name">Recitation: Algebra Basics</p>
        <p class="recit-deadline">Deadline: Sept 20, 2025</p>
        <p class="recit-items">Total Items: 5 items - 10 points</p>
        <button class="take-now">Take Now</button>
    </div>

    <div class="box recit-box">
        <h3 class="recit-subject">Science</h3>
        <p class="recit-teacher">Teacher: Ms. Johnson</p>
        <p class="recit-name">Recitation: Photosynthesis</p>
        <p class="recit-deadline">Deadline: Sept 21, 2025</p>
        <p class="recit-items">Total Items: 10 items - 20 points</p>
        <button class="take-now">Take Now</button>
    </div>

    <div class="box recit-box">
        <h3 class="recit-subject">English</h3>
        <p class="recit-teacher">Teacher: Mr. Brown</p>
        <p class="recit-name">Recitation: Grammar Review</p>
        <p class="recit-deadline">Deadline: Sept 22, 2025</p>
        <p class="recit-items">Total Items: 8 items - 15 points</p>
        <button class="take-now">Take Now</button>
    </div>

        <div class="box recit-box">
        <h3 class="recit-subject">Math</h3>
        <p class="recit-teacher">Teacher: Mr. Smith</p>
        <p class="recit-name">Recitation: Algebra Basics</p>
        <p class="recit-deadline">Deadline: Sept 20, 2025</p>
        <p class="recit-items">Total Items: 5 items - 10 points</p>
        <button class="take-now">Take Now</button>
    </div>

    <div class="box recit-box">
        <h3 class="recit-subject">Science</h3>
        <p class="recit-teacher">Teacher: Ms. Johnson</p>
        <p class="recit-name">Recitation: Photosynthesis</p>
        <p class="recit-deadline">Deadline: Sept 21, 2025</p>
        <p class="recit-items">Total Items: 10 items - 20 points</p>
        <button class="take-now">Take Now</button>
    </div>

    <div class="box recit-box">
        <h3 class="recit-subject">English</h3>
        <p class="recit-teacher">Teacher: Mr. Brown</p>
        <p class="recit-name">Recitation: Grammar Review</p>
        <p class="recit-deadline">Deadline: Sept 22, 2025</p>
        <p class="recit-items">Total Items: 8 items - 15 points</p>
        <button class="take-now">Take Now</button>
    </div>
</div>



        <!-- ======== LEADERBOARDS ======== -->
                <div class="box scrollable" id="box9">
<div class="leaderboard">
    <h3>LEADERBOARDS</h3>
    <HR>
    <BR>
    <ul class="leaderboard-list">
        <li class="rank-1">
            <span class="rank">#1</span>
            <img src="profile1.jpg" alt="Student 1" class="lb-pic">
            <span class="lb-name">Alice Johnson</span>
            <span class="lb-points">2500 pts</span>
        </li>
        <li class="rank-2">
            <span class="rank">#2</span>
            <img src="profile2.jpg" alt="Student 2" class="lb-pic">
            <span class="lb-name">Brian Smith</span>
            <span class="lb-points">2200 pts</span>
        </li>
        <li class="rank-3">
            <span class="rank">#3</span>
            <img src="profile3.jpg" alt="Student 3" class="lb-pic">
            <span class="lb-name">Charlie Davis</span>
            <span class="lb-points">2000 pts</span>
        </li>
        <li>
            <span class="rank">#4</span>
            <img src="profile4.jpg" alt="Student 4" class="lb-pic">
            <span class="lb-name">Diana Miller</span>
            <span class="lb-points">1800 pts</span>
        </li>
        <li>
            <span class="rank">#5</span>
            <img src="profile5.jpg" alt="Student 5" class="lb-pic">
            <span class="lb-name">Ethan Wilson</span>
            <span class="lb-points">1700 pts</span>
        </li>
        <li>
            <span class="rank">#6</span>
            <img src="profile6.jpg" alt="Student 6" class="lb-pic">
            <span class="lb-name">Fiona Clark</span>
            <span class="lb-points">1600 pts</span>
        </li>
        <li>
            <span class="rank">#7</span>
            <img src="profile7.jpg" alt="Student 7" class="lb-pic">
            <span class="lb-name">George Hall</span>
            <span class="lb-points">1500 pts</span>
        </li>
        <li>
            <span class="rank">#8</span>
            <img src="profile8.jpg" alt="Student 8" class="lb-pic">
            <span class="lb-name">Hannah Lee</span>
            <span class="lb-points">1400 pts</span>
        </li>
        <li>
            <span class="rank">#9</span>
            <img src="profile9.jpg" alt="Student 9" class="lb-pic">
            <span class="lb-name">Ivan Moore</span>
            <span class="lb-points">1300 pts</span>
        </li>
        <li>
            <span class="rank">#10</span>
            <img src="profile10.jpg" alt="Student 10" class="lb-pic">
            <span class="lb-name">Julia Scott</span>
            <span class="lb-points">1200 pts</span>
        </li>
    </ul>
</div>

                </div>

            </div><!-- center-column END DIV -->





            <div class="right-column">



<!-- ======== LIST OF SUBMITTED RECITS ======== -->
<div class="box scrollable" id="box4">
    <div class="submitted-recits">
        <h3>Submitted</h3>
        <div class="submitted-total-points">
            <span class="label">Points:</span>
            <span class="points">9</span>
        </div>
        <hr>    
        <ul class="submitted-list">
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">Math</span>
            </li>
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">Science</span>
            </li>
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">English</span>
            </li>
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">AP</span>
            </li>
                        <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">Math</span>
            </li>
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">Science</span>
            </li>
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">English</span>
            </li>
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">AP</span>
            </li>
        </ul>
    </div>
</div>

<!-- ======== LIST OF NOT SUBMITTED RECITS ======== -->
<div class="box scrollable" id="box5">
    <div class="not-submitted-recits">
        <h3>Not Submitted</h3>
        <div class="notsubmitted-total-points">
            <span class="label">Total:</span>
            <span class="points">9</span>
        </div>
        <hr>
        <ul class="notsubmitted-list">
                       <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">Math</span>
            </li>
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">Science</span>
            </li>
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">English</span>
            </li>
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">AP</span>
            </li>
                        <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">Math</span>
            </li>
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">Science</span>
            </li>
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">English</span>
            </li>
            <li>
                <span class="recit-name">Recit Name</span>
                <span class="recit-subject">AP</span>
            </li>
        </ul>
    </div>
</div>


            </div><!-- right-column END DIV -->

        </div>

        <script src="student-home.js"></script>
    </body>
    </html>
