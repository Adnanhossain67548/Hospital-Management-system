<?php
 
require('db.php');
$id=$_REQUEST['id'];
$query = "SELECT * from tb_patient where P_ID='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Patient Information</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<style>
   .form{width: 300px; margin: 0 auto;}
   input[type='submit']{padding: 10px 25px 8px; color: #fff; background-color: #0067ab; text-shadow: rgba(0,0,0,0.24) 0 1px 0; font-size: 16px; box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0; border: 1px solid #0164a5; border-radius: 2px; margin-top: 10px; cursor:pointer;}
     input[type='submit']:hover {background-color: #024978;}
</style>
<body>
<div class="form">
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$P_NAME =$_REQUEST['P_NAME'];
$Age =$_REQUEST['Age'];
$Contact = $_REQUEST['Contact'];
$Address = $_REQUEST['Address'];
$Disease = $_REQUEST['Disease'];
$update="Update tb_patient set P_NAME='".$P_NAME."', Age='".$Age."', Contact='".$Contact."', Address='".$Address."',Disease='".$Disease."'  where P_ID='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='conn.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="P_ID" type="hidden" value="<?php echo $row['id'];?>" />
<p>Name:<input type="text" name="P_NAME" placeholder="Enter Name" required value="<?php echo $row['P_NAME'];?>" /></p>
<p>Age:<input type="text" name="Age" placeholder="Enter Age" required value="<?php echo $row['Age'];?>" /></p>
<p>Contact:<input type="text" name="Contact" placeholder="Enter Contact" required value="<?php echo $row['Contact'];?>" /></p>
<p>Address:<input type="text" name="Address" placeholder="Enter Address" required value="<?php echo $row['Address'];?>" /></p>
<p>Disease:<input type="text" name="Disease" placeholder="Enter Disease" required value="<?php echo $row['Disease'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

<br /><br /><br /><br />
</div>
</div>
</body>
</html>