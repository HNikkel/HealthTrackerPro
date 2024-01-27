<?php 
    if (isset($_POST['submit'])) {

        $age = (int)$_POST["age"];
        $gender = $_POST["gender"];
        $height = (int)$_POST["height"];
        $weight = (int)$_POST["weight"];

        if($gender == "male"){
            $BMR = 66.47 + (13.75 * $weight) + (5.003 * $height) - (6.755 * $age);
        }
        

        if($$gender == "female"){
            $BMR = 655.1 + (9.563 * $weight) + (1.85 * $height) - (4.676 * $age);
        }

       $ammountEx = $_POST["exercise"];
        $totalCals = 0;
       if($ammountEx == "none"){
            $totalCals = $BMR * 1.2;
       }else if($ammountEx == "slight"){
            $totalCals = $BMR * 1.375;
       } else if($ammountEx == "moderate"){
            $totalCals = $BMR * 1.55;
       }

       $finalOut = "You need to eat " . $totalCals . " calories to maintain your weight.";

    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style2.css">
    <title>Maintenance Calorie Calculator</title>

</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <h1>Maintenance Calorie Calculator</h1>

        <label for="age">Age</label>
        <input id="age" name="age" type="text">


        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="none">Choose Gender</option>
            <option value="male">Male</option>
            <option value="femlae">Female</option>
        </select>

        <label for="height">Height</label>
        <input id="height" name="height" type="text">

        <label for="weight">Weight</label>
        <input id="weight" name="weight" type="text">

        <label for="exercise">How Much Activity Per Week</label>
        <select name="exercise" id="exercise">
            <option value="none">No Exercise</option>
            <option value="slight">Light exercise 1-3 days per week</option>
            <option value="moderate">Moderate exercise 3-5 days per week</option>
        </select>

        <button type="submit" name="submit">Calculate</button>

        <div class="result"><p><?php echo $finalOut; ?></p></div>
    </form>
</body>
</html>
