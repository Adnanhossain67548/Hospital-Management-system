<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    $query = "SELECT a.P_ID,a.P_Name,b.D_Name,c.Sample_Name,a.Contact,a.Disease,d.Bill_Status FROM tb_patient a INNER JOIN tb_doctor b on a.P_ID= b.P_ID join tb_pathology c on a.P_ID=c.P_ID JOIN tb_bill d on a.P_ID= d.P_ID WHERE a.P_ID='".$valueToSearch."' AND b.P_ID='".$valueToSearch."' AND c.P_ID='".$valueToSearch."' AND d.P_ID='".$valueToSearch."' ";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT a.P_ID,a.P_Name,b.D_Name,c.Sample_Name,a.Contact,a.Disease,d.Bill_Status FROM tb_patient a INNER JOIN tb_doctor b on a.P_ID= b.P_ID join tb_pathology c on a.P_ID=c.P_ID JOIN tb_bill d on a.P_ID= d.P_ID";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "db_hospital1");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> SEARCH</title>
        <style>
        	input[type=text] {
         width: 130px;
         box-sizing: border-box;
         border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        background-position: 10px 10px; 
        background-repeat: no-repeat
        padding: 12px 20px 12px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
         }

            input[type=text]:focus {
              width: 100%;
             }
            table,tr,th,td
            {
                border: 1px solid black;
            }
            table {
border-collapse: collapse;
width: 100%;
color: #fccf0d;
font-family: monospace;
font-size: 25px;
text-align: center;
}
th {
background-color: #00FF2;
color: #00FF2A;
}
tr:nth-child(even) {background-color:  #2a2927}
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
        span{
            color:#fff ;
            font-size:30px;
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
        
        <form action="search1.php" method="post"> <center>
            <input type="text" name="valueToSearch" placeholder="Search By ID"><br><br>
            <input type="submit" name="search" value="SEARCH"><br><br>
            
            <table>
                <tr>
                    <th>Patient ID</th><th>Patient Name</th><th>Doctor Name</th><th>Pathology Name</th><th>Contact</th><th>Disease</th><th>Bill Status</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['P_ID'];?></td>
                    <td><?php echo $row['P_Name'];?></td>
                    <td><?php echo $row['D_Name'];?></td>
                    <td><?php echo $row['Sample_Name'];?></td>
                    <td><?php echo $row['Contact'];?></td>
                    <td><?php echo $row['Disease'];?></td>
                    <td><?php echo $row['Bill_Status'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form> <br><BR>
        
    </body>
</html>