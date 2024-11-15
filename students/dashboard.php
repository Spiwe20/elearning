<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <link rel="stylesheet" href="../css/dashboard_styles.css">
    <script src="https://kit.fontawesome.com/3a3f083ec4.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar">
    <div class="container">
        <h1 class="logo">E-Learn</h1>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="courses.html">Courses</a></li>
            <li><a href="profile.html">Profile</a></li>
            <li><a href="campus.html">Campus</a></li>
            <li><a href="logout.php" class="logout">Logout</a></li>
        </ul>
        <div class="end-links">
            <div class="notification-bell">
                <i class="fa fa-bell"></i><span class="notification-count">3</span>
            </div>
            <ul class="nav-links">
                <li><a href="logout.php" class="logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Dashboard Header -->
<header class="dashboard-header">
    <?php
        session_start();
        include '../server/db.php';

        // Fetch student details from session
        $student_id = $_SESSION['user_id'];
        $sql = "SELECT firstname, lastname, email, degree_program FROM users WHERE id='$student_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $student_name = $row['firstname'] . ' ' . $row['lastname'];
            $student_email = $row['email'];
            $student_major = $row['degree_program'];

            echo "<h2>Welcome back, " . $student_name . "!</h2>";
        } else {
            echo "<h2>Welcome back, Student!</h2>";
        }

        $conn->close();
    ?>
    <p>Your learning progress at a glance.</p>
</header>

<!-- Dashboard Content -->
<div class="dashboard-container">
    <!-- Profile Summary -->
    <section class="dashboard-section profile-summary">
        <img src="profile.jpg" alt="Profile Picture" class="profile-pic">
        <h3><?php echo $student_name; ?></h3>
        <p>Email: <?php echo $student_email; ?></p>
        <p>Major: <?php echo $student_major; ?></p>
    </section>

    <!-- Course Progress Section -->
    <section class="dashboard-section">
        <h3>Course Progress</h3>
        <div class="course-card">
            <h4>Course 1 - Web Development</h4>
            <div class="progress-bar">
                <div class="progress" style="width: 70%;">70%</div>
            </div>
        </div>
        <div class="course-card">
            <h4>Course 2 - Data Science</h4>
            <div class="progress-bar">
                <div class="progress" style="width: 50%;">50%</div>
            </div>
        </div>
    </section>

    <!-- Assignments Section -->
    <section class="dashboard-section">
        <h3>Upcoming Assignments</h3>
        <ul>
            <li>Assignment 1 - Web Development (Due: Nov 20, 2024)</li>
            <li>Assignment 2 - Data Science (Due: Dec 01, 2024)</li>
            <li>Assignment 3 - AI Basics (Due: Dec 10, 2024)</li>
        </ul>
        <a href="assignments.html" class="view-more">View All Assignments</a>
    </section>

    <!-- Announcements Section -->
    <section class="dashboard-section announcements">
        <h3>Latest Announcements</h3>
        <ul>
            <li>New resources added for Web Development!</li>
            <li>Guest Lecture on Nov 30th by Data Scientist John Doe</li>
            <li>Project Submission Deadline Extended</li>
        </ul>
        <a href="announcements.html" class="view-more">View All Announcements</a>
    </section>

    <!-- Recent Grades Section -->
    <section class="dashboard-section grades">
        <h3>Recent Grades</h3>
        <ul>
            <li>Web Development - Grade: A</li>
            <li>Data Science - Grade: B+</li>
            <li>AI Basics - Grade: A-</li>
        </ul>
        <a href="grades.html" class="view-more">View All Grades</a>
    </section>
</div>

</body>
</html>