<?php
// date_default_timezone_set('Asia/Manila');
// $cur_year = date('Y');//get current year
// $conn = new mysqli('localhost','root','','sale');
$conn = new mysqli('sql985.main-hosting.eu','u839345553_sbit3g','sbit3gQCU','u839345553_SBIT3G');
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}
// $year = date("FY");//monthyear
// $orgTbl = "db_user";//must be original table for reference
// // Check if the table for the current year exists
// $table_name = $orgTbl . $year;//palitan to table_ to name of table
// $sql = "SHOW TABLES LIKE '$table_name'";
// $result = $conn->query($sql);

// if ($result->num_rows == 0) {
//   // If the table for the current year doesn't exist, create a new table
//   $sql = "CREATE TABLE $table_name LIKE $orgTbl";//palitan to table_ to name of table
//   if ($conn->query($sql) === TRUE) {
//     echo "Table $table_name created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
//   }
// } else {
//   echo "Table $table_name already exists";
// }






// $year = date("FY");//monthyear
// $orgTbl = "db_user";//must be original table for reference

// // Get all table names in the database
// $sql = "SHOW TABLES";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // Traverse through each table and check if the table for the current year exists
//     while ($row = $result->fetch_array()) {
//         $table_name = $row[0];
//         $table_name_year = $orgTbl . $year;//palitan to table_ to name of table

//         // Check if the table for the current year exists
//         if ($table_name === $table_name_year) {
//             echo "Table $table_name already exists\n";
//         } else {
//             // If the table for the current year doesn't exist, create a new table
//             $new_table_name = $table_name . '_' . $year;//palitan to table_ to name of table
//             $sql = "CREATE TABLE $new_table_name LIKE $table_name";

//             if ($conn->query($sql) === TRUE) {
//                 echo "Table $new_table_name created successfully\n";
//             } else {
//                 echo "Error creating table: " . $conn->error;
//             }
//         }
//     }
// } else {
//     echo "There are no tables in the database";
// }
?>