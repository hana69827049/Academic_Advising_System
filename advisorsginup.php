<?php include('server.php')?>
<!DOCTYPE html><html>
<head><link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Judson&display=swap" rel="stylesheet" />
</head><body>
  <div class="v383_14">
    <div class="v383_15"></div>


  </div>
<div  class="group">
  <span class="v383_20">تسجيل الدخول </span>
  <span class="v383_21">تسجيل الدخول </span>

  <p>
     <a class="v383_23" href="advisorsignin.php"> هل لديك حساب بالفعل؟</a>
    	</p>
  <span class="v383_28">AAS</span>
  <span class="v383_29">نظام الإرشاد الأكاديمي الإلكتروني لكلية الحاسب بجامعة القصيم</span>


    <form method="post" action="advisorsginup.php">
        <?php include('errors.php'); ?>
    <span class="v383_33">الاسم</span>
      			<input class="input aname" type="text" name="aname"  value="<?php echo $aname; ?>">
  <!--  <div class="v383_16"></div>-->

  <span class="v383_34">رقم الموظف</span>
<!--  <div class="v383_17">-->
  	<input class="input anum" type="text" name="anum"  >

  <span class="v383_35">الايميل</span>
  <!-- <div class="v383_30"></div>-->
  <input class="input aemail" type="email" name="aemail"  value="<?php echo $aemail; ?>">

  <span class="v383_37">كلمة المرور</span>
<!--  <div class="v383_36"></div>-->
  <input class="input apassword_1" type="password" name="apassword_1"  >

  <span class="v383_39">تاكيد كلمة المرور</span>
<!--<div class="v383_38"></div>-->
  <input class="input apassword_2" type="password" name="apassword_2"  >

<!--<div class="v383_18"></div>-->
  <!--<span class="v383_25">تسجيل الدخول</span>-->
  <div>
  <button type="submit"class="v383_18" name="asignup">الدخول تسجيل</button>
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
.v383_14 {
  width: 100%;
  height: 1024px;
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
  height: 693px;
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
  top: 802px;
  left: 898px;
  border: 3px solid rgba(188,217,253,1);
  overflow: hidden;
    color: rgba(255,255,255,1);
    font-family: Inter;
font-weight: Regular;
font-size: 24px;
}
.v383_20 {
  width: 193px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 282px;
  left: 1010px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
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
  text-align: left;
}
.v383_23 {
  width: 199px;
  color: rgba(118,118,118,1);
  position: absolute;
  top: 868px;
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
  left: 46px;
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
