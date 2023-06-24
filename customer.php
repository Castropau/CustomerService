<?php
include "dbconn.php";
 
$id = $_POST['customer'];
 
$sql = "SELECT * FROM customer WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>

<table class="modall" style="border:0; width:100%; background-color: #f2f2f2;">
<tr>
    
    <td style="padding:20px; text-align:center;">
    <p>ID : <?php echo $row['id']; ?></p>
    <p>Firstname : <?php echo $row['firstname']; ?></p>
    <p>Lastname : <?php echo $row['lastname']; ?></p>
    <p>Phone : <?php echo $row['phone']; ?></p>
    <?php if (strlen($row['address']) > 40) { ?>
        <p>Address :</p>
        <p><?php echo preg_replace('/\s+/', ' ', wordwrap($row['address'], 40, " \n", true)); ?></p>
    <?php } else { ?>
        <p>Address : <?php echo $row['address']; ?></p>
    <?php } ?>
    </td>
</tr>
</table>


 
<?php } ?>
