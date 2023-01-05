<?php include('server.php')?>
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
         <?php include('errors.php'); ?>

      <header>تسجيل الدخول</header>

        <div class="input-box">
          <label>الرقم الجامعي</label>
          <input type="text" name="snum"  value="<?php echo $snum; ?>">
        </div>

        <div class="input-box">
          <label>كلمة المرور</label>
          <input type="password" name="spass"  value="<?php echo $spass; ?>">
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
</style>
