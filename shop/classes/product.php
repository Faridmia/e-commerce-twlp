<?php
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/Database.php');
	require_once ($filepath.'/../helpers/formate.php');

?>
<?php error_reporting(E_ALL);
ini_set('display_errors', 1); ?>
<?php 
	class Product{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
			
		}
		public function ProductInsert($data,$file){
			$p_name  = $this->fm->validation($data['p_name']);
			$cat_id  = $this->fm->validation($data['cat_id']);
			$b_id    = $this->fm->validation($data['b_id']);
			$p_des   = $this->fm->validation($data['p_des']);
			$p_price = $this->fm->validation($data['p_price']);
			$p_type  = $this->fm->validation($data['p_type']);
			if(isset($_FILES['p_image']['name'])){
                            $file_name = $_FILES['p_image']['name'];
                            $explode = explode(".", $file_name);
                            $extension = end($explode);
                            $tmp_name = $_FILES['p_image']['tmp_name'];
                            $size = $_FILES['p_image']['size'];
                            $type = $_FILES['p_image']['type'];

            }
            else{
                  $file_name = '';
            }
             $errors = array();
                    if(isset($p_name,$cat_id,$b_id,$p_des,$p_price,$file_name,$p_type)){
                        if(empty($p_name) && empty($cat_id) && empty($b_id) && empty($p_des) && empty($p_price) && empty($file_name) && empty($p_type)){
                            $errors[] = "<span class='error'>All field are required</span>";
                        }
                        else{
                            if(empty($p_name)){
                                $errors[] = "<span class='error'>product name field are required<br/></span>";
                            }
                            if(empty($cat_id)){
                                $errors[] = "<span class='error'>category field are required<br/></span>";
                            }
                            if(empty($b_id)){
                                $errors[] = "<span class='error'>brand field are required<br/></span>";
                            }
                            if(empty($p_des)){
                                $errors[] = "<span class='error'>Description field are required<br/></span>";
                            }
                            if(empty($p_price)){
                                $errors[] = "<span class='error'>price field are required<br/></span>";
                            }
                            if(empty($file_name)){
                                $errors[] = "<span class='error'>upload field are required<br/></span>";
                            }
                             if(empty($p_type)){
                                $errors[] = "<span class='error'>product type field are required<br/></span>";
                            }
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                return $error;
                            }

                        }
                        else{
                            if(!empty(isset($_FILES['p_image']['name']) && !empty($_FILES['p_image']['name']))) {
                              $newFile  = md5(uniqid(rand(), true)).'.'.$extension;
                            }
                 
                            move_uploaded_file($tmp_name, 'upload/product/'.$newFile);
                            $query = "INSERT INTO tbl_product(p_name,cat_id,b_id,p_des,p_price,p_image,p_type) 
                            VALUES('$p_name','$cat_id','$b_id','$p_des','$p_price','$newFile','$p_type')";
                            $insertproduct = $this->db->insert($query);
                            if($insertproduct){
                				$msg = "<span class='success'>product inserted successfully</span>";
                				return $msg;
                		    }
		                	else{
		                		$msg = "<span class='error'>Product not inserted</span>";
		                		return $msg;
		                	}
                    }
                }


		}// function ar closing bracket

		public function getAllproduct(){

			$query = "SELECT p.*, c.cat_name, b.b_name FROM tbl_product as p,tbl_category as c,db_brand as b WHERE p.cat_id=c.cat_id AND p.b_id=b.b_id ORDER BY p.p_id DESC";
			/*$query = "SELECT tbl_product.*,tbl_category.cat_name,db_brand.b_name 
			  FROM tbl_product 
			  INNER JOIN tbl_category 
			  	ON tbl_product.cat_id=tbl_category.cat_id
			  INNER JOIN db_brand 
			  	ON tbl_product.b_id=db_brand.b_id
			 ORDER BY tbl_product.p_id DESC";*/
			$result = $this->db->select($query);
			return $result;

		}// function ar closing bracket

		public function getProById($pid){
			$query  = "SELECT * FROM tbl_product WHERE p_id='$pid'";
			$result = $this->db->select($query);
			return $result;
		}

		public function ProductUpdate($data,$file,$pid){
			$p_name  = $this->fm->validation($data['p_name']);
			$cat_id  = $this->fm->validation($data['cat_id']);
			$b_id    = $this->fm->validation($data['b_id']);
			$p_des   = $this->fm->validation($data['p_des']);
			$p_price = $this->fm->validation($data['p_price']);
			$p_type  = $this->fm->validation($data['p_type']);
			if(isset($_FILES['p_image']['name'])){
                            $file_name = $_FILES['p_image']['name'];
                            $explode = explode(".", $file_name);
                            $extension = end($explode);
                            $tmp_name = $_FILES['p_image']['tmp_name'];
                            $size = $_FILES['p_image']['size'];
                            $type = $_FILES['p_image']['type'];

            }
            else{
                  $file_name = '';
            }
             $errors = array();
                    if(isset($p_name,$cat_id,$b_id,$p_des,$p_price,$p_type)){
                        if(empty($p_name) && empty($cat_id) && empty($b_id) && empty($p_des) && empty($p_price) && empty($p_type)){
                            $errors[] = "<span class='error'>All field are required</span>";
                        }
                        else{
                            if(empty($p_name)){
                                $errors[] = "<span class='error'>product name field are required<br/></span>";
                            }
                            if(empty($cat_id)){
                                $errors[] = "<span class='error'>category field are required<br/></span>";
                            }
                            if(empty($b_id)){
                                $errors[] = "<span class='error'>brand field are required<br/></span>";
                            }
                            if(empty($p_des)){
                                $errors[] = "<span class='error'>Description field are required<br/></span>";
                            }
                            if(empty($p_price)){
                                $errors[] = "<span class='error'>price field are required<br/></span>";
                            }
                             if(empty($p_type)){
                                $errors[] = "<span class='error'>product type field are required<br/></span>";
                            }
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                return $error;
                            }

                        }
                        else{
                            if(!empty(isset($_FILES['p_image']['name']) && !empty($_FILES['p_image']['name']))) {
                              $newFile  = md5(uniqid(rand(), true)).'.'.$extension;
                              move_uploaded_file($tmp_name, 'upload/product/'.$newFile);
	                            $query = "UPDATE tbl_product SET 
	                            p_name  = '$p_name',
	                            cat_id  = '$cat_id',
	                            b_id    = '$b_id',
	                            p_des   = '$p_des',
	                            p_price = '$p_price',
	                            p_image = '$newFile',
	                            p_type  = '$p_type'
	                            WHERE p_id='$pid'";
	                            $updatepro = $this->db->update($query);
	                            if($updatepro){
	                				$msg = "<span class='success'>product updated successfully</span>";
	                				return $msg;
	                		    }
			                	else{
			                		$msg = "<span class='error'>Product not updated</span>";
			                		return $msg;
			                	}
                            }else{
                 
	                            $query = "UPDATE tbl_product SET 
			                            p_name  = '$p_name',
			                            cat_id  = '$cat_id',
			                            b_id    = '$b_id',
			                            p_des   = '$p_des',
			                            p_price = '$p_price',
			                          	p_type  = '$p_type'
			                            WHERE p_id='$pid'";
	                            $updatepro = $this->db->update($query);
	                            if($updatepro){
	                				$msg = "<span class='success'>product updated successfully</span>";
	                				return $msg;
	                		    }
			                	else{
			                		$msg = "<span class='error'>Product not updated</span>";
			                		return $msg;
			                	}
			                }
                    }
                }

		}//function ar closing

		public function delProductById($delid){
			$query = "SELECT * FROM tbl_product WHERE p_id='$delid'";
			$getData = $this->db->select($query);
			if($getData){
				while($delimg = $getData->fetch_assoc()){
					$dellink = "upload/product/".$delimg['p_image'];
					unlink($dellink);
					
				}
			}
			$delquery = "DELETE FROM tbl_product WHERE p_id = '$delid'";
			$delproduct = $this->db->delete($delquery);
			if($delproduct){
				$msg = "Data Deleted successfully";
				return $msg;
			}
			else{
				$msg = "Data not Deleted";
				return $msg;
			}
		}

		public function getFeatureproduct(){
			$query  = "SELECT * FROM tbl_product WHERE p_type='1' ORDER BY p_id DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function getNewproduct(){
			$query  = "SELECT * FROM tbl_product ORDER BY p_id DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;

		}

		public function getSingleProduct($id){
			$query = "SELECT p.*, c.cat_name, b.b_name FROM tbl_product as p,tbl_category as c,db_brand as b WHERE p.cat_id=c.cat_id AND p.b_id=b.b_id AND p.p_id='$id'";
			$result = $this->db->select($query);
			return $result;

		}

		public function latestFromIphone(){
			$query  = "SELECT * FROM tbl_product WHERE cat_id = '2' ORDER BY p_id DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;

		}
		public function latestformSamsung(){
			$query  = "SELECT * FROM tbl_product WHERE cat_id = '3' ORDER BY p_id DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;

		}
		public function latestFromCanon(){
			$query  = "SELECT * FROM tbl_product WHERE cat_id = '7' ORDER BY p_id DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;

		}
		public function latestFromAccer(){
			$query  = "SELECT * FROM tbl_product WHERE cat_id = '4' ORDER BY p_id DESC LIMIT 1";
			$result = $this->db->select($query);
			return $result;

		}

		public function ProductByCat($catid){
			$catid  = $this->fm->validation($catid);
			$query  = "SELECT * FROM tbl_product WHERE cat_id = '$catid'";
			$resultcat = $this->db->select($query);
			return $resultcat;

		}

		public function ProductlatestByCat($catid){

			$catid  = $this->fm->validation($catid);
			$query12  = "SELECT * FROM tbl_category WHERE cat_id = '$catid'";
			$resultcatlatest = $this->db->select($query12);
			return $resultcatlatest;
		}
		public function insertCompareData($p_id,$cmrid){
			$cmrid  = $this->fm->validation($cmrid);
			$p_id  = $this->fm->validation($p_id);
			$cquery = "SELECT * FROM tbl_compare WHERE customer_id = '$cmrid' AND p_id='$p_id'";
			$check = $this->db->select($cquery);
			if($check){
				$msg = "<span class='error'>You are already added...!</span>";
								return $msg;

			}
			$query = "SELECT * FROM tbl_product WHERE p_id='$p_id'";
				$result = $this->db->select($query)->fetch_assoc();
				if($result){
						$p_id     = $result['p_id'];
						$p_name   = $result['p_name'];
						$price    = $result['p_price'];
						$image    = $result['p_image'];
						$query = "INSERT INTO tbl_compare(customer_id,p_id,p_name,price,image) 
                            VALUES('$cmrid','$p_id','$p_name','$price','$image')";
                            $insertcompare = $this->db->insert($query);
                           if($insertcompare){
								$msg = "<span class='success'>Added ! Check Compare Page..</span>";
								return $msg;
							}
							else{
								$msg = "<span class='error'>Not Added</span>";
								return $msg;
							}

                            
						
					}

		}
		public function getCompareData($cmrId){
			$query = "SELECT * FROM tbl_compare WHERE customer_id = '$cmrId' ORDER BY com_id DESC";
			$getData = $this->db->select($query);
			return $getData;
		}

		public function delCompareData($cmrId){
			$delquery = "DELETE FROM tbl_compare WHERE customer_id = '$cmrId'";
			$delcompare = $this->db->delete($delquery);
			return $delcompare;

		}

		public function SaveWhichlistData($pid,$cmrId){
			$querycheck = "SELECT * FROM tbl_whichlist WHERE cmr_id = '$cmrId' AND p_id='$pid'";
			$check = $this->db->select($querycheck);
			if($check){
				$msg = "<span class='error'>You are already added...!</span>";
								return $msg;

			}
			$pquery = "SELECT * FROM tbl_product WHERE p_id='$pid'";
				$result = $this->db->select($pquery)->fetch_assoc();
				if($result){
						$p_id       = $this->fm->validation($result['p_id']);
						$p_name     = $this->fm->validation($result['p_name']);
						$image 	= $this->fm->validation($result['p_image']);
						$price    	= $this->fm->validation($result['p_price']);
						
						$query = "INSERT INTO tbl_whichlist(cmr_id,p_id,p_name,price,image) 
                            VALUES('$cmrId','$p_id','$p_name','$price','$image')";
                            $insertwhichlist = $this->db->insert($query);

                            if($insertwhichlist){
								$msg = "<span class='success'>Added ! whichlist please Check Data..</span>";
								return $msg;
							}
							else{
								$msg = "<span class='error'>Not Added...!</span>";
								return $msg;
							}

                            
						
					}
				}
			public function whichlistData($cmrId){
				$query = "SELECT * FROM tbl_whichlist WHERE cmr_id = '$cmrId' ORDER BY w_id DESC";
				$result = $this->db->select($query);
				return $result;

			}

			public function delwhichlist($pid,$cmrId){
				$delwhichquery = "DELETE FROM tbl_whichlist WHERE p_id ='$pid' and cmr_id = '$cmrId'";
				$getData = $this->db->delete($delwhichquery);
				return $getData;

			

			}

			public function TopbrandAccer(){
			$query  = "SELECT * FROM tbl_product WHERE cat_id = '4' ORDER BY p_id DESC limit 4";
			$result = $this->db->select($query);
			return $result;

		}

		public function TopbrandSamsung(){
			$query  = "SELECT * FROM tbl_product WHERE cat_id = '3' ORDER BY p_id DESC limit 4";
			$result = $this->db->select($query);
			return $result;

		}

		public function topbrandCanon(){
			$query  = "SELECT * FROM tbl_product WHERE cat_id = '7' ORDER BY p_id DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;

		}
	}

?>