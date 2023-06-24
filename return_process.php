<?php
  session_start();
  include('dbconn.php');

  if(isset($_POST["id"])) {
    //pr id
    $id = $_POST["id"];
    $req_qty = $_POST["qty"];
    $reason = $_POST["reason"];
    $status = $_POST["status"];
    $id = $_POST["id"];
    $category = $_POST["category"];
    $supplier = $_POST["supplier"];

    // Get product details from the products table
    $sql = "SELECT * FROM product WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    // Insert product into the request table
    // Retrieve the qty value for the product
    $productcode = $row['productcode'];
    $query = "SELECT qty FROM product WHERE productcode = '$productcode'";
    $result = mysqli_query($conn, $query);
    $qty = mysqli_fetch_assoc($result)['qty'];
    $checkReq = $conn->query("SELECT * FROM request WHERE productcode='$row[productcode]'");
    if(mysqli_num_rows($checkReq) > 0)
    {
      $sql = "UPDATE request SET photo='$row[photo]', productname='$row[productname]', available='$qty', price='$row[price]', requestqty='$req_qty' WHERE productcode='$row[productcode]'";
      mysqli_query($conn, $sql);
    }
    else
    {
      // Insert the values into the request table, using the retrieved qty value
      $sql = "INSERT INTO defect (id, photo, productcode, productname, available, category, price, supplier, requestqty, message, statuss) 
              VALUES ('".$row['id']."','".$row['photo']."', '".$row['productcode']."', '".$row['productname']."', '$qty', '$category', '".$row['price']."', '$supplier','$req_qty','$reason','$status')";
      mysqli_query($conn, $sql);
    }
    
    //insert re logs
    $reqlogs = "INSERT INTO defect_log(`id`,`photo`, `productcode`, `productname`, `available`, `category`,`price`,`supplier`, `requestqty`, `message`, `statuss`) 
              VALUES ('".$row['id']."','".$row['photo']."', '".$row['productcode']."', '".$row['productname']."', '$qty','$category', '".$row['price']."', '$supplier','$req_qty','$reason','$status')";
      mysqli_query($conn, $reqlogs);
    // Remove product from the products table
  //   $sql = "DELETE FROM product WHERE id = '$id'";
  //   mysqli_query($conn, $sql);

    echo "success";
  }
?>