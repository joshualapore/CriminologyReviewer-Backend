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
if(isset($_POST['dteacher']))
{
  $did=$_POST['dids'];
  mysqli_query($con,"DELETE FROM tbl_admin WHERE id='$did'") or die(mysqli_error());
  header("location:teacher.php");
}
?>

<?php
if(isset($_POST['addteacher'])){
    $tid=$_POST['teacherid'];
    $ln=$_POST['lastname'];
    $fn=$_POST['firstname'];
    $em=$_POST['email'];
    
    $check = mysqli_query($con,"SELECT teacherid from tbl_admin where teacherid='$tid'")or die(mysqli_error());

      if(mysqli_num_rows($check)!=0){
        echo"
          <script type='text/javascript'>
          alert('teacher id already exists.');
          open('teacher.php','_self');
          </script>
        ";}
      else{
      mysqli_query($con,"INSERT into tbl_admin VALUES('','$tid','$ln','$fn','$ln','admin','$tid','2','$em')") or die(mysqli_error());
        echo"
          <script type='text/javascript'>
          alert('Teacher Successfully Added.');
          open('teacher.php','_self');
          </script>
        ";
      }
    }
  ?>

<?php include 'head.php';?>
<?php include 'navbar.php';?>

	<section style="background-image:url(img/bg3.jpg); padding-top: 150px; padding-bottom: 270px" class="page-section" id="services">
  	<div class="container">
   		<div class="col-md-12">
        <div class="card shadow mb-20 bg-dark">  
          <div class="card-header py-2" style="background-color: #0e2433;">
             <b style="font-size: 20px; color:#fec503">List of Teachers</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
            <button type="button" class="btn-dark btn-outline-secondary" style="height: 30px;color: #fec503"  data-toggle="modal" title="Add Teacher" data-target="#myModal">
                <i class="fa fa-user-plus"></i></button>
          </div>

            <div class="card-body bg-light">
              <div class="table-responsive">
                  <table class="table table-secondary table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
            
                  <thead>
                    <tr>
                      <th>Teacher ID</th>
                      <th>Full Name</th>
                      <th><center>Edit</center></th>
                      <th><center>Delete</center></th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $con=mysqli_connect("localhost","root","","db_reviewer");
                      $selectquery="SELECT * FROM tbl_admin WHERE userlevel='admin'";
                      $result=mysqli_query($con, $selectquery);
                                    
                      while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                      <td><?php echo $row['username'];?></td>
                      <td><?php echo $row['lastname'];?>, <?php echo $row['firstname'];?></td>
                      <td align="center">
                        <a href="editteacher.php?id=<?php echo $row['id']?>"><i class="fa fa-edit text-success"></i></a>
                      </td>
                      <td align="center">
                              <script>
                                  function confirm_del(){
                                  if(confirm("Are You Sure?")==1){
                                      document.getElementById('deleteBtn').submit();
                                      }
                                  }
                              </script>
                              
                              <form method="post">
                                <input type="hidden" name="dids" value="<?php echo $row['id']; ?>"/>
                                <button type="submit" onclick="confirm_del();return false;" name="dteacher" style="height: 10px; padding-top: 10px" id="deleteBtn" class="btn-danger"></button>
                              </form>
                            </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  
              </table>
            </div>

    		 
    	  </div>
    	</div>
    </div>
  </section>

<div class="container">
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg"> 
      <div class="modal-content">
      
        <div class="modal-header">
          <h4 class="modal-title text-dark">Add Teacher</h4>
          <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body bg-light">
          <form method="post">
            <div class="form-group">
              <label for="sid">Teacher ID:</label>
              <input type="text" class="form-control" name="teacherid" id="tid" placeholder="Teacher Id" maxlength="20" required>
            </div>
            <div class="form-group">
              <label for="fn">Firstname:</label>
              <input type="text" class="form-control" name="firstname" id="fn" placeholder="First Name" maxlength="20" required>
            </div>
            <div class="form-group">
              <label for="ln">Lastname:</label>
              <input type="text" class="form-control" name="lastname" id="ln" placeholder="Last Name" maxlength="20" required>
            </div>
            <div class="form-group">
              <label for="em">E-mail Address:</label>
              <input type="email" class="form-control" name="email" id="em" placeholder="Email address" maxlength="30" required>
            </div>

              <div class="modal-footer btn-group">
                <input type="submit" name="addteacher" class="btn-info" value="Add" style="width: 110px">
                <input type="reset" name="clear" class="btn-info" value="Clear" style="width: 110px">
                <button type="button" class="btn-danger" data-dismiss="modal">Close</button>
              </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</div>  

<?php include 'footer.php';?>
   
</body>
</html>
