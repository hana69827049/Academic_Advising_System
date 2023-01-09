
<?php
include 'server.php';

          if (isset($_POST["submit"])){
              $sname = mysqli_real_escape_string($db, $_POST['sname']);
              $spass_1 = mysqli_real_escape_string($db, md5($_POST['spass_1']));
              $spass_2 = mysqli_real_escape_string($db, md5($_POST['spass_2']));
              $sgpa = mysqli_real_escape_string($db, $_POST['sgpa']);
                  $slevel = mysqli_real_escape_string($db, $_POST['slevel']);

              if ($spass_1 == $spass_2) {

                      $sql = "UPDATE students_1 SET sname='$sname', spass_1='$spass_1', spass_2='$spass_2', sgpa='$sgpa', slevel='$slevel' WHERE snum='{$_SESSION["snum"]}'";
                      $result = mysqli_query($db, $sql);
              } else {
                  echo "<script>alert('Password not matched. Please try again.');</script>";
              }
          }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Profile Page - Pure Coding</title>
</head>

<body class="profile-page">
    <div class="wrapper">
        <p>Wanna logout?
            <a href="logout.php">Click Here</a>
        </p>
        <h2>Profile</h2>
        <form action="edit.php" method="post" enctype="multipart/form-data">
          <?php
                      $sql = "SELECT * FROM students_1 WHERE snum='{$_SESSION["snum"]}'";
                      $result = mysqli_query($db, $sql);
                      if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                      ?>


                    <div class="inputBox">
                        <input type="text" id="full_name" name="sname" placeholder="اسم الطالب" value="<?php echo $row['sname']; ?>" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" id="snum" name="snum" placeholder="رقم الطالب" value="<?php echo $row['snum']; ?>" disabled required>
                    </div>
                    <div class="inputBox">
                        <input type="email" id="email" name="semail" placeholder="ايميل الطالب" value="<?php echo $row['semail']; ?>" disabled required>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="password" name="spass_1" placeholder="كلمة المرور" value="<?php echo $row['spass_1']; ?>" required>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="cpassword" name="spass_2" placeholder="تاكيد كلمة المرور" value="<?php echo $row['spass_2']; ?>" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" id="sgpa" name="sgpa" placeholder="المعدل الدراسي" value="<?php echo $row['sgpa']; ?>" required>
                    </div>

                    <div class="inputBox">
                        <select type="text" id="slevel" name="slevel" placeholder="المستوى الدراسي" value="<?php echo $row['slevel']; ?>" required>

                          <option hidden>المستوى الدراسي</option>
                          <option value="lev4">Level 4</option>
                          <option value="lev5">Level 5</option>
                          <option value="lev6">Level 6</option>
                          <option value="lev7">Level 7</option>
                          <option value="lev8">Level 8</option>
                          <option value="lev9">Level 9</option>
                          <option value="lev10">Level 10</option>
                          <option value="lev11">Level 11</option>
                          <option value="lev12">Level 12</option>
                          <option value="lev13">Level 13</option>
                          <option value="lev14">Level 14</option>
                          <option value="lev15">Level 15</option>
                        </select>
                    </div>
                    <?php
                                   }
                               }

                               ?>
            <div>
                <button type="submit" name="submit" class="btn">Update Profile</button>
            </div>
        </form>
    </div>
</body>

</html>
