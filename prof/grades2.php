<?php
  error_reporting(0);
?>
<?php

  $names=$_POST['names'];      
     
  if (isset($_REQUEST['solve'])){

  	#$names=$_POST['names'];
    $prelim = $_REQUEST['prelim'];
    $midterm = $_REQUEST['midterm'];
    $final = $_REQUEST['final']; 
    
    $solve1 = ($_REQUEST['prelim'] * 0.2);
    $solve2 = ($_REQUEST['midterm'] * 0.3);
    $solve3 = ($_REQUEST['final'] * 0.5);
  
    $add = ($solve1 + $solve2 + $solve3);
    
    $endterm = round($add);
    if ($names=='0') {
      echo "<script type='text/javascript'>alert('Please select a student')</script>";
    } else {
      if ($add >= 75) 
     {
          $remarks = "PASSED";
        }
       else {
           $remarks = "FAILED";
       } 
    }
    
      #$endterm = $_REQUEST['endterm'];
 # $remarks = strtoupper($_REQUEST['remarks']);
  
//CONNECT TO DATABASE--------------------
  $con = mysqli_connect("localhost","root","","demo");
  
 if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
  $sql = "UPDATE softeng SET prelim='$prelim', midterm='$midterm', finals='$final', endterm='$endterm', remarks='$remarks' where name='$names'";
  
   if (mysqli_query($con, $sql)) {
     echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
     header("Refresh:0");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
    
    mysqli_close($conn);
  
 } 
    
/*if (isset($_REQUEST['save'])){
  #$names = $_REQUEST['names'];
  $prelim = $_REQUEST['prelim'];
  $midterm = $_REQUEST['midterm'];
  $final = $_REQUEST['final'];
  $endterm = $_REQUEST['endterm'];
  $remarks = strtoupper($_REQUEST['remarks']);

//CONNECT TO DATABASE--------------------
  $con = mysqli_connect("localhost","root","","demo");
  
 if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
  $sql = "UPDATE softeng SET prelim='$prelim', midterm='$midterm', finals='$final', endterm='$endterm', remarks='$remarks' where name='$names'";
  
   if (mysqli_query($con, $sql)) {
     echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
     header("Refresh:0");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
    
    mysqli_close($conn);
  }*/



/*if(isset($_POST['view'])){

	$names=$_POST['names'];
	echo $names;

	$con=mysqli_connect('localhost','root','');
  $db=mysqli_select_db( $con, 'demo');

	$query = "select * from softeng where name='$names'";
	$result = mysqli_query($con, $query);

	$row = mysqli_fetch_array($result);

	$name = $row['name'];
	$prelim = $row['prelim'];
	$midterm = $row['midterm'];

}*/


?>
   
<html>
<head>
 <STYLE type="text/css">
 .grading{
 	margin-left: 200px;
 	background-color: gray;
 	position: relative;
 }
</STYLE>
</head>
<body>
<?php include 'header.html';?>
<?php include 'nav.html';?>
<div class="grading">
  <form action="grades2.php" method="POST">
  <select name="subjCode">
    <option value = "1">Software Engineering</option>
  </select>
 
</form>
<FORM NAME="form1" METHOD="POST" ACTION="">
<TABLE BORDER="0">
  <tr> </tr> <tr> </tr>
  <TR>
    <TD>Student Name</TD>
    <TD>
<form action="" method="POST">
  <select name="names">
    <option value = "<?php $names?>"><?php echo $names?></option>
    <option value = "Ryan Federico">Ryan Federico</option>
    <option value = "Jenzeth Alcaide">Jenzeth Alcaide</option>
    <option value = "Paul Sauquillo">Paul Sauquillo</option>
    <option value = "John Magno">John Magno</option>
    <option value = "Kenneth Alvendia">Kenneth Alvendia</option>
    <option value = "Camille Castro">Camille Castro</option>
    <option value = "Elon Musk">Elon Musk</option>
    <option value = "Chi Long Qua">Chi Long Qua</option>
    <option value = "James Hetfield">James Hetfield</option>
    <option value = "Chester Bennington">Chester Bennington</option>
  </select>

    </TR>
    <tr> </tr> <tr> </tr>
 <tr> </tr> <tr> </tr>
  <TR>
  	<TD></TD>
  </TR>
  <TR>
    <TD>Prelim Grade</TD>
    <TD><INPUT TYPE="TEXT" NAME="prelim" SIZE="1"  MAXLENGTH=3
    value="<?php echo $prelim; ?>">
    
 </TD>
 
      </TR> 
     <tr> </tr> <tr> </tr>
 <tr> </tr> <tr> </tr>
  <TR>
    <TD>Midterm Grade</TD>
    <TD><INPUT TYPE="TEXT" NAME="midterm" SIZE="1" MAXLENGTH=3
     value="<?php echo $midterm; ?>">
    </TR>
     <tr> </tr> <tr> </tr>
 <tr> </tr> <tr> </tr>
 <TR>
    <TD>Final Grade</TD>
    <TD><INPUT TYPE="TEXT" NAME="final" SIZE="1" MAXLENGTH=3
    value="<?php echo $final; ?>">
  </tr>
 <tr> </tr> <tr> </tr>
 <tr> </tr> <tr> </tr>
 <tr>
   <!--<TD>Endterm Grade</TD>
    <TD><INPUT TYPE="TEXT" NAME="endterm" SIZE="1" MAXLENGTH=3
     value="<?php echo $endterm; ?>" READONLY>
 </TD>
 </tr>
    <tr> </tr> <tr> </tr>
 <tr> </tr> <tr> </tr>
  <tr>
  <TD>Remarks</TD>
    <TD>
      <INPUT TYPE="TEXT" NAME="remarks" SIZE="10" 
    value="<?php echo $remarks; ?>" READONLY>
   </TD>
     </TR>-->
    </TABLE>
  <!-- End of the Table -->
  
<P>
<input type="submit" name="solve" value="Save"> 
</P>
</FORM>
</div>
</body>
</html>