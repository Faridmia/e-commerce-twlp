<?php
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/Database.php');
	require_once ($filepath.'/../helpers/formate.php');

?>

<?php 
	class Slider{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
			
		}

		public function addSlider($data,$file){
				$slidertitle   = $this->fm->validation($data['slider_title']);
                $sliderlink    = $this->fm->validation($data['slider_link']);
                if(isset($_FILES['slider_image']['name'])){
                            $file_name = $_FILES['slider_image']['name'];
                            $explode = explode(".", $file_name);
                            $extension = end($explode);
                            $tmp_name = $_FILES['slider_image']['tmp_name'];
                            $size = $_FILES['slider_image']['size'];
                            $type = $_FILES['slider_image']['type'];

                }
                    else{
                        $file_name = '';
                    }
                    $errors = array();
                    if(isset($slidertitle,$sliderlink,$file_name)){
                        if(empty($slidertitle) && empty($sliderlink) && empty($file_name)){
                            $errors[] = "All field are required";
                        }
                        else{
                            if(empty($slidertitle)){
                                $errors[] = "slidertitle field are required<br/>";
                            }
                            if(empty($sliderlink)){
                                $errors[] = "sliderlink field are required<br/>";
                            }
                            if(empty($file_name)){
                                $errors[] = "upload field are required<br/>";
                            }
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                            if(!empty(isset($_FILES['slider_image']['name']) && !empty($_FILES['slider_image']['name']) )) {
                              $newFile  = md5(uniqid(rand(), true)).'.'.$extension;
                            }
                 
                            move_uploaded_file($tmp_name, 'upload/slider/'.$newFile);
                            $query = "INSERT INTO tbl_slider(slider_title,slider_link,slider_image) 
                            VALUES('$slidertitle','$sliderlink','$newFile')";
                            $inserted_rows = $this->db->insert($query);
                            if ($inserted_rows) {
                              $msg = "<span class='success'>Slider Inserted Successfully.
                             </span>";
                             return $msg;
                           } else {
                              $msg = "<span class='error'>Slider Not Inserted !</span>";
                           }

                        
                    }
                }

                    
            }

            public function getSliderData(){
            	$query = "SELECT * FROM tbl_slider";
            	$getdata = $this->db->select($query);
            	return $getdata;
            }

            public function sliderShowData($sliderid){
            	$query = "SELECT * FROM tbl_slider WHERE slider_id = '$sliderid'";
            	$getdata = $this->db->select($query);
            	return $getdata;

            }

            public function updateSlider($data,$sliderid){
            	$slidertitle   = $this->fm->validation($data['slider_title']);
                $sliderlink    = $this->fm->validation($data['slider_link']);
                if(isset($_FILES['slider_image']['name'])){
                            $file_name = $_FILES['slider_image']['name'];
                            $explode = explode(".", $file_name);
                            $extension = end($explode);
                            $tmp_name = $_FILES['slider_image']['tmp_name'];
                            $size = $_FILES['slider_image']['size'];
                            $type = $_FILES['slider_image']['type'];

                }
                    else{
                        $file_name = '';
                    }
                    $errors = array();
                    if(isset($slidertitle,$sliderlink,$file_name)){
                        if(empty($slidertitle) && empty($sliderlink) && empty($file_name)){
                            $errors[] = "All field are required";
                        }
                        else{
                            if(empty($slidertitle)){
                                $errors[] = "slidertitle field are required<br/>";
                            }
                            if(empty($sliderlink)){
                                $errors[] = "sliderlink field are required<br/>";
                            }
                            if(empty($file_name)){
                                $errors[] = "upload field are required<br/>";
                            }
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                            if(!empty(isset($_FILES['slider_image']['name']) && !empty($_FILES['slider_image']['name']) )) {
                              $newFile  = md5(uniqid(rand(), true)).'.'.$extension;
                            }
                 
                            move_uploaded_file($tmp_name, 'upload/slider/'.$newFile);
                            $query = "UPDATE tbl_slider SET
                            		slider_title = '$slidertitle',
                            		slider_link = '$sliderlink',
                            		slider_image = '$newFile'
                            		WHERE slider_id = '$sliderid'";
                            
                            $updateslider = $this->db->update($query);
                            if ($updateslider) {
                              $msg = "<span class='success'>Slider updated Successfully.</span>";
                             return $msg;
                           } else {
                              $msg = "<span class='error'>Slider Not update !</span>";
                              return $msg;
                           }

                        
                    }
                }


            }

            public function delSliderData($delid){
                $delquery = "DELETE FROM tbl_slider WHERE slider_id = '$delid'";
                $deleteData = $this->db->delete($delquery);
                if ($deleteData) {
                    $msg = "<span class='success'>Slider Delete Successfully.</span>";
                    return $msg;
                } else{
                    $msg = "<span class='error'>Slider Not Delete...!</span>";
                }
            }

            public function getSliderImg(){
                $query = "SELECT * FROM tbl_slider ORDER BY slider_id LIMIT 5";
                $getdata = $this->db->select($query);
                return $getdata;
            }
            public function getLogoData(){
                $query = "SELECT * FROM tbl_logo WHERE l_id = '1'";
                $selectquery = $this->db->select($query);
                return $selectquery;
            }

            public function updateLogo($data,$file){
                $logotitle   = $this->fm->validation($data['title']);
                if(isset($_FILES['logo_image']['name'])){
                            $file_name = $_FILES['logo_image']['name'];
                            $explode = explode(".", $file_name);
                            $extension = end($explode);
                            $tmp_name = $_FILES['logo_image']['tmp_name'];
                            $size = $_FILES['logo_image']['size'];
                            $type = $_FILES['logo_image']['type'];

                }
                    else{
                        $file_name = '';
                    }
                    $errors = array();
                    if(isset($logotitle,$file_name)){
                        if(empty($logotitle) && empty($file_name)){
                            $errors[] = "All field are required";
                        }
                        else{
                            if(empty($logotitle)){
                                $errors[] = "logotitle field are required<br/>";
                            }
                            if(empty($file_name)){
                                $errors[] = "upload field are required<br/>";
                            }
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                            if(!empty(isset($_FILES['logo_image']['name']) && !empty($_FILES['logo_image']['name']) )) {
                              $newFile  = md5(uniqid(rand(), true)).'.'.$extension;
                            }
                 
                            move_uploaded_file($tmp_name, 'upload/logo/'.$newFile);
                            $query = "UPDATE tbl_logo SET
                                    logo_title = '$logotitle',
                                    logo_image = '$newFile'
                                    WHERE l_id = '1'";
                            
                            $updatelogo = $this->db->update($query);
                            if ($updatelogo) {
                              $msg = "<span class='success'>logo updated Successfully.</span>";
                             return $msg;
                           } else {
                              $msg = "<span class='error'>Logo Not update !</span>";
                              return $msg;
                           }

                        
                    }
                }


            }

            public function InsertCominfo($data){
                $com_name       = $this->fm->validation($data['com_name']);
                $com_phone      = $this->fm->validation($data['com_phone']);
                $com_fax        = $this->fm->validation($data['com_fax']);
                $com_email      = $this->fm->validation($data['com_email']);
                $com_twitter    = $this->fm->validation($data['com_twitter']);
                $com_facebook   = $this->fm->validation($data['com_facebook']);
                $com_country    = $this->fm->validation($data['com_country']);

                 $errors = array();
                    if(isset($com_name,$com_phone,$com_fax,$com_email,$com_twitter,$com_facebook,$com_country)){
                        if(empty($com_name) && empty($com_phone) && empty($com_fax) && empty($com_email) && empty($com_twitter) && empty($com_facebook) && empty($com_country)){
                            $errors[] = "All field are required";
                        }
                        else{
                            if(empty($com_name)){
                                $errors[] = "com_name field are required<br/>";
                            }
                            if(empty($com_phone)){
                                $errors[] = "com_phone field are required<br/>";
                            }
                            if(empty($com_fax)){
                                $errors[] = "com_fax field are required<br/>";
                            }
                            if(empty($com_email)){
                                $errors[] = "com_email field are required<br/>";
                            }
                            if(empty($com_twitter)){
                                $errors[] = "com_twitter field are required<br/>";
                            }
                            if(empty($com_facebook)){
                                $errors[] = "com_facebook field are required<br/>";
                            }
                            if(empty($com_country)){
                                $errors[] = "com_country field are required<br/>";
                            }
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                           
                            $query = "INSERT INTO company_info(com_name,com_phone,com_fax,email,country,facebook,twitter) 
                            VALUES('$com_name','$com_phone','$com_fax','$com_email','$com_country','$com_facebook','$com_twitter')";
                            $inserted_rows = $this->db->insert($query);
                            if ($inserted_rows) {
                              $msg = "<span class='success'>company info Inserted Successfully.
                             </span>";
                             return $msg;
                           } else {
                              $msg = "<span class='error'>Information Not Inserted !</span>";
                           }

                        
                    }
                }


            }

            public function getAllinfo(){
                $query = "SELECT * FROM company_info ORDER BY com_id DESC";
                $getdata = $this->db->select($query);
                return $getdata;
            }

            public function getComData($comid){
                $query = "SELECT * FROM company_info WHERE com_id = '$comid'";
                $getdata = $this->db->select($query);
                return $getdata;

            }

           public function updateCom($data,$comid){
                $comid          = $this->fm->validation($comid);
                $com_name       = $this->fm->validation($data['com_name']);
                $com_phone      = $this->fm->validation($data['com_phone']);
                $com_fax        = $this->fm->validation($data['com_fax']);
                $com_email      = $this->fm->validation($data['com_email']);
                $com_twitter    = $this->fm->validation($data['com_twitter']);
                $com_facebook   = $this->fm->validation($data['com_facebook']);
                $com_country    = $this->fm->validation($data['com_country']);

                 $errors = array();
                    if(isset($com_name,$com_phone,$com_fax,$com_email,$com_twitter,$com_facebook,$com_country)){
                        if(empty($com_name) && empty($com_phone) && empty($com_fax) && empty($com_email) && empty($com_twitter) && empty($com_facebook) && empty($com_country)){
                            $errors[] = "All field are required";
                        }
                        else{
                            if(empty($com_name)){
                                $errors[] = "com_name field are required<br/>";
                            }
                            if(empty($com_phone)){
                                $errors[] = "com_phone field are required<br/>";
                            }
                            if(empty($com_fax)){
                                $errors[] = "com_fax field are required<br/>";
                            }
                            if(empty($com_email)){
                                $errors[] = "com_email field are required<br/>";
                            }
                            if(empty($com_twitter)){
                                $errors[] = "com_twitter field are required<br/>";
                            }
                            if(empty($com_facebook)){
                                $errors[] = "com_facebook field are required<br/>";
                            }
                            if(empty($com_country)){
                                $errors[] = "com_country field are required<br/>";
                            }
                        }
                        if(!empty($errors)){
                            foreach($errors as $error){
                                echo $error;
                            }

                        }
                        else{
                           
                            $query = "UPDATE company_info SET 
                            com_name   = '$com_name',
                            com_phone  = '$com_phone',
                            com_fax    =  '$com_fax',
                            email      =  '$com_email',
                            country    =  '$com_country',
                            facebook   =  '$com_facebook',
                            twitter    = '$com_twitter'
                            where com_id = '$comid'";
                            $updaterow = $this->db->update($query);
                            if ($updaterow) {
                              $msg = "<span class='success'>company info update Successfully.
                             </span>";
                             return $msg;
                           } else {
                              $msg = "<span class='error'>Information Not updated !</span>";
                           }

                        
                    }
                }

           }

           public function delcomData($delcomid){
                $delcomid          = $this->fm->validation($delcomid);
                $query = "DELETE FROM company_info WHERE com_id = '$delcomid'";
                $delquery = $this->db->delete($query);
                if ($delquery){
                    $msg = "<span class='success'>company info delete Successfully.
                             </span>";
                     return $msg;
                }else {
                    $msg = "<span class='error'>Information Not Deleted !</span>";
                }


           }

           public function infoGetTable(){
                    $query = "SELECT * FROM company_info";
                    $getdata = $this->db->select($query);
                    return $getdata;
           }


            

}
?>