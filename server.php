<?php
    	session_start();
	// variable declaration
  //std
    $sname="";
  	$snum = "";
    $semail="";
  	$spass_1 = "";
  $sgpa="";
    $slevel="";

//sdvisor
 $aname="";
 $anum= "";
$aemail="";
$apassword_1="";

    $errors = array();
  	$_SESSION['success'] = "";

    $db=mysqli_connect('localhost','root','','aas');

//signup for std

    if (isset($_POST['signup'])) {

// receive all input values from the form
        $sname = mysqli_real_escape_string($db, $_POST['sname']);
		$snum = mysqli_real_escape_string($db, $_POST['snum']);
		$semail = mysqli_real_escape_string($db, $_POST['semail']);
		$spass_1 = mysqli_real_escape_string($db, $_POST['spass_1']);
    $spass_2 = mysqli_real_escape_string($db, $_POST['spass_2']);
		$sgpa = mysqli_real_escape_string($db, $_POST['sgpa']);
    $slevel = mysqli_real_escape_string($db, $_POST['slevel']);
        //check empty stack
        if(empty($sname)){ array_push($errors, "name is requiered");}
         if(empty($snum)){ array_push($errors, "num is required");}
          if(empty($semail)){ array_push($errors, "semail is required");}
           if(empty($spass_1)){ array_push($errors, "Passwoed is required");}
           if(empty($sgpa)){ array_push($errors, "GPA is required");}
            if(empty($slevel)){ array_push($errors, "level is required");}
            if ($spass_1 != $spass_2) {
           array_push($errors, "كلمات المرور غير مترابطة");}

           $user_check_query = "SELECT * FROM students_1 WHERE snum='$snum' OR semail='$semail' LIMIT 1";
           $result = mysqli_query($db, $user_check_query);
           $user = mysqli_fetch_assoc($result);

           if ($user) { // if user exists
           if ($user['snum'] === $snum) {
           array_push($errors, "رقم الطالب موجود سابقا");
           }

           if ($user['semail'] === $semail) {
           array_push($errors, "الايميل مستخد سابقا");
           }
           }


            if (count($errors) == 0){

$spass_1=md5($spass_1);
$query="insert into students_1 (sname,snum,semail,spass_1,sgpa,slevel)Values
('$sname','$snum','$semail','$spass_1','$sgpa','$slevel')";
mysqli_query($db,$query);

$_SESSION['sname'] = $sname;
$_SESSION['success'] = "Register Successfull";
header('location: Home0.php');
}

		}


// LOGIN std
	if (isset($_POST['signin'])) {
    $snum = mysqli_real_escape_string($db, $_POST['snum']);
		$spass_1 = mysqli_real_escape_string($db, $_POST['spass_1']);


    if (empty($snum)) {
			array_push($errors, "Username is required");
		}
		if (empty($spass_1)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
      $spass_1 = md5($spass_1);
			$query = "SELECT * FROM students_1 WHERE snum='$snum' AND spass_1='$spass_1'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
        $_SESSION['sname'] = $sname;
        $_SESSION['success'] = "Login is succesed";
        header('location: Home0.php');
			}else {
				array_push($errors, "خطاء في كلمة المرور او رقم الطاب");
			}
		}
	}


  //signup for advisor

      if (isset($_POST['asignup'])) {

  // receive all input values from the form
     $aname = mysqli_real_escape_string($db, $_POST['aname']);
  	 $anum = mysqli_real_escape_string($db, $_POST['anum']);
  		$aemail = mysqli_real_escape_string($db, $_POST['aemail']);
  		$apassword_1 = mysqli_real_escape_string($db, $_POST['apassword_1']);
  		$apassword_2 = mysqli_real_escape_string($db, $_POST['apassword_2']);
          //check empty stack
          if(empty($aname)){ array_push($errors, "الأسم مطلوب");}
           if(empty($anum)){ array_push($errors, "رقم الموظف مطلوب");}
            if(empty($aemail)){ array_push($errors, "الايميل مطلوب");}
             if(empty($apassword_1)){ array_push($errors, " كلمة المرور مطلوبة");}
             if ($apassword_1 != $apassword_2) {
           array_push($errors, "كلمات المرور غير مترابطة");}

           $user_check_query = "SELECT * FROM advisor WHERE anum='$anum' OR aemail='$aemail' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
      if ($user['anum'] === $anum) {
        array_push($errors, "رقم الموظف مستخدم سابقا");
      }

      if ($user['aemail'] === $aemail) {
        array_push($errors, "الايميل مستخد سابقا");
      }
    }

              if (count($errors) == 0){

$apassword_1=md5($apassword_1);
  $query="insert into advisor(aname,anum,aemail,apassword_1)Values
  ('$aname','$anum','$aemail','$apassword_1')";
  mysqli_query($db,$query);

  $_SESSION['aname'] = $aname;
  $_SESSION['success'] = "Register Successfull";
  header('location: Home0.php');
  }

  		}

      // LOGIN advisor
      	if (isset($_POST['login'])) {
      		$anum = mysqli_real_escape_string($db, $_POST['anum']);
      		$apassword_1 = mysqli_real_escape_string($db, $_POST['apassword_1']);

      		if (empty($anum)) {
      			array_push($errors, "Username is required");
      		}
      		if (empty($apassword_1)) {
      			array_push($errors, "Password is required");
      		}

      		if (count($errors) == 0) {
      			$apassword_1 = md5($apassword_1);
      			$query = "SELECT * FROM advisor WHERE anum='$anum' AND apassword_1='$apassword_1'";
      			$results = mysqli_query($db, $query);

      			if (mysqli_num_rows($results) == 1) {
      				$_SESSION['aname'] = $aname;
      				$_SESSION['success'] = "Login is succesed  ";
      				header('location: Home0.php');
      			}else {
      				array_push($errors, "خطاء في كلمة المرور او رقم الموظف");
      			}
      		}
      	}
  ?>
