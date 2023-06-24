<?php

if(isset($_POST['receive-btn']))
{
    session_start();
    include('dbconn.php');
    extract($_POST);
    // echo $p_id;
    // echo "<br>";
    // echo $p_qty;

    $sql = "SELECT * FROM product WHERE id = '$p_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $sql1 = "UPDATE product SET qty = qty - $p_qty WHERE id = '$p_id'";
    mysqli_query($conn, $sql1);

    $sql2 = "UPDATE request SET available = available+$p_qty, requestqty=0 WHERE productcode='$row[productcode]'";
    mysqli_query($conn, $sql2);

    header("Location: defect.php");
    exit();
}