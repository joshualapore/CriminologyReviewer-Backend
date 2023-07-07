<?php
session_start();
if($_SESSION['id']){
    $id=$_SESSION['id'];
    $firstname=$_SESSION['firstname'];
    $lastname=$_SESSION['lastname'];
    $userlevel=$_SESSION['userlevel'];
    $teacherid=$_SESSION['teacherid'];
  }
else{
    header("location:login.php");
  }
?>

<?php include 'connection.php'; ?>
<?php include 'import.php'; ?>
<?php
if(isset($_POST['deletebtn'])){
  mysqli_query($con,"DELETE FROM tbl_student") or die(mysqli_error());
  echo"
          <script type='text/javascript'>
          alert('Successfully deleted all students.');
          open('home.php','_self');
          </script>
        ";
  }
?>

<?php
if(isset($_POST['dstudent']))
{
  $did=$_POST['dids'];
  mysqli_query($con ,"DELETE FROM tbl_student WHERE id='$did'") or die(mysqli_error());
  header("location:home.php");
}
?>

<?php
if(isset($_POST['addstudent'])){
    $sid=$_POST['studentid'];
    $ln=$_POST['lastname'];
    $fn=$_POST['firstname'];
    
    $check=mysqli_query($con ,"SELECT studentid from tbl_student where studentid='$sid'")or die(mysqli_error());

      if(mysqli_num_rows($check)!=0){
        echo"
          <script type='text/javascript'>
          alert('Student id already exists.');
          open('home.php','_self');
          </script>
        ";}
      else{
      mysqli_query($con ,"INSERT into tbl_student VALUES('','$sid','$ln','$sid','$fn','$ln','$teacherid','deactive')") or die(mysqli_error());
        echo"
          <script type='text/javascript'>
          alert('Student Successfully Added.');
          open('home.php','_self');
          </script>
        ";
      }
    }
  ?>


<?php include 'head.php';?>
<?php include 'navbar.php';?>


  <section style="background-image:url(img/bg3.jpg); padding-top: 150px; padding-bottom: 270px;" class="page-section" id="services">
    <div class="container">
       <div class="col-md-12">

    <div class="card shadow mb-20" style="background-color: #0e2433;">  
      <div class="card-header py-2">
        <b style="font-size: 20px;color:#fec503">List of Students</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <?php if ($userlevel=='admin') {
        	echo '<div class="btn-group" align="left">
              <button type="button" class="btn-dark btn-outline-secondary"  style="height: 30px;color:#fec503;"  data-toggle="modal" data-target="#myModal">
                <i class="fa fa-user-plus"></i> Add Student</button>&nbsp;
              <button type="button" class="btn-dark btn-outline-secondary" style="height: 30px;color:#fec503"  data-toggle="modal" data-target="#myModall">
                <i class="fa fa-upload"></i> Import Excel</button> &nbsp;
              <form method="post" action="export.php" >
                  <button type="submit" name="export" data-toggle="tool-tip" title="Export Students" class="btn-dark btn-outline-secondary" style="color:#fec503"><i class="fa fa-download"></i> Export</button>&nbsp;
              </form>
                  <form method="post">
                    <button type="submit" onclick="confirm_del();return false;" class="btn-dark btn-outline-secondary" name="deletebtn" data-toggle="tool-tip" id="deleteBtnn" title="Delete All Students" style="color:#fec503"><i class="fa fa-trash"> Delete All</i></button>
                  </form>
            </div>';
        }else
            
        ?>



          <?php include 'imports.php';?>
          <?php include 'addstudent.php';?>
      </div>

    
      <div class="card-body bg-light">
        <div class="table-responsive">
          <table class="table table-secondary table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
            
            <thead>
              <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th><center>Edit</center></th>
                <th><center>Delete</center></th>
              </tr>
            </thead>

            <tbody>
              <?php
                $con=mysqli_connect("localhost","root","","db_reviewer");
                if ($userlevel=='admin') {
                	$selectquery="SELECT * FROM tbl_student WHERE teacher='$teacherid'";
                }
                else{
                	$selectquery="SELECT * FROM tbl_student";
                }
                

                $result=mysqli_query($con, $selectquery);
                              
                while($row = mysqli_fetch_assoc($result)){
              ?>
                <tr>
                  <td><?php echo $row['studentid'];?></td>
                  <td><?php echo $row['lastname'];?>, <?php echo $row['firstname'];?></td>
                  <td align="center">
                    <a href="editstudent.php?id=<?php echo $row['id']?>"><i class="fa fa-edit text-success"></i></a>
                  </td>
                  <td align="center">
                          <form method="post">
                            <input type="hidden" name="dids" value="<?php echo $row['id']; ?>"/>
                            <button type="submit" onclick="confirm_del();return false;" style="height: 10px; padding-top: 10px" 
                            	name="dstudent" id="deleteBtn" class="btn-danger">
                             </button>
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
<script>
    function confirm_del(){
     	if(confirm("Are You Sure You Want To Delete All?")==1){
            document.getElementById('deleteBtnn').submit();}}
</script>
<script>
    function confirm_del(){
        if(confirm("Are You Sure?")==1){
            document.getElementById('deleteBtn').submit();
                                  }
}
</script>


<?php include 'footer.php';?>
