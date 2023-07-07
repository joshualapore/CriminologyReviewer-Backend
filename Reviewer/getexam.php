<?php

    #CHECK IF REQUEST METHOD IS POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        #INCLUDE DATABASE CONNECTION FILE
        include("Constants.php");

        #CREATE CONNECTION
        $connection = new mysqli($HostName, $HostUser, $HostPassword, $DatabaseName);
        if ($connection -> connect_error){
            die("Connection Failed: " . $connection -> connect_error);
        }

        $username = mysqli_real_escape_string($connection, $_POST["student_id"]);

     
        #FILTER DATABASE WITH USERNAME AND PASSWORD FROM THE POST REQUEST
        $sql = "SELECT teacher FROM tbl_student where username = '$username' ";

        #EXECUTE QUERY AND COUNT ROW RESULTS
        $sqlresult = $connection -> query($sql);

        try {
            if ($sqlresult -> num_rows > 0) {
                $rows = $sqlresult -> fetch_assoc();
                $response = $rows["teacher"] ; 

                $sql2 = "SELECT examtime FROM tbl_admin where teacherid = '$response' ";
                $sqlresult2 = $connection -> query($sql2);
              

                if ($sqlresult2 -> num_rows > 0) {
                $rows2 = $sqlresult2 -> fetch_assoc();
                 $response2['examtime'] = $rows2["examtime"];
                
         
                }
                else{
                $response2 = 'No teacher';
                }

                
            }
            else{
            $response2 = 'username invalid';
            }
             echo json_encode($response2);
           
            
        } catch (Exception $e) {
            echo "$e";
        } finally {
            #CLOSE CONNECTION
            mysqli_close($connection);
        }

    }

?>