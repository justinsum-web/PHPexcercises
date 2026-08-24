<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $eventName = htmlspecialchars(trim($_POST['event_name']));
    $eventDateInput = $_POST['event_date'];

    if (!empty($eventName) && !empty($eventDateInput)) {
        $today = new DateTime('today');
        $eventDate = new DateTime($eventDateInput);

        $interval = $today->diff($eventDate);
        
        $days = (int)$interval->format('%r%a');

        if ($days > 0) {
            $message = "There are <strong>{$days}</strong> days left until <strong>{$eventName}</strong>!";
        } elseif ($days === 0) {
            $message = "<strong>{$eventName}</strong> is happening today";
        } else {
            $message = "<strong>{$eventName}</strong> has already passed";
        }
    } else {
        $message = "Please fill in all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Countdown</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 450px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 12px;
            background-color: #e9ecef;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <h2>Event Countdown Calculator</h2>

    <form method="POST" action="">
        <div class="form-group">
            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name">
        </div>

        <div class="form-group">
            <label for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date" required>
        </div>

        <button type="submit">Calculate Days</button>
    </form>

    <?php if (!empty($message)): ?>
        <div class="result">
            <?= $message ?>
        </div>
    <?php endif; ?>

</body>
</html>
