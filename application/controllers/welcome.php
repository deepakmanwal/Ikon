<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->model('tank_auth/users');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
		
			redirect('welcome/dashboard');
			//$data['user_id']	= $this->tank_auth->get_user_id();
			//$data['username']	= $this->tank_auth->get_username();
			//$data['user'] = $this->users->get_fulldetails($data['user_id']);
			//$this->load->view('welcome', $data);
		}
	}
	
	
	function dashboard(){
	
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
		$user_id=$this->tank_auth->get_user_id();
		
		$user['profile'] = $this->users->check_profile_detail($user_id);
		$data['page'] = 'dashboard';
		if($user['profile']['role_id'])//profile is chosen
		{
			$role = $this->users->getRoleNameById($user['profile']['role_id']);
			$data['role_name'] = $role[0]->role_name;
			$data['user'] = $this->users->get_user_by_id($user_id, true);
			$this->load->view('auth/dashboard',$data);
		}
		else
		{
			redirect('welcome/choose_profile');
		}
	}
	function choose_profile($id=0)
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
		$user_id=$this->tank_auth->get_user_id();
		$user['profile'] = $this->users->check_profile_detail($user_id);
		
		if($user['profile']['role_id'])//profile is chosen
		{
			redirect('welcome/dashboard');
		}
		$data['user'] = $this->users->get_user_by_id($user_id, true);
		$data['profiles'] = $this->users->get_all_role();
		
		if($id)
		{
			$this->users->update_user_role($user_id,$id);
			redirect('welcome/dashboard');
		}
		$this->load->view('auth/choose_profile',$data);
	}
	
	function profile(){
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
		$user_id=$this->tank_auth->get_user_id();
		$data['user'] = $this->users->get_user_by_id($user_id, true);
		$data['profile'] = $this->users->check_profile_detail($user_id);
		$role = $this->users->getRoleNameById($data['profile']['role_id']);
		$data['role_name'] = $role[0]->role_name;
		$data['page'] = 'profile';
		//echo "<pre>";var_dump($data);exit;
		$this->load->view('auth/profile', $data);
	}
	
	function edit_profile()
	{
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
		$user_id=$this->tank_auth->get_user_id();
		$data['user'] = $this->users->get_user_by_id($user_id, true);
		$data['profile'] = $this->users->check_profile_detail($user_id);
		$role = $this->users->getRoleNameById($data['profile']['role_id']);
		$data['role_name'] = $role[0]->role_name;
		if($this->input->post() != null){
			$userId = $data['user']->id;
			$res = $this->users->update_profile($this->input->post(), $userId);
			if($res){
				echo 'success';
			}
			exit;
		}
		$data['page'] = 'profile';
		$this->load->view('auth/edit_profile',$data);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */