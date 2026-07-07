<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Progress</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<div class="dashboard no-right">

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>🧘 Yoga</h2>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="#">📅 Book Class</a>
    <a href="#">📋 View Bookings</a>
    <a href="#">⏱ Schedule</a>
    <a href="#">🧘 Programs</a>
    <a href="#">🥗 Meals</a>

    <a class="active" href="progress.php">📊 Progress</a>

    <a href="#">💬 Chat</a>
    <a href="logout.php">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

<div class="header">
    <div>
        <h2>Your Progress</h2>
        <p>Track your journey and see how you're improving every day.</p>
    </div>
    <div class="user">
    🔔 
    <span>
        <?php 
        echo isset($_SESSION['name']) ? $_SESSION['name'] : 'User'; 
        ?>
    </span>
</div>
</div>

<!-- TOP CARDS -->
<div class="cards">
    <div class="card">🧘 <h3>2 / 10</h3><p>Programs Completed</p></div>
    <div class="card">⏱ <h3>5.4 hrs</h3><p>Total Practice Time</p></div>
    <div class="card">📈 <h3>+12%</h3><p>Weekly Growth</p></div>
</div>

<!-- MAIN GRID -->
<div class="grid">

<!-- LEFT -->
<div class="left">

<div class="box">
    <h3>Programs Completed</h3>
    <h2>2 / 10</h2>

    <div class="progress">
        <div style="width:20%"></div>
    </div>

    <p class="light">You're 20% of the way to your goal.</p>

    <div class="goal">
        🏆 Complete 3 more programs to unlock Advanced Yoga
    </div>
</div>

<div class="box">
    <h3>Total Practice Time</h3>
    <h2>5.4 hrs</h2>

    <div class="chart">
       <canvas id="progressChart" ></canvas> 
    </div>
</div>

<div class="box activity">
    <div>🔥<br><b>1250</b><p>Calories</p></div>
    <div>🧘<br><b>18</b><p>Sessions</p></div>
    <div>📅<br><b>7</b><p>Days</p></div>
    <div>❤️<br><b>Great</b><p>Performance</p></div>
</div>

</div>

<!-- RIGHT -->
<div class="right">

<div class="box">
    <h3>Upcoming Class</h3>
    <p><b>Morning Yoga</b></p>
    <p class="light">Trainer: Priya</p>
    <button>Join Now</button>
</div>

<div class="box">
    <h3>Achievements</h3>
    <p>🔥 1000 Calories</p>
    <p>📅 7 Days Streak</p>
    <p>🏆 10 Sessions</p>
</div>

<div class="box">
    <h3>Monthly Goal</h3>
    <p>Target: 20 Sessions</p>

    <div class="progress">
        <div style="width:60%"></div>
    </div>

    <p class="light">12 / 20 Completed</p>
</div>

<div class="motivation">
    ⭐ Stay consistent! Small progress every day leads to big results.
</div>

</div>

</div>

</div>
</div>

<script>
const ctx = document.getElementById('progressChart');

const dataValues = [
    (Math.random()*5).toFixed(1),
    (Math.random()*5).toFixed(1),
    (Math.random()*5).toFixed(1),
    (Math.random()*5).toFixed(1),
    (Math.random()*5).toFixed(1),
    (Math.random()*5).toFixed(1),
    (Math.random()*5).toFixed(1)
];

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
        datasets: [{
            data: dataValues,
            backgroundColor: [
                '#27ae60','#de1f1f','#2508fc',
                '#a927ae','#df1717','#19eddf','#6bcc2e'
            ],
            borderRadius: 10,
            barThickness: 25
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,   // 🔥 IMPORTANT

        plugins: {
            legend: { display: false },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.raw + " hrs";
                    }
                }
            }
        },

        scales: {
            x: {
                grid: { display: false }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: "#eee"
                },
                ticks: {
                    callback: value => value + "h"
                }
            }
        },

        animation: {
            duration: 1500,
            easing: 'easeOutBounce'   // 🔥 smooth animation
        }
    }
});
</script>

</body>
</html>