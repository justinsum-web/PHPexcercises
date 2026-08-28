<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 8 - Grocery List & Total Cost Calculator</title>
</head>
<body>
    <h2>Grocery List & Total Cost Calculator</h2>
    <form method="POST">
        <label for="items_list">Items List (comma-separated):</label><br>
        <input type="text" id="items_list" name="items_list" placeholder="Apples, Milk, Bread, Eggs" required style="width: 300px;"><br><br>
        
        <label for="price_per_item">Price Per Item ($):</label><br>
        <input type="number" id="price_per_item" name="price_per_item" step="0.01" min="0" required><br><br>
        
        <button type="submit">Calculate Total</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['items_list']) && isset($_POST['price_per_item'])) {
        $rawItems = $_POST['items_list'];
        $pricePerItem = (float)$_POST['price_per_item'];

        $itemsArray = array_filter(array_map('trim', explode(',', $rawItems)));
        $itemCount = count($itemsArray);

        $taxRate = 0.08; // 8% tax
        $subtotal = $itemCount * $pricePerItem;
        $totalCost = $subtotal * (1 + $taxRate);

        echo "<h3>Receipt Summary:</h3>";
        echo "<p><strong>Items Bought:</strong> " . implode(', ', $itemsArray) . "</p>";
        echo "<p><strong>Total Items:</strong> {$itemCount}</p>";
        echo "<p><strong>Price per Item:</strong> $" . number_format($pricePerItem, 2) . "</p>";
        echo "<p><strong>Subtotal:</strong> $" . number_format($subtotal, 2) . "</p>";
        echo "<p><strong>Total Cost (with 8% tax):</strong> $" . number_format($totalCost, 2) . "</p>";
    }
    ?>
</body>
</html>
