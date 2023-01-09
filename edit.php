
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
<link rel="stylesheet" href="footerandheaderstyle.css">
    <link rel="stylesheet" href="">
    <title>Profile Page - Pure Coding</title>
</head>

<body class="profile-page">
  <!-- بدايه الهيدر -->
  <div class="v194_23"> </div>
  <span class="v194_24">AAS</span>
  <button class="button v194_25 ">الملف الشخصي</button>
  <span class="v194_26">نظام</span>
  <span class="v194_27">للإرشاد الأكاديمي بكلية الحاسب</span>
  <button class="button v194_28">الاسالة الشائعة</button>
  <button class="button v194_29">الانذارات</button>
  <button class="button v194_30">اقتراحات لتدريب الصيفي</button>
  <button class="button v194_31">وصف المقررات</button>
  <button class="button v194_33">
  <span>ارسال ايميل </span>
  </button>
  <button class="button v194_32"> <span>  حجز موعد </span></button>
  <button class="button v194_34"> <span>  دليلك للحاسب </span></button>
<!--نهاية الهدير -->
    <div class="v405_2">
        <p>Wanna logout?
            <a href="fristpage.html">Click Here</a>
        </p>
          <span class="v405_7">الملف الشخصي</span>
        <form action="edit.php" method="post" enctype="multipart/form-data">
          <?php
                      $sql = "SELECT * FROM students_1 WHERE snum='{$_SESSION["snum"]}'";
                      $result = mysqli_query($db, $sql);
                      if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                      ?>

<span class="v405_10">اسم الطالب</span>
                    <div >
                        <input class="input v427_3" type="text" id="full_name" name="sname" placeholder="اسم الطالب" value="<?php echo $row['sname']; ?>" required>
                    </div>

                                <span class="v427_4">الرقم الجامعي</span>
                    <div >
                        <input class="input v427_5" type="text" id="snum" name="snum" placeholder="رقم الطالب" value="<?php echo $row['snum']; ?>" disabled required>
                    </div>
                    <span class="v427_6">الايميل</span>
                    <div >
                        <input class="input v427_7" type="email" id="email" name="semail" placeholder="ايميل الطالب" value="<?php echo $row['semail']; ?>" disabled required>
                    </div>

                    <span class="v427_8">كلمة المرور</span>
                    <div >
                        <input class="input v427_10" type="password" id="password" name="spass_1" placeholder="كلمة المرور" value="<?php echo $row['spass_1']; ?>" required>
                    </div>

                      <span class="v427_9">تاكيد كلمة المرور</span>
                    <div >
                        <input class="input v427_11" type="password" id="cpassword" name="spass_2" placeholder="تاكيد كلمة المرور" value="<?php echo $row['spass_2']; ?>" required>
                    </div>

                      <span class="v427_12">المعدل الدراسي</span>
                    <div >
                        <input class="input v427_14" step=0.01 type="text" id="sgpa" name="sgpa" placeholder="المعدل الدراسي" value="<?php echo $row['sgpa']; ?>" required>
                    </div>

                    <span class="v427_15">المستوى الدراسي</span>

                    <div >
                        <select class="input v427_16" type="text" id="slevel" name="slevel" placeholder="المستوى الدراسي" value="<?php echo $row['slevel']; ?>" required>

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
                <button type="submit" name="submit" class="v427_18">تحديث</button>
            </div>

            <div>
<a type="button"  class="v427_17" href="fristpage.html"> jsss
</a>

            </div>
            <footer>
            <!--بداية الفوتر  -->
            <div class="v194_19">
               <div class="name1"></div>
            <span class="v194_20">AAS</span>
            <span class="v194_21">نظام الإرشاد الأكاديمي الإلكتروني
             لكلية الحاسب بجامعة القصيم</span>
            </div>
            <!--نهاية الفوتر -->
            </footer>
              </div>
        </form>

</style>
    </div>
</body>

</html>
<style>* {
box-sizing: border-box;
}
body {
font-size: 14px;
}
.input{
  font-size: 24px;
  width: 594px;
height: 67px;
background: rgba(217,217,217,1);
opacity: 1;
position: absolute;
border-top-left-radius: 38px;
border-top-right-radius: 38px;
border-bottom-left-radius: 38px;
border-bottom-right-radius: 38px;
overflow: hidden;
}
.v405_2 {
width: 100%;
height: 2050px;
background: rgba(249,250,251,1);
padding: 10px 10px;
margin: 10px;
opacity: 1;
position: relative;
top: 0px;
left: 0px;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
overflow: hidden;
}
.v405_7 {
width: 385px;
color: rgba(3,105,161,1);
position: absolute;
top: 55px;
left: 535px;
font-family: Judson;
font-weight: Regular;
font-size: 48px;
opacity: 1;
text-align: center;
}
.v405_10 {
width: 197px;
color: rgba(3,105,161,1);
position: absolute;
top: 146px;
left: 856px;
font-family: Judson;
font-weight: Regular;
font-size: 32px;
opacity: 1;
text-align: center;
}
.v427_4 {
width: 197px;
color: rgba(3,105,161,1);
position: absolute;
top: 304px;
left: 844px;
font-family: Judson;
font-weight: Regular;
font-size: 32px;
opacity: 1;
text-align: center;
}
.v427_6 {
width: 98px;
color: rgba(3,105,161,1);
position: absolute;
top: 455px;
left: 932px;
font-family: Judson;
font-weight: Regular;
font-size: 32px;
opacity: 1;
text-align: center;
}
.v427_8 {
width: 159px;
color: rgba(3,105,161,1);
position: absolute;
top: 606px;
left: 871px;
font-family: Judson;
font-weight: Regular;
font-size: 32px;
opacity: 1;
text-align: center;
}
.v427_9 {
width: 228px;
color: rgba(3,105,161,1);
position: absolute;
top: 757px;
left: 800px;
font-family: Judson;
font-weight: Regular;
font-size: 32px;
opacity: 1;
text-align: center;
}
.v427_12 {
width: 228px;
color: rgba(3,105,161,1);
position: absolute;
top: 915px;
left: 789px;
font-family: Judson;
font-weight: Regular;
font-size: 32px;
opacity: 1;
text-align: center;
}
.v427_15 {
width: 228px;
color: rgba(3,105,161,1);
position: absolute;
top: 1099px;
left: 785px;
font-family: Judson;
font-weight: Regular;
font-size: 32px;
opacity: 1;
text-align: center;
}
.v427_3 {
top: 200px;
left: 423px;
}
.v427_5 {
top: 351px;
left: 423px;
}
.v427_7 {

top: 502px;
left: 423px;
}
.v427_10 {

top: 653px;
left: 423px;
}
.v427_11 {
top: 811px;
left: 423px;

}
.v427_14 {

top: 969px;
left: 423px;
}
.v427_16 {
width: 594px;
height: 67px;
background: rgba(217,217,217,1);
opacity: 1;
position: absolute;
top: 1153px;
left: 419px;
border-top-left-radius: 38px;
border-top-right-radius: 38px;
border-bottom-left-radius: 38px;
border-bottom-right-radius: 38px;
overflow: hidden;
}
.v427_17 {
width: 265px;
height: 67px;
background: rgba(3,105,161,1);
opacity: 1;
position: absolute;
top: 1304px;
left: 748px;
border-top-left-radius: 38px;
border-top-right-radius: 38px;
border-bottom-left-radius: 38px;
border-bottom-right-radius: 38px;
overflow: hidden;
font-family: Judson;
font-weight: Regular;
font-size: 32px;
opacity: 1;
text-align: center;
color: rgba(249,250,251,1);
border: none;

}
.v427_18 {
width: 265px;
height: 67px;
background: rgba(3,105,161,1);
opacity: 1;
position: absolute;
top: 1304px;
left: 423px;
border-top-left-radius: 38px;
border-top-right-radius: 38px;
border-bottom-left-radius: 38px;
border-bottom-right-radius: 38px;
overflow: hidden;
font-family: Judson;
font-weight: Regular;
font-size: 32px;
opacity: 1;
text-align: center;
color: rgba(249,250,251,1);
border: none;
}


</style>
