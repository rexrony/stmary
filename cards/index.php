<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
   <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true, 
	  yearRange : 'c-90:c+2'
    });
  });
  </script>
<script src="js/main_script.js"></script>
	<title>St Patrick's Church</title>
	
	<?php
$servername = "localhost";
$username = "stmarysh_ron";
$password = "6y3c8x1ht3";
$dbname = "stmarysh_cards";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?> 
</head>

<body>
<?php
// sql to create table
/*$sql = "CREATE TABLE parishernor_record (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
dob VARCHAR(50),
address varchar(250),
telphone int(13)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table parishernor_record created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}*/
mysqli_close($conn);
?>
<div class="container">
<div class="wrapper">

<div class="data-entry">
<h2>Data Entry</h2>
</div>

<div class="cards_con"> 
<form class="cards_con_form" action="#" name="card_form">
<div class="add-left lft">
<div class="input-group">
     <input type="text" placeholder="Name" name="first_name" />
  </div>
  <div class="input-group">
    <input type="text" placeholder="Father / Husband" name="last_name" />
  </div>
   <div class="input-group">
    <input type="text" placeholder="Date Of Birth" name="dob" id="datepicker" />
  </div>
</div>
<div class="add-right rht">
 <div class="input-group">
 <textarea cols="40" rows="10"  placeholder="Address"></textarea>
 
  </div>
</div>

</form>
</div><!--Cards_con-->
</div>
</div>
</body>
</html>