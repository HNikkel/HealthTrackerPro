<?php

if (isset($_POST['submit'])) {
    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "HealthTracker");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    } else {
        $stu = strtolower($_POST["username"]);

        $sql = "SELECT * FROM Users "
                . "WHERE username = '" . $_POST["username"] . "';";
        $res = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

        if (mysqli_num_rows($res) == 0) {

            $sql = "INSERT INTO `Users` (`Username`, `Password`) VALUES ('".$_POST["username"]."', SHA1('".$_POST["password"]."'));";

            $res = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

            if ($res === TRUE) {
                

                echo "<head>        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
            <link rel='stylesheet' href='./Style2.css'></head>"
            . "<body style='background-color: lightgray'>"
            . "<h1>Account Has Been Created</h1>"
            . "<p>Thank you for joining us!</p>"
            . "<A HREF='login.php'><button class='btn-dark'>Login</button></A>"
            . "</body>";
            } else {
                printf("Could not insert record: %s\n", mysqli_error($mysqli));
            }

            mysqli_close($mysqli);
        } else {
            echo "<head>        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
            <link rel='stylesheet' href='./Style2.css'></head>"
            . "<body style='background-color: lightgray'>"
            . "<h1>Account Has Already Been Created</h1>"
            . "<p>The name " . $stu . " is already in use, try again!</p>"
            . "<A HREF='createAccount.php'><button class='btn-dark'>Back</button></A>"
            . "</body>";
        }
    }
} else {
    ?>

    <html lang="en">
        <head>
            <link rel="stylesheet" href="./style.css">
            <script defer src="./createAcc.js"></script>
        </head>
        <body>
            <div class="container">
                <form action="<?php echo $PHP_SELF; ?>" method="POST" id="form">
                    <h1>Registration</h1>
                    <div class="input-control">
                        <label for="username">Name</label>
                        <input id="username" name="username" type="text">
                        <div class="error"></div>
                    </div>
                     
                    <div class="input-control">
                        <label for="password">Password</label>
                        <input id="password"name="password" type="password">
                        <div class="error"></div>
                    </div>
                    <button type="submit" name="submit">Sign Up</button>
                </form>
            </div>
        </body>
    </html>

    <?php
}
?> 