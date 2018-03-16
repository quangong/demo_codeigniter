<?php
class UserController extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('user');
	}

	public function createUser(){
		$user = array(
	    "name" => "username",
	    "size" => "25",
		);
		$pass = array(
	    "name" => "password",
	    "size" => "25",
		);
		$data['user'] = $user;
		$data['pass'] = $pass;
		if($this->input->post()){
			$this->form_validation->set_rules('username','username','required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('password','password','required|min_length[5]|max_length[12]');
			if($this->form_validation->run()){
				$userInfor=array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password'))
				);
				if($this->user->create($userInfor)){
					$this->session->set_flashdata('mess','create success!');
					return redirect(base_url());
				}
				$this->session->set_flashdata('mess','user already exist!');
			}
		}
		return $this->load->view('create',$data);
	}

	public function updateUser(){
		$id = $this->uri->segment(2);
		$info = $this->user->getUser($id);
		if($this->input->post()){
			$this->form_validation->set_rules('username','username','required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('password','password','required|min_length[5]|max_length[12]');
			if($this->form_validation->run()){
				$userInfor=array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password'))
				);
				if($this->user->update($id, $userInfor)){
					$this->session->set_flashdata('mess','update success!');
					return redirect(base_url());
				}
				$this->session->set_flashdata('mess','user already exist!');
			}
		}
		$data['info'] = $info;
		$user = array(
	    "name" => "username",
	    "size" => "25",
	    "value" => $info[0]->username,
		);
		$pass = array(
	    "name" => "password",
	    "size" => "25",
		);
		$data['user'] = $user;
		$data['pass'] = $pass;
		return $this->load->view('edit',$data);
	}

	public function deleteUser(){
		$id = $this->uri->segment(2);
		$this->user->delete($id);
		$this->session->set_flashdata('mess','delete success!');
		return redirect(base_url());
	}

	public function login(){
		$user = array(
	    "name" => "username",
	    "size" => "25",
		);
		$pass = array(
	    "name" => "password",
	    "size" => "25",
		);
		$data['user'] = $user;
		$data['pass'] = $pass;
		if($this->input->post()){
			$this->form_validation->set_rules('username','username','required');
			$this->form_validation->set_rules('password','password','required');
			if($this->form_validation->run()){
				$userInfor=array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password'))
				);
				$checkLogin = $this->user->checkLogin($userInfor);
				if(empty($checkLogin)){
					$this->session->set_flashdata('mess','info incorrect');
				}
				else{
					$this->session->set_userdata('user',$userInfor);
					return redirect(base_url());
				}
			}
		}
		return $this->load->view('login_form_helper',$data);
	}

	public function index(){
		if(isset($_SESSION['user'])){
			$users = $this->user->list();
			$data['users'] = $users;
			return $this->load->view('home',$data);
		}
		return redirect(base_url().'login');
	}

	public function logout(){
		$this->session->sess_destroy();
		return redirect(base_url().'login');
	}
}