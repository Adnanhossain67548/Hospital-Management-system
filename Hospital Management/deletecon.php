<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "db_hospital1";

$conn = new mysqli($hostname,$username,$password,$dbname);
if($conn->connect_error) {
		    die("Connection Fail".$conn->connect_error);
		}
		$id = $_GET["id"];
$sql = "DELETE FROM `tb_patient` WHERE `tb_patient`.`P_ID` = '$id'";
if ($conn->query($sql) == TRUE) {
    header('Location:conn.php');
} else {
         echo "<center><h2>Problem To DELETE</h2></center>";
}

?>