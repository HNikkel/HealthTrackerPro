<?php session_start();
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
            form, div, table, tr{
                text-align: center;
            }
        </style>
    </head>
<?php
    if((isset($_SESSION['username'])) && (isset($_POST['workoutName'])) && (isset($_POST['workoutSets'])) && (isset($_POST['workoutReps']))){
        
        if($_POST['workoutName'] === "" && $_POST['workoutSets'] === "" && $_POST['workoutReps'] === ""){
        
            $connect = mysqli_connect("localhost", "cs213user", "letmein", "healthtrackerpro");

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
        
        $connect = mysqli_connect("localhost", "cs213user", "letmein", "healthtrackerpro");
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
            <h3>(click here to view workouts if fields are blank...)</h3>
            <input type="submit" name="Submit">
        </form>
        
        <div id="form">
        <a href="index.html">Return To Index</a>
        </div>
    </body>
</html>
<?php
    }
?>