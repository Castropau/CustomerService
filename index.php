<!DOCTYPE html>
<html>
<head>
	<title>SBIT-3G</title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<link rel="shortcut icon" href="Logo 2.svg" type="image/svg+xml">

</head>
<style>
   @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;

}
.center{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  background: white;
  border-radius: 10px;
  box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
  opacity: 0.8;
  height: 50%;
}
.center h1{
  text-align: center;
  padding: 20px 0;
  border-bottom: 1px solid silver;
}
.center form{
  padding: 0 40px;
  box-sizing: border-box;
}
form .txt_field{
  position: relative;
  border-bottom: 2px solid #adadad;
  margin: 30px 0;
}
.txt_field input{
  width: 100%;
  padding: 0 5px;
  height: 40px;
  font-size: 16px;
  border: none;
  background: none;
  outline: none;
}
.txt_field label{
  position: absolute;
  top: 50%;
  left: 5px;
  color: #adadad;
  transform: translateY(-50%);
  font-size: 16px;
  pointer-events: none;
  transition: .5s;
}
.txt_field span::before{
  content: '';
  position: absolute;
  top: 40px;
  left: 0;
  width: 0%;
  height: 2px;
  background: #2691d9;
  transition: .5s;
}
.txt_field input:focus ~ label,
.txt_field input:valid ~ label{
  top: -5px;
  color: #2691d9;
}
.txt_field input:focus ~ span::before,
.txt_field input:valid ~ span::before{
  width: 100%;
}
.pass{
  margin: 30px 0;
  color: #a6a6a6;
  cursor: pointer;
}
.pass:hover{
  text-decoration: underline;
}
input[type="submit"]{
  width: 100%;
  height: 50px;
  border: 1px solid;
  background: #2691d9;
  border-radius: 25px;
  font-size: 18px;
  color: #e9f4fb;
  font-weight: 700;
  cursor: pointer;
  outline: none;
}
input[type="submit"]:hover{
  border-color: #2691d9;
  transition: .5s;
}
.image{
  width: 100%;
  height: 100vh;
  background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(2.png);
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}


.fa-solid.fa-eye-slash, .fa-solid.fa-eye {
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 20px;
  color: #666;
  cursor: pointer;
  transition: 0.5s;
}

.fa-solid.fa-eye-slash:hover, .fa-solid.fa-eye:hover {
  color: #333;
}


  </style>
<body>

<?php
 date_default_timezone_set('Asia/Manila');
 $date_now = date('Y-m-d');
session_start();

$servername = "sql985.main-hosting.eu";
$username = "u839345553_sbit3g";
$password = "sbit3gQCU";
$dbname = "u839345553_SBIT3G";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM employee_login WHERE login_id = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedpwd = $row['login_password'];
        
        if (password_verify($password, $hashedpwd)) {
            $employee_id = $row['employee_id'];
            $_SESSION['id'] = $row['id'];
            $stmt = $conn->prepare("SELECT department, department_position FROM employee_details WHERE employee_id = ?");
            $stmt->bind_param("s", $employee_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $details = $result->fetch_assoc();
            $department = $details['department'];
            $department_position = $details['department_position'];
            $checkAttendance = "SELECT * FROM attendance WHERE employee_id = $employee_id AND date = '$date_now' 
    AND (status = 'ONTIME' OR status = 'LATE' OR status = 'VACATION LEAVE')";
$check_Attendance = $conn->query($checkAttendance);

            if ($department_position == "Customer Service Representative 2" && $department == "sales") {
              if($check_Attendance->num_rows > 0)
              {
                $_SESSION['username'] = $username;
                $_SESSION['position'] = $department_position;
                header("Location: create.php");
              }
              else{
 echo "<script>
             Swal.fire({
                icon: 'error',
                title: 'Invalid login',
                text: 'ATTENDANCE KA MUNA.'
             });
            </script>";
              }
               
            }

            elseif ($department_position == "Customer Service Representative 3" && $department == "sales") {
              if($check_Attendance->num_rows > 0)
              {
                $_SESSION['username'] = $username;
                $_SESSION['position'] = $department_position;
                header("Location: create.php");
              }
              else{
 echo "<script>
             Swal.fire({
                icon: 'error',
                title: 'Invalid login',
                text: 'ATTENDANCE KA MUNA.'
             });
            </script>";
              }
               
            }
           
      else {
          echo "<script>
              Swal.fire({
                icon: 'error',
                title: 'Invalid login',
                text: 'You do not have permission to log in.'
              });
            </script>";
      }
        } else {
            echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Invalid password',
                  text: 'Please enter a valid password.'
                });
              </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Invalid username',
                  text: 'Please enter a valid username.'
                });
              </script>";
    }
}
?>

<div class="center">
  <h1>Customer Service</h1>
  <form method="post" action="">
    <div class="txt_field">
      <input type="password" id="username" name="username" placeholder="Enter username">
      <i class="fa-solid fa-eye-slash" id="username-eye" onclick="toggleVisibility('username')"></i>
    </div>
    <div class="txt_field">
      <input type="password" id="password" name="password" placeholder="Enter password">
      <i class="fa-solid fa-eye-slash" id="password-eye" onclick="toggleVisibility('password')"></i>
    </div>
    <input type="submit" name="login" value="Login">
  </form>
</div>
<div class="image">
<img src="logo2.png" alt="Logo" style="position: absolute; top: 0; left: 20px; height: 100px">
</div>
<script>
  function toggleVisibility(fieldId) {
    let field = document.getElementById(fieldId);
    let eyeIcon = document.getElementById(fieldId + "-eye");
    
    if (field.type === "password") {
      field.type = "text";
      eyeIcon.classList.remove("fa-eye-slash");
      eyeIcon.classList.add("fa-eye");
    } else {
      field.type = "password";
      eyeIcon.classList.remove("fa-eye");
      eyeIcon.classList.add("fa-eye-slash");
    }
  }
</script>
</body>
</html>