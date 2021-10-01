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
          color: #D1A683;
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
        span{
            color:#fff ;
            font-size:30px;
        }
</style>
</head>
<body>
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

     <span>Search Patitent</span>
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By PATIENT ID.." title="Type in a name">
      <input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search By Name.." title="Type in a name">

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

$sql = "SELECT a.P_ID,a.P_Name,b.D_Name,c.Sample_Name,a.Contact,a.Disease,d.Bill_Status FROM tb_patient a INNER JOIN tb_doctor b on a.P_ID= b.P_ID join tb_pathology c on a.P_ID=c.P_ID JOIN tb_bill d on  a.P_ID= d.P_ID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table border=1 id='myTable'>";
	echo "<tr><th>Patient ID</th><th>Patient Name</th><th>Doctor Name</th><th>Pathology Name</th><th>Contact</th><th>Disease</th><th>Bill Status</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
        echo "<td>". $row["P_ID"]. "</td><td>" . $row["P_Name"]. "</td><td>" . $row["D_Name"]. "</td><td>" . $row["Sample_Name"]."</td><td>".$row["Contact"]."</td><td>". $row["Disease"]. "</td><td>".$row["Bill_Status"]."</td>";
	echo "</tr>";
    }
echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 
<script>
        function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <script>
        function myFunction1() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput1");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

<br><br><br><br><br>

</article>
</body>
</html>