<?php
    #importing required script
    require_once'DBOperation.php';

    $response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (!verifyRequiredParams(array('student_id','password'))){
            #getting values
            $student_id = $_POST['student_id'];
            $password = $_POST['password'];
            $per = 'active';

            #creating db operation object
            $db = new DBOperation();

            #adding user to database
            $result = $db->userLogin($student_id,$password,$per);

            #making the response accordingly
            if ($result == USER_LOGGED_IN){
                $response['error'] = false;
                $response['message'] = 'User logged in successfully';
                //$response['status'] = 'customer';
            }
          
            else if($result == USER_NOT_LOGGED_IN){
                $response['error'] = true;
                $response['message'] = 'Invalid Username Or Password';
            }

        }else{
            $response['error'] = true;
            $response['message'] = 'Please fill all the textfield';
        }
    }else{
        $response['error'] = true;
        $response['message'] = 'Invalid request';
    }

    //function to validate the required parameter in request
    function verifyRequiredParams($required_fields)
    {
        //Getting the request parameters
        $request_params = $_REQUEST;

        //Looping through all the parameters
        foreach($required_fields as $field){
            //if any required parameter is missing
            if(!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0){

                #returning true;
                return true;
            }
        }
        return false;
    }
    echo json_encode($response);
?>