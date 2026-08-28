<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 6 - Text Analyzer & Word Counter</title>
</head>
<body>
    <h2>Text Analyzer & Word Counter</h2>
    <form method="POST">
        <label for="user_text">Paste Text Below:</label><br>
        <textarea id="user_text" name="user_text" rows="6" cols="50" required></textarea><br><br>
        <button type="submit">Analyze Text</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_text'])) {
        $text = $_POST['user_text'];

        $charCount = strlen($text);
        $wordCount = str_word_count($text);
        $uppercaseText = strtoupper($text);

        echo "<h3>Analysis Results:</h3>";
        echo "<ul>";
        echo "<li><strong>Total character count (including spaces):</strong> {$charCount}</li>";
        echo "<li><strong>Total word count:</strong> {$wordCount}</li>";
        echo "<li><strong>Text in ALL CAPS:</strong> <br><pre>" . htmlspecialchars($uppercaseText) . "</pre></li>";
        echo "</ul>";
    }
    ?>
</body>
</html>
