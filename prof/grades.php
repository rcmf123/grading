<?php
  error_reporting(0);
?>
<?php

  $names=$_POST['names'];      
     
  if (isset($_REQUEST['solve'])){

  	$names=$_POST['names'];
    $prelim = $_REQUEST['prelim'];
    $midterm = $_REQUEST['midterm'];
    $final = $_REQUEST['final']; 
    
    $solve1 = ($_REQUEST['prelim'] * 0.2);
    $solve2 = ($_REQUEST['midterm'] * 0.3);
    $solve3 = ($_REQUEST['final'] * 0.5);
  
    $add = ($solve1 + $solve2 + $solve3);
  
    $endterm = round($add);
  
  if ($add >= 75) 
     {
          $remarks = "PASSED";
        }
       else {
           $remarks = "FAILED";
       } 
 } 
    
if (isset($_REQUEST['save'])){
  $names = $_REQUEST['names'];
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
  $sql = "INSERT INTO softeng (name,prelim, midterm,finals,endterm,remarks) VALUES ('$names','$prelim','$midterm','$final','$endterm','$remarks')";
  
   if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
    
    mysqli_close($conn);
  }

 function get_names(){
  $str='';
  if(isset($_POST["subjCode"])){

  $std=$_POST['subjCode'];
  $names=get_data($subjCode);

  foreach($names as $name){
    $str.='<option value="'.$name.'">'.$name.'</option>';

  }
}
  return $str;
}
function get_data($subjCode){
  $names=array();
  $con=mysqli_connect('localhost','root','');
  $db=mysqli_select_db( $con, 'demo');

  $query="select name from softeng";
  $result=mysqli_query($con, $query);
  while($obj=mysqli_fetch_object($result)){
    $names[]=$obj->name;
  }


  return $names;
}

if(isset($_POST['view'])){
  session_start();
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
	echo $prelim, $midterm;

}


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
  <form action="grades.php" method="POST">
  <select name="subjCode">
    <option value = "1">Software Engineering</option>
  </select>
  <input type="submit" value="show"/>
</form>
<FORM NAME="form1" METHOD="POST" ACTION="">
<TABLE BORDER="0">
  <tr> </tr> <tr> </tr>
  <TR>
    <TD>Student Name</TD>
    <TD>

     <select name="names">
     	<option value="<?php get_names();?>"><?php echo get_names();
     	if(isset($_POST['view'])){
			$names=$_POST['names'];
			echo $names;
		}
		?>

		</option>	
 	 </select>
 	 <input type="submit" value="view" name="view"/>

    </TR>
    <tr> </tr> <tr> </tr>
 <tr> </tr> <tr> </tr>
  <TR>
  	<TD><?php echo $name ?></TD>
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
   <TD>Endterm Grade</TD>
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
     </TR>
    </TABLE>
  <!-- End of the Table -->
  
<P>
<input type="submit" name="solve" value="Compute"> 
<input type="submit" name="clear" value=" Clear ">
<input type="submit" name="save" value=" Save  ">
</P>
</FORM>
</div>
</body>
</html>