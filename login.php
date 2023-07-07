<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/logo.png" />
<style type="text/css">
 
* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  font-family: arial;
}

body {
  background-image: url(img/bg3.jpg);
}

h1 {
  color: #ccc;
  text-align: center;
  font-family: 'Vibur', cursive;
  font-size: 30px;
  font-color: green;
}

.login-form {
  width: 350px;
  padding: 20px 20px;
  background: rgb(55, 58, 64);
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  margin: auto;
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}

.form-group {
  position: relative;
  margin-bottom: 15px;
}

.form-control {
  width: 100%;
  height: 50px;
  border: none;
  padding: 5px 7px 5px 15px;
  background: #fff;
  color: #666;
  border: 2px solid #ddd;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}
.form-control:focus, .form-control:focus + .fa {
  border-color: #10CE88;
  color: #10CE88;
}

.form-group .fa {
  position: absolute;
  right: 15px;
  top: 17px;
  color: #999;
}

.log-status.wrong-entry {
  -moz-animation: wrong-log 0.3s;
  -webkit-animation: wrong-log 0.3s;
  animation: wrong-log 0.3s;
}

.log-status.wrong-entry .form-control, .wrong-entry .form-control + .fa {
  border-color: #ed1c24;
  color: #ed1c24;
}

.log-btn {
  background: #0AC986;
  display: inline-block;
  width: 100%;
  font-size: 16px;
  height: 50px;
  color: #fff;
  text-decoration: none;
  border: none;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}

.link {
  text-decoration: none;
  color: #C6C6C6;
  float: right;
  font-size: 12px;
  margin-bottom: 15px;
}
.link:hover {
  text-decoration: underline;
  color: #8C918F;
}

.alert {
  display: none;
  font-size: 12px;
  color: #f00;
  float: left;
}

@-moz-keyframes wrong-log {
  0%, 100% {
    left: 0px;
  }
  20% , 60% {
    left: 15px;
  }
  40% , 80% {
    left: -15px;
  }
}
@-webkit-keyframes wrong-log {
  0%, 100% {
    left: 0px;
  }
  20% , 60% {
    left: 15px;
  }
  40% , 80% {
    left: -15px;
  }
}
@keyframes wrong-log {
  0%, 100% {
    left: 0px;
  }
  20% , 60% {
    left: 15px;
  }
  40% , 80% {
    left: -15px;
  }
}

</style>  
  </head>

  <body>
  <form method="post" action="loginvalidation.php">
    <div class="login-form bg-dark">
     <h1>Criminology Reviewer</h1>
     <h1><img src="img/logo.png" style="width: 150px; height: 120px"></h1>
     <div class="form-group log-status">
       <input type="text" name="username" class="form-control" placeholder="Username" maxlength="14">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" name="password" class="form-control" placeholder="Password" maxlength="14">
       <i class="fa fa-lock"></i>
     </div>
     <div class="form-group log-status">
       <center><a href="forgot-password.php" style="color:green"><b>Forgot your password?</b></a></center>
     </div>
      <span class="alert">Invalid Credentials</span>
    
     <input type="submit" name="login" class="log-btn" value="Login">
   </div>
  </form>
     
    
   </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>
