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
       <a class="v5_25" href="signup.php"> ليس لديك حساب ؟ </a>
      	</p>
    <form method="post" action="signin.php">
        <?php include('errors.php'); ?>
    <span class="v3_17">كلمة المرور</span>
    <!--  <div class="v3_11"></div>-->
   <input class="input apassword" type="password" name="spass_1"  >

    <span class="v3_18">رقم الطالب</span>
    <!--<div class="v3_9"></div>-->
   <input class="input anum" type="text" name="snum" >


  <!--<div class="v3_13"></div>-->
   <button type="submit" class="v3_13" name="signin">تسجيل الدخول</button>


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


<!-- <?php # include('server.php')?>
<!DOCTYPE html>

<html lang="ar,eng">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>تسجيل الدخول</title>

  </head>
  <body>
    <span class="logo">AAS</span>
<span class="des">نظام الإرشاد الأكاديمي الإلكتروني لكلية الحاسب بجامعة القصيم</span></div></body></html>


    <section class="container">
      <form method="post" action="signin.php">
         <?php #include('errors.php'); ?>

      <header>تسجيل الدخول</header>

        <div class="input-box">
          <label>الرقم الجامعي</label>
          <input type="text" name="snum"  >
        </div>

        <div class="input-box">
          <label>كلمة المرور</label>
          <input type="password" name="spass"  >
        </div>



        <button type="submit" value="signin" name="signin">تسجيل الدخول</button>
        <p>
         Not have acount?<a href="signup.php">Sign_Up</a>
   </p>
      </form>
    </section>
  </body>
</html>
<style>* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 90vh;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  padding: 10px;
  background: rgb(3, 105, 161);
}
.logo {
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
.des {
  width: 844px;
  color: rgba(255,255,255,1);
  position: absolute;
  top: 488px;
  left: 100px;
  font-family: Judson;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.container {
  position: relative; left:400px;
  max-width: 500px;
  width: 50%;
  background: #fff;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}
.container header {
  font-size: 1.5rem;
  color: #333;
  font-weight: 500;
  text-align: center;
}
.container .form {
  margin-top: 30px;
}
.form .input-box {
  width: 100%;
  margin-top: 20px;
}
.input-box label {
  color: #333;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #000000;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 15px;
}


.form button {
  height: 55px;
  width: 100%;
  color: #fff;
  font-size: 1rem;
  font-weight: 400;
  margin-top: 30px;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  background: rgb(21, 43, 179);
}
.form button:hover {
  background: rgb(88, 56, 250);
}
/*Responsive*/
@media screen and (max-width: 500px) {
  .form .column {
    flex-wrap: wrap;
  }

}
</style>-->
