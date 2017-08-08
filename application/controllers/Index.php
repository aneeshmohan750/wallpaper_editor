<?php


defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Index  extends CI_Controller {

	/** 
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name> 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	var $gen_contents = array();
        
    public function __construct() {
		
            parent::__construct();
			
    }
	
   public function index(){

	   if($this->session->userdata('is_login')){

		  $this->gen_contents['page_title'] = 'Dusup Image Editor';
          $this->gen_contents['current_controller']='index';
		  $session_data=$this->session->userdata('logged_in');
		  $this->gen_contents['username'] = $session_data['USERNAME'];
		  $this->gen_contents['user_id'] =  $session_data['USER_ID'];
		  $this->gen_contents['name']    = $session_data['NAME'];
		  $this->gen_contents['works'] = $this->common_model->get_data('img_works','*','','work_id DESC');	 
		  $this->load->view('common/header',$this->gen_contents);
		  $this->load->view('index',$this->gen_contents);
		  $this->load->view('common/footer');
	   }
	   else{

	          redirect('index/login', 'refresh');

	   }	  
   }
   
  
   public function create_work(){

	   if($this->session->userdata('is_login')){
		  $this->gen_contents['page_title'] = 'Image Editor';
          $this->gen_contents['current_controller']='index';
		  $session_data=$this->session->userdata('logged_in');
		  $this->gen_contents['username'] = $session_data['USERNAME'];
		  $this->gen_contents['user_id'] =  $session_data['USER_ID'];
		  $this->gen_contents['name']    = $session_data['NAME'];
		  $this->gen_contents['fontfamilyList'] = $this->common_model->get_data('img_font_family','*',array('status'=>1));
		  $this->gen_contents['categoryList'] = $this->common_model->get_data('img_categories','*');
		  $this->gen_contents['iconList'] = $this->common_model->get_data('img_icon_set','*',array('status'=>1));
		  $this->gen_contents['logoList'] = $this->common_model->get_data('img_logo_set','*',array('status'=>1));
		  $this->load->view('common/header',$this->gen_contents);
		  $this->load->view('create_work',$this->gen_contents);
		  $this->load->view('common/footer');
	   }
	   else{

	          redirect('index/login', 'refresh');

	   }	  
   }
   
   public function edit_work($work_id){

	   if($this->session->userdata('is_login')){
		  $this->gen_contents['page_title'] = 'Image Editor';
          $this->gen_contents['current_controller']='edit_work';
		  $session_data=$this->session->userdata('logged_in');
		  $this->gen_contents['username'] = $session_data['USERNAME'];
		  $this->gen_contents['user_id'] =  $session_data['USER_ID'];
		  $this->gen_contents['name']    = $session_data['NAME'];
		  $this->gen_contents['fontfamilyList'] = $this->common_model->get_data('img_font_family','*',array('status'=>1));
		  $this->gen_contents['categoryList'] = $this->common_model->get_data('img_categories','*');
		  $this->gen_contents['iconList'] = $this->common_model->get_data('img_icon_set','*');
		  $this->gen_contents['logoList'] = $this->common_model->get_data('img_logo_set','*',array('status'=>1));
		  $this->gen_contents['work'] = $this->common_model->get_data('img_works','*',array("work_id"=>$work_id));	 
		  $this->load->view('common/header',$this->gen_contents);
		  $this->load->view('edit_work',$this->gen_contents);
		  $this->load->view('common/footer');
	   }
	   else{

	          redirect('index/login', 'refresh');

	   }	  
   } 
  
  public function change_password(){
  
    if($this->session->userdata('is_login')){
		  $this->gen_contents['page_title'] = 'Image Editor';
          $this->gen_contents['current_controller']='change_password';
		  $session_data=$this->session->userdata('logged_in');
		  $this->gen_contents['username'] = $session_data['USERNAME'];
		  $this->gen_contents['user_id'] =  $session_data['USER_ID'];
		  $this->gen_contents['name']    = $session_data['NAME'];
		  $this->gen_contents['fontfamilyList'] = $this->common_model->get_data('img_font_family','*');
		  $this->load->view('common/header',$this->gen_contents);
		  $this->load->view('change_password',$this->gen_contents);
		  $this->load->view('common/footer');
	   }
	   else{

	          redirect('index/login', 'refresh');

	   }	  
  
  
  
  
  }
    
  public function getGeneratedfiles($work_id){
	 
	 $files = $this->common_model->get_data('img_work_resolution_images','image_name',array("work_id"=>$work_id));
	 
	 return $files; 
  	   
  }
  
  public function downloadFile($file){
	 
	 $fullPath = FCPATH.'uploads/resolution/'.$file.'';
	 
	 if( file_exists($fullPath) ){

    // Parse Info / Get Extension
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);

    // Determine Content Type
    $ctype="image/jpg";
     

    header("Pragma: public"); // required
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); // required for certain browsers
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$fsize);
    ob_clean();
    flush();
    readfile( $fullPath );

  } else
    die('File Not Found');  
   	  
	  
  }
  	
  public function login() {

	   if($this->session->userdata('is_login')){
	           redirect('index', 'refresh');

	   }

	   else{

		     $this->gen_contents['page_title'] = 'Image Editor';
		     $this->load->view('common/login_header',$this->gen_contents); 
	         $this->load->view('login');
			 $this->load->view('common/login_footer');			 

		}

  }
  public function logout() {

	 $this->authentication->user_logout();
     redirect('index/login');

 }
 
 public function get_entity_field($model,$id,$field,$where_field='id'){
    
	 $entity=$this->common_model->get_data($model,$field,array($where_field=>$id));
	 if($entity)
	   return $entity[0][$field];
	 else
	   return false;   
	 
   }
 
  public function create_user(){
    
	$this->db->query("INSERT INTO img_users (first_name,last_name,username,password,status) VALUES('ANEESH','MOHAN','admin',LEFT(MD5(CONCAT(MD5('admin'), 'cloud')), 50),1)");
  
  } 
  
  public function do_resize()
 {
	$filename='11.png';  
  if(!$filename) return false; 
  $source_path = $this->config->item("upload_file_path").$filename;
  $target_path = $this->config->item("upload_file_path").'/images';
  $config_manip = array(
   'image_library' => 'gd2',
   'source_image' => $source_path,
   'new_image' => $target_path,
   'maintain_ratio' => FALSE,
   'create_thumb' => TRUE,
   'thumb_marker' => '',
   'width' => 1200,
   'height' => 800
  );
  $this->load->library('image_lib', $config_manip);
  if (!$this->image_lib->resize()) {
	  echo $this->image_lib->display_errors();;
   return false; //
  }
  
  // clear //
  $this->image_lib->clear();
  
  return  true;
 }
 
 public function image_content(){
	
	$path = 'http://localhost/tests/image_editor/Wallpaper.jpg'; 
	$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);  
 echo $base64;
 exit;	 
 }
   	
}
	

