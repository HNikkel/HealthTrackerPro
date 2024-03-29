<?php
session_start();

if ((!filter_input(INPUT_POST, 'username')) || (!filter_input(INPUT_POST, 'password'))) {

    header("Location: login.php");
    exit;
}


$mysqli = mysqli_connect("localhost", "cs213user", "letmein", "HealthTracker");

$targetname = filter_input(INPUT_POST, 'username');
$targetpasswd = filter_input(INPUT_POST, 'password');

$sql = "SELECT username FROM Users WHERE username = '" . $targetname .
        "' AND password = SHA1('" . $targetpasswd . "')";

$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) == 1) {

    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    setcookie("auth", session_id(), time() + 60 * 30, "/", "", 0);
} else {

    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
   <head>
      <title>HealthTrackerPro</title>
      <link rel="stylesheet" href="style.css">
      <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('dumbell2.jpg'); 
            background-size: cover;
         }

         header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
         }

         nav {
            text-align: center;
         }

         ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #444;
            width: 100%;
            display: flex;
            justify-content: center; 
         }

         li {
            display: inline;
         }

         li a {
            display: inline-block;
            color: #fff;
            text-decoration: none;
            padding: 14px 16px;
         }

         li a:hover {
            background-color: #555;
         }

         main {
            padding: 20px;
            text-align: center;
            color: #333; 
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 10px; 
            margin: auto; 
            max-width: 800px; 
            min-height: 100vh; 
            box-sizing: border-box; 
         }

         .row {
            display: flex;
            justify-content: center;
            align-items: center;
         }

         .post-text-box {
            padding: 20px;
         }

         footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
         }
		header {
            position: relative; /* Added position property for absolute positioning */
         }

         .user-nav {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            align-items: center;
         }

         .user-nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 10px;
         }

         /* Adjusted header padding to make space for user-nav */
         header {
            padding: 20px 10px; 
         }
      </style>
   </head> 
   <body>
      <header> 
	  <div class="user-nav">
            <a href="login.php">Login</a>
            <a href="createAccount.php">Sign Up</a>
         </div>
         <h1>Health Tracker Pro</h1>
      </header>
      <nav>
         <ul>
            <li><a class="active" href="#home">Home</a></li>
            <li><a href="calorieCalculator.php">Calorie Calculator</a></li>
            <li><a href="workout.php">Workout Tracker</a></li>
			<li><a href="goals.php">Goals</a></li>
			<li><a href="reviews.php">Reviews</a></li>
         </ul>
      </nav>
      <main>
         <div class="row">
            <div class="post-text-box">
               <h1>Welcome!</h1>
               <section>
                  
                  <h2>Health Tracker Pro is a website which lets you track your progress in your workouts</h2>
               </section>
            </div>
            <div class="profile">
               <h1>How to Use?</h1>
               <h2>Head on over to the Calorie Calculator to enter the required details.</h2>
			   <h2>Head on over to the Workout Tracker to track your workouts.</h2>
            </div>  
         </div>        
      </main>
      <footer>
         <a href="https://twitter.com/author">Twitter</a>
         <a href="https://facebook.com/author">Facebook</a>
         <a href="https://instagram.com/author">Instagram</a>
      </footer>
   </body>
</html>