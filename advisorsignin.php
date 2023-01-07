<?php include('server.php')?>
<!DOCTYPE html><html><head>
  <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Judson&display=swap" rel="stylesheet" />
</head>
<body>
  <div class="v2_2">
    <div class="v3_7"></div>



    <span class="v3_19">تسجيل الدخول </span>

    <p>
       <a class="v5_25" href="advisorsginup.php"> ليس لديك حساب ؟ </a>
      	</p>
    <form method="post" action="advisorsignin.php">
        <?php include('errors.php'); ?>
    <span class="v3_17">كلمة المرور</span>
    <!--  <div class="v3_11"></div>-->
   <input class="input apassword" type="password" name="apassword_1"  >

    <span class="v3_18">رقم الموظف</span>
    <!--<div class="v3_9"></div>-->
   <input class="input anum" type="text" name="anum" >


  <!--<div class="v3_13"></div>-->
   <button type="submit" class="v3_13" name="login">تسجيل الدخول</button>


    <span class="v3_22">AAS</span>
    <span class="v5_24">نظام الإرشاد الأكاديمي الإلكتروني لكلية الحاسب بجامعة القصيم</span>
  </div>
</body></html>

<br/><br/>

 <style>* {
  box-sizing: border-box;
}
body {
  font-size: 14px;
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

.anum{
  top: 436px;
  left: 898px;
}

.apassword{
  top: 572px;
left: 898px;
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

.v2_2 {
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
.v3_7 {
  width: 471px;
  height: 570px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  top: 223px;
  left: 868px;
}
.v3_9 {
  width: 411px;
  height: 47px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  top: 436px;
  left: 898px;
  border: 3px solid rgba(188,217,253,1);
  overflow: hidden;
}
.v3_11 {
  width: 411px;
  height: 47px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  top: 572px;
left: 898px;
  border: 3px solid rgba(188,217,253,1);
  overflow: hidden;
}
.v3_13 {
  width: 411px;
  height: 47px;
  background: rgba(2,132,199,1);
  opacity: 1;
  position: absolute;
  top: 652px;
  left: 898px;
  border: 3px solid rgba(188,217,253,1);
  overflow: hidden;
  color: rgba(255,255,255,1);
  font-family: Inter;
font-weight: Regular;
font-size: 24px;
}

.v3_19 {
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
.v5_25 {
  width: 188px;
  color: rgba(118,118,118,1);
  position: absolute;
  top: 707px;
  left: 1040px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 24px;
  opacity: 1;
  text-align: left;
}
.v3_17 {
  width: 112px;
  color: rgba(118,118,118,1);
  position: absolute;
  top: 531px;
left: 1200px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 24px;
  opacity: 1;
  text-align: left;
}

.v3_18 {
  width: 148px;
  color: rgba(118,118,118,1);
  position: absolute;
  top: 395px;
left: 1200px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 24px;
  opacity: 1;
  text-align: left;
}
.v3_22 {
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
.v5_24 {
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
</style>
