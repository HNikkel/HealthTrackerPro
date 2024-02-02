<?php
session_start();
if (isset($_POST["username"])) {
    $_SESSION["username"] = $_POST["username"];
}
if (isset($_POST["password"])) {
    $_SESSION["password"] = $_POST["password"];
}
$mysqli = mysqli_connect("localhost", "cs213user", "letmein", "HealthTracker");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
// Check if form is submitted

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addGoal"])) {
    
    $username = $_SESSION["username"];
    $description = $mysqli->real_escape_string($_POST["description"]);
    $completionDate = $mysqli->real_escape_string($_POST["completionDate"]);

    $insert_sql = "INSERT INTO Goals (username, description, completion_date) VALUES ('$username', '$description', '$completionDate')";
    $mysqli->query($insert_sql);
}

$goals = [];
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $select_sql = "SELECT * FROM Goals WHERE username = '$username'";
    $result = $mysqli->query($select_sql);
    if ($result) {
        $goals = $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Manage Goals</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body  style='text-align: center;'>
        <h1>Manage Your Goals</h1>

        <?php if (isset($_SESSION["username"])): ?>
            <div  style='text-align: center;'>
                <h2>Your Goals:</h2>
                <table style='margin-left: auto; margin-right: auto;'>
                    <tr>
                        <th>Description</th>
                        <th>Completion Date</th>
                    </tr>
                    <?php foreach ($goals as $goal): ?>
                        <tr style= 'padding: 50px'>
                            <td style='text-align: left; text-wrap: wrap; font-style: italic;'><?php echo htmlspecialchars($goal["description"]); ?></td>
                            <td><?php echo htmlspecialchars($goal["completion_date"]); ?></td>
                            <td>
                                <form method="post" action="deleteGoal.php" style="display:inline;">
                                    <input type="hidden" name="goal_id" value="<?php echo $goal["goal_id"]; ?>">
                                    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this goal?');">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <div>
                <form method="post" id="form">
                    <h1>Add A Goal</h1>
                    <br>
                    <textarea style='height:100px' name="description" placeholder="Goal Description" required></textarea><br><br><br>
                    <input type="date" name="completionDate" id='completionDate' required>
                    <script> // script from StackOverflow, Author - Aayush Bhattacharya https://stackoverflow.com/a/77528129 
                        document.addEventListener('DOMContentLoaded', function () {
                            var today = new Date().toISOString().split('T')[0];
                            document.getElementById("completionDate").setAttribute('min', today);
                        });
                    </script>
                    <br><br><br>
                    <button type="submit" name="addGoal">Add Goal</button>
                </form>
            </div>
        <?php else: ?>
            <p>Please log in to manage your goals.</p>
        <?php endif; ?>


    </body>
    <footer>
        <br>
        <a href="homepage.php">Back to Home</a>
    </footer>
</html>






