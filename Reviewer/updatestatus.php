<?php
    $response = array();
    #CHECK IF REQUEST METHOD IS POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        #INCLUDE DATABASE CONNECTION FILE
        include("Constants.php");
        #CREATE CONNECTION
        $connection = new mysqli($HostName, $HostUser, $HostPassword, $DatabaseName);
        if ($connection -> connect_error){
            die("Connection Failed: " . $connection -> connect_error);
        }

         #FETCH ALL POST DATA AND ASSIGN TO THEIR RESPECTIVE VARIABLES
         $id = mysqli_real_escape_string($connection, $_POST["student_id"]);
        

        #FILTER DATABASE WITH USERNAME AND PASSWORD FROM THE POST REQUEST
         $sql = "SELECT status FROM tbl_student where username = '$id' ";
        //$sql1 = "UPDATE tbl_student set status = '' where id = '$id' ";
       

        #EXECUTE QUERY AND COUNT ROW RESULTS
        $sqlresult = $connection -> query($sql);
        try {
             if ($sqlresult -> num_rows > 0) {        
            $rows = $sqlresult -> fetch_assoc();
            $checkstatus = $rows["status"] ; 
            if ($checkstatus == 'active'){
                $sql1 = "UPDATE tbl_student set status = 'deactive' where username = '$id' ";
                $sqlresult1 = $connection ->query($sql1);
                if ($sqlresult1)
                {
                $response['error'] = false;
                    $response['message'] = 'edit successfuly';
                }
                }
            else
            {
                $sql2 = "UPDATE tbl_student set status = 'active' where username = '$id' ";
                $sqlresult2 = $connection ->query($sql2);
                if ($sqlresult2)
                {
                    $response['error'] = false;
                    $response['message'] = 'edit successfuly';
                }
            }

        } else {
            $response['message'] = 'Job Create failed';
        }
            echo json_encode($response);
          
        } catch (Exception $e) {
            echo "$e";
        } finally {
            #CLOSE CONNECTION
            mysqli_close($connection);
        }
    }
?>