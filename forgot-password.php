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
  font-family: 'Arial', cursive;
  font-size: 20px;
  color: green;
}

.login-form {
  width: 350px;
  padding: 30px 30px;
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
    <div class="login-form bg-dark">
     <h1>Reset your Password</h1>
     <p style="color:green">The password will be send to your e-mail account</p><br>
    
	<?php
  include 'connection.php';

     	if(isset($_POST['request'])){
     		$email = $_POST['email'];

     	$selectquery = mysqli_query($con,"SELECT * from tbl_admin WHERE email='$email'");
      $check=mysqli_num_rows($selectquery);
		  $row=mysqli_fetch_array($selectquery);
        $fnn = $row['firstname'];
        $lnn = $row['lastname'];
	      $pww = $row['password'];

      if ($check>0) {
        echo"
          <script type='text/javascript'>
          alert('$fnn $lnn your password is $pww.');
          open('login.php','_self');
          </script>
        ";
      }
      else{
        echo "
          <script type='text/javascript'>
          alert('The account you're recovering cannot found.');
          open('login.php','_self');
          </script>
             ";
      }
      
    }
  ?>
	

     <form method="post">
       <div class="form-group log-status">
       <input type="email" name="email" class="form-control" placeholder="Enter your e-mail address" maxlength="25">
      </div>
      <input type="submit" name="request" class="log-btn" value="Receive Password">
     </form>

   
   </div>
  </form>
     
    
   </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>
