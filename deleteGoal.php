<?php
session_start();
$mysqli = mysqli_connect("localhost", "cs213user", "letmein", "HealthTracker");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["goal_id"])) {
    $goal_id = $_POST["goal_id"];

    $delete_sql = "DELETE FROM Goals WHERE goal_id = $goal_id";
    if ($mysqli->query($delete_sql)) {
        echo "Goal deleted successfully.";
        header("Location: goals.php");
    } else {
        echo "Error: " . $mysqli->error;
    }
}
$mysqli->close();
?>
