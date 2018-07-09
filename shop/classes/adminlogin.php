<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/session.php');
	Session::checkLogin();
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/formate.php');

?>
<?php
	 
	class Adminlogin{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
			
		}
		public function adminLogin($a_username,$a_password){
			$a_username = $this->fm->validation($a_username);
			$a_password = $this->fm->validation($a_password);
			$a_username = mysqli_real_escape_string($this->db->link,$a_username);
			$a_password = mysqli_real_escape_string($this->db->link,$a_password);

			$errors = array();
			if(isset($a_username,$a_password)){
				if(empty($a_username) && empty($a_password)){
					$errors[] = "All field are required";
				}
				else{
					if(empty($a_username)){
						$errors[] = "username field are required";

					}
					if(empty($a_password)){
						$errors[] = "password field are required";

					}

				}
				 if(!empty($errors)){
                            foreach($errors as $error){
                                return $error;
                            }

                }
                else{

                	$query = "SELECT * FROM adminlogin WHERE a_user='$a_username' AND a_password='$a_password'";

                	$result = $this->db->select($query);
                	if($result != false){
                		$value = $result->fetch_assoc();
                		Session::set("adminlogin",true);
                		Session::set("adminid",$value['a_id']);
                		Session::set("adminname",$value['a_name']);
                		Session::set("adminuser",$value['a_user']);
                		header("location:index.php");
                	}
                	else{
                		$msg =  "username or password doesn't match";
                		return $msg;
                	}
                }
			}

		}
	}
?>