<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Custom_ajax extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
  
 }
 

 public function verifylogin()
 {
        $this->mcontents = array();
        if (!empty($_POST)) {
            $this->load->library('form_validation');
            $this->_init_login_validation_rules(); //server side validation of input values
            if ($this->form_validation->run() == FALSE) {// form validation
                $arr = array('status' =>'failed','message'=>'Invalid Username or Password');
            } else {
                $this->_init_login_details();
                $login_details['username'] = $this->username;
                $login_details['password'] = $this->password;
                if ($this->authentication->process_login($login_details) == 'success') {
				    $session_data=$this->session->userdata('logged_in');
					$log_data =array('ip_address' =>$_SERVER['REMOTE_ADDR'],
	                    'attempt' =>'success',
						'username' => $this->username,
						'log_date' =>  date("Y-m-d H:i:s"));
	                $this->common_model->save('img_user_logs',$log_data);
                    $arr = array('status' =>'success');
                } else {
					$log_data =array('ip_address' =>$_SERVER['REMOTE_ADDR'],
	                    'attempt' =>'failure',
						'username' => $this->username,
						'log_date' =>  date("Y-m-d H:i:s"));
	                $this->common_model->save('img_user_logs',$log_data);
                    sf('error_message', 'Invalid Username or Password');
                    $arr = array('status' =>'failed','message'=>'Invalid Username or Password');
                }
            }
		 echo json_encode($arr); 
	     exit;	
        }
   
 }
 
 public function upload_image(){
	      $image='';
		  $file_name = $this->rand_string(6);
		  $config =  array(
							  'upload_path'     => $this->config->item("upload_file_path").'/images',
							  'upload_url'      => base_url()."uploads",
							  'allowed_types'   => "gif|jpg|png|jpeg",
							  'overwrite'       => FALSE,
							  'max_size'        => 15*1024*1024,
							  'file_name'       =>$file_name
								
							);		
		   $this->load->library('upload', $config);
				  
		   if ($this->upload->do_upload('file')) {
					$data = array('upload_data' => $this->upload->data());
					if($data['upload_data']['image_width'] < 1920 and  $data['upload_data']['image_height'] < 1200){
					   
					$arr = array("status"=>"size_error");
					echo json_encode($arr); 
					exit;  
					   	
					}
					$image = $data['upload_data']['file_name'];
					$arr = array("status"=>"yes","image"=>$image);
					echo json_encode($arr); 
					exit; 
		  }
		  else
          {
					$error = array('status'=>'error','error' => $this->upload->display_errors());
					echo json_encode($error); 
					exit;
                        
          }	 
	 
	 
 }
 
 public function upload_thumb_image(){
	      $image='';
		  $file_name = $this->rand_string(6);
		  $config =  array(
							  'upload_path'     => $this->config->item("upload_file_path").'/thumb_images',
							  'upload_url'      => base_url()."uploads/thumb_images",
							  'allowed_types'   => "gif|jpg|png|jpeg",
							  'overwrite'       => FALSE,
							  'max_size'        => "10000",
							  'file_name'       =>$file_name
								
							);		
		   $this->load->library('upload', $config);
				  
		   if ($this->upload->do_upload('file')) {
					$data = array('upload_data' => $this->upload->data());					  
					$image = $data['upload_data']['file_name'];
					$arr = array("status"=>"yes","image"=>$image);
					echo json_encode($arr); 
					exit; 
		  }
		  else
          {
					$error = array('status'=>'error','error' => $this->upload->display_errors());
					echo json_encode($error); 
					exit;
                        
          }	 
	 
	 
 }
 
 
 public function change_password()
  {
	 
	if (!empty($_POST)) {
		
		    $password=$this->input->post('current_password');
			$confirm_password = $this->input->post('confirm_password');
			$user_id = $this->input->post('user_id');
			$query = $this->db->query("SELECT * FROM img_users WHERE user_id=".$user_id." AND  password=LEFT(MD5(CONCAT(MD5('$password'), 'cloud')), 50)");
			if ($query->num_rows() > 0) {
			 
			 $this->db->query("UPDATE img_users SET password=LEFT(MD5(CONCAT(MD5('$confirm_password'), 'cloud')), 50) WHERE user_id=".$user_id."");
			 $arr = array("status"=>"success");
			}
			else{
			   $arr = array("status"=>"failed"); 
			}		
	}
	  
	echo json_encode($arr);
	exit;    	  
	  
  }
  
  public function create_project()
  {
	 
	 $data = array("work_name" => $this->input->post('work_name'),
	               "work_date" => $this->input->post('work_date'),
				   "source_image" =>$this->input->post('uploaded_file_name'),
				   "last_updated" => date("Y-m-d H:m:s")
				  );
	
	$work = $this->common_model->save("img_works",$data);			
	if($work)
	  $arr = array("status"=>"success");
	else
	  $arr = array("status"=>"failed"); 	  
	echo json_encode($arr);
	exit;    	  
	  
	  
  }
  
  public function delete_work()
  {
    
	$work_id = $this->input->post('work_id');	
	$work_resolution_images = $this->common_model->get_data('img_work_resolution_images','id,image_name',array("work_id"=>$work_id));
    if($work_resolution_images){
	  
	  foreach($work_resolution_images as $resolution_image){
		
		 $image_name = $resolution_image['image_name'];
		 $imgfilePath = FCPATH. 'uploads/resolution/'.$image_name;
		 unlink($imgfilePath); 
	  }
	  
	  $this->common_model->delete('img_work_resolution_images',array("work_id"=>$work_id));
		
	}
  
   $img_work = $this->common_model->get_data('img_works','*',array("work_id"=>$work_id));
   
   if($img_work){
	
	 $svg_file_name = $img_work[0]['svg_file_name'];
	 $thumb_file    = $img_work[0]['thumb_file_name']; 
	 $svgfilePath = FCPATH. 'uploads/svg/'.$svg_file_name;
	 $thumbfilePath = FCPATH. 'uploads/thumb/'.$thumb_file;      
	 unlink($svgfilePath);
	 unlink($thumbfilePath); 
	 $this->common_model->delete('img_works',array("work_id"=>$work_id));   
   }
    
   $arr = array("status"=>"success");
   echo json_encode($arr);
   exit;   
  
  }
  
  public function get_template_list(){
 
    $category = $this->input->post('category');
	$template_list = $this->common_model->get_data('img_svg_templates','*',array("category_id"=>$category)); 
	$template_select_box = '<select class="form-control" name="template" id="template"><option value="-1"></option>';
	foreach($template_list as $template){
	  
	  $template_select_box .='<option value="'.$template['template_name'].'">'.$template['template_name'].'</option>';
	  	
		
	}
   $template_select_box .='</select>'; 
   $arr = array("status"=>"success","select_box"=>$template_select_box);
   echo json_encode($arr);
   exit;    	
 
  }
  /*public function generate_image(){
	 $data = $this->input->post('image_data');
	// list($type, $data) = explode(';', $data);
     //list(, $data)      = explode(',', $data);
	 $data = str_replace(' ','+',$data);
     //$data = base64_decode($data);
	 $image_name = 'temp_'.$this->rand_string(7).'.png';
     $filePath = FCPATH.'uploads/temp/'.$image_name;
     $uri = substr($data, strpos($data, ',') + 1);
     file_put_contents($filePath, base64_decode($uri));
	 $new_width=1920;
	 $new_height=1200;
	 $image_resized = imagecreatetruecolor($new_width, $new_height);
     $image_tmp = imagecreatefrompng ($filePath);
     imagecopyresampled($image_resized, $image_tmp, 0, 0, 0, 0, $new_width, $new_height,800,500);

	   // Output
	 imagejpeg($image_resized, $filePath, 100);
	 imagedestroy($image_resized);
	 $arr = array("status"=>"yes","image"=>$image_name);
	 echo json_encode($arr);
	 exit; 
	 	  
  }*/
  
  public function generate_image(){
	$canvas_data = $this->input->post('canvas_data');
	
	$file_name = $this->input->post('file_name');
	$svg_name = $this->rand_string(9).'.svg'; 
	$svgfilePath = FCPATH. 'uploads/temp_svg/'.$svg_name;
	$svgOrigfilePath = FCPATH. 'uploads/svg/'.$svg_name;
	$canvas_data= mb_convert_encoding(stripslashes($canvas_data), "UTF-8");
	file_put_contents($svgOrigfilePath, $canvas_data);	 	
	if(preg_match_all('/href="(http:\/\/[^\/"]+\/?)?([^"]*)"/', $canvas_data,$matches,PREG_SET_ORDER)){
		
		foreach($matches as $match)	{
				
			$link = $match[1].$match[2];
			$base64 = $this->getImagebase64($link);	
			$canvas_data = str_replace($link, $base64, $canvas_data);
		
		}
	}
	file_put_contents($svgfilePath, $canvas_data);
	$destination_path = FCPATH.'uploads/temp/';
	$thumb_destination_path = FCPATH.'uploads/thumb/';
	$image_name=$this->convertSVGtoImage($svgfilePath,$destination_path,'temp',1920,1200);
	//$image_name=$this->convertSVGtoImage($svgfilePath,$destination_path,'temp',800,500);
	$thumb_image_name=$this->convertSVGtoImage($svgfilePath,$thumb_destination_path,'thumb',100,100);
	unlink($svgfilePath);
	$arr = array("status"=>"yes","image"=>$image_name,"svg_name"=>$svg_name,"thumb_image_name"=>$thumb_image_name);
	echo json_encode($arr);
	exit;  
	 	  
  }
  
  public function generate_resolution_image(){
	
	$selected_images = $this->input->post('selected_images');
	$selected_image_arr = explode(',',$selected_images);
	$file_name= $this->input->post('image');
	$type = $this->input->post('type');
	$filePath = FCPATH. 'uploads/temp/'.$file_name;
	$image = imagecreatefrompng($filePath);
	$generate_files = array();
	$crop_from = $this->input->post('crop_from');
	$crop = $this->input->post('crop');
	foreach($selected_image_arr as $img_resln){
	  
	  if($img_resln=='1024X768'){	
		 $thumb_width = 1024;
         $thumb_height = 768;
		$generate_files[]= $this->create_image_resolution($thumb_width,$thumb_height,$image,$crop_from,$crop);	
	  }
	 if($img_resln=='1152X864'){	
		 $thumb_width = 1152;
         $thumb_height = 864;
		 $generate_files[]= $this->create_image_resolution($thumb_width,$thumb_height,$image,$crop_from,$crop);	
	 }
	 if($img_resln=='1280X1024'){	
		 $thumb_width = 1280;
         $thumb_height = 1024;
		 $generate_files[]= $this->create_image_resolution($thumb_width,$thumb_height,$image,$crop_from,$crop);	
	 }
	 if($img_resln=='1366X768'){	
		 $thumb_width = 1366;
         $thumb_height = 768;
		 $generate_files[]=$this->create_image_resolution($thumb_width,$thumb_height,$image,$crop_from,$crop);	
	  }
	 if($img_resln=='1440X900'){	
		 $thumb_width = 1440;
         $thumb_height = 900;
		 $generate_files[]=$this->create_image_resolution($thumb_width,$thumb_height,$image,$crop_from,$crop);	
	  }
	 if($img_resln=='1600X900'){	
		 $thumb_width = 1600;
         $thumb_height = 900;
		 $generate_files[]=$this->create_image_resolution($thumb_width,$thumb_height,$image,$crop_from,$crop);	
	  }
	if($img_resln=='1600X1200'){	
		 $thumb_width = 1600;
         $thumb_height = 1200;
		 $generate_files[]=$this->create_image_resolution($thumb_width,$thumb_height,$image,$crop_from,$crop);	
	  }
	if($img_resln=='1680X1050'){	
		 $thumb_width = 1680;
         $thumb_height = 1050;
		 $generate_files[]=$this->create_image_resolution($thumb_width,$thumb_height,$image,$crop_from,$crop);	
	  } 
	if($img_resln=='1920X1080'){	
		 $thumb_width = 1920;
         $thumb_height = 1080;
		 $generate_files[]=$this->create_image_resolution($thumb_width,$thumb_height,$image,$crop_from,$crop);	
	  }
	if($img_resln=='2736x1824'){	
		 $thumb_width = 2736;
         $thumb_height = 1824;
		 $generate_files[]=$this->create_image_resolution($thumb_width,$thumb_height,$image,$crop_from,$crop);	
	  }           
		
	  
	}
	
	if($type=='create'){
	
		$data = array("work_name" => $this->input->post('work_name'),
					   "work_date" => $this->input->post('work_date'),
					   "start_date" => $this->input->post('start_date'),
					   "end_date" => $this->input->post('end_date'),
					   "svg_file_name"=>$this->input->post('svg_file_name'),
					   "thumb_file_name"=>$this->input->post('thumb_file_name'),
					   "last_updated" => date("Y-m-d H:m:s")
					  );
		
		$work = $this->common_model->save("img_works",$data);
	
	}
	else{
	  
	  $data = array("work_name" => $this->input->post('work_name'),
					   "work_date" => $this->input->post('work_date'),
					   "start_date" => $this->input->post('start_date'),
					   "end_date" => $this->input->post('end_date'),
					   "svg_file_name"=>$this->input->post('svg_file_name'),
					   "thumb_file_name"=>$this->input->post('thumb_file_name'),
					   "last_updated" => date("Y-m-d H:m:s")
					  );
		
	 $this->common_model->update("img_works",$data,array("work_id"=>$this->input->post('work_id')));	
	 $this->common_model->delete("img_work_resolution_images",array("work_id"=>$this->input->post('work_id'))); 	
	 $work = $this->input->post('work_id');
	
	}
	
	foreach($generate_files as $file_name){
		
		$data = array("work_id"=>$work,
					  "image_name"=>$file_name,
					  "status"=>1);
		$work_images = $this->common_model->save("img_work_resolution_images",$data);
  	  
  }
  unlink($filePath);
  $arr = array("status"=>"yes");
  echo json_encode($arr);
  exit;  

  }
   
  public function create_image_resolution($thumb_width,$thumb_height,$image,$crop_from='top',$crop='left'){
	
	   $width = imagesx($image);
       $height = imagesy($image);
	   $file_name ='Screen-'.$this->rand_string(9).'_'.$thumb_width.'X'.$thumb_height.'.png'; 
	   $filePath = FCPATH. 'uploads/resolution/'.$file_name.'';
       $original_aspect = $width / $height;
       $thumb_aspect = $thumb_width / $thumb_height;
       if ( $original_aspect >= $thumb_aspect )
       {
		   // If image is wider than thumbnail (in aspect ratio sense)
		   $new_height = $thumb_height;
		   $new_width = $width / ($height / $thumb_height);
       }
      else
       {
		   // If the thumbnail is wider than the image
		   $new_width = $thumb_width;
		   $new_height = $height / ($width / $thumb_width);
       }

      $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

     // Resize and crop
     /*imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);*/
	if($crop_from=='top'){			   
		imagecopyresampled($thumb,
					   $image,
					   0 - ($new_width - $thumb_width)/2, // Center the image horizontally
					   0, 
					   0, 0,
					   $new_width, $new_height,
					   $width, $height);
	}
	else{
	 if($crop=='left'){ 	
		 imagecopyresampled($thumb,
						   $image,
						   0 - ($new_width - $thumb_width), // Center the image horizontally
						   0 - ($new_height - $thumb_height), 
						   0, 0,
						   $new_width, $new_height,
						   $width, $height);
	 }
	 else if($crop=='right'){
	   
	   imagecopyresampled($thumb,
					   $image,
					   0, 
					   0 - ($new_height - $thumb_height), 
					   0, 0,
					   $new_width, $new_height,
					   $width, $height);	 
		 
	 }
		
	}
	
				   
     imagepng($thumb, $filePath, 9);  
	 return  $file_name; 
	  
  }
  
  public function getImagebase64($path){
	
	//$path = FCPATH. 'uploads/images/'.$file_name;
	 $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
	$type =  ($type=='jpg' or $type=='jpeg') ? 'jpeg' : 'png';
    $base64 = 'data:image/'.$type.';base64,' . base64_encode($data);  
	return $base64;  
	  
  }
  
  public function convertSVGtoImage($svg_path,$destination_path,$prefix,$width,$height){
	
	$im = new Imagick();
	$fonts = $im->queryfonts();

	$im->setResolution(300, 300); // for 300 DPI example
	$svg = file_get_contents($svg_path);
	//$im->setFormat('MSVG');
	$im->readImageBlob($svg);
	$im->setImageFormat("png");
	$im->resizeImage($width, $height, imagick::FILTER_LANCZOS, 1);  /*Optional, if you need to resize*/
	$image_name = $prefix.'_'.$this->rand_string(7).'.png';
    $filePath = $destination_path.$image_name;
	$im->writeImage($filePath);
    return $image_name;

		  
  
  }
  
  

  
  
  public function rand_string($length) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);

  }
 
 /**
     * validating the form elemnets
     */
  public function _init_login_validation_rules() {
        $this->form_validation->set_rules('username', 'username', 'required|max_length[50]');
        $this->form_validation->set_rules('password', 'password', 'required|max_length[20]');
    }

  public function _init_login_details() {
        $this->username = $this->input->post("username");
        $this->password = $this->input->post("password");
    }
	
  public function checkString($string){

    return $string === '' || (bool) preg_match('/^\d{9}[xXvV]$/', $string);
 }	
 

}



?>