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
    <title>Meals</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard no-right">
    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>🧘 Yoga</h2>

        <a href="dashboard.php">🏠 Dashboard</a>
        <a href="book_class.php">📅 Book Class</a>
        <a href="view_booking.php">📋 View Bookings</a>
        <a href="schedule.php">⏱ Schedule</a>
        <a href="programs.php">🧘 Programs</a>

        <!-- ACTIVE -->
        <a class="active" href="meals.php">🥗 Meals</a>

        <a href="#">📊 Progress</a>
        <a href="#">💬 Chat</a>
        <a href="logout.php">🚪 Logout</a>
    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOP BAR -->
        <div class="topbar">
            <h2>Meals</h2>
            <div class="search-box">
                <input type="text" placeholder="Search meals...">
            </div>
        </div>

        <!-- HERO -->
        <div class="meal-hero-pro">
    `       <div>
                <h1>Daily Healthy meals</h1>
                 <p>Nutritious meals for a healthy life</p>
            </div>

        <div class="hero-img">
             <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061">
            </div>
        </div>

        <!-- OVERVIEW -->
        <div class="meal-overview">
            <div class="overview-card">🥗<br><b>28</b><br><small>Total Meals</small></div>
            <div class="overview-card">🔥<br><b>1,850</b><br><small>Calories</small></div>
            <div class="overview-card">🌿<br><b>42</b><br><small>Healthy Recipes</small></div>
            <div class="overview-card">🔖<br><b>12</b><br><small>Favorites</small></div>
        </div>

        <!-- CATEGORY -->
        <div class="section-head">
            <h3>Meal Categories</h3>
            <span>View All</span>
        </div>

        <div class="meal-categories-pro">
            <div class="cat-card">
                <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png">
                <h4>Breakfast</h4>
                <small>8 Meals</small>
            </div>

            <div class="cat-card">
                <img src="https://cdn-icons-png.flaticon.com/512/1046/1046857.png">
                <h4>Lunch</h4>
                <small>10 Meals</small>
            </div>

            <div class="cat-card">
                <img src="https://cdn-icons-png.flaticon.com/512/1046/1046786.png">
                <h4>Dinner</h4>
                <small>8 Meals</small>
            </div>

            <div class="cat-card">
                <img src="https://cdn-icons-png.flaticon.com/512/1046/1046793.png">
                <h4>Snacks</h4>
                <small>6 Meals</small>
            </div>
        </div>

        <!-- RECOMMENDED -->
        <div class="section-head">
            <h3>Recommended Meals</h3>
            <span>View All</span>
        </div>

        <div class="meal-grid">

            <div class="meal-card-pro">
                <img src="https://images.pexels.com/photos/70497/pexels-photo-70497.jpeg">
                <span class="badge">320 Cal</span>
                <h4>Healthy Oatmeal</h4>
                <p>with Fruits & Nuts</p>
            </div>

            <div class="meal-card-pro">
                <img src="https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg">
                <span class="badge">450 Cal</span>
                <h4>Grilled Chicken Bowl</h4>
                <p>with Veggies</p>
            </div>

            <div class="meal-card-pro">
                <img src="https://images.pexels.com/photos/539451/pexels-photo-539451.jpeg">
                <span class="badge">280 Cal</span>
                <h4>Veggie Soup</h4>
                <p>Healthy & Light</p>
            </div>

            <div class="meal-card-pro">
                <img src="https://images.pexels.com/photos/1092730/pexels-photo-1092730.jpeg">
                <span class="badge">220 Cal</span>
                <h4>Berry Smoothie</h4>
                <p>with Banana</p>
            </div>

        </div>

        <!-- TIP -->
        <div class="meal-tip-pro">
            <div>
                🌿 <b>Healthy Tip</b>
                <p>Eat balanced meals with proper nutrients</p>
            </div>
            <img src="https://images.pexels.com/photos/1435904/pexels-photo-1435904.jpeg">
        </div>

    </div> <!-- MAIN END -->

    <!-- ✅ EMPTY RIGHT PANEL (IMPORTANT FIX) -->
    <div class="right-panel"></div>

</div> <!-- DASHBOARD END -->

</body>
</html>