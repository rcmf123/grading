<?php

?>
   
<html>
<head>
 <STYLE type="text/css">
 .grades{
  margin-left: 200px;
  width: 1000px;
  height: 500px;
  background-color: gray;
  position: static;
  <style type="text/css">
body {
  width:800px;
  border:red 1px solid;
  border-style:dashed;
  margin:auto;
  padding:10px;
}
td {
  text-align:center;
  padding:10px;
}
table {
  margin:auto;
  border:blue 1px solid;
}
label {
  font-size:18px;
  color:blue;
    font-weight: bold;
    font-family: cursive;
}
h2 {
  color:red;
  text-align:center;
}
th {
  color:red;
  font-size:20px;
    font-family: cursive;
}

</STYLE>
</head>
<body>
<?php include 'header.html';?>
<?php include 'nav.html';?>
<div class="grades">
  <h1>Software Engineering</h1>
  <table border="1" cellspacing="5" cellpadding="5" width="100%">
  <thead>
    <tr>
      <th>Student Number</th>
      <th>Name</th>
      <th>Prelim</th>
      <th>Midterm</th>
      <th>Finals</th>
      <th>Endterm</th>
      <th>Remarks</th>
    </tr>
  </thead>
  <tbody>
  <?php


    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_database = "demo";
 
    $conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $conn->prepare("SELECT * FROM softeng ");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
  ?>
    <tr>
      <td><label><?php echo $row['id']; ?></td>
      <td><label><?php echo $row['name']; ?></td>
      <td><label><?php echo $row['prelim']; ?></label></td>
      <td><label><?php echo $row['midterm']; ?></label></td>
      <td><label><?php echo $row['finals']; ?></label></td>
       <td><label><?php echo $row['endterm']; ?></label></td>
        <td><label><?php echo $row['remarks']; ?></label></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</FORM>
</div>
</body>
</html>