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
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css" /> -->
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
  <a  href="replace.php">Product Replace</a>
  <a class="active"href="defect.php">Return Defect</a>
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
            $query = "SELECT pr.*, req.requestqty, d.message FROM product_sale pr 
            LEFT JOIN request req ON pr.productcode=req.productcode 
            LEFT JOIN defect d ON pr.productcode=d.productcode 
            WHERE qty";
            $result = mysqli_query($conn, $query);
          ?>
            <div class="table-responsive">
            <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#flipFlop">
            Click Me
            </button> -->

            <!-- The modal -->
            <div class="modal fade" data-backdrop="static" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Receiving Request</h4>
                  </div>
                  <div id="modal-data-content" class="modal-body">
                  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <table class="table table-bordered" id="table-bordered">
              <thead>
                <tr style="background-color: #1a8cff; text-transform: uppercase;">
                  <th width="60">Photo</th>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Available</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Reason</th>
                  <th>Category</th>
                  <th>Supplier</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php while($row = mysqli_fetch_array($result)){ ?>
                  <tr class="td">
                    <td><img src="<?php echo $row['photo']; ?>" height="50" width="50"/></td>
                    <td><?php echo $row['productcode']; ?></td>
                    <td><?php echo $row['productname']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td>
                      <?php
                        if(!is_null($row['requestqty']) && $row['requestqty'] > 0)
                        {
                          echo '<input class="prod_qty form-control" type="number" name="qtyy" value="'.$row['requestqty'].'">';
                        }
                        else
                        {
                          echo '<input class="prod_qty form-control" type="number" name="qtyy" value="1">';
                        }
                      ?>
                    </td>
                    <td> <!-- new column for reason of return -->
                    <!-- <textarea class="form-control" name="reason"></textarea> -->
                    <?php
    if(!is_null($row['message']) && $row['message'] != '')
    {
      echo '<textarea class="form-control" name="reason">'.$row['message'].'</textarea>';
    }
    else
    {
      echo '<textarea class="form-control" name="reason"></textarea>';
      
    }
  ?>
                    
        </td>
       <td> <input class="form-control" placeholder="Supplier" name="category" value="<?php echo $row['category']; ?>" required></td>
       <td> <input class="form-control" placeholder="Supplier" name="supplier" value="<?php echo $row['supplier']; ?>" required></td>
        <td>
        <input class="form-control" placeholder="Supplier" name="status" value="Pending" requrired>
        </td>
                    <td>
                      <?php
                        if(!is_null($row['requestqty']) && $row['requestqty'] > 0)
                        {
                          // echo '<button class="productinfo btn btn-success disabled">
                          // <i class="fas fa-check-circle"></i>
                          // </button>';
                          echo '<button data-id="'.$row['id'].'" class="productinfo btn btn-primary">
                          <i class="fas fa-paper-plane"></i>
                        </button>';
                        }
                        else
                        {
                          echo '<button data-id="'.$row['id'].'" class="productinfo btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                          </button>';
                        }
                      ?>
                      
                    </td>
                  </tr>
                <?php } ?>
                <!-- <tfoot>
                  <td colspan="6" style="text-align: center;">
                    <button id="requestAll" class="btn btn-primary">Request All</button>
                  </td>
                </tfoot> -->
              </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<!-- <form class="" action="#">
                    <div class="form-group">
                      <input type="number" name="asd" class="form-control" placeholder="Quantity Received">
                    </div>
                    <button type="submit" class="btn btn-default" name="submi">Submit</button>
                  </form> -->
                  <script type="text/javascript">
$(document).ready(function(){  
      $('#table-bordered').DataTable();  
 }); 
</script>
<script>
  $(document).ready(function() {

   
    $('.productinfo').each(function() {
      var product_id = $(this).data('id');
      var button = $(this);

   
      function handleButtonClick() {
        var qty = $(this).closest("tr").find(".prod_qty").val();
        var reason = $(this).closest("tr").find("textarea[name='reason']").val();
        var status = $(this).closest("tr").find("input[name='status']").val();
        var category = $(this).closest("tr").find("input[name='category']").val();
        var supplier = $(this).closest("tr").find("input[name='supplier']").val();
        $.ajax({
          url: 'return_process.php',
          method: 'POST',
          data: { 
            id: product_id,
            qty:qty,
            reason:reason,
            status:status,
            category:category,
            supplier: supplier,
          },
          success: function(response) {
            if (response == 'success') {
              swal('Success', 'Product added to request table!', 'success');
              
              // button.removeClass('productinfo btn-success').addClass('btn-primary mmmm')
              //   .attr('data-toggle', 'modal').attr('data-target', '#flipFlop')
              //   .find('i').removeClass('fas fa-paper-plane').addClass('far fa-arrow-alt-circle-down');

           
              // button.off('click', handleButtonClick); 
              // button.on('click', function() {
              
              //   const p_id = $(this).data('id');
              //   var pqty = $(this).closest("tr").find(".prod_qty").val();
              //   var reason = $(this).closest("tr").find("textarea[name='reason']").val();
              //   $("#modal-data-content").html(`<form class="" action="update-defect.php" method="POST">
              //           <input type="hidden" name="p_id" value="${p_id}">
              //           <div class="form-group">
              //             <label>Quantity Received</label>
              //             <input type="number" name="p_qty" class="form-control" value="${pqty}" placeholder="Quantity Received">
              //           </div>
              //           <div class="form-group">
              //             <label>Reason of Return</label>
              //             <textarea name="reason" class="form-control" placeholder="Quantity Received" rows="${reason.length > 40 ? '2' : '1'}" readonly>${reason}</textarea>
              //           </div>
                       
              //           <button type="submit" class="btn btn-default" name="receive-btn">Submit</button>
              //         </form>`);
              // });
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
      }

      
      button.click(handleButtonClick);
    });

    $(".mmmmm").on('click', function() {
     
      const p_id = $(this).data('id');
      var pqty = $(this).closest("tr").find(".prod_qty").val();
      $("#modal-data-content").html(`<form class="" action="update-defect.php" method="POST">
              <input type="hidden" name="p_id" value="${p_id}">
              <div class="form-group">
                <label>Quantity Received</label>
                <input type="number" name="p_qty" class="form-control" value="${pqty}" placeholder="Quantity Received">
              </div>
              <button type="submit" class="btn btn-default" name="receive-btn">Submit</button>
            </form>`);
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
</script>


</body>
</html>
