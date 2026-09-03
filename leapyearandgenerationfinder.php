<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 5 - Leap Year & Generation Finder</title>
</head>
<body>
    <h2>Leap Year & Generation Finder</h2>
    <form method="POST">
        <label for="birth_year">Birth Year:</label>
        <input type="number" id="birth_year" name="birth_year" min="1900" max="2099" required>
        <button type="submit">Analyze Year</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['birth_year'])) {
        $year = (int)$_POST['birth_year'];

        $isLeapYear = (bool)date('L', mktime(0, 0, 0, 1, 1, $year));
        $leapString = $isLeapYear ? "was a Leap Year!" : "was NOT a Leap Year.";

        if ($year >= 2013) {
            $gen = "Gen Alpha";
        } elseif ($year >= 1997) {
            $gen = "Gen Z";
        } elseif ($year >= 1981) {
            $gen = "Millennial";
        } elseif ($year >= 1965) {
            $gen = "Gen X";
        } elseif ($year >= 1946) {
            $gen = "Baby Boomer";
        } else {
            $gen = "Silent Generation";
        }

        echo "<p><strong>{$year} {$leapString} Based on your birth year, you belong to the {$gen} generation.</strong></p>";
    }
    ?>
</body>
</html>
