<?php 
    if (isset($_POST['submit'])) {
        echo $_POST["age"];

    }
?>

<!DOCTYPE html>
<html>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST">
            <label for="age">Age</label>
            <input id="age" name="age" type="text">
            <br>
            <input type="radio" id="male" name="male" value="male">
            <label for="male">Male</label>
            <br>
            <input type="radio" id="female" name="female" value="female">
            <label for="female">female</label>
            <br>
            <label for="height">Height</label>
            <input id="height" name="height" type="text">
            <br>
            <label for="wieght">Weight</label>
            <input id="wieght" name="wieght" type="text">

            <br>
            <label for="exercise">How Much Activity Per Week</label>
            <br>
            <select name="exercise" id="exercise">
                <option value="none">No Exercise</option>
                <option value="slight">light exercise 1-3 days per week</option>
                <option value="moderate">moderate exercise 3-5 days per week</option>
            </select>

            <button type="submit" name="submit">Submit</button>
        </form>
    </body>
</html>