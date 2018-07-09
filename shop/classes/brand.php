<?php
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/Database.php');
	require_once ($filepath.'/../helpers/formate.php');

?>
<?php
	
	class Brand{
		
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
			
		}
		public function brandInsert($b_name){
			$b_name = $this->fm->validation($b_name);
			$errors = array();
			if(isset($b_name)){
					if(empty($b_name)){
						$errors[] = "<span class='error'>brand name field are required</span>";

					}
					
					 if(!empty($errors)){
	                            foreach($errors as $error){
	                                return $error;
	                            }

	                }
                else{

                	$insertq = "INSERT INTO db_brand(b_name)VALUES('$b_name')";
                	$br_insert = $this->db->insert($insertq);
                	if($br_insert){
                		$msg = "<span class='success'>brand inserted successfully</span>";
                		return $msg;
                	}
                	else{
                		$msg = "<span class='error'>brand not inserted</span>";
                		return $msg;
                	}

                }
               }
		}

		public function getAllbrand(){
			$query  = "SELECT * FROM db_brand ORDER BY b_id DESC";
			$result = $this->db->select($query);
			return $result;

		}
		public function getbrandById($bid){
			$query  = "SELECT * FROM db_brand WHERE b_id='$bid'";
			$result = $this->db->select($query);
			return $result;
		}

		public function BrandUpdate($b_name,$bid){
			$b_name = $this->fm->validation($b_name);
			$errors = array();
			if(isset($b_name)){
					if(empty($b_name)){
						$errors[] = "<span class='error'>Brand field are required</span>";

					}
					
					 if(!empty($errors)){
	                            foreach($errors as $error){
	                                return $error;
	                            }

	                }
                else{

                	$uquery = "UPDATE db_brand SET b_name='$b_name' WHERE b_id='$bid'";
                	$updatebrand = $this->db->update($uquery);
                	if($updatebrand){
                		$msg = "<span class='success'>brand updated successfully</span>";
                		return $msg;
                	}
                	else{
                		$msg = "<span class='error'>Brand not updated</span>";
                		return $msg;
                	}

                }
               }
		}

		public function delBrandId($delid){
			$delid = mysqli_real_escape_string($this->db->link,$delid);
			$deletequery = "DELETE FROM db_brand WHERE b_id='$delid'";
			$deletecat = $this->db->delete($deletequery);
			if($deletecat){
                $msg = "<span class='success'>Brand deleted successfully</span>";
                return $msg;
            }
            else{
                $msg = "<span class='error'>Brand not deleted</span>";
                return $msg;
            }

		}


	}
?>