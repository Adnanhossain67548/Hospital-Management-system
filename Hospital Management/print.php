<html>
<head>
<center>
<h3>exam </h3>
</head>
<body>

<h5>
<table border= 1 cellpadding =1 cellspacing =1>
   <tr>
   <th>e_id</th>
   <th>tin_id</th>
   <th>name</th>
   <th>contact</th>
   
   <th>Update</th>
   </tr>
   
   <?php
   //connection
   $con = mysqli_connect('127.0.0.1','root','');
   //databas
   mysqli_select_db($con,'db_exam');
   //select
   $sql =  " select * from tb_exam";
   //execute
   $records=mysqli_query($con,$sql);
   while($row=mysqli_fetch_array($records))
   {
   echo"<tr>";
   echo"<td>".$row['e_id']."</td>";
    echo"<td>".$row['tin_id']."</td>";
	 echo"<td>".$row['name']."</td>";
	  echo"<td>".$row['contact']."</td>";
	 
	  echo "<td><a href=up.php?e_id=".$row['e_id'].">Update</a></td>";
   }
   ?>
   </table>
   </center>
   </h5>
</body>
</html>