<!DOCTYPE html>
<html>
<head>
<title>Informations of Patients</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #fccf0d;
font-family: monospace;
font-size: 25px;
text-align: center;
}
th {
background-color: #fccf0d;
color: #2a2927;
}
tr:nth-child(even) {background-color:  #4a4a4a}
tr:nth-child(odd) {background-color:  #2a2927}
.dd{
           padding: 20px;
          color: #FC766AFF;
          text-align:center;
          font-size: 30px;
          background-color: #5B84B1FF;
        }
        li a, .dropbtn {
    display: inline-block;
    color: #F4B41A;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #008BB0;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 40px;
    box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: #2582A1;
    padding: 10px 14px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #FDB931}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
<body>
    <div class="dd">
     IBN SINA Hospital Management System <br>
     <li class="dropdown">
    <a  href="home2.php" class="dropbtn">Home</a>
    </li>
     <li class="dropdown">
    <a  href="javascript:void(0)" class="dropbtn">View</a>
    <div class="dropdown-content">
      <a href="conn.php">Patients Information Data</a>
      <a href="doctor.php">Doctors Information Data</a>
      <a href="final.php">Patient Details</a>
    </div>
  </li>
  <li class="dropdown">
    <a  href="javascript:void(0)" class="dropbtn">Search</a>
    <div class="dropdown-content">
      <a href="search1.php">Search By Patient ID</a>
      <a href="name.php">Search By Patient Name</a>
  </li>
     </div> <br> 
<article class="article">
    <br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_hospital1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tb_patient";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table border=1>";
	echo "<tr><th>P_ID</th><th>P_Name</th><th>Age</th><th>Contact</th><th>Address</th><th>Disease</th><th>Action</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
        echo "<td>". $row["P_ID"]. "</td><td>" . $row["P_NAME"]. "</td><td>" . $row["Age"]. "</td><td>" . $row["Contact"]."</td><td>".$row["Address"]."</td><td>".$row["Disease"]."</td><td>"."<a href='update.php?id=".$row["P_ID"]."'>Update</a>"."/"."<a href='deletecon.php?id=".$row["P_ID"]."'>Delete</a>"."</td></tr>";
	echo "</tr>";
    }
echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 

<br><br><br><br><br>

</article>
</body>
</html>