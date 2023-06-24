<?php
include_once "dbconn.php";
if(isset($_POST['pid'])) {
  $id = $_POST['pid'];//receipt id
  $ornum = $_POST['ornum'];
  $prodNum = $_POST['prodNum'];//productcode
  $qty = $_POST['qty'];
  $prname = $_POST['prname'];
  $subtotal = 0;

  //fetch product data
  $getPr = "SELECT * FROM product WHERE productcode='$prodNum'";
  $res = mysqli_query($conn, $getPr);
  if(mysqli_num_rows($res) > 0) {
    $pr_data = mysqli_fetch_assoc($res);
    $pr_price = $pr_data['price'];
    $subtotal = $pr_price * $qty;

    //fetch payment data
    $payQuery = mysqli_query($conn, "SELECT * FROM payment WHERE receipt_or='$ornum'");
    $pay_data = mysqli_fetch_assoc($payQuery);
    $pay_amount = $pay_data['pay_amount'];//total
    $payment = $pay_data['payment'];//bayad
    $change = $pay_data['pay_change'];//sukli

    //fetch receipt data
    $receiptQuery = mysqli_query($conn, "SELECT * FROM receipt WHERE id=$id AND ornum='$ornum'");
    $receipt_data = mysqli_fetch_assoc($receiptQuery);
    $insertrec = "INSERT INTO receipts (`ornum`, `prod_id`, `prod_id_to`, `productname`, `quantity`, `subtotal`)
                  VALUES('$ornum','$receipt_data[prod_id]','$prodNum','$receipt_data[productname]','$receipt_data[quantity]','$receipt_data[subtotal]');";
    $insertChanges = mysqli_query($conn, $insertrec);
    $oldSubtotal = $receipt_data['subtotal'];

    $pay_amount = $pay_amount - $oldSubtotal; // bawasan ang total ng lumang presyo or yung papalitan sa receipt
    $bagongPresyo = $pay_amount + $subtotal; // new price
    $sukli = $payment - $bagongPresyo;

    if(mysqli_query($conn, "UPDATE payment SET pay_amount='$bagongPresyo', pay_change='$sukli' WHERE receipt_or='$ornum'")) {
      // echo "okay payment";
    }

    // Return the quantity to the product
    if(mysqli_query($conn, "UPDATE product SET qty = qty + $receipt_data[quantity] WHERE productcode='$receipt_data[prod_id]'")) {
      // echo "okay product";
    }

    // Update product quantity
    if(mysqli_query($conn, "UPDATE product SET qty = qty - $qty WHERE productcode='$prodNum'")) {
      // echo "okay product";
    }

    $query = "UPDATE receipt SET prod_id='$prodNum', productname='$prname', quantity='$qty',subtotal='$subtotal' WHERE id=$id AND ornum='$ornum'";
    $result = mysqli_query($conn, $query);
    if($result) {
      echo "success";
      exit();
    }
  } else {
    echo "fail";
    exit();
  }
}

if(isset($_POST['req_type'])) {
  $ornum = $_POST['idid'];
  $payQuery = mysqli_query($conn, "SELECT * FROM payment WHERE receipt_or='$ornum'");
  if(mysqli_num_rows($payQuery) > 0) {
    $pay_data = mysqli_fetch_assoc($payQuery);
    if($pay_data['pay_change'] < 0) {
      header('Content-Type: application/json');
      echo json_encode($pay_data);
      exit();
    } else {
      exit("success");
    }
  } else {
    exit("Something went wrong!");
  }
}
?>