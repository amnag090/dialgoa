<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');		
		$this->load->database();

		$this->load->model('admin_model', '', TRUE);

		if(!$this->session->userdata('admin'))
			redirect('login');
	}

	public function index(){	
		$this->load->view('common/header');
		$this->load->view('home/blankpage');
		$this->load->view('common/footer');
	}

	public function profile(){	
		$userdata = $this->session->userdata('admin');
		//print_r($userdata);
		
		$data = array();
		$data['userdata']       = $this->admin_model->getAdminDetails($userdata->id);
		

		$this->load->view('common/header');
		$this->load->view('admin/profile',$data);
		$this->load->view('common/footer');
	}

	public function saveedit(){
		$adminid       = $this->input->post('adminid');
		$email        = $this->input->post('email');
		$oldemail     = $this->input->post('oldemail');
		$firstName         = $this->input->post('firstName');
		$lastName         = $this->input->post('lastName');

		$photoFile = $this->input->post('oldimage');
		$oldimage = $this->input->post('oldimage');
		

		if($email != $oldemail && $this->admin_model->emailExists($email)){
			$re = array("error"=>true,"message"=>"Email already exists");
			return $this->output->set_content_type('application/json')->set_output(json_encode($re));
		}

		if(isset($_FILES['photofile'])){
			if(strtolower(pathinfo($_FILES['photofile']['name'], PATHINFO_EXTENSION)) == 'jpg' || strtolower(pathinfo($_FILES['photofile']['name'], PATHINFO_EXTENSION)) == 'png' || strtolower(pathinfo($_FILES['photofile']['name'], PATHINFO_EXTENSION)) == 'jpeg' || strtolower(pathinfo($_FILES['photofile']['name'], PATHINFO_EXTENSION)) == 'gif'){
				$config['upload_path']   = $this->config->item('adminPhotosDirPath');
				$config['allowed_types'] = '*';
				$config['max_size']      = 1024 * 1024 *8;
				$config['remove_spaces'] = TRUE;
				$config['detect_mime']   = FALSE;
				$config['file_name']     = date('mdY')."_".$_FILES['photofile']['name'];
				$this->load->library('upload', $config);
				if($this->upload->do_upload('photofile')){
					$data = $this->upload->data();
					
					$photoFile = $data['file_name'];

					$this->resizeCropImage(100, 100, $config['upload_path'].$photoFile, $config['upload_path'].$photoFile);

					if($oldimage != 'no_image.jpg')
						unlink($this->config->item('adminPhotosDirPath').$oldimage);

				} else {
					$re = array("error"=>true,"message"=>$this->upload->display_errors('',''));
				}
			} else {
					$re = array("error"=>true,"message"=>"The filetype you selected is not allowed.");			
			}
			
		}
		
		$result = $this->admin_model->saveEdit($adminid, $email, $firstName, $lastName, $photoFile);

		

		if($result)
			$re = array("error"=>false,"message"=>"");
		else
			$re = array("error"=>true,"message"=>"Error! please try again");

		return $this->output->set_content_type('application/json')->set_output(json_encode($re));
	}

	public function resizeCropImage($max_width, $max_height, $source_file, $dst_dir, $quality = 80)
    {
        $imgsize = getimagesize($source_file);
        $width = $imgsize[0];
        $height = $imgsize[1];
        $mime = $imgsize['mime'];
     
        switch($mime){
            case 'image/gif':
                $image_create = "imagecreatefromgif";
                $image = "imagegif";
                break;
     
            case 'image/png':
                $image_create = "imagecreatefrompng";
                $image = "imagepng";
                $quality = 7;
                break;
     
            case 'image/jpeg':
                $image_create = "imagecreatefromjpeg";
                $image = "imagejpeg";
                $quality = 80;
                break;
     
            default:
                return false;
                break;
        }
         
        $dst_img = imagecreatetruecolor($max_width, $max_height);
        $src_img = $image_create($source_file);
         
        $width_new = $height * $max_width / $max_height;
        $height_new = $width * $max_height / $max_width;
        //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
        if($width_new > $width){
            //cut point by height
            $h_point = (($height - $height_new) / 2);
            //copy image
            imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
        }else{
            //cut point by width
            $w_point = (($width - $width_new) / 2);
            imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
        }
         
        $image($dst_img, $dst_dir, $quality);
     
        if($dst_img)imagedestroy($dst_img);
        if($src_img)imagedestroy($src_img);

    }

	public function changePassword(){
		$userdata = $this->session->userdata('admin');
		$email      = $userdata->email;
		$oldpassword   = $this->input->post('oldpassword');
		
		$admin      = $this->admin_model->loginCheck($email, $oldpassword);

		if($admin===false){
			$re = array("error"=>true,"message"=>"Invalid old password");
			return $this->output->set_content_type('application/json')->set_output(json_encode($re));
		} else {			
			
			$confirmpass   = $this->input->post('confirmpass');
			$this->admin_model->changePassword($userdata->id,$confirmpass);

			$re = array("error"=>false,"message"=>"Password updated successful.");
			return $this->output->set_content_type('application/json')->set_output(json_encode($re));
		}
	}
}
