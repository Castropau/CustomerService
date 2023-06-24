<?php
if(!isset($_SESSION))
  session_start();
  require 'dbconn.php';
   
    $query = $conn->query("SELECT first_name FROM employees WHERE id = (SELECT employee_id FROM employee_login WHERE id = '{$_SESSION['id']}')") or die(mysqli_error($conn));
    $fetch = $query->fetch_array();
    $name = $fetch['first_name'];
  
?>