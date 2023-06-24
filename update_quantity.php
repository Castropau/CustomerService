<?php
    include "dbcon.php";

    if (isset($_POST['productcode']) && isset($_POST['qty'])) {
        $productcode = $_POST['productcode'];
        $quantity = $_POST['qty'];
        // Get the current quantity value from the database for the given product code
        $query = "SELECT qty FROM product WHERE id='$productcode'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $currentQuantity = $row['qty'];
        // Add the input quantity to the current quantity value
        $newQuantity = $currentQuantity + $quantity;
        // Update the quantity value in the database for the given product code
        $query = "UPDATE product SET qty='$newQuantity' WHERE id='$productcode'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "Quantity updated successfully!";
        } else {
            echo "Error updating quantity: " . mysqli_error($conn);
        }
    }
?>