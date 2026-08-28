<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 3 - Day of the Week Finder</title>
</head>
<body>
    <h2>Day of the Week Finder</h2>
    <form method="POST">
        <label for="user_date">Select Date:</label>
        <input type="date" id="user_date" name="user_date" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['user_date'])) {
        $dateInput = $_POST['user_date'];
        $dateObj = new DateTime($dateInput);
        
        $formattedDate = $dateObj->format('F j, Y');
        $dayOfWeek = $dateObj->format('l');

        $isPast = $dateObj < new DateTime('today');
        $verb = $isPast ? "fell" : "will fall";

        echo "<p><strong>{$formattedDate} {$verb} on a {$dayOfWeek}.</strong></p>";
    }
    ?>
</body>
</html>
