
<?php include('server.php')?>
<!DOCTYPE html><html>
<head><link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Judson&display=swap" rel="stylesheet" />
</head><body>
  <div class="v383_14">
    <div class="v383_15"></div>


  </div>
<div  class="group">

  <span class="v383_21">تسجيل الدخول </span>

  <p>
     <a class="v383_23" href="signin.php"> هل لديك حساب بالفعل؟</a>
    	</p>
  <span class="v383_28">AAS</span>
  <span class="v383_29">نظام الإرشاد الأكاديمي الإلكتروني لكلية الحاسب بجامعة القصيم</span>


    <form method="post" action="signup.php">
        <?php include('errors.php'); ?>
    <span class="v383_33">الاسم</span>
      			<input class="input aname" type="text" name="sname"  value="<?php echo $sname; ?>">
  <!--  <div class="v383_16"></div>-->

  <span class="v383_34">الرقم الجامعي</span>
<!--  <div class="v383_17">-->
  	<input class="input anum" type="text" name="snum"  >

  <span class="v383_35">الايميل</span>
  <!-- <div class="v383_30"></div>-->
  <input class="input aemail" type="email" name="semail"  value="<?php echo $semail; ?>">

  <span class="v383_37">كلمة المرور</span>
<!--  <div class="v383_36"></div>-->
  <input class="input apassword_1" type="password" name="spass_1"  >

  <span class="v383_39">تاكيد كلمة المرور</span>
<!--<div class="v383_38"></div>-->
  <input class="input apassword_2" type="password" name="spass_2"  >

    <span class="gpatext">المعدل التراكمي</span>
    <input class="input gpa" type="number" step=0.01 name="sgpa"  value="<?php #echo $sgpa; ?>">

    <span class="lvltext">المستوى الدراسي</span>
    <div >
      <select class="input lvl" name="slevel" value =" <?php# echo "slevel"; ?> " type="text"
style="
    top: 920px;
    left: 898px;
    width: 411px;
    height: 47px;
    color: rgba(118,118,118,1);
    font-family: Inter;
    font-weight: Regular;
    font-size: 24px;">
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

<!--<div class="v383_18"></div>-->
  <!--<span class="v383_25">تسجيل الدخول</span>-->
  <div>
  <button type="submit"class="v383_18" name="signup">الدخول تسجيل</button>
  </div>
</div>
</div>




</body>




</html>



<br/><br/>





 <style>* {
  box-sizing: border-box;
}
body {
  font-size: 14px;
}
.group{
  top: 30px;
}

.error {
  margin: 0px auto;
  padding: 10px;
  border: 1px solid #a94442;
  color: #a94442;
  background: #f2dede;
  border-radius: 5px;
  text-align: left;
  width: 471px;
  height: px;
  position: absolute;
  top: 70px;
  left: 870px;
}

.input{
  width: 411px;
  height: 47px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  border: 3px solid rgba(188,217,253,1);
  overflow: hidden;
}

.aname{
  top: 381px;
  left: 898px;
}

.anum{
  top: 470px;
  left: 898px;
}

.aemail{
  top: 559px;
  left: 898px;
}

.apassword_1{
  top: 651px;
  left: 898px;
}

.apassword_2{
  top: 744px;
  left: 898px;
}

.gpa{
  top: 828px;
  left: 898px;
}
.lvl{
  top: 920px;
  left: 898px;
}


.lvltext{
  width: 133px;
  color: rgba(118,118,118,1);
  position: absolute;
  top: 885px;
  left: 1198px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 24px;
  opacity: 1;
  text-align: left;
}
.gpatext{
  width: 133px;
  color: rgba(118,118,118,1);
  position: absolute;
  top: 800px;
  left: 1198px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 24px;
  opacity: 1;
  text-align: left;
}
.v383_14 {
  width: 100%;
  height: 1150px;
  background: linear-gradient(rgba(3,105,161,1), rgba(0,164,255,1));
  padding: 10px 10px;
  margin: 10px;
  opacity: 1;
  position: relative;
  top: 0px;
  left: 0px;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  overflow: hidden;
}
.v383_15 {
  width: 471px;
  height: 870px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  top: 223px;
  left: 848px;

}
.v383_16 {
  width: 411px;
  height: 47px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  top: 381px;
  left: 898px;
  border: 3px solid rgba(188,217,253,1);
  overflow: hidden;
}
.v383_17 {
  width: 411px;
  height: 47px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  top: 470px;
  left: 898px;
  border: 3px solid rgba(188,217,253,1);
  overflow: hidden;
}
.v383_30 {
  width: 411px;
  height: 47px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  top: 559px;
  left: 898px;
  border: 3px solid rgba(188,217,253,1);
  overflow: hidden;
}
.v383_36 {
  width: 411px;
  height: 47px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  top: 651px;
  left: 898px;
  border: 3px solid rgba(188,217,253,1);
  overflow: hidden;
}
.v383_38 {
  width: 411px;
  height: 47px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  top: 744px;
  left: 898px;
  border: 3px solid rgba(188,217,253,1);
  overflow: hidden;
}
.v383_18 {
  width: 411px;
  height: 47px;
  background: rgba(2,132,199,1);
  opacity: 1;
  position: absolute;
  top: 990px;
  left: 898px;
  border: 3px solid rgba(188,217,253,1);
  overflow: hidden;
    color: rgba(255,255,255,1);
    font-family: Inter;
font-weight: Regular;
font-size: 24px;
}
.v383_21 {
  width: 193px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 282px;
  left: 1010px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: center;
}
.v383_23 {
  width: 199px;
  color: rgba(118,118,118,1);
  position: absolute;
  top: 1048px;
  left: 1015px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 24px;
  opacity: 1;
  text-align: left;
}
.v383_25 {
  width: 154px;
  color: rgba(255,255,255,1);
  position: absolute;
  top: 809px;
  left: 1036px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 24px;
  opacity: 1;
  text-align: left;
}
.v383_28 {
  width: 322px;
  color: rgba(255,255,255,1);
  position: absolute;
  top: 301px;
  left: 307px;
  text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  font-family: Judson;
  font-weight: Regular;
  font-size: 170px;
  opacity: 1;
  text-align: left;
}
.v383_29 {
  width: 844px;
  color: rgba(255,255,255,1);
  position: absolute;
  top: 488px;
  left: 125px;
  font-family: Judson;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.v383_33 {
  width: 77px;
  color: rgba(118,118,118,1);
  position: absolute;
  top: 334px;
  left: 1275px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 24px;
  opacity: 1;
  text-align: left;
}
.v383_34 {
  width: 133px;
  color: rgba(118,118,118,1);
  position: absolute;
  top: 433px;
  left: 1225px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 24px;
  opacity: 1;
  text-align: left;
}
.v383_35 {
  width: 79px;
  color: rgba(118,118,118,1);
  position: absolute;
  top: 523px;
  left: 1270px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 24px;
  opacity: 1;
  text-align: left;
}
.v383_37 {
  width: 130px;
  color: rgba(118,118,118,1);
  position: absolute;
  top: 612px;
  left: 1225px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 24px;
  opacity: 1;
  text-align: left;
}
.v383_39 {
  width: 187px;
  color: rgba(118,118,118,1);
  position: absolute;
  top: 703px;
  left: 1180px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 24px;
  opacity: 1;
  text-align: left;
}
</style>
