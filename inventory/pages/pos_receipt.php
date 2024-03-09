<?php
// Include necessary files and start session if required
include '../includes/connection.php'; // Assuming this file contains the database connection code
include '../includes/topp.php'; // Assuming this file contains the header content

// Check if transaction ID is provided
if(isset($_GET['TRANS_id'])) {
    // Retrieve transaction details from the database
    $transaction_id = $_GET['trans_id'];
    
    // Fetch transaction details from the database
    $query = "SELECT * FROM transaction WHERE TRANS_D_ID = $transaction_id"; // Assuming 'transaction' is your transaction table
    $result = mysqli_query($connection, $query);
    $transaction = mysqli_fetch_assoc($result);

    // Fetch transaction details from the transaction_details table
    $query_details = "SELECT * FROM transaction_details WHERE TRANS_D_ID = $transaction_id"; // Assuming 'transaction_details' is your transaction details table
    $result_details = mysqli_query($connection, $query_details);
    $transaction_details = mysqli_fetch_all($result_details, MYSQLI_ASSOC);
} else {
    // Display error message if transaction ID is not provided
    echo "Transaction ID not provided.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Receipt</title>
    <!-- Include any CSS styles for the receipt here -->
    <link rel="stylesheet" href="path/to/styles.css">
</head>
<body>
    <div class="container">
        <div class="receipt">
            <h2>Receipt</h2>
            <p>Date: <?php echo $transaction['DATE']; ?></p>
            <p>Customer: <?php echo $transaction['CUST_ID']; ?></p>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaction_details as $detail): ?>
                        <tr>
                            <td><?php echo $detail['PRODUCTS']; ?></td>
                            <td><?php echo $detail['QTY']; ?></td>
                            <td><?php echo $detail['PRICE']; ?></td>
                            <td><?php echo $detail['QTY'] * $detail['PRICE']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>Subtotal: <?php echo $transaction['SUBTOTAL']; ?></p>
            <!-- Include other transaction details such as taxes, discounts, etc. -->
            <p>Total: <?php echo $transaction['GRANDTOTAL']; ?></p>
        </div>
    </div>
    <button onclick="window.print()">Print Receipt</button> <!-- Button to print the receipt -->
    <!-- Include any JavaScript scripts here -->
    <script src="path/to/script.js"></script>
</body>
</html>

