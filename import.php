<?php
$conn = mysqli_connect("localhost","root","","db_reviewer");
require_once('excel_reader2.php');
require_once('spreadsheet-reader-master/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
                $studentid = "";
                if(isset($Row[0])) {
                    $studentid = mysqli_real_escape_string($conn,$Row[0]);
                }

                $firstname = "";
                if(isset($Row[1])) {
                    $firstname = mysqli_real_escape_string($conn,$Row[1]);
                }
                
                $lastname = "";
                if(isset($Row[2])) {
                    $lastname = mysqli_real_escape_string($conn,$Row[2]);
                }

           
                if (!empty($studentid) || !empty($firstname)  || !empty($lastname)){
                    $query = "INSERT into tbl_student (username,password,studentid,firstname,lastname,teacher) values('".$studentid."','".$lastname."','".$studentid."','".$firstname."','".$lastname."','$teacherid')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                          echo"
                          <script type='text/javascript'>
                            alert('Successfully imported into database!');
                            open('home.php','_self');
                          </script>
                        ";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}

?>

