<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 9 - Random Winner & Draw Timestamp</title>
</head>
<body>
    <h2>Random Winner Generator</h2>
    <form method="POST">
        <label for="participants">Participant Names:</label><br>
        <input type="text" id="participants" name="participants" placeholder="Alice, Bob, Charlie, Diana" required style="width: 350px;"><br><br>
        <button type="submit">Pick Winner</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['participants'])) {
        $rawNames = $_POST['participants'];
        $namesArray = array_filter(array_map('trim', explode(',', $rawNames)));

        if (!empty($namesArray)) {
            $randomIndex = array_rand($namesArray);
            $winner = $namesArray[$randomIndex];
            $drawTimestamp = date('F j, Y \a\t h:i A');

            echo "<p><strong>Winner: {$winner}! (Drawn on {$drawTimestamp})</strong></p>";
        }
    }
    ?>
</body>
</html>
