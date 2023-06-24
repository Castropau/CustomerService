<?php
include_once "dbconn.php";
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['receipt_or'])) {
  $receipt_or = $_GET['receipt_or'];

  $sql = "SELECT pay_amount FROM payment WHERE receipt_or = '$receipt_or'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
   
    while ($row = $result->fetch_assoc()) {
      $amount = $row["pay_amount"];
    }
    if (!empty($amount)) {
      echo $amount;
    } else {
      echo "No amount found for this receipt.";
    }
  } else {
    echo "No receipt found.";
  }
} else {
  echo "No receipt found.";
}

$conn->close();
?>