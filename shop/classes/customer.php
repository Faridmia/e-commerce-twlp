<?php
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/Database.php');
	require_once ($filepath.'/../helpers/formate.php');
?>
<?php 
	class Customer{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
			
		}
		public function customerDataInsert($data){
			$name      = $this->fm->validation($data['name']);
			$city      = $this->fm->validation($data['city']);
			$zip       = $this->fm->validation($data['zip']);
			$email     = $this->fm->validation($data['email']);
			$address   = $this->fm->validation($data['address']);
			$country   = $this->fm->validation($data['country']);
			$phone     = $this->fm->validation($data['phone']);
			$password  = $this->fm->validation(md5($data['password']));
			$query2 = "SELECT * FROM tbl_customer";
	                        	$result = $this->db->select($query2);
	                        	$row    = mysqli_fetch_array($result);
	                        	$row    = $row['cus_email'];

			$errors = array();
                    if(isset($name,$city,$zip,$email,$address,$country,$phone,$password)){
                        if(empty($name) && empty($city) && empty($zip) && empty($email) && empty($address) && empty($country) && empty($phone) && empty($password)){
                            $errors[] = "<span class='error'>All field are required</span>";
                        }
                        else{
                            if(empty($name)){
                                $errors[] = "<span class='error'>name field are required<br/></span>";
                            }
                            if(empty($city)){
                                $errors[] = "<span class='error'>City field are required<br/></span>";
                            }
                            if(empty($zip)){
                                $errors[] = "<span class='error'>Zip code field are required<br/></span>";
                            }
                            if(empty($email)){
                                $errors[] = "<span class='error'>Email field are required<br/></span>";
                            }
                            elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                            	$errors[] = "<span class='error'>invalid email format...!<br/></span>";
                            	
                            	
                            }
                            elseif($email == $row){
                            	$errors[] = "<span class='error'>Your email are already exits..!<br/></span>";

                            }
                            if(empty($address)){
                                $errors[] = "<span class='error'>address field are required<br/></span>";
                            }
                            if(empty($password)){
                                $errors[] = "<span class='error'>password field are required<br/></span>";
                            }
                             if(empty($country)){
                                $errors[] = "<span class='error'>country type field are required<br/></span>";
                            }
                            if(empty($phone)){
                                $errors[] = "<span class='error'>phone type field are required<br/></span>";
                            }
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                return $error;
                            }

                        }
                        else{

			
                            
                            $query = "INSERT INTO tbl_customer(cus_name,cus_city,cus_zip,cus_address,cus_country,cus_phone,cus_email,cus_password) 
                            VALUES('$name','$city','$zip','$address','$country','$phone','$email','$password')";
                            $insertcusterData = $this->db->insert($query);
                            if($insertcusterData){
                				$msg = "<span class='success'>Your Registration successfully</span>";
                				return $msg;
                		    }
		                	else{
		                		$msg = "<span class='error'>Registration fail...!</span>";
		                		return $msg;
		                	}
                    }
                }

		}
		public function customerlogin($data){
			$email          = $this->fm->validation($data['email']);
			$password       = $this->fm->validation(md5($data['password']));

			$errors = array();
                    if(isset($email,$password)){
                        if(empty($email) && empty($password)){
                            $errors[] = "<span class='error'>All field are required</span>";
                        }
                        else{
                            if(empty($password)){
                                $errors[] = "<span class='error'>password field are required<br/></span>";
                            }
                            if(empty($email)){
                                $errors[] = "<span class='error'>Email field are required<br/></span>";
                            }
                            elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                            	$errors[] = "<span class='error'>invalid email format...!<br/></span>";
                            	
                            	
                            }
                            
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                return $error;
                            }

                        }
                        else{
                        	$query = "SELECT * FROM tbl_customer WHERE cus_email = '$email' AND cus_password = '$password'";
                        	$result = $this->db->select($query);

                        	if($result != false){
                        		$value = $result->fetch_assoc();

                        		session::set("cmrlogin",true);
                        		session::set("cmrid",$value['cus_id']);
                        		session::set("cmrName",$value['cus_name']);
                        		header("location:orderdetails.php");
                        	}
                        	else
                        	{
                        		$msg = "<span class='error'>Email Or Password doesn't Matched....!</span>";
                				return $msg;
                        	}

                            
                    }
                }

		}
        public function getCmrProfile($id){
            $query = "SELECT * FROM tbl_customer WHERE cus_id = '$id'";
            $result = $this->db->select($query);
            return $result;

        }

        public function customerdetailupdate($data,$cmrid){
            //$cmrid                = $this->fm->validation($data['cmrid']);
            $cus_name             = $this->fm->validation($data['cus_name']);
            $cus_phone            = $this->fm->validation($data['cus_phone']);
            $cus_email            = $this->fm->validation($data['cus_email']);
            $cus_address          = $this->fm->validation($data['cus_address']);
            $cus_city             = $this->fm->validation($data['cus_city']);
            $cus_zip              = $this->fm->validation($data['cus_zip']);
            $cus_country          = $this->fm->validation($data['cus_country']);

            $errors = array();
                    if(isset($cus_name,$cus_phone,$cus_email,$cus_address,$cus_city,$cus_zip,$cus_country)){
                        if(empty($cus_name) && empty($cus_phone) && empty($cus_email) && empty($cus_address) && empty($cus_city) && empty($cus_zip) && empty($cus_country)){
                            $errors[] = "<span class='error'>All field are required</span>";
                        }
                        else{
                            if(empty($cus_name)){
                                $errors[] = "<span class='error'>customer name field are required<br/></span>";
                            }
                            if(empty($cus_phone)){
                                $errors[] = "<span class='error'>customer phone field are required<br/></span>";
                            }
                            if(empty($cus_address)){
                                $errors[] = "<span class='error'>customer address field are required<br/></span>";
                            }
                            if(empty($cus_email)){
                                $errors[] = "<span class='error'>Email field are required<br/></span>";
                            }
                            elseif(!filter_var($cus_email,FILTER_VALIDATE_EMAIL)){
                                $errors[] = "<span class='error'>invalid email format...!<br/></span>";
                                
                                
                            }
                            if(empty($cus_city)){
                                $errors[] = "<span class='error'>customer city field are required<br/></span>";
                            }
                            if(empty($cus_zip)){
                                $errors[] = "<span class='error'>customer zip field are required<br/></span>";
                            }
                             if(empty($cus_country)){
                                $errors[] = "<span class='error'> customer country field are required<br/></span>";
                            }
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                return $error;
                            }

                        }
                        else{

            
                            
                            $query = "UPDATE tbl_customer set
                                    cus_name    = '$cus_name',
                                    cus_city    = '$cus_city',
                                    cus_zip     = '$cus_zip',
                                    cus_address = '$cus_address',
                                    cus_country = '$cus_country',
                                    cus_phone   = '$cus_phone',
                                    cus_email   = '$cus_email'
                                    WHERE cus_id = '$cmrid'";
                            
                            $UpdateData = $this->db->update($query);
                            if($UpdateData){
                                $msg = "<span class='success'>Profile updated successfully</span>";
                                return $msg;
                            }
                            else{
                                $msg = "<span class='error'>Profile not Update...!</span>";
                                return $msg;
                            }
                    }
                }

        }
   }
?>