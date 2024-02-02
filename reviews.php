<?php session_start();
include('prompts.php'); //added prompts ?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Health Tracker Pro Reviews</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            form, div, table, tr{
                text-align: center;
            }
            #error{
                color: red;
            }
            td{
                border: solid 1px;
                padding: 30px;
                margin: 30px;
            }
        </style>
    </head>
<?php
    if((isset($_POST['reviewTitle'])) && (isset($_POST['reviewBody'])) && (isset($_POST['reviewNum']))){
        
        if($_POST['reviewTitle'] === "" || $_POST['reviewBody'] === "" || $_POST['reviewNum'] === ""){
        
            $connect = mysqli_connect("localhost", "cs213user", "letmein", "HealthTracker");

            $query = "SELECT * FROM Reviews";
            $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

                ?>

                    <body>
                        <div id="form">
                        <h1>All Reviews:</h1>
                        </div>

                        <table id="form">
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Rating</th>
                            </tr>
                    </body>

                <?php

            if (mysqli_num_rows($result) !== 0) {
                while ($data = mysqli_fetch_array($result)) {
                    $name2 = stripslashes($data['reviewTitle']);
                    $body2 = stripslashes($data['reviewBody']);
                    $num2 = stripslashes($data['reviewNum']);

                    echo "<tr>";
                    echo "<td>".$name2."</td>";
                    echo "<td>".$body2."</td>";
                    echo "<td>".$num2."/10</td>";
                    echo "</tr>";
                }
            }
        }
        
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['reviewTitle'])) {
            $_SESSION['titleerror'] = true;
            $_POST = [];
            header("Location: reviews.php");
            exit;
        }
        
        if (strlen($_POST['reviewTitle']) > 100) {
            $_SESSION['titlelengtherror'] = true;
            $_POST = [];
            header("Location: reviews.php");
            exit;
        }
        
        if (strlen($_POST['reviewBody']) > 500) {
            $_SESSION['bodylengtherror'] = true;
            $_POST = [];
            header("Location: reviews.php");
            exit;
        }
        
        if (!preg_match("/^[a-zA-Z.,?!;:'& ]*$/",$_POST['reviewBody'])) {
            $_SESSION['bodyerror'] = true;
            $_POST = [];
            header("Location: reviews.php");
            exit;
        }
        
        if (!preg_match("/^[0-9]*$/",$_POST['reviewNum'])) {
            $_SESSION['numbererror'] = true;
            $_POST = [];
            header("Location: reviews.php");
            exit;
        }
        
        $title = $_POST['reviewTitle'];
        $body = $_POST['reviewBody'];
        $num = $_POST['reviewNum'];
        
        $connect = mysqli_connect("localhost", "cs213user", "letmein", "HealthTracker");
        $query = 'INSERT INTO Reviews VALUES ("'.$title.'", "'.$body.'", '.$num.')';
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        
        $query = "SELECT * FROM Reviews";
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        
            ?>

                <body>
                    <div id="form">
                    <h1>All Reviews:</h1>
                    </div>

                    <table id="form">
                        <tr>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Rating</th>
                        </tr>
                </body>

            <?php
        
        if (mysqli_num_rows($result) !== 0) {
            while ($data = mysqli_fetch_array($result)) {
                $name2 = stripslashes($data['reviewTitle']);
                $body2 = stripslashes($data['reviewBody']);
                $num2 = stripslashes($data['reviewNum']);

                echo "<tr>";
                echo "<td>".$name2."</td>";
                echo "<td>".$body2."</td>";
                echo "<td>".$num2."/10</td>";
                echo "</tr>";
            }
        }
        
    }else{
?>
    <body>
        <form method="post" action="" name="form" id="form">
            <h3>Health Tracker Pro Review</h3>
            <span>Title:</span><br><br>
            <?php
                if(isset($_SESSION['titleerror'])){
                    echo "<span id='error'>That title is incorrect.</span><br>";
                    $_SESSION = [];
                }
                if(isset($_SESSION['titlelengtherror'])){
                    echo "<span id='error'>That title is too long.</span><br>";
                    $_SESSION = [];
                }
            ?>
            <input type="text" name="reviewTitle"><br><br>
            <span>Review:</span><br><br>
            <?php
                if(isset($_SESSION['bodyerror'])){
                    echo "<span id='error'>That review uses incorrect characters.</span><br>";
                    $_SESSION = [];
                }
                if(isset($_SESSION['bodylengtherror'])){
                    echo "<span id='error'>That review is too long.</span><br>";
                    $_SESSION = [];
                }
            ?>
            <input type="text" name="reviewBody"><br><br>
            <span>Rating (out of 10):</span><br><br>
            <?php
                if(isset($_SESSION['numbererror'])){
                    echo "<span id='error'>That isn't a number.</span><br>";
                    $_SESSION = [];
                }
            ?>
            <input type="number" name="reviewNum"><br><br>
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
