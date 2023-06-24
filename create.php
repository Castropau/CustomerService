<!DOCTYPE html>
<?php
require_once 'dbconn.php';
	require_once 'validate.php';
	require 'name.php';
?>
<html>
  <title>SBIT-3G</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="shortcut icon" href="Logo 2.svg" type="image/svg+xml">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
  background-color: white;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 250px;
  background-color: skyblue;
  position: fixed;
  height: 100%;
  overflow: auto;
  font-weight: bold;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #82b7dc;
  color: black;
}

.sidebar a:hover:not(.active) {
  background-color: whitesmoke;
  color: black;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }

}
form {
			background-color: lightblue;
      border-style: solid;
      border-color: lightblue;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			width: 500px;
			margin: 0 auto;
			margin-top: 50px;
		}
		input[type="text"], input[type="tel"]{
			display: block;
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border: 1px solid #ccc;
			font-size: 16px;
			box-sizing: border-box;
		}
    /* #guest input[type="text"]{
			
		} */
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 5px;
			padding: 10px 20px;
			font-size: 16px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
		h1 {
			text-align: center;
		}
		.person-icon {
  display: flex;
  align-items: center;
  padding: 10px;
  font-size: 20px;
}

.person-icon i {
  margin-right: 10px;
}
.social_media{
  position: absolute;
  
  left: 50%;
  top: 90%;
  height: 50px;
  transform: translateX(-50%);
  display: flex;
}
.payment-details input[readonly] {
  background-color: #eee;
  color: #555;
}
</style>
</head>
<body>
<div class="sidebar">
<div class="date-time">
    <?php date_default_timezone_set('Etc/GMT+8');?>
    <p style='font-size: 16px; font-weight: bold; margin-bottom: 0; text-align: center;'><i class="far fa-calendar-alt"></i> <?php echo date('l, F j, Y'); ?></p>
    <p style='font-size: 16px; text-align: center;' id="clock"><?php echo date('h:i:s A'); ?></p>
  </div>
  <div class="person-icon">
    <i class="fa fa-user"></i>
    <?php echo $name;?>
  </div>
  <!-- <a href="customerservice.php">Guest List Report</a> -->
  <a class="active"href="create.php">Customer Create Account</a>
  <a href="customerlist.php">Customer List</a>
  <!-- <a href="refund.php">Refund</a> -->
  <a  href="replace.php">Product Replace</a>
  <a href="defect.php">Return Defect</a>
  <div class="social_media">          
    <a href="logout.php"><i class="fa fa-sign-out"></i></a>        
  </div>
</div>


  <div class="row">


  <?php

require_once 'dbconn.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    
    // $sql_check = "SELECT * FROM customer WHERE username = '$username'";
    // $result_check = mysqli_query($conn, $sql_check);

    // if (mysqli_num_rows($result_check) > 0) {
       
    //     echo "<script>
    //               window.onload = function() {
    //                   swal('Error', 'Username is already taken. Please choose another one.', 'error');
    //               }
    //           </script>";
    // } else if (strlen($username) < 3) {
        
    //     echo "<script>
    //               window.onload = function() {
    //                   swal('Error', 'Username must be at least 3 characters long.', 'error');
    //               }
    //           </script>";
    // } else {
       
        $id = "";
        do {
          $company_name = "sbit-3g";
          $company_name = strtoupper(substr($company_name, 0, 7));
          $random_letter_number = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
          $id = $company_name . '(' . substr($random_letter_number, 2, 2) . substr($random_letter_number, 4, 2) . ')';
          $sql_check_id = "SELECT * FROM customer WHERE id = '$id'";
          $result_check_id = mysqli_query($conn, $sql_check_id);
      } while (mysqli_num_rows($result_check_id) > 0);

        
        $sql_insert = "INSERT INTO customer (id, firstname, lastname, address, phone) VALUES ('$id',  '$firstname', '$lastname', '$address', '$phone')";

        if (mysqli_query($conn, $sql_insert)) {
           
            echo "<script>
                      window.onload = function() {
                          swal('Account created successfully', 'Your customer ID is $id. Please keep it safe for future reference.', 'success');
                      }
                  </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

?>

<!-- <form method="post" style="max-width: 500px;">
  <h1 style="text-align: center; color: #0099ff;">Create Account Customer</h1>
  
  <label for="guest" style="color: #0099ff; font-weight: bold; font-size: 18px; display: block;">Receipt Number:</label>
  <input type="guest" id="guest" name="guest">
  <button type="button" id="search-button">Search</button>

  <label for="amount" style="color: #0099ff; font-weight: bold; font-size: 18px; display: block;">Amount:</label>
  <input type="text" id="amount" name="amount" required style="padding: 8px; border: 2px solid #ddd; border-radius: 5px; background-color: #eee; color: #555;"
  oninput="enableFields()">

  <label for="firstname" style="color: #0099ff; font-weight: bold; font-size: 18px; display: block;">Firstname:</label>
  <input type="text" id="firstname" name="firstname" disabled>

  <label for="lastname" style="color: #0099ff; font-weight: bold; font-size: 18px; display: block;">Lastname:</label>
  <input type="text" id="lastname" name="lastname" disabled>

  <label for="address" style="color: #0099ff; font-weight: bold; font-size: 18px; display: block;">Address:</label>
  <input type="text" id="address" name="address" disabled>

  <label for="phone" style="color: #0099ff; font-weight: bold; font-size: 18px; display: block;">Phone Number:</label>
  <input type="tel" id="phone" name="phone" pattern="\b(09|\+639)\d{9}\b" disabled>

  <input disabled type="submit" value="Create Account" style="background-color: #0099ff; color: white; font-weight: bold; font-size: 18px; padding: 8px; border: none; border-radius: 5px; margin-top: 20px;">
</form> -->
<form method="post" style="max-width: 500px; ">
  <h1 style="text-align: center; color: black;">Create Account Customer</h1>
  
  <div class="form-group">
    <label for="guest" style="color: black; font-weight: bold; font-size: 18px;">Receipt Number:</label>
    <div class="input-group">
      <input type="guest" id="guest" name="guest" class="form-control">
      <span class="input-group-btn">
        <button type="button" id="search-button" class="btn btn-default">Search</button>
      </span>
    </div>
  </div>

  <div class="form-group">
    <label for="amount" style="color: black; font-weight: bold; font-size: 18px;">Amount:</label>
    <input type="text" id="amount" name="amount" required class="form-control" readonly>
  </div>

  <div class="form-group">
    <label for="firstname" style="color: black; font-weight: bold; font-size: 18px;">Firstname:</label>
    <input type="text" id="firstname" name="firstname" class="form-control" disabled required>
  </div>

  <div class="form-group">
    <label for="lastname" style="color: black; font-weight: bold; font-size: 18px;">Lastname:</label>
    <input type="text" id="lastname" name="lastname" class="form-control" disabled required>
  </div>

  <div class="form-group">
    <label for="address" style="color: black; font-weight: bold; font-size: 18px;">Address:</label>
    <input type="text" id="address" name="address" class="form-control" disabled required>
  </div>

  <div class="form-group">
    <label for="phone" style="color: black; font-weight: bold; font-size: 18px;">Phone Number:</label>
    <input type="tel" id="phone" name="phone" pattern="\b(09|\+639)\d{9}\b" class="form-control" disabled required>
  </div>

  <input disabled id="btnform" type="submit" value="Create Account" class="btn btn-primary btn-lg" style="background-color: black; font-weight: bold; margin-top: 20px;">
</form>



<!-- <script>
  // Disable input fields for firstname, lastname, address, and phone number initially
  document.getElementById("firstname").disabled = true;
  document.getElementById("lastname").disabled = true;
  document.getElementById("address").disabled = true;
  document.getElementById("phone").disabled = true;

  // Enable input fields for firstname, lastname, address, and phone number if amount input is 1500.00 or above
  document.getElementById("amount").addEventListener("input", function() {
    if (parseFloat(document.getElementById("amount").value) >= 1500.00) {
      document.getElementById("firstname").disabled = false;
      document.getElementById("lastname").disabled = false;
      document.getElementById("address").disabled = false;
      document.getElementById("phone").disabled = false;
    } else {
      document.getElementById("firstname").disabled = true;
      document.getElementById("lastname").disabled = true;
      document.getElementById("address").disabled = true;
      document.getElementById("phone").disabled = true;
    }
  });
</script> -->

        <!-- <script>
  const amountInput = document.getElementById('amount');
  const firstNameInput = document.getElementById('firstname');
  const lastNameInput = document.getElementById('lastname');
  const addressInput = document.getElementById('address');
  const phoneInput = document.getElementById('phone');

  amountInput.addEventListener('input', () => {
    if (amountInput.value >= 1500) {
      firstNameInput.removeAttribute('disabled');
      lastNameInput.removeAttribute('disabled');
      addressInput.removeAttribute('disabled');
      phoneInput.removeAttribute('disabled');
    } else {
      firstNameInput.setAttribute('disabled', true);
      lastNameInput.setAttribute('disabled', true);
      addressInput.setAttribute('disabled', true);
      phoneInput.setAttribute('disabled', true);
    }
  });
</script> -->
<!-- <script>
  const amountInput = document.getElementById('amount');
const firstnameInput = document.getElementById('firstname');
const lastnameInput = document.getElementById('lastname');
const addressInput = document.getElementById('address');
const phoneInput = document.getElementById('phone');

// Disable and add not-allowed cursor to all inputs
firstnameInput.disabled = true;
firstnameInput.style.cursor = 'not-allowed';
lastnameInput.disabled = true;
lastnameInput.style.cursor = 'not-allowed';
addressInput.disabled = true;
addressInput.style.cursor = 'not-allowed';
phoneInput.disabled = true;
phoneInput.style.cursor = 'not-allowed';

// Add input event listener to amount input
amountInput.addEventListener('input', () => {
  const amountValue = parseFloat(amountInput.value);
  if (amountValue > 1500) {
    // If amount is 1500 or more, disable and add not-allowed cursor to all inputs
    firstnameInput.disabled = true;
    lastnameInput.disabled = true;
    addressInput.disabled = true;
    phoneInput.disabled = true;
    firstnameInput.style.cursor = 'not-allowed';
    lastnameInput.style.cursor = 'not-allowed';
    addressInput.style.cursor = 'not-allowed';
    phoneInput.style.cursor = 'not-allowed';
  } else {
    // If amount is less than 1500, enable all inputs and remove not-allowed cursor
    firstnameInput.disabled = false;
    lastnameInput.disabled = false;
    addressInput.disabled = false;
    phoneInput.disabled = false;
    firstnameInput.style.cursor = 'auto';
    lastnameInput.style.cursor = 'auto';
    addressInput.style.cursor = 'auto';
    phoneInput.style.cursor = 'auto';
  }
});
</script> -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
  document.getElementById('search-button').addEventListener('click', function() {
    var receipt_or = document.getElementById('guest').value;
    var amount_field = document.getElementById('amount');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var amount = this.responseText;
        var fnIn = document.getElementById("firstname");
        var lnIn = document.getElementById("lastname");
        var addIn = document.getElementById("address");
        var phoneIn = document.getElementById("phone");
        var btnform = document.getElementById("btnform");
        if (!isNaN(amount) && amount >= 1500) {
          amount_field.value = amount;
          fnIn.disabled = false;
          lnIn.disabled = false;
          addIn.disabled = false;
          phoneIn.disabled = false;
          btnform.disabled = false;
        } else if (amount === '') {
          fnIn.disabled = true;
          lnIn.disabled = true;
          addIn.disabled = true;
          phoneIn.disabled = true;
          btnform.disabled = true;
          swal('Error', 'No receipt found.', 'error');
        } else {
          amount_field.value = amount;
          fnIn.disabled = true;
          lnIn.disabled = true;
          addIn.disabled = true;
          phoneIn.disabled = true;
          btnform.disabled = true;
          swal('Error', 'Amount is less than 1500 or no amount.', 'error');
        }
      }
    };
    xhttp.open('GET', 'createe.php?receipt_or=' + receipt_or, true);
    xhttp.send();
  });
</script>
<script>
  $(document).ready(function() {
  $('#search-button').click(function() {
    var receipt_or = $('#guest').val();
    $.ajax({
      url: 'createe.php',
      type: 'post',
      data: {receipt_or: receipt_or},
      success: function(response) {
        $('#amount').val(response);
      }
    });
  });
});
  </script>
<!-- <script>

const usernameInput = document.getElementById('username');
const availabilitySpan = document.getElementById('username-availability');


const firstnameInput = document.getElementById('firstname');
const lastnameInput = document.getElementById('lastname');
const addressInput = document.getElementById('address');
const phoneInput = document.getElementById('phone');


firstnameInput.disabled = true;
firstnameInput.style.cursor = 'not-allowed';
lastnameInput.disabled = true;
lastnameInput.style.cursor = 'not-allowed';
addressInput.disabled = true;
addressInput.style.cursor = 'not-allowed';
phoneInput.disabled = true;
phoneInput.style.cursor = 'not-allowed';


firstnameInput.disabled = true;
lastnameInput.disabled = true;
addressInput.disabled = true;
phoneInput.disabled = true;


usernameInput.addEventListener('input', () => {
  if (usernameInput.value === '') {
    
    availabilitySpan.textContent = '';
    firstnameInput.disabled = true;
    lastnameInput.disabled = true;
    addressInput.disabled = true;
    phoneInput.disabled = true;
    firstnameInput.style.cursor = 'not-allowed';
    lastnameInput.style.cursor = 'not-allowed';
    addressInput.style.cursor = 'not-allowed';
    phoneInput.style.cursor = 'not-allowed';
    return;
  }

  
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'check-username.php');
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = () => {
    if (xhr.status === 200) {
      const response = xhr.responseText;
      if (response === 'available') {
        
        availabilitySpan.textContent = '';
        firstnameInput.disabled = false;
        lastnameInput.disabled = false;
        addressInput.disabled = false;
        phoneInput.disabled = false;
        firstnameInput.style.cursor = 'auto';
        lastnameInput.style.cursor = 'auto';
        addressInput.style.cursor = 'auto';
        phoneInput.style.cursor = 'auto';
      } else {
        
        availabilitySpan.textContent = 'Username is not available';
        firstnameInput.disabled = true;
        lastnameInput.disabled = true;
        addressInput.disabled = true;
        phoneInput.disabled = true;
        firstnameInput.style.cursor = 'not-allowed';
        lastnameInput.style.cursor = 'not-allowed';
        addressInput.style.cursor = 'not-allowed';
        phoneInput.style.cursor = 'not-allowed';
      }
    }
  };
  xhr.send(`username=${usernameInput.value}`);
});
</script>
<script>
    $(document).ready(function() {
    $('#username').keyup(function() {
        var username = $(this).val();
        if(username.length >= 3) {
            $.ajax({
                type: 'POST',
                url: 'check-username.php',
                data: { username: username },
                success: function(response) {
                    if(response == 'available') {
                        $('#username-availability').html('<span style="color:green;">Username is available</span><br>');
                    } else {
                        $('#username-availability').html('<span style="color:red;">Username already taken</span><br>');
                    }
                }
            });
        } else {
            $('#username-availability').html('');
        }
    });
});
</script> -->
</div>
<script>
  
  var offset = <?php echo date('Z') ?>;
  
  
  setInterval(function() {
    var date = new Date();
    var localTime = date.getTime();
    var localOffset = date.getTimezoneOffset() * 136500;
    var utcTime = localTime + localOffset;
    var offsetTime = utcTime + (offset * 1000);
    var clockTime = new Date(offsetTime);
    document.getElementById("clock").innerHTML = clockTime.toLocaleTimeString([], {hour: 'numeric', minute: '2-digit', second: '2-digit', hour12: true});
  }, 1000);
</script>

</body>
</html>
