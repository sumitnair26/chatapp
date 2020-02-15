<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
     
	  public function __construct() { 
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('url'));
		$this->load->library('form_validation');
		$this->load->model('chat_model');
		 
    }
	 
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
	public function index()
	{
		//$this->load->view('landingpage');
		if(isset($_POST['username']))
	  {
	  $this->form_validation->set_rules('username', 'username', 'required|is_unique[ user.username ]');
	  
	  if ($this->form_validation->run() == FALSE)
                {
				//echo"False";
				//die;
				$this->session->set_userdata('error_msg', 'UserName Already exist , Please Try unique UserName');
					  //redirect('Chat/', 'refresh');
					  $this->load->view('landingpage');
					// echo "false";
                }
                else	
                {
				//echo "True"; 
				//die;
			 $this->chat_model->login();
                }
	  }
    elseif($this->session->username)
	  {
	redirect('chat/mychatroom' , 'refresh');
	  } 
	else
	  {	
	$this->load->view('landingpage');
	  }
		
	}
	public function mychatroom()
	{
	   $this->chat_model->mychatroom();
	   $data['mychatroom']=$this->chat_model->mychatroom();
	   $this->chat_model->allusers();
	   $data['allusers']=$this->chat_model->allusers();
	   $this->load->view('mychatroom',$data);
	  
	}
	public function logout()
	{
	 $this->session->sess_destroy();
	 redirect('Chat/' , 'refresh');
	 exit;
	}
	public function getallmsg()
	{
	 //echo "hiii";
	 $this->chat_model->getallmsg();
	}
	public function insertnewchat()
	{
	 $this->chat_model->insertnewchat();
	}
	public function newdesign()
	{
	  $this->chat_model->mychatroom();
	  $data['mychatroom']=$this->chat_model->mychatroom();
	  $this->chat_model->allusers();
	  $data['allusers']=$this->chat_model->allusers();
	 $this->load->view('newdesign',$data);
	}
	public function startconversation()
	{
	$this->chat_model->startconversation();
	}
}
