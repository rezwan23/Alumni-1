<?php
session_start();	
    echo "Hello";
      
    $con = mysqli_connect("127.0.0.1","root","alumni","Alumni") or die("Could not connect");
#    $con = mysqli_connect("127.0.0.1","root","","Alumni") or die("Could not connect");
    if(isset($_POST['login']))
    {
      $user = strtoupper($_POST['uname']);
      $pwd = $_POST['passwd'];
	if (!$con)  echo "Failed to connect to MySQL: ";

         $res = mysqli_query($con,"SELECT * FROM register where username='$user' and passwd='$pwd'");
        $fetch = mysqli_num_rows($res);

	if($fetch==1)
		{
			$_SESSION['user'] =$user;
			 header('location:index.php');
		}
		else
		{
			echo "failed";
			session_destroy();
			 header('location:index.php');
#				echo '<script language="javascript">';
#				echo 'alert("username or pwd wrong")';
		}
    }		
?>
