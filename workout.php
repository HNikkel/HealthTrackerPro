<?php session_start();
include('prompts.php'); //added prompts
    if(isset($_POST["username"])){
        $_SESSION["username"] = $_POST["username"];
    }
    if(isset($_POST["password"])){
        $_SESSION["password"] = $_POST["password"];
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Workout Tracker</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            
            body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background-image: url('dumbell2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        #form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.3);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        span {
            font-weight: bold;
            font-size: 18px;
        }

        input {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        h3 {
            margin-top: 20px;
            color: #333;
            font-size: 24px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #form a {
            text-decoration: none;
            color: #333;
            margin-top: 20px;
            display: inline-block;
            padding: 10px 15px;
            background-color: #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        #form a:hover {
            background-color: #bbb;
        }
        </style>
    </head>
<?php
    if((isset($_SESSION['username'])) && (isset($_POST['workoutName'])) && (isset($_POST['workoutSets'])) && (isset($_POST['workoutReps']))){
        
        if($_POST['workoutName'] === "" && $_POST['workoutSets'] === "" && $_POST['workoutReps'] === ""){
        
            $connect = mysqli_connect("localhost", "cs213user", "letmein", "HealthTracker");

            $query = "SELECT * FROM Workouts WHERE username = '".$_SESSION["username"]."'";
            $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

                ?>

                    <body>
                        <div id="form">
                        <h1>All Your Workouts:</h1>
                        </div>

                        <table id="form">
                            <tr>
                                <th>Workout Name</th>
                                <th>Workout Sets</th>
                                <th>Workout Reps</th>
                            </tr>
                    </body>

                <?php

            if (mysqli_num_rows($result) !== 0) {
                while ($data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".stripslashes($data['workoutName'])."</td>";
                    echo "<td>".stripslashes($data['workoutSets'])."</td>";
                    echo "<td>".stripslashes($data['workoutReps'])."</td>";
                    echo "</tr>";
                }
            }
        }
        
        $username = $_SESSION['username'];
        $workoutName = $_POST['workoutName'];
        $workoutSets = $_POST['workoutSets'];
        $workoutReps = $_POST['workoutReps'];
        
        $connect = mysqli_connect("localhost", "cs213user", "letmein", "HealthTracker");
        $query = "INSERT INTO Workouts VALUES ('".$username."', '".$workoutName."', ".$workoutSets.", ".$workoutReps.")";
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        
        $query = "SELECT * FROM Workouts WHERE username = '".$_SESSION["username"]."'";
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        
            ?>

                <body>
                        <div id="form">
                        <h1>All Your Workouts:</h1>
                        </div>

                        <table id="form">
                            <tr>
                                <th>Workout Name</th>
                                <th>Workout Sets</th>
                                <th>Workout Reps</th>
                            </tr>
                    </body>

                <?php

            if (mysqli_num_rows($result) !== 0) {
                while ($data = mysqli_fetch_array($result)) {
                    $workoutName1 = stripslashes($data['workoutName']);
                    $workoutSets1 = stripslashes($data['workoutSets']);
                    $workoutReps1 = stripslashes($data['workoutReps']);

                    echo "<tr>";
                    echo "<td>".$workoutName1."</td>";
                    echo "<td>".$workoutSets1."</td>";
                    echo "<td>".$workoutReps1."</td>";
                    echo "</tr>";
                }
            }
        
    }else{
?>
    <body>
        <form method="post" action="" name="form" id="form">
            <h3>Workout Tracker</h3>
            <span>Workout Name:</span><br><br>
            <input type="text" name="workoutName"><br><br>
            <span>Workout Sets:</span><br><br>
            <input type="number" name="workoutSets"><br><br>
            <span>Workout Reps:</span><br><br>
            <input type="number" name="workoutReps"><br><br>
            <input type="submit" name="Submit">
        </form>
        
<<<<<<< HEAD
        <div id="form">
        <a href="homepage.php">Return To Index</a>
        </div>
=======
        
>>>>>>> c42a1a876c8cabab2ecb277864cfebed849df2b0
    </body>
</html>
<?php
    }
?>
