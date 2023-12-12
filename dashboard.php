<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #4267B2;
    color: #fff;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav {
    display: flex;
    align-items: center;
}

.logo {
    font-size: 1.5rem;
    margin-right: 20px;
}

nav ul {
    list-style: none;
    display: flex;
}

nav li {
    margin-right: 20px;
}

nav a {
    color: #fff;
    text-decoration: none;
}

.user-actions {
    display: flex;
    align-items: center;
}

.user-actions span {
    margin-right: 20px;
}

main {
    display: flex;
}

aside {
    width: 250px;
    background-color: #f0f2f5;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.profile-card {
    text-align: center;
}

.profile-card img {
    border-radius: 50%;
    margin-bottom: 10px;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
}

.sidebar-menu li {
    margin-bottom: 10px;
}

.sidebar-menu a {
    text-decoration: none;
    color: #333;
}

.main-content {
    flex: 1;
    padding: 20px;
}

.post {
    border: 1px solid #dddfe2;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
}

.post-header {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.post-header img {
    border-radius: 50%;
    margin-right: 10px;
}

footer {
    background-color: #f0f2f5;
    padding: 10px;
    text-align: center;
}
.user-actions a{
    color:white;
}
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="logo">Your Logo</div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Friends</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Notifications</a></li>
            </ul>
        </nav>
        <div class="user-actions">
            <span id="welcomeMessage"></span>
            <a href="logout.php" id="logoutLink"">Logout</a>
        </div>
    </header>

    <main>
        <aside>
            <div class="profile-card">
                <img src="profile-picture.jpg" alt="Profile Picture">
                <h2 id="user_side" >[Username]</h2>
                <p>Update Status</p>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#">News Feed</a></li>
                <li><a href="#">Photos</a></li>
                <li><a href="#">Videos</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Groups</a></li>
            </ul>
        </aside>

        <section class="main-content">
            <!-- Content Goes Here -->
            <div class="post">
                <div class="post-header">
                    <img src="friend-picture.jpg" alt="Friend Picture">
                    <h3>Friend's Name</h3>
                </div>
                <p>This is a post. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                <img src="post-image.jpg" alt="Post Image">
            </div>
            <!-- More Posts and Content -->
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Your Company</p>
    </footer>
    <script>

var email = "<?php session_start(); echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ''; ?>";
// console.log("Email:", email);
        var username = email.split('@')[0];
        // console.log("Username:", username);
        document.getElementById('welcomeMessage').innerText = "Welcome, " + username + "!";
        
        document.getElementById('user_side').innerText = username;
        document.getElementById('logoutLink').addEventListener('click', function (event) {
            var confirmation = confirm("Are you sure you want to logout?");
            if (!confirmation) {
                event.preventDefault(); // Prevent the default behavior (e.g., following the link)
            }
        });
    </script>
</body>

</html>
