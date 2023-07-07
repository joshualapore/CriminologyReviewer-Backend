<?php
//connection
include'connection.php';

//field variables
$username=$_POST['username'];
$password=$_POST['password'];

//fetch all records
$query1="SELECT * from tbl_admin WHERE username='$username' AND password='$password'";
$result1=mysqli_query($con,$query1);
$record=mysqli_num_rows($result1);

//second query
if($record==1){
  $query2="SELECT * from tbl_admin WHERE username='$username' AND password='$password'";
  $result2=mysqli_query($con,$query2);
  //list of array
  while(list($id,$username,$password,$firstname,$lastname,$userlevel,$teacherid,$examtime,$email)=mysqli_fetch_array($result2))
  {
    $aid=$id;
    $afirstname=$firstname;
    $alastname=$lastname;
    $ausername=$username;
    $apassword=$password;
    $auserlevel=$userlevel;
    $ateacherid=$teacherid;
    $aexamtime=$examtime;
    $aemail=$email;

  }
    session_start();
    $_SESSION['id']=$aid;
    $_SESSION['firstname']=$afirstname;
    $_SESSION['lastname']=$alastname;
    $_SESSION['username']=$ausername;
    $_SESSION['password']=$apassword;
    $_SESSION['userlevel']=$auserlevel;
    $_SESSION['teacherid']=$ateacherid;
    $_SESSION['examtime']=$aexamtime;
    $_SESSION['email']=$aemail;
    $_SESSION['id'];
    
  if ($_SESSION['userlevel']=='admin') {
    echo"
      <script type='text/javascript'>
        open('home.php','_self');
      </script>
    ";
  }
  else{
    echo"
      <script type='text/javascript'>
        open('teacher.php','_self');
      </script>
    ";
  }
  }
else{
    echo"
      <script type='text/javascript'>
        alert('Invalid Login!');
        open('login.php','_self');
      </script>
    ";
  }
?>