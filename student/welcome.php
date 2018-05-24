<!DOCTYPE html>
<html>
<head>
 <STYLE type="text/css">
 .welcome{
  margin-left: 200px;
  background-color: gray;
  position: relative;
  height: 300px;
  padding-top: 20px;
  padding-left: 20px;
  margin-top: 0;
 }
</STYLE>
<body>
<?php include 'header.html';?>
<?php include 'nav.html';?>
<div class="welcome">
<?php
session_start();
echo 'Welcome '.$_SESSION['name'];
?>  
<p>WWWWWWWWWWWWWWWWWWWW BLA BLA WWWW</p>
</div>
 
</div>	
</body>
</html>
