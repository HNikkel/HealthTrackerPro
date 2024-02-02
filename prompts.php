<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Reminder Popup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1001;
            text-align: center;
        }

        .popup-close {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="overlay" id="overlay"></div>

<div class="popup" id="exercisePopup">
    <span class="popup-close" onclick="closeExercisePopup()">X</span>
    <p>It's time to Exercise</p>
</div>

<script>
    function showExercisePopup() {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('exercisePopup').style.display = 'block';
    }

    function closeExercisePopup() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('exercisePopup').style.display = 'none';
    }

    setInterval(function() {
        showExercisePopup();
    }, 120000); // 2 minute interval

    function toggleExercisePopup(shouldShow) {
    const displayValue = shouldShow ? 'block' : 'none';
    document.getElementById('overlay').style.display = displayValue;
    document.getElementById('exercisePopup').style.display = displayValue;
}

function showExercisePopup() {
    toggleExercisePopup(true);
}

function closeExercisePopup() {
    toggleExercisePopup(false);
}

setInterval(showExercisePopup, 60000);
</script>

</body>
</html>
