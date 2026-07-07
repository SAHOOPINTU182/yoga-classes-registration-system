<?php
session_start();
include 'db.php';

if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

/* FETCH USER DATA (NAME + EMAIL + PROFILE PIC) */
$stmt = $con->prepare("SELECT name, email, profile_pic FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $user = $result->fetch_assoc();

    $name = $user['name'];
    $email = $user['email'];

    // IMAGE CHECK
    if(!empty($user['profile_pic'])){
        $img = $user['profile_pic'];
    } else {
        $img = "default.png"; // fallback image
    }

} else {
    $name = "User";
    $email = "No Email";
    $img = "default.png";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Yoga Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<div class="dashboard">

    <!-- SIDEBAR -->
    <div class="sidebar" style= "width : 250px">
        <h2>🧘 Yoga</h2>

        <a class="active">🏠 Dashboard</a>
        <a href="book_class.php">📅 Book Class</a>
        <a href="view_booking.php">📋 View Bookings</a>
        <a href="schedule.php">⏱ Schedule</a>
        <a href="programs.php">🧘 Programs</a>
        <a href="meals.php">🥗 Meals</a>
        <a href="progress.php">📊 Progress</a>        
        <a>💬 Chat</a>
        <a href="logout.php">🚪 Logout</a>

        <div class="upgrade">
            <p>Upgrade to Premium</p>
            <button>Upgrade Now</button>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
      <div class="topbar">

    <!-- LEFT -->
    <h2>Dashboard</h2>

    <!-- CENTER SEARCH -->
    <div class="search-box">
        <input type="text" id="searchBox" placeholder="Search here...">    
    </div>

    <!-- RIGHT -->
    <div class="top-right">
        <span>🔔</span>
        <span id="dateTime"></span>
    </div>

</div>

        <!-- WELCOME -->
        <div class="welcome-box">
            <div>
                <h3>Hello <?php echo ucwords($name); ?> 👋</h3>
                <p>Stay consistent, stay healthy!</p>
                <p>Let's reach your goals together!</p>
            </div>
            
            <img src="trainner.jpg" class="trainer-img">
             
     </div>

        <!-- ACTION BUTTONS -->
        <div class="action-row">
            <a href="book_class.php" class="btn">📅 Book Yoga Class</a>
            <a href="view_booking.php" class="btn">📋 View Bookings</a>
            <a href="meals.php" class="btn">🥗 Meal Staticstic </a>
            <a href="progress.php" class="btn">📊 Yoga Activity </a>  
           
        </div>

        <!-- STATS -->
        <div class="stats">
            <div class="card">12<br><small>Total Sessions</small></div>
            <div class="card">230<br><small>Calories Burned</small></div>
            <div class="card">5.4<br><small>Hours Practiced</small></div>
            <div class="card">3<br><small>Classes</small></div>
        </div>

        <!-- GRAPH + CLASSES -->
        <div class="middle">

    <!-- LEFT GRAPH -->
    <div class="graph">

        <div class="graph-header">
            <h3>Weekly Progress</h3>
            <select>
                <option>Sessions</option>
                <option>Calories</option>
            </select>
        </div>

        <canvas id="progressChart"></canvas>
    </div>

    <!-- RIGHT UPCOMING CLASSES -->
    <div class="classes">

        <div class="classes-header">
            <h3>Upcoming Classes</h3>
            <a href="#">View All</a>
        </div>

        <!-- CLASS 1 -->
        <div class="class-item">
            <div class="icon green">🧘</div>
            <div class="info">
                <h4>Morning Yoga</h4>
                <p>With Priya</p>
            </div>
            <div class="time">
                <span>19 Apr</span>
                <small>07:00 AM</small>
            </div>
        </div>

        <!-- CLASS 2 -->
        <div class="class-item">
            <div class="icon orange">🔥</div>
            <div class="info">
                <h4>Power Yoga</h4>
                <p>With Rahul</p>
            </div>
            <div class="time">
                <span>19 Apr</span>
                <small>06:00 PM</small>
            </div>
        </div>

        <!-- CLASS 3 -->
        <div class="class-item">
            <div class="icon purple">🧘‍♀️</div>
            <div class="info">
                <h4>Meditation</h4>
                <p>With Meera</p>
            </div>
            <div class="time">
                <span>20 Apr</span>
                <small>07:30 AM</small>
            </div>
        </div>

    </div>

</div>

    </div>

   <!-- RIGHT PANEL -->
<div class="right-panel" style: "width: 300px">

    <!-- PROFILE CARD -->
  <div class="profile-card">
         <a href="profile.php" style="text-decoration:none; color:inherit;">
    
         <div class="profile-box">

    <div class="profile-img-box">
        <img src="uploads/<?php echo $img; ?>" class="profile-img">
    </div>

    <h3><?php echo $name; ?></h3>
    <p><?php echo $email; ?></p>

</div>
        </a>
   
    </div>

    <!-- GOALS -->
    <div class="card-box">
        <div class="card-header">
            <h4>My Goals</h4>
            <span>Edit</span>
        </div>

        <div class="goal">
            <p>🌙 Sleep <span>90%</span></p>
            <div class="bar"><div style="width:90%"></div></div>
        </div>

        <div class="goal">
            <p>💧 Water <span>60%</span></p>
            <div class="bar"><div style="width:60%"></div></div>
        </div>

        <div class="goal">
            <p>🧘 Yoga <span>70%</span></p>
            <div class="bar"><div style="width:70%"></div></div>
        </div>
    </div>

    <!-- NEXT CLASS -->
    <div class="card-box">
        <h4>Next Class</h4>
        <div class="next-class">
            <div>
                <h5>Morning Yoga</h5>
                <p>with Priya</p>
                <small>🕒 19 Apr, 07:00 AM</small>
            </div>
            <img src="https://cdn-icons-png.flaticon.com/512/3774/3774299.png">
        </div>
    </div>

    <!-- PROGRESS -->
    <div class="card-box">
        <h4>My Progress</h4>

        <p>📅 Total Bookings <span>12</span></p>
        <p>✅ Completed Sessions <span>8</span></p>
        <p>🔥 Current Streak <span>5 Days</span></p>
    </div>

    <!-- PLAN -->
    <div class="card-box">
        <h4>My Plan</h4>
        <p>👑 Premium Plan</p>
        <small>Valid till 18 May 2026</small>
        <button class="plan-btn">Manage Plan</button>
    </div>

</div>

</div>

</div>

<!-- CHART SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const canvas = document.getElementById('progressChart');

    if(canvas){
        const ctx = canvas.getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
                datasets: [{
                    label: 'Sessions',
                    data: <?php echo json_encode($data ?? [1,2,3,2,4,1,5]); ?>,
                    borderColor: '#2ecc71',
                    backgroundColor: 'rgba(35, 255, 233, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins:{
                    legend:{
                        display: false
                    }
                }
            }
        });
    }

});
</script>


<!-- DATE TIME SCRIPT -->
<script>
function updateDateTime() {
    const now = new Date();

    const date = now.toLocaleDateString('en-IN', {
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    });

    const time = now.toLocaleTimeString('en-IN');

    document.getElementById("dateTime").innerHTML = date + " | " + time;
}

setInterval(updateDateTime, 1000);
updateDateTime();
</script>
<script>
document.getElementById("searchBox").addEventListener("keypress", function(e) {

    if(e.key === "Enter") {

        let value = this.value.toLowerCase().trim();

        if(value.includes("book")){
            window.location.href = "book_class.php";
        }
        else if(value.includes("view") || value.includes("booking")){
            window.location.href = "view_booking.php";
        }
        else if(value.includes("schedule")){
            window.location.href = "schedule.php";
        }
        else if(value.includes("program")){
            window.location.href = "programs.php";
        }
        else if(value.includes("meal")){
            window.location.href = "meals.php";
        }
        else if(value.includes("progress")){
            window.location.href = "progress.php";
        }
        else if(value.includes("dashboard")){
            window.location.href = "dashboard.php";
        }
        else{
            alert("❌ Page not found!");
        }

    }

});
</script>

</body>
</html>

