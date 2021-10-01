<!DOCTYPE html>
<html>
<head>
<title>Informations of Doctors</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #1A2C56;
font-family: monospace;
font-size: 25px;
text-align: center;
}
th {
background-color: #1A2C56;
color: #CCA969;
}
tr:nth-child(even) {background-color: #D1A683}
tr:nth-child(odd) {background-color: #ffe7d4}
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
.doc {background-image: url(aa.jpg);
  background-size:cover;
</style>
</head>
<body class="doc">
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

$sql = "SELECT * FROM tb_doctor";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table border=1>";
	echo "<tr><th>Doctor ID</th><th>Doctor name</th><th>Contact</th><th>Designation</th><th>P_ID</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
        echo "<td>". $row["D_ID"]. "</td><td>" . $row["D_NAME"]. "</td><td>" . $row["Contact"]. "</td><td>" . $row["Designation"]."</td><td>".$row["P_ID"]."</td>
                    
                            </tr>";
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