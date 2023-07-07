<?php
session_start();
if($_SESSION['id']){
    $id=$_SESSION['id'];
    $firstname=$_SESSION['firstname'];
    $lastname=$_SESSION['lastname'];
    $userlevel=$_SESSION['userlevel'];
  }
else{
    header("location:login.php");
  }
?>

<?php include 'connection.php'; ?>

<?php
  $view_user=mysqli_query($con,"SELECT * from tbl_admin WHERE id=".$_GET['id']) or die(mysqli_error());
  $row=mysqli_fetch_array($view_user);

  if(isset($_POST['btnedit']))
  {

      $sid=$_POST['sid']; 
      $tid=$_POST['tid'];
      $pw=$_POST['pw'];
      $fn=$_POST['fn'];
      $ln=$_POST['ln'];
      $et=$_POST['et'];

   $check=mysqli_query($con,"SELECT username from tbl_admin where username='$tid'")or die(mysqli_error());

      if(mysqli_num_rows($check)!=0){
        echo"
          <script type='text/javascript'>
          alert('teacher id already exists.');
          open('teacher.php','_self');
          </script>
        ";}
      else{
      mysqli_query($con,"UPDATE tbl_admin SET username='$tid',password='$pw',firstname='$fn',lastname='$ln',examtime='$et' WHERE id='$sid'") or die(mysqli_error());
      echo"
          <script type='text/javascript'>
          alert('Teacher successfully edited.');
          open('teacher.php','_self');
          </script>
        ";
    }      
  }
?>


<?php include 'head.php';?>
<?php include 'navbar.php';?>



	<section style="background-image:url(img/bg3.jpg); padding-top: 150px;" class="page-section" id="services">
  	<div class="container d-flex h-100 align-items-center">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
   		<div class="col-md-7">
		    <div class="card shadow mb-4 bg-dark">
      		<div class="card-header py-2" style="background-color: #0e2433;">
        	   <b class="m-0 font-weight-bold" style="color:#fec503">Edit Teacher Information</b><br>
          </div>

            <div class="card-body bg-light">
              <form method="post">
                  <input type="hidden" name="sid" value="<?php echo $row['id']; ?>">
                  <h7 class="m-0 font-weight-bold text-dark">
                    Teacher / Username: <input type="text" value="<?php echo $row['username'];?>" name="tid" 
                              class="form-control col-md-7" maxlength="20"onkeypress="return isNumberKey(event)" required></h7><br>
					        <h7 class="m-0 font-weight-bold text-dark">
                    First Name: <input type="text" value="<?php echo $row['firstname'];?>" name="fn" 
                              class="form-control col-md-7"  onkeypress="return ValidateAlpha(event)" maxlength="20" required></h7><br>
                  <h7 class="m-0 font-weight-bold text-dark">
                    Last Name: <input type="text" value="<?php echo $row['lastname'];?>" name="ln" 
                              class="form-control col-md-7" onkeypress="return ValidateAlpha(event)" maxlength="20" required></h7><br>
                  <h7 class="m-0 font-weight-bold text-dark">
                    Exam Hour: <input type="text" value="<?php echo $row['examtime'];?>" name="et" 
                              class="form-control col-md-7" maxlength="1" onkeypress="return isNumberKey(event)" required></h7><br>
                  <h7 class="m-0 font-weight-bold text-dark">
                    Password: <input type="password" value="<?php echo $row['password'];?>" name="pw" 
                              class="form-control col-md-7" id="myInput" maxlength="20" required>&nbsp;
                              <input type="checkbox" onclick="myFunction()"> Show Password</h7><br><br>
                  <h7 class="m-0 font-weight-bold text-dark btn-group">
							      <input type="submit" name="btnedit" class="btn-info form-control m-0 font-weight-bold text-dark" style="width: 167px" value="Update">&nbsp;
                    <input type="reset" class="btn-info form-control m-0 font-weight-bold   text-dark" style="width: 166px" value="Reset"></h7>
					    </form>

    		  </div>
    	  </div>
    	</div>
    </div>
  </section>

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
