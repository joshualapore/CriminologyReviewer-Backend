<?php
class DBOperation {
private $conn;
//Constructor 
function __construct() {
require_once dirname(__FILE__) . '/Constants.php'; require_once dirname(__FILE__) . '/DBConnect.php'; // opening db connection
$db = new DBConnect();
$this->conn = $db->connect(); }


//userlogin
public function userLogin($student_id, $password)
{
			$stmt = $this->conn->prepare("SELECT * FROM tbl_student WHERE studentid = ? AND password = ? AND status = 'deactive' ");
			$stmt->bind_param('ss',$student_id,$password);
			
			if ($stmt->execute()) {
				$rowsAffected = $stmt->fetch();
				if ($rowsAffected > 0) {
					return USER_LOGGED_IN;
				}
				
				else
				{
					/*$stmt2 = $this->conn->prepare("SELECT * FROM tbl_students WHERE username = ? AND password = ? AND stats = 'active' ");
					$stmt2->bind_param("ss",$username,$password);	
					if ($stmt2->execute())
					{	
						$rowsAffected1 = $stmt2->fetch();
						if ($rowsAffected1 > 0) {
							return USER_LOGGED_IN;
						}*/
						return USER_NOT_LOGGED_IN;
					}
				}
			
			} 
			
	} 

?>