
<?php

session_start();

if (!isset($_SESSION["sname"])) {
    header("Location: signup.php");
}

include 'server.php';

if (isset($_POST["submit"])) {
    $full_name = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST["cpassword"]));

    if ($password === $cpassword) {
        $photo_name = mysqli_real_escape_string($conn, $_FILES["photo"]["name"]);
        $photo_tmp_name = $_FILES["photo"]["tmp_name"];
        $photo_size = $_FILES["photo"]["size"];
        $photo_new_name = rand() . $photo_name;

        if ($photo_size > 5242880) {
            echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        } else {
            $sql = "UPDATE users SET full_name='$full_name', password='$password', photo='$photo_new_name' WHERE id='{$_SESSION["user_id"]}'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Profile Updated successfully.');</script>";
                move_uploaded_file($photo_tmp_name, "uploads/" . $photo_new_name);
            } else {
                echo "<script>alert('Profile can not Updated.');</script>";
                echo  $conn->error;
            }
        }
    } else {
        echo "<script>alert('Password not matched. Please try again.');</script>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


    <div class="d-flex justify-content-center align-items-center vh-100">

        <form class="shadow w-450 p-3"
        action="edit.php"
              method="post"
              enctype="multipart/form-data">

              <h4 class="display-4  fs-1">Edit Profile</h4><br>


            <div class="alert alert-danger" role="alert">

            </div>
            <div class="alert alert-success" role="alert">

            </div>

          <div class="mb-3">
            <label class="form-label"> اسم الطالب</label>
            <input type="text"
                   class="form-control"
                   name="sname"
                   value="<?php echo $students_1['sname']?>">
          </div>

          <div class="mb-3">
            <label class="form-label">المعدل</label>
            <input type="number"
                   class="form-control"
                   name="sgpa"
                   value="<?php echo $students_1['sgpa']?>">
          </div>

          <div class="mb-3">
            <label class="form-label">المستوى الدراسي</label>
         <select type="text"  class="form-control"
          name="slevel"
          value="<?php echo $students_1['slevel']?>">

                     <option hidden> </option>
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

          <button type="submit" class="btn btn-primary">Update</button>
          <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>

  </body>
  </html>
