<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class first extends CI_Controller {

	/**
	 * Index Page for= this controller.
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
		echo "hello";
		$this->load->view('new');
	}
	
	public function reg_form()
	{
		$this->load->view('reg_form');
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules("firstname","firstname",'required');
		$this->form_validation->set_rules("lastname","lastname",'required');
		$this->form_validation->set_rules("username","username",'required');
		$this->form_validation->set_rules("mobile","mobile",'required');
		$this->form_validation->set_rules("email","email",'required');
		$this->form_validation->set_rules("password","password",'required');
		
		if($this->form_validation->run())
		{
		$this->load->model('mainmodel');
		$pass=$this->input->post("password");
		$encpass=$this->mainmodel->encpswd($pass);
		$reg=array("firstname" => $this->input->post("firstname"),
					"lastname"=>$this->input->post("lastname"),
					"username"=>$this->input->post("username"),
					"mobile"=>$this->input->post("mobile"));
		$log=array("email"=>$this->input->post("email"),
				"password"=>$encpass,
				"usertype"=>'1');
		$this->mainmodel->rgstr($reg,$log);
		redirect(base_url().'first/reg_form');
		}
	}

	public function l()
	{
		$this->load->view('login_new');
	}
	public function login2()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("email","email",'required');
		$this->form_validation->set_rules("password","password",'required');
		if($this->form_validation->run())
		 	{
		 		$this->load->model('mainmodel');
		 		$email=$this->input->post("email");
		 		$pass=$this->input->post("password");
		 		$rslt=$this->mainmodel->selepass($email,$pass);
		 		if($rslt)
		 		{
		 			$id=$this->mainmodel->teauserid($email);
		 			$user=$this->mainmodel->teauser($id);
		 			$this->load->library(array('session'));	 
		 			$this->session->set_userdata(array('id'=>(int)$user->id,'status'=>$user->status,'usertype'=>$user->usertype));
		 			if($_SESSION['status']=='1' && $_SESSION['usertype']=='0')
		 			{
		 				redirect(base_url().'first/teachhome');
		 			}
		 			elseif($_SESSION['status']=='1' && $_SESSION['usertype']=='1')
		 			 {
		 				redirect(base_url().'first/stdhome');
		 			}
		 			else 
		 			{
		 				echo "waiting for approval";
		 			}
		 		}	

		 		else
		 		{
		 			echo "invalid user";
		 		}
		 	}
		 	else
		 	{
				redirect('first/tab','refresh');
		 	}
	}
	
	public function regvw()
	{
		$this->load->model('mainmodel');
		$data['n']=$this->mainmodel->registr_view();
		$this->load->view('vie_reg',$data);
	}
	public function approve()
	{
		$this->load->model('mainmodel');
		$id=$this->uri->segment(3);
		$this->mainmodel->approvereg($id);
		redirect('first/regvw','refresh');
	}
	public function reject()
	{
		$this->load->model('mainmodel');
		$id=$this->uri->segment(3);
		$this->mainmodel->rejectreg($id);
		redirect('first/regvw','refresh');
	}

}
