<?php
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/Database.php');
	require_once ($filepath.'/../helpers/formate.php');

?>
<?php 
	class Cart{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
			
		}
		public function AddTocart($quenty,$pid){
			$quenty   = $this->fm->validation($quenty);
			$pid      = $this->fm->validation($pid);
			$sid      = session_id();
			$squery   = "SELECT * FROM tbl_product WHERE p_id = '$pid'";
			$result   = $this->db->select($squery)->fetch_assoc();
			$p_name   = $result['p_name'];
			$p_price  = $result['p_price'];
			$image  = $result['p_image'];
			$checkedquery = "SELECT * FROM tbl_cart WHERE p_id = '$pid' AND s_id = '$sid'";
			$getpro   = $this->db->select($checkedquery);
			if($getpro){
				$msg = "Product Already exit..!";
				return $msg;
			}else{
			     $query = "INSERT INTO tbl_cart(s_id,p_id,p_name,price,quenty,image) 
                            VALUES('$sid','$pid','$p_name','$p_price','$quenty','$image')";
                            $insertproduct = $this->db->insert($query);
                            if($insertproduct){
                				header('location:cart.php');
                		    }
		                	else{
		                		header('location:404.php');
		                	}
		    }

			
		}
		
			public function getcartProduct(){
			$sid = session_id();
			$query = "SELECT * FROM tbl_cart WHERE s_id='$sid'";
			$result = $this->db->select($query);
			return $result;
		
		   }

		   public function UpdateCartquenty($cartid,$quenty){
		   	$quenty      = $this->fm->validation($quenty);
			$cartid      = $this->fm->validation($cartid);

			$uquery = "UPDATE tbl_cart SET quenty='$quenty' WHERE cart_id='$cartid'";
                	$updatecat = $this->db->update($uquery);
                	if($updatecat){
                		header("location:cart.php");
                	}
                	else{
                		$msg = "<span class='error'>quantity not updated</span>";
                		return $msg;
                	}

		   }
		   public function delProductBuyCart($deldata){
		   	$deldata      = $this->fm->validation($deldata);
		   	$delquery     = "DELETE FROM tbl_cart WHERE cart_id = '$deldata'";
		   	$delselect    = $this->db->delete($delquery);
		   	        if($delselect){
                		$msg = "<script>window.location = 'cart.php';</script>";
                		return $msg;
                	}
                	else{
                		$msg = "<span class='error'>cart not deleted</span>";
                		return $msg;
                	}

		   }
		   public function checkcarttable(){
		   	$sid = session_id();
			$query1 = "SELECT * FROM tbl_cart WHERE s_id='$sid'";
			$result = $this->db->select($query1);
			return $result;

		   }

		   public function delcustomerCart(){
		   		$sid = session_id();
		   		$delquery = "DELETE FROM tbl_cart WHERE s_id='$sid'";
		   		$result = $this->db->delete($delquery);
				echo $result;

		   }

		   public function orderProduct($cmrId){
		   		$sid = session_id();
				$query2 = "SELECT * FROM tbl_cart WHERE s_id='$sid'";
				$getPro = $this->db->select($query2);
				if($getPro){
					while($result = $getPro->fetch_assoc()) {
						$dateinsert 			= date("Y-m-d h:i:s");
						$p_id     = $result['p_id'];
						$p_name   = $result['p_name'];
						$quantity = $result['quenty'];
						$price    = $result['price'] * $quantity;
						$image    = $result['image'];
						$query = "INSERT INTO tbl_order(cmr_id,p_id,p_name,quantity,price,image,dateinsert) 
                            VALUES('$cmrId','$p_id','$p_name','$quantity','$price','$image','$dateinsert')";
                            $insertorderproduct = $this->db->insert($query);

                            
						
					}
					return $insertproduct;
				}

		   }

		   public function paymentAmount($cmrId){
		   		$dateinsert 			= date("Y-m-d h:i:s");
		   	
		   		$query = "SELECT * from tbl_order WHERE cmr_id='$cmrId' AND dateinsert = '$dateinsert'";
				$getPro = $this->db->select($query);

				return $getPro;
		   }

		   public function getOrdertProduct($cmrId){
		   		$query = "SELECT * from tbl_order WHERE cmr_id='$cmrId' order by dateinsert desc";
				$getorder = $this->db->select($query);

				return $getorder;

		   }
		   public function checkorderdetail($cmrId){
		   		$queryorder = "SELECT * from tbl_order WHERE cmr_id='$cmrId'";
				$getorder1 = $this->db->select($queryorder);

				return $getorder1;

		   }

		   public function getAllorderProduct(){
		   		$orderquery = "SELECT * from tbl_order";
		   		$getData    = $this->db->select($orderquery);
		   		return $getData;
		   }

		   public function shiftProduct($id,$price,$time){
		   		$id  = $this->fm->validation($id);
		   		$price  = $this->fm->validation($price);
		   		$time  = $this->fm->validation($time);

		   		$query = "UPDATE tbl_order SET 
	                            status  = '1'
	                            WHERE cmr_id = '$id' AND price = '$price' AND dateinsert = '$time'";
	                            $updatepro = $this->db->update($query);
	                            if($updatepro){
	                				$msg = "<span class='success'> updated successfully</span>";
	                				return $msg;
	                		    }
			                	else{
			                		$msg = "<span class='error'>not updated</span>";
			                		return $msg;
			                	}
		   }

		   public function deleteOrder($id,$price,$time){
		   		$id  = $this->fm->validation($id);
		   		$price  = $this->fm->validation($price);
		   		$time  = $this->fm->validation($time);

		   		$delquery = "DELETE FROM tbl_order WHERE cmr_id = '$id' AND price = '$price' AND dateinsert = '$time'";
		   		$delOrder    = $this->db->delete($delquery);
		   	    if($delOrder){
                	$msg = "<span class='error'>Data Deleted successfully...!</span>";
                	return $msg;
                }
                else{
                	$msg = "<span class='error'>Order not deleted</span>";
                	return $msg;
                }

		   }

		   public function confirmOrder($id,$price,$time){
		   		$id  = $this->fm->validation($id);
		   		$price  = $this->fm->validation($price);
		   		$time  = $this->fm->validation($time);

		   		$query = "UPDATE tbl_order SET 
	                            status  = '2'
	                            WHERE cmr_id = '$id' AND price = '$price' AND dateinsert = '$time'";
	                            $updateconfirm = $this->db->update($query);
	                            if($updateconfirm){
	                				$msg = "<span class='success'> updated successfully</span>";
	                				return $msg;
	                		    }
			                	else{
			                		$msg = "<span class='error'>not updated</span>";
			                		return $msg;
			                	}

		   }


		 
	}
?>