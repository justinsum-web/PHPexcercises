<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 4 - Workday vs. Weekend Checker</title>
</head>
<body>
    <h2>Workday vs. Weekend Checker</h2>
    <form method="POST">
        <label for="target_date">Target Date:</label>
        <input type="date" id="target_date" name="target_date" required>
        <button type="submit">Check Date</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['target_date'])) {
        $targetDate = $_POST['target_date'];
        $dateObj = new DateTime($targetDate);
        
        $formattedDate = $dateObj->format('F j, Y');
        $dayName = $dateObj->format('l');
        $dayNum = (int)$dateObj->format('N');

        if ($dayNum <= 5) {
            echo "<p><strong>{$formattedDate} is a {$dayName}, which means it is a Workday!</strong></p>";
        } else {
            echo "<p><strong>{$formattedDate} is a {$dayName}, so it is the Weekend!</strong></p>";
        }
    }
    ?>
</body>
</html>
