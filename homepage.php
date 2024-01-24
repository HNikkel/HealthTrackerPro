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
      </head> 
   <body>
      <header>   
      <h1>Health Tracker Pro</h1>
      <nav>
         <a href=”domain.tld/home”>Home</a>
         <a href=”domain.tld/blog”>Blog</a>
         <a href=”domain.tld/about”>About</a>
      </nav>
      </header>
      <main>
         <div class=”row">
            <div class=”post-text-box”>
               <h1>Newest Post</h1>
               <section>
                  <h1>First Post</h1>
                  <p>The first post’s content</p>
               </section>
            </div>
            <div class=”profile”>
               <h1>About Me</h1>
               <img src=”profile-picture.png”>
               <p>About the author</p>
            </div>  
         </div>        
      </main>
      <footer>
         <a href=”twitter.com/author”>Twitter</a>
         <a href=”facebook.com/author”>Facebook</a>
         <a href=”instagram.com/author”>Instagram</a>
      </footer>
    </body>
</html>