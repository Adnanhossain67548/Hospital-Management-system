<?php

$link = mysqli_connect("localhost", "root", "", "db_hospital1");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$id = mysqli_real_escape_string($link, $_REQUEST['P_ID']);
$name = mysqli_real_escape_string($link, $_REQUEST['P_NAME']);
$age = mysqli_real_escape_string($link, $_REQUEST['Age']);
$contact = mysqli_real_escape_string($link, $_REQUEST['Contact']);
$address = mysqli_real_escape_string($link, $_REQUEST['Address']);
$disease = mysqli_real_escape_string($link, $_REQUEST['Disease']);
 
// Attempt insert query execution
$sql = "INSERT INTO tb_patient (P_ID, P_NAME,Age,Contact,Address,Disease) VALUES ('$id', '$name', '$age', '$contact','$address', '$disease')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>