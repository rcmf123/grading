<html>
<?php
if(isset($_POST['bttLogin'])){
	require 'connect.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = mysqli_query($con, 'select * from account where username="'.$username.'" and password="'.$password.'"');
	if(mysqli_num_rows($result)==1){
		
		
		#if student
			#student.php
		$user = mysqli_fetch_assoc($result);

		if($user['usertype']=='prof'){
			session_start();
			$_SESSION['username'] = $username;
			header('Location: prof/welcome.php');
			
		}
		if($user['usertype']=='student'){
			session_start();
			$_SESSION['name'] = $user['name']; 
			$name = $_SESSION['name'];
			$_SESSION['username'] = $username;
			echo $name;
			header('Location: student/welcome.php');
			
		}
	}
	else
		echo "Account's invalid";
}

?>

<form method ="post">
	<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="bttLogin" value="Login"></td>
		</tr>
	</table>
</form>
</html>