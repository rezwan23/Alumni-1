<?php
	session_start();	
    $con= mysqli_connect("127.0.0.1","root","alumni","Alumni")or die("Could not connect");
    $user = $_SESSION['user'];
    $que = $_POST['query'];
    $rowSQL = mysqli_query($con,"SELECT MAX(qid) AS max FROM questions;");
    $row = mysqli_fetch_array($rowSQL);
    if($row['max'] == NULL )    $id = 1;
    else $id = $row['max'] + 1;
    $ins = "INSERT INTO questions VALUES ('$id','$que','$user',CURRENT_TIMESTAMP)";
    if($res=mysqli_query($con,$ins))
    {       
       header('location:blog.php');
    }   
    else echo '<script>
        	            alert("Error");
                </script>';
?>
