<!DOCTYPE html>
<html>
<head>
<title>Details of Patient</title>
  <link rel="stylesheet" type="text/css" href="CSS/final1_style.css">

</head>
<body>
    <body>
        <div id="header">
  <h3>IBN SINA HOSPITAL MANAGEMENT SYSTEM</h3>
</div>
    <div class="navbar">
     
      <div class="subnav">
        <button class="subnavbtn">Home<i class="fa fa-caret-down"></i></button>
      </div>

        <div class="subnav">
            <button class="subnavbtn">About Us<i class="fa fa-caret-down"></i></button>
              <div class="subnav-content">
                <a href="#">About Ibn Sina Trust</a>
                <br>
                  <a href="#">Mission And Vission</a>
                  <br>
                <a href="#">Welfare Activities</a>
              </div>
        </div> 
        <div class="subnav">
          <button class="subnavbtn">View<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
              <a href="conn.php">Patient Details</a>
              <br>
              <a href="doctor.php">Doctor's Details</a>
            </div>
        </div> 
        
        <div class="subnav">
          <button class="subnavbtn">Search Patient Info<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <a href="search1.php">ID Wise</a>
                <br>
                <a href="name.php">Name Wise</a>
            </div>
        </div>
        <div class="subnav">
          <button class="subnavbtn">Find a Doctor<i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <a href="search1.php">Search By ID Wise</a>
                <br>
                <a href="name.php">Search By Name Wise</a>
                <br>
                <a href="name.php">Search By Department Wise</a>
            </div>
        </div>
        <div class="subnav">
        <button class="subnavbtn">Report<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
                <a href="report.php">Patient details</a>
                <br>
                <a href="name.php">Bill status</a>
                <br>
                
            </div>
      </div>

        <div class="subnav">
        <button class="subnavbtn">Contact Us<i class="fa fa-caret-down"></i></button>
      </div>
  </div>
</div>
    <br><br><br>
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