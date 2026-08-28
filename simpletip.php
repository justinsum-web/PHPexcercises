<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 10 - Simple Tip & Split Bill Calculator</title>
</head>
<body>
    <h2>Restaurant Bill Splitter</h2>
    <form method="POST">
        <label for="bill_amount">Total Bill Amount ($):</label><br>
        <input type="number" id="bill_amount" name="bill_amount" step="0.01" min="0" required><br><br>

        <label for="tip_percent">Tip Percentage (%):</label><br>
        <input type="number" id="tip_percent" name="tip_percent" step="0.1" min="0" required><br><br>

        <label for="people_count">Number of People:</label><br>
        <input type="number" id="people_count" name="people_count" min="1" required><br><br>

        <button type="submit">Calculate Split</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' 
        && isset($_POST['bill_amount'], $_POST['tip_percent'], $_POST['people_count'])) {
        
        $billAmount = (float)$_POST['bill_amount'];
        $tipPercent = (float)$_POST['tip_percent'];
        $peopleCount = (int)$_POST['people_count'];

        if ($peopleCount > 0) {
            $totalTip = $billAmount * ($tipPercent / 100);
            $grandTotal = $billAmount + $totalTip;
            $perPerson = $grandTotal / $peopleCount;

            $formattedTip = number_format($totalTip, 2);
            $formattedGrandTotal = number_format($grandTotal, 2);
            $formattedPerPerson = number_format($perPerson, 2);

            echo "<p><strong>Total Tip: \${$formattedTip} | Grand Total: \${$formattedGrandTotal} | Each person pays: \${$formattedPerPerson}</strong></p>";
        }
    }
    ?>
</body>
</html>
