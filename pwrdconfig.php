<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 7 - Password Strength & Expiration Checker</title>
</head>
<body>
    <h2>Password Setup</h2>
    <form method="POST">
        <label for="password">Enter Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
        $password = $_POST['password'];

        if (strlen($password) < 8) {
            echo "<p style='color: red;'><strong>Password is too short! Must be at least 8 characters.</strong></p>";
        } else {
            $expirationDate = date('F j, Y', strtotime('+90 days'));
            echo "<p style='color: green;'><strong>Password set successfully! Your password will expire on {$expirationDate}.</strong></p>";
        }
    }
    ?>
</body>
</html>
