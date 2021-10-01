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

$sql = "SELECT a.P_ID,
a.P_NAME,
a.Age,
b.D_NAME,
c.Sample_Name,
a.Contact,
a.Disease,
d.Bill_Status
 FROM tb_patient a 
 LEFT JOIN tb_doctor b on a.P_ID= b.P_ID 
 LEFT JOIN tb_pathology c on a.P_ID=c.P_ID 
 LEFT JOIN tb_bill d on  a.P_ID= d.P_ID";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

?> 
<!DOCTYPE html>
<html>
<head>
<title>Details of Patient</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #
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

  #myInput {
            
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 30%;
            font-size: 12px;
            padding: 10px 12px 8px 25px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        #myInput1 {
        
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 30%;
            font-size: 12px;
            padding: 10px 12px 8px 25px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }
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
.view {background-image: url(aa.jpg);
  background-size:cover;

</style>
</head>
<body class="view">
    <body>
    <div class="dd">
     IBN SINA  Hospital Management System <br>
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
    <div class="table"><div id="printableArea">
    	<h1 style="color:green;font-size:20px;font-family:cursive;"><center>IBN SINA Hospital LTD<br>Dhaka,Bangladesh<br> Patient Information </center></h1>
            <table border="1">
                <tr>
                    <th>Patient ID</th><th>Patient Name</th><th>Doctor Name</th><th>Pathology Name</th><th>Contact</th><th>Disease</th><th>Bill Status</th>
                </tr>
      <!-- populate table from mysql database -->
                <?php  while($row = mysqli_fetch_assoc($result)):?>
                <tr>
                    <td><?php echo $row['P_ID'];?></td>
                    <td><?php echo $row['P_NAME'];?></td>
                    <td><?php echo $row['D_NAME'];?></td>
                    <td><?php echo $row['Sample_Name'];?></td>
                    <td><?php echo $row['Contact'];?></td>
                    <td><?php echo $row['Disease'];?></td>
                    <td><?php echo $row['Bill_Status'];?></td>
                </tr>
                <?php endwhile;?>
            </table> </div>
<br>
<center> <input type="button" onclick="printDiv('printableArea')" value="print"/></center>
</article>
<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
    </script>

</body>
</html>