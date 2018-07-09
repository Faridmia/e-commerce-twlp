<?php
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/Database.php');
	require_once ($filepath.'/../helpers/formate.php');

?>
<?php
	class Category{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
			
		}
		public function CatInsert($catName){
			$catName = $this->fm->validation($catName);
			//$catName = mysqli_real_escape_string($this->db->link,$catName);
			$errors = array();
			if(isset($catName)){
					if(empty($catName)){
						$errors[] = "<span class='error'>Category field are required</span>";

					}
					
					 if(!empty($errors)){
	                            foreach($errors as $error){
	                                return $error;
	                            }

	                }
                else{

                	$insertq = "INSERT INTO tbl_category(cat_name)VALUES('$catName')";
                	$catinsert = $this->db->insert($insertq);
                	if($catinsert){
                		$msg = "<span class='success'>Category inserted successfully</span>";
                		return $msg;
                	}
                	else{
                		$msg = "<span class='error'>Category not inserted</span>";
                		return $msg;
                	}

                }
               }
		}
		public function getAllcat(){
			$query  = "SELECT * FROM tbl_category ORDER BY cat_id DESC";
			$result = $this->db->select($query);
			return $result;

		}
		public function getCatById($catid){
			$query  = "SELECT * FROM tbl_category WHERE cat_id='$catid'";
			$result = $this->db->select($query);
			return $result;
		}
		public function CatUpdate($catName,$catid){
			$catName = $this->fm->validation($catName);
			$errors = array();
			if(isset($catName)){
					if(empty($catName)){
						$errors[] = "<span class='error'>Category field are required</span>";

					}
					
					 if(!empty($errors)){
	                            foreach($errors as $error){
	                                return $error;
	                            }

	                }
                else{

                	$uquery = "UPDATE tbl_category SET cat_name='$catName' WHERE cat_id='$catid'";
                	$updatecat = $this->db->update($uquery);
                	if($updatecat){
                		$msg = "<span class='success'>Category updated successfully</span>";
                		return $msg;
                	}
                	else{
                		$msg = "<span class='error'>Category not updated</span>";
                		return $msg;
                	}

                }
               }
		}

		public function delCatId($delid){
			$delid = mysqli_real_escape_string($this->db->link,$delid);
			$deletequery = "DELETE FROM tbl_category WHERE cat_id='$delid'";
			$deletecat = $this->db->delete($deletequery);
			if($deletecat){
                $msg = "<span class='success'>Category deleted successfully</span>";
                return $msg;
            }
            else{
                $msg = "<span class='error'>Category not deleted</span>";
                return $msg;
            }

		}

	}

?>