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
<link rel="shortcut icon" href="Logo 2.svg" type="image/svg+xml">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
  background-color:white;
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
  height: 100px;
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
#myInput {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 40%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  background-color: #99ccff;
  margin: 3px auto;
  transform: translate(40%);
  text-align: center;
}
::placeholder{
    color: black;
    font-family: "Sans-Serif";
    text-transform: uppercase;
    
}
.td:nth-child(even) {
    background-color: white;
}
.table-bordered{
    background-color: #cce6ff;
    
}
.table-responsive{
    max-height: 85vh;
    max-width: 140vh;
   text-align: center;

}
.table-bordered thead tr{
    position: sticky;
    top: -1px;
}
.button2 {
    background-color: #1a75ff;
    text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border: none;
  padding: 15px 70px;
  bottom: 50%;
    }
.social_media{
  position: absolute;
  
  left: 50%;
  top: 90%;
  height: 50px;
  transform: translateX(-50%);
  display: flex;
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
select#filter-select {
  padding: 8px 16px;
  font-size: 16px;
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
  margin-right: 16px;
}
select#filter-select option {
  font-size: 16px;
}
input#myInput {
  padding: 8px 16px;
  font-size: 16px;
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
}
table#table-bordered {
  border-collapse: collapse;
  width: 100%;
  margin-top: 16px;
}

table#table-bordered th, table#table-bordered td {
  border: 1px solid skyblue;
  padding: 8px;
  
}
table#table-bordered th {
  background-color: skyblue;
  color: black;
  text-transform: uppercase;
  text-align: center;
}
button.productinfo {
  padding: 8px 16px;
  font-size: 16px;
  border: none;
  border-radius: 4px;
  background-color: skyblue;
  color: white;
}

button.productinfo:hover {
  background-color: blue;
}
.row{
    display: flex;
    margin-left: 50px;
    align-items: center;
}
#filter-select {
 
  margin: 0 auto;
  text-align: center;
}
input[name="qty"] {
        width: 40px;
        height: 25px;
    }
    .cart {
  position: fixed;
  top: 0;
  left: 73%;
  width: 400px;
  height: 100%;
  background-color: #f2f2f2;
  padding: 10px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  overflow: auto;
  
}

.cart h1 {
  margin-top: 0;
}

.cart-table {
  width: 100%;
}

.cart-buttons {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
  margin-right: 10px;
  margin-left: 10px;
}
#print {
  background-color: blue;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}
#print:hover {
  background-color: #6666ff;
}

#pay {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}
#pay:hover {
  background-color: #3e8e41;
}
#clear-cart{
  background-color: #ff4d4d;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}
#clear-cart:hover{
  background-color: red;
}
.payment-methods {
  margin-bottom: 20px;
}

.payment-methods label {
  font-size: 14px;
  margin-right: 10px;
}
.payment-details {
  margin-bottom: 20px;
}

.payment-details label {
  font-size: 14px;
  margin-right: 10px;
}

.payment-details input[type="number"],
.payment-details input[type="text"] {
  width: 100px;
  margin-right: 10px;
  padding: 5px;
  border: 1px solid #ddd;
}

.payment-details input[readonly] {
  background-color: #eee;
  color: #555;
}
.search-bars input[readonly] {
  background-color: #eee;
  color: #555;
  border: 1px solid #ddd;
  width: 100px;
}
.popup {
position: fixed;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
background-color: white;
border: 1px solid black;
padding: 20px;
box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}
table {

  margin-bottom: 20px;
}
.modall td{
  padding: 5px;
}
th, td {
  padding: 10px;
  border: 1px solid #ccc;
  border-spacing: 5px;
  background-color: white;
}
tfoot td {
  font-weight: bold;
  color: red;
}
.quantity-input {
  width: 60px;
}
.search-bar {
  display: flex;
  align-items: center;
}

.search-bar label {
  margin-right: 10px;
  font-weight: bold;
}
.customer input[type="search"] {
 
  border-radius: 5px;
  padding: 5px 10px;

  outline: none;
  
}
.search-bar input[type="search"] {
  border: 2px solid #ccc;
  border-radius: 5px;
  padding: 5px 10px;
  font-size: 16px;
  outline: none;
  width: 150px;
}

.search-bar input[type="search"]:focus {
  border-color: #007bff;
}
label{
  width: 75%;
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
  <a href="create.php">Customer Create Account</a>
  <a href="customerlist.php">Customer List</a>
  <!-- <a href="refund.php">Refund</a> -->
  <a class="active" href="">Product Replace</a>
  <a href="defect.php">Return Defect</a>
  <div class="social_media">          
    <a href="logout.php"><i class="fa fa-sign-out"></i></a>        
  </div>
</div>


  <div class="row">
  <div class="content">
  <div>
</br>
    <!-- <select id="filter-select">
      <option value="all">All</option>
      <option value="computerparts">Computer Parts</option>
      <option value="clothing">Clothing</option>
      <option value="departmentstore">Department Store</option>
      <option value="hardware">Hardware</option>
      
    </select> -->
   
  </div>
    <div style="background-color: white; font-family: Calibri(body); width: 145vh;"class="col-md-12">
        <div style="width: 150%;"class="panel-body">
            <?php 
                include "dbconn.php";

                $query = "SELECT re.*,pr.size FROM receipt re LEFT JOIN product pr ON re.prod_id=pr.productcode";
                $result = mysqli_query($conn,$query);
            ?>
            <div class="table-responsive">
            <table class="table table-bordered" id="table-bordered">
              <thead>
                <tr style="background-color: #1a8cff; text-transform: uppercase;">
                  <!-- <th width="60">Photo</th> -->
                  <th>Receipt Number</th>
                  <th>Product Name</th>
                  <th>Product ID</th>
                  <th>Quantity</th>
                  <!-- <th>Size</th> -->
                  <th>Replace</th>
                </tr>
              </thead>
              <tbody>
                <?php while($row = mysqli_fetch_array($result)){ 
                  // $photo = $row['photo'];
                  $ornum = $row['ornum'];
                  $productname = $row['productname'];
                  $prod_id = $row['prod_id'];
                  $quantity = $row['quantity'];
                  $id = $row['id'];
                  // $pr_s = $row['size'];
                  ?>
                  <tr class="td">
                    <!-- <td><img src="<?=$photo?>" height="50" width="50"/></td> -->
                    <td><?=$ornum?></td>
                    <td><?=$productname?></td>
                    <td><?=$prod_id?></td>
                    <td><input type="number" name="quantity" value="<?=$quantity?>" style="width: 50px;"></td>
                    <!-- <td><?=$pr_s?></td> -->
                    <td>
              <button data-id="<?=$id?>" class="btn btn-danger replace-row">
              <i class="fas fa-sync-alt"></i>
              </button>
            </td>
          </tr>
    <?php } ?>
    <!-- <tfoot>
      <td colspan="5" style="text-align: center;">
        <button id="requestAll" class="btn btn-primary">Request All</button>
      </td>
    </tfoot> -->
  </tbody>
</table>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Product Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php 
        include "dbconn.php";
        $query = "SELECT * FROM product_sale";
        $result = mysqli_query($conn,$query);
      ?>
      <div>
        <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Search for product">
      </div>
      <div style="height: 300px; overflow-y: auto;">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th>Productcode</th>
              <th>product Name</th>
              <th>Quantity</th>
              <th>Available</th>
              <!-- <th>Size</th> -->
              <th>Replace</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while($row = mysqli_fetch_array($result)){
              $productcode = $row['productcode'];
              $productname = $row['productname'];
              $qty = $row['qty'];
              $repid = $row['id'];
              // $psize = $row['size'];
              ?>
            <tr>
              
              <td><?=$productcode?><input type="hidden" name="" value=""></td>
              <td><?=$productname?></td>
              <td><input type="number" value="1" style="width: 50px;"></td>
              <td><?=$qty?></td>
              <!-- <td><?=$psize?></td> -->
              <td>
                <button data-id="<?=$repid?>" class="btn btn-success save-replace-row">
                  <i class="fas fa-sync-alt"></i>
                </button>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
  function filterTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }

  function searchProduct() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }

  document.getElementById("searchInput").addEventListener("keyup", searchProduct);
});
</script>
<script>
  $(document).ready(function(){
    function filterTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    $("#table-bordered").unbind().on("click", ".replace-row", function() {
  const data_id = $(this).data('id');
  const orgRow = $(this).closest('tr');
  const ornum = orgRow.find('td:nth-child(1)').text();
  // alert(orgRow.find('td:nth-child(1)').text())
  $("#myModal").modal('show');
  
  // //modal event
  $("#myTable tbody").unbind().one("click", ".save-replace-row", function() {
    const modalRow = $(this).closest('tr');
    let repNum = modalRow.find('td:nth-child(1)').text();
    let prodName = modalRow.find('td:nth-child(2)').text();
    let prodQty = modalRow.find('td:nth-child(3) input').val();
    const replaceButton = orgRow.find('.replace-row');
    
    $.ajax({
      url: 'updateReceipt.php',
      data: {
        pid: data_id,
        ornum: ornum,
        prodNum: repNum,
        qty: prodQty,
        prname: prodName
      },
      method: "POST",
      success: function(response) {
        if (response === "success") {
          swal('Updated', 'Success Update.', 'success');
          //replace the original row
          orgRow.find('td:nth-child(2)').text(prodName);
          orgRow.find('td:nth-child(3)').text(repNum);
          orgRow.find('td:nth-child(4) input').val(prodQty);
          replaceButton.prop('disabled', true); // Disable the replace button for the specific row
          localStorage.setItem('replaceButtonDisabled_' + data_id, true); // Store the disabled state in localStorage
        } else if (response === "fail") {
          swal('Failed', "Something went wrong", 'error');
        } else {
          swal('Failed', response, 'error');
        }
      }
    });
    // alert(repNum);
    $("#myModal").modal('hide');
  });
});

// Check the disabled state of the replace button on page load
$(document).ready(function() {
  $('.replace-row').each(function() {
    const replaceButton = $(this);
    const data_id = replaceButton.data('id');
    const isDisabled = localStorage.getItem('replaceButtonDisabled_' + data_id);
    if (isDisabled === 'true') {
      replaceButton.prop('disabled', true);
    }
  });
});
  });
</script>

<!-- <script>
  $(document).ready(function() {
  $('.productinfo').each(function() {
    var product_id = $(this).data('id');
    var button = $(this);
    
    
    button.click(function() {
      $.ajax({
        url: 'process_request.php',
        method: 'POST',
        data: { id: product_id },
        success: function(response) {
          if (response == 'success') {
            swal('Success', 'Product added to request table!', 'success');
            button.prop('disabled', true);
            button.html('<i class="fas fa-check-circle"></i>');
          } else if (response == 'already_added') {
            swal('Error', 'Product already added to request table!', 'error');
          } else {
            swal('Error', 'Product could not be added to request table!', 'error');
          }
        },
        error: function(xhr, status, error) {
          console.log(xhr);
          swal('Error', 'Something went wrong!', 'error');
        }
      });
    });
  });

  $('#requestAll').click(function() {
    $('.productinfo').each(function() {
      var product_id = $(this).data('id');
      var button = $(this);

      $.ajax({
        url: 'process_request.php',
        method: 'POST',
        data: { id: product_id },
        success: function(response) {
          if (response == 'success') {
            button.prop('disabled', true);
            button.html('<i class="fas fa-check-circle"></i>');

            if($('.productinfo:enabled').length == 0) {
              swal('Submitted All', '', 'success');
            }
          }
        }
      });
    });
  });
});
</script> -->
</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <script>
  $(document).ready(function(){
    $(".productinfo").click(function(){
      var id = $(this).data("id");

      $.ajax({
        type: "POST",
        url: "process_request.php",
        data: {id: id},
        success: function(data){
          swal({
            title: "Success!",
            text: "Product added to cart successfully.",
            icon: "success",
          }).then(function() {
            location.reload();
          });
        }
      });
    });
  });
</script> -->
<!-- <script>
$(document).ready(function(){
    $(".productinfo").click(function(){
        var id = $(this).data("id");
        var qty = prompt("Enter quantity:");

        if (qty != null) {
            $.ajax({
                type: "POST",
                url: "process_request.php",
                data: {id: id, qty: qty},
                success: function(data){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Product added to cart successfully.'
                    });
                }
            });
        }
    });
});
</script> -->
<!--- <div class="cart">
  <table class="cart-table">
    <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3"><strong>Total Amount:</strong></td>
        <td colspan="2" id="total-price">₱0.00</td>

      </tr>
    </tfoot>
  </table>
  <div class="payment-details">
    <label for="change">Total Quantity:</label>
    <input type="text" id="totalqty" readonly>
  </div>
  <div class="discount">
  <label for="discount-code">Discount (%):</label>
  <input type="number" id="discount-code" min="0" max="100">
  <button id="apply-discount">Apply</button>
</div>
<div class="payment-methods">
    <label><input type="radio" name="payment-method" value="credit-card">Credit card</label>
    <label><input type="radio" name="payment-method" value="ewallet">E-Wallet</label>
    <label><input type="radio" name="payment-method" value="cash">Cash</label>
  </div>
<div class="search-bars">
<div class="search-bar">
<label for="search-input">Username or ID</label>
  <input type="text" id="search-input" placeholder="Search...">
  <button id="search-button">Find</button>
</div>
<div class="customer">
  <div class="customer-name">
    <div style="display: inline-block">
      <label for="first-name-search-input">First name</label>
      <input type="search" id="first-name-search-input" name="first-name-search" readonly>
    </div>
    <div style="display: inline-block">
      <label for="last-name-search-input">Last name</label>
      <input type="search" id="last-name-search-input" name="last-name-search" readonly>
    </div>
  </div>
</div>
  <div class="search-bars">
    <label for="balance-search-input">Points:</label>
    <input type="text" id="balance" readonly>
    <button id="apply-balance">Apply</button>
  </div>
</div>
  
<div class="payment-details">
  <label for="payment-amount">Payment amount:</label>
  <input type="number" id="payment-amount" min="0" step="0.01"><br>
  <label for="change">Change:</label>
  <input type="text" id="change" readonly>
</div>
  <div class="cart-buttons">
    <button id="clear-cart">Clear</button>
    <button id="pay">Payment</button>
    <button id="print">Print</button>
  </div>
</div> -->
<script>
 $(document).ready(function() {
  $('#search-button').on('click', function() {
    var searchValue = $('#search-input').val();

    if (searchValue.length == 0) {
      swal('Error', 'Please enter a search username or ID.', 'error');
    } else if (searchValue.length >= 3) {
      $.ajax({
        url: 'search.php',
        method: 'POST',
        data: {
          'search': searchValue
        },
        success: function(response) {
        
          var customerData = JSON.parse(response);
          if (customerData.length > 0) {
            var foundMatch = false;
            customerData.forEach(function(customer) {
              if (customer.id.toLowerCase() == searchValue.toLowerCase() ||
                  customer.username.toLowerCase() == searchValue.toLowerCase()) {
                foundMatch = true;
                $('#first-name-search-input').val(customer.firstname);
                $('#last-name-search-input').val(customer.lastname);
              }
            });
            if (!foundMatch) {
              $('#first-name-search-input').val('');
              $('#last-name-search-input').val('');
              swal('Error', 'No customer found.', 'error');
            }
          } else {
            $('#first-name-search-input').val('');
            $('#last-name-search-input').val('');
            swal('Error', 'No customer found.', 'error');
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    } else {
      $('#first-name-search-input').val('');
      $('#last-name-search-input').val('');
      swal('Error', 'Search must be at least 3 characters long.', 'error');
    }
  });
});
  </script>
<!-- <?php

require_once 'dbconn.php';


if (isset($_POST['submit'])) {
  
  $username_id = $_POST['username-search'];

 
  $sql = "SELECT * FROM customer WHERE username='$username_id' OR id='$username_id'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      echo "<script>
              window.onload = function() {
                document.getElementById('first-name-search-input').value = '$firstname';
                document.getElementById('last-name-search-input').value = '$lastname';
              }
            </script>";
    }
  } else {
   
    echo "<script>
            window.onload = function() {
              swal('Error', 'No customer found with the given username or ID.', 'error');
            }
          </script>";
  }
}
?>  -->
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
<script>
document.getElementById('clear-cart').addEventListener('click', clearCart);

function clearCart() {
  const tbody = document.querySelector('.cart-table tbody');
  while (tbody.firstChild) {
    tbody.removeChild(tbody.firstChild);
  }
  document.getElementById('total-price').textContent = '₱0.00';
  document.getElementById('totalqty').value = '';
  document.getElementById('discount-code').value = '';
  document.getElementById('payment-amount').value = '';
  document.getElementById('change').value = '';
  document.getElementById('search-input').value = '';
  document.getElementById('first-name-search-input').value = '';
  document.getElementById('last-name-search-input').value = '';
  document.getElementById('balance').value = '';
  
  cart = [];

  const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
  addToCartButtons.forEach(button => button.disabled = false);

  const inputFields = document.querySelectorAll('input[type="text"]');
  inputFields.forEach(field => field.value = '');

  
  const radioButtons = document.querySelectorAll('input[type="radio"]');
  radioButtons.forEach(button => button.checked = false);
}

  </script>
<script>
 const applyDiscountBtn = document.querySelector("#apply-discount");
applyDiscountBtn.addEventListener("click", applyDiscount);

function applyDiscount() {
  const discountInput = document.querySelector("#discount-code");
  const paymentInput = document.querySelector("#payment-amount");
  const changeInput = document.querySelector("#change");

  const discountPercent = discountInput.value;
  const paymentAmount = paymentInput.value;

  if (discountPercent >= 0 && discountPercent <= 100 && paymentAmount >= 0) {
    const discountAmount = paymentAmount * (discountPercent / 100);
    const finalAmount = paymentAmount - discountAmount;
    changeInput.value = finalAmount >= 0 ? finalAmount.toFixed(2) : 0; 
  } else {
    alert("Please enter a valid discount and payment amount.");
  }
}

$("#pay").click(function() {
  var paymentAmount = Number($("#payment-amount").val());
  var totalPrice = Number($("#total-price").text().replace(/[^0-9.-]+/g,""));
  if (!totalPrice) {
    swal("Invalid", "Your cart is empty.", "error");
    return;
  }
  if (!paymentAmount) {
    swal("Invalid", "Please enter a payment amount.", "error");
    return;
  }
  const discountPercent = Number($("#discount-code").val());
  const discountAmount = totalPrice * (discountPercent / 100);
  const finalAmount = totalPrice - discountAmount;
  if (paymentAmount < finalAmount) {
    swal("Invalid payment amount", "The payment amount is not enough to cover the total.", "error");
    $("#change").val("₱" + 0); 
  } else if (discountPercent > 0 && finalAmount > 0 && paymentAmount >= finalAmount) {
    const change = calculateChange(paymentAmount, totalPrice, discountPercent);
    $("#change").val("₱" + change);
    swal("Payment successful", "Thank you!", "success");
  } else if (discountPercent === 0 && paymentAmount >= totalPrice) {
    const change = calculateChange(paymentAmount, totalPrice, discountPercent);
    $("#change").val("₱" + change);
    swal("Payment successful", "Thank you!", "success");
  } else {
    $("#change").val("");
    swal("Invalid payment amount", "Please enter a valid payment amount.", "error");
  }
});

$("#payment-amount").on("input", function() {
  var paymentAmount = Number($(this).val());
  var totalPrice = Number($("#total-price").text().replace(/[^0-9.-]+/g,""));
  const discountPercent = Number($("#discount-code").val());
  const discountAmount = totalPrice * (discountPercent / 100);
  const finalAmount = totalPrice - discountAmount;
  if (!totalPrice || paymentAmount < finalAmount) {
    $("#change").val("₱" + 0); 
  } else {
    var change = calculateChange(paymentAmount, totalPrice, discountPercent);
    $("#change").val("₱" + change);
  }
});

$("#print").click(function() {
  var totalPrice = Number($("#total-price").text().replace(/[^0-9.-]+/g,""));
  if (!totalPrice) {
    swal("Invalid", "Your cart is empty.", "error");
    return;
  }
  var paymentAmount = Number($("#payment-amount").val());
  if (!paymentAmount) {
    swal("Invalid", "Please enter a payment amount before printing.", "error");
    return;
  }
  const discountPercent = Number($("#discount-code").val());
  const discountAmount = totalPrice * (discountPercent / 100);
  const finalAmount = totalPrice - discountAmount;
  if (paymentAmount < finalAmount) {
    swal("Invalid payment amount", "The payment amount is not enough to cover the total.", "error");
    return;
  }
  var printContents = $(".cart-table").html();

  $("body").html(printContents);
  window.print();
});

function calculateChange(paymentAmount, totalPrice, discountPercent) {
  const discountAmount = totalPrice * (discountPercent / 100);
  const finalAmount = totalPrice - discountAmount;
  return (paymentAmount - finalAmount).toFixed(2);
}
</script>
<script>
$(document).ready(function() {

  var cart = [];

  $(".add-to-cart-btn").click(function() {
    var product = $(this).data("id");
    var productInCart = false;
    $.each(cart, function(index, item) {
      if (item.id === product) {
        productInCart = true;
        return false;
      }
    });

    if (productInCart) {
     
      swal("Product already added", "This product is already in your basket.", "warning");
    } else {
    
      var productName = $(this).closest("tr").find("td:eq(2)").text();
      var productQty = $(this).closest("tr").find("input[name=qty]").val();
      var productPrice = $(this).closest("tr").find("td:eq(4)").text();
      var numericPrice = Number(productPrice.replace(/[^0-9.-]+/g,""));
      var subtotal = numericPrice * productQty;
      var item = {
        id: product,
        name: productName,
        qty: productQty,
        price: numericPrice,
        subtotal: subtotal
      };

    
      cart.push(item);

   
      updateCartTable();
    }
  });

  
  $("#clear-cart").click(function() {
    
    cart = [];

   
    updateCartTable();

 
    $("#payment-amount").val("");
    $("#change").val("");
  });

  function updateCartTable() {
  
  }


  
  $("#clear-cart").click(function() {
    
    cart = [];

   
    updateCartTable();
  });

  function updateCartTable() {
  
  }

  $(".cart-table").on("click", ".remove-product-btn", function() {
    var index = $(this).closest("tr").index();
    cart.splice(index, 1);
    updateCartTable();
  });

  function updateCartTable() {
 
  $(".cart-table tbody").empty();

  var totalQty = 0;
  var totalPrice = 0;
  $.each(cart, function(index, item) {
    var rowHtml = "<tr>";
    rowHtml += "<td>" + item.name + "</td>";
    rowHtml += "<td>" + formatPrice(item.price) + "</td>";
    rowHtml += "<td><input type='number' class='quantity-input' min='1' value='" + item.qty + "' data-index='" + index + "'></td>";
    rowHtml += "<td class='subtotal'>" + formatPrice(item.subtotal) + "</td>";
    rowHtml += "<td><button class='remove-product-btn' data-index='" + index + "'><i class='fa-sharp fa-solid fa-circle-xmark'></i></button></td>";
    rowHtml += "</tr>";
    $(".cart-table tbody").append(rowHtml);
    totalQty += Number(item.qty);
    totalPrice += item.subtotal;
  });

  
  $(".quantity-input").on("change", function() {
    var index = $(this).data("index");
    var newQty = $(this).val();
    cart[index].qty = newQty;
    cart[index].subtotal = cart[index].price * newQty;
    updateCartTable();
  });

  $(".remove-product-btn").on("click", function() {
    var index = $(this).data("index");
    cart.splice(index, 1);
    updateCartTable();
  });

$(document).on("change", ".quantity-input", function() {
  var quantity = $(this).val();
  var price = $(this).closest("tr").find("td:eq(1)").text();
  var subtotal = formatPrice(Number(quantity) * parseFloat(price.replace(/[^0-9.-]+/g,"")));
  $(this).closest("tr").find(".subtotal").text(subtotal);
  calculateTotal();
  var total = calculateTotal();
  var finalAmount = formatPrice(total);
  $('#total-price').text(finalAmount);
});

function calculateTotal() {
  var total = 0;
  $('.subtotal').each(function() {
    var subtotal = $(this).text();
    total += parseFloat(subtotal.replace(/[^0-9.-]+/g,""));
  });
  return total;
}

function formatPrice(price) {
  return "₱" + price.toFixed(2);
}
    $("#total-price").text(formatPrice(totalPrice));
    $("#totalqty").val(totalQty);
  }

 
  function formatPrice(price) {
    return "₱" + price.toFixed(2);
  }
});
</script>
<script type="text/javascript">
$(document).ready(function(){  
      $('#table-bordered').DataTable();  
 }); 
</script>
<!-- <script type='text/javascript'>
            $(document).ready(function(){  
  $('#table-bordered').DataTable();  
  $(document).on('click', '.productinfo', function(){
    var product = $(this).data('id');
    $.ajax({
      url: 'details.php',
      type: 'post',
      data: {product: product},
      success: function(response){ 
        $('.modal-body').html(response); 
        $('#productModal').modal('show'); 
      }
    });
  });
});
</script> -->
 
</body>
</html>
