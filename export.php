<?php  
//export.php  
$connect = mysqli_connect("localhost","root","","db_reviewer");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM tbl_student";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <td>Student ID</td>
          <td>Last Name</td>
          <td>First Name</td> 

     
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["studentid"].'</td>  
                         <td>'.$row["lastname"].'</td>  
                         <td>'.$row["firstname"].'</td>  
      
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=studentlist.xls');
  echo $output;
 }
}
?>
