<!DOCTYPE html>
<html>
<head>
    <title>Yoga Programs</title>
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

        <!-- ACTIVE PAGE -->
        <a class="active" href="programs.php">🧘 Programs</a>

        <a>🥗 Meals</a>
        <a>📊 Progress</a>
        <a>💬 Chat</a>
        <a href="logout.php">🚪 Logout</a>

        <div class="upgrade">
            <p>Upgrade to Premium</p>
            <button>Upgrade Now</button>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <!-- TOP BAR -->
        <div class="topbar">
            <h2>Yoga Programs</h2>

            <div class="search-box">
                <input type="text" placeholder="Search programs...">
            </div>
        </div>

        <!-- HERO -->
        <!-- ===== SUB TEXT ===== -->
<p style="color:#666;margin-bottom:20px;">
Explore our curated yoga programs for your body and mind
</p>

<!-- ===== HERO SECTION (UPDATED IMAGE) ===== -->
<div class="program-hero">
    <div>
        <h2>Transform Your Body <br> Transform Your Life</h2>
        <p>Choose a program that fits your goals and start your journey today.</p>
        <button class="btn">Find Your Program</button>
    </div>

<img src="https://images.unsplash.com/photo-1552196563-55cd4e45efb3" style="width:350px;">
    </div>




<!-- ===== FEATURED PROGRAMS ===== -->
<div style="display:flex; justify-content:space-between; align-items:center;">
    <h3>Featured Programs</h3>
    <a href="#" style="color:green;">View All</a>
</div>

<div class="program-list">

    <!-- CARD 1 -->
    <div class="program-card">
<img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b" alt="Morning Yoga">
 <div class="program-content">
            <h4>Morning Yoga Flow</h4>
            <span class="badge green">Beginner</span>


            <p>Start your day with energy and positivity.</p>

            <div class="program-info">
                <span>⏱ 30 min</span>
                <span>📅 15 Sessions</span>
            </div>

            <button>View Program</button>
        </div>
    </div>

    <!-- CARD 2 -->
    <div class="program-card">
        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b">

        <div class="program-content">
            <h4>Weight Loss Yoga</h4>
            <span class="badge orange">Weight Loss</span>

            <p>Burn calories and tone your body.</p>

            <div class="program-info">
                <span>⏱ 45 min</span>
                <span>📅 20 Sessions</span>
            </div>

            <button>View Program</button>
        </div>
    </div>

    <!-- CARD 3 -->
    <div class="program-card">
        <img src="https://images.unsplash.com/photo-1599058917212-d750089bc07e">

        <div class="program-content">
            <h4>Stress Relief Yoga</h4>
            <span class="badge purple">Stress Relief</span>

            <p>Relax your mind and reduce stress.</p>

            <div class="program-info">
                <span>⏱ 25 min</span>
                <span>📅 10 Sessions</span>
            </div>

            <button>View Program</button>
        </div>
    </div>

    <!-- CARD 4 -->
    <div class="program-card">
<img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg">
        
    <div class="program-content">
            <h4>Power Yoga</h4>
            <span class="badge blue">Strength</span>

            <p>Build strength, stamina and flexibility.</p>

            <div class="program-info">
                <span>⏱ 50 min</span>
                <span>📅 25 Sessions</span>
            </div>

            <button>View Program</button>
        </div>
    </div>

</div>

<!-- ===== WHY CHOOSE ===== -->
<h3>Why Choose Our Programs?</h3>

<div class="program-category">

    <div class="cat-card">🏆 <p>Expert Trainers</p></div>
    <div class="cat-card">🌱 <p>Customized Plans</p></div>
    <div class="cat-card">📊 <p>Track Progress</p></div>
    <div class="cat-card">👥 <p>Community Support</p></div>

</div>

<!-- ===== JOURNEY ===== -->
<h3>Your Program Journey</h3>

<div class="program-hero">

    <div>
        <p>Programs Completed</p>
        <h2>2 / 10</h2>

        <div style="background:#ddd; height:8px; border-radius:10px;">
            <div style="width:20%; background:#2ecc71; height:8px; border-radius:10px;"></div>
        </div>

        <p style="margin-top:10px;">Keep going! You're doing great.</p>
    </div>

    <div>
        <p>Total Practice Time</p>
        <h2>5.4 hrs</h2>
        <p style="color:green;">+12% this week</p>
    </div>

</div>

    </div>

</div>

</body>
</html>