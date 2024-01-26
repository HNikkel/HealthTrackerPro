<html lang="en">
    <head>
        <link rel="stylesheet" href="./style.css">
        <script defer src="./LoginJS.js"></script>
    </head>
    <body>
        <div class="container">
            <form action="homepage.php" method="POST" id="form">
                <h1>HealthTrackerPro Login</h1>
                <div class="input-control">
                    <label for="username">Username</label>
                    <input id="username" name="username">
                    <div class="error"></div>
                </div>

                <div class="input-control">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password">
                    <div class="error"></div>
                </div>

                <button type="button" onclick="window.location.href = 'createAccount.php'">Create Account</button>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
        
    </body>
</html>
