<?php
session_start();
if($_SESSION['id']){
    $id=$_SESSION['id'];
    $firstname=$_SESSION['firstname'];
    $lastname=$_SESSION['lastname'];
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
    $userlevel=$_SESSION['userlevel'];
    $examtime=$_SESSION['examtime'];
    $emails=$_SESSION['email'];
  }
else{
    header("location:login.php");
  }
?>

<?php include 'connection.php'; ?>

<?php

   if(isset($_POST['btnchange']))
  	{
      $sid=$_POST['sid']; 
      $tid=$_POST['tid'];
      $pw=$_POST['pw'];
      $fn=$_POST['fn'];
      $ln=$_POST['ln'];
      $em=$_POST['em'];
      if ($userlevel=='admin') {$et=$_POST['et'];}else{}
      
      if ($userlevel=='admin') {

              
              mysqli_query($con,"UPDATE tbl_admin SET username='$tid',password='$pw',firstname='$fn',lastname='$ln',examtime='$et', teacherid='$tid', email='$em' WHERE id='$sid'") or die(mysqli_error());
                $_SESSION['firstname']=$fn;
                $_SESSION['lastname']=$ln;
                $_SESSION['username']=$tid;
                $_SESSION['password']=$pw;
                $_SESSION['examtime']=$et;
                $_SESSION['email']=$em;

          }
      else{
              mysqli_query($con,"UPDATE tbl_admin SET username='$tid',password='$pw',firstname='$fn',lastname='$ln', email='$em' WHERE id='$sid'") or die(mysqli_error());
              $_SESSION['firstname']=$fn;
              $_SESSION['lastname']=$ln;
              $_SESSION['username']=$tid;
              $_SESSION['password']=$pw;
              $_SESSION['email']=$em;
  
      }
      if ($userlevel=='admin') {
        echo"
          <script type='text/javascript'>
          alert('Account Updated Successfully');
          open('home.php','_self');
          </script>
        ";
      }else{
      echo"
          <script type='text/javascript'>
          alert('Account Updated Successfully');
          open('teacher.php','_self');
          </script>
        ";
  	}
  }
  	
?>


<?php include 'head.php';?>
<?php include 'navbar.php';?>



	<section style="background-image:url(img/bg3.jpg); padding-top: 150px" class="page-section" id="services">
  	<div class="container d-flex h-100 align-items-center">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
   		<div class="col-md-7">
		    <div class="card shadow mb-4 bg-dark">
      		<div class="card-header py-2" style="background-color: #0e2433;">
        	   <b class="m-0 font-weight-bold" style="color:#fec503">Edit Account Information</b>
          </div>

            <div class="card-body bg-light">
              <form method="post">
                <input type="hidden" name="sid" value="<?php echo $id; ?>">
        	   		  <h7 class="m-0 font-weight-bold text-dark">
                    Teacher ID / Username: <input type="text" value="<?php echo $username; ?>" name="tid" 
                              class="form-control col-md-7" onkeypress="return isNumberKey(event)" maxlength="20" required></h7><br>
                  <h7 class="m-0 font-weight-bold text-dark">
                    First Name: <input type="text" value="<?php echo $firstname;?>" name="fn" 
                              class="form-control col-md-7" onkeypress="return ValidateAlpha(event)" maxlength="20" id="hj"  required></h7><br>
                  <h7 class="m-0 font-weight-bold text-dark" >
                    Last Name: <input type="text" value="<?php echo $lastname; ?>" name="ln" 
                              class="form-control col-md-7"onkeypress="return ValidateAlpha(event)" maxlength="20" required></h7><br>
                  <h7 class="m-0 font-weight-bold text-dark">
                    Exam Hour: <input type="text" value="<?php echo $examtime; ?>" name="et" 
                              class="form-control col-md-7"onkeypress="return isNumberKey(event)"  maxlength="1" <?php if ($userlevel=='admin'){echo 'required';}else{echo 'disabled';}?>></h7><br>
                  <h7 class="m-0 font-weight-bold text-dark" >
                    E-mail Address: <input type="email" value="<?php echo $emails; ?>" name="em" 
                              class="form-control col-md-7" maxlength="30" required></h7><br>            
                  <h7 class="m-0 font-weight-bold text-dark">
                    Password: <input type="password" value="<?php echo $password;?>" name="pw" 
                              class="form-control col-md-7" id="myInput" maxlength="20" required>&nbsp;
                              <input type="checkbox" onclick="myFunction()"> Show Password</h7><br><br>
							      <input type="submit" name="btnchange" class="btn-info form-control text-dark m-0 font-weight-bold" style="width: 145px" value="Update"></b>
					      </form>
    		    </div>
    	  </div>
    	</div>   
    </div>
  </section>
  <script type="text/javascript">
    $("input").change(function(){
  alert("The text has been changed.");
});
  </script>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script type="text/javascript">
function isNumberKey(evt){
  var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 45 && charCode > 31 
  && (charCode < 48 || charCode > 57))
        return false;
        return true;
  }
       
    function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }
</script>
<?php include 'footer.php';?>
   
</body>
</html>
