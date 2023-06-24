<?php


function isAlreadyReplaced($conn, $pid, $ornum)
{
  $stmt = $conn->prepare("SELECT * FROM receipt WHERE prod_id = ? AND ornum = ?");
  $stmt->bind_param("ss", $pid, $ornum);
  $stmt->execute();
  $result = $stmt->get_result();
  return $result->num_rows > 0;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pid = $_POST['pid'];
  $ornum = $_POST['ornum'];


  $servername = "localhost";
  $username = "root";
$password = "";
$dbname = "sale";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$already_replaced = isAlreadyReplaced($conn, $pid, $ornum);


$conn->close();

if ($already_replaced) {
    echo "already_replaced";
    } else {
    echo "not_replaced";
    }
    } else {
    http_response_code(405);
    }
    ?>