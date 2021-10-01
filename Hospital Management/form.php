<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/home1_style.css">
</head>
<body>
	<div id="header">
  <h3>IBN SINA HOSPITAL MANAGEMENT SYSTEM</h3>
</div>

<div class="navbar">
     
      <div class="subnav">
        <button class="subnavbtn"><a href="home2.php">Home<i class="fa fa-caret-down"></i></button>
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
              <a href="final1.php">Patient Details</a>
              <br>
              <a href="doctor.php">Doctor's Details</a>
              <br>
              <a href="conn.php">Patient Information Data</a>
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
        <button class="subnavbtn">Register<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
                <a href="form.php">Appoint New Patient</a>
                <br>
                <a href="#">Register New Doctor</a>
                <br>
                
            </div>
      </div>
        <div class="subnav">
        <button class="subnavbtn">Contact Us<i class="fa fa-caret-down"></i></button>
      </div>
  </div>
</div>

<center>
<h2>New Patient Appoint</h2>
<form action="fcon.php">
  Patient Id:
  <input type="integer" name="P_ID">
  <br><br>
  Patient Name:
  <input type="text" name="P_NAME">
  <br><br>
  Patient Age:
  <input type="integer" name="Age">
  <br><br>
  Patient Contact:
  <input type="integer" name="Contact">
  <br><br>
  Patient Address:
  <input type="integer" name="Address">
  <br><br>
  Patient Disease:
  <input type="text" name="Disease">
  <br><br>
  <br><br>
  <input type="submit" value="Submit">
</form> 
</center>


</body>
</html>