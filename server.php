<?php
    	session_start();
	// variable declaration
    $sname="";
  	$snum= "";
    $semail="";
  	$spass = "";
  $sgpa="";
    $slevel="";

    $errors = array();
  	$_SESSION['success'] = "";

    $db=mysqli_connect('localhost','root','','aas');



    if (isset($_POST['signup'])) {

// receive all input values from the form
        $sname = mysqli_real_escape_string($db, $_POST['sname']);
		$snum = mysqli_real_escape_string($db, $_POST['snum']);
		$semail = mysqli_real_escape_string($db, $_POST['semail']);
		$spass = mysqli_real_escape_string($db, $_POST['spass']);
		$sgpa = mysqli_real_escape_string($db, $_POST['sgpa']);
    $slevel = mysqli_real_escape_string($db, $_POST['slevel']);
        //check empty stack
        if(empty($sname)){ array_push($errors, "name is requiered");}
         if(empty($snum)){ array_push($errors, "num is required");}
          if(empty($semail)){ array_push($errors, "semail is required");}
           if(empty($spass)){ array_push($errors, "Passwoed is required");}
           if(empty($sgpa)){ array_push($errors, "GPA is required");}
            if(empty($slevel)){ array_push($errors, "level is required");}

            if (count($errors) == 0){


$query="insert into students(sname,snum,semail,spass,sgpa,slevel)Values('$sname','$snum','$semail','$spass','$sgpa','$slevel')";
mysqli_query($db,$query);

$_SESSION['sname'] = $sname;
$_SESSION['success'] = "Register Successfull";
header('location: Home.html');
}

		}
  ?>
