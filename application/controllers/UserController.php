<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		//$this->output->cache(20);
	}

	public function createUser()
	{
		if(!isset($_SESSION['user'])){
			return redirect(base_url('login'));
		}
		$user = $this->session->userdata('user');
		if($user['role'] != 1)
		 	return show_error('permission denied', 403);
		if($this->input->post()){
			$this->form_validation->set_rules('username', 'username', 'required|min_length[6]|max_length[10]');
			$this->form_validation->set_rules('password', 'password', 'required|min_length[6]|max_length[10]');
			$this->form_validation->set_rules('fullname', 'fullname', 'required|max_length[20]');
			$this->form_validation->set_rules('phone', 'phone number', 'required|min_length[10]|max_length[11]');
			if($this->form_validation->run()){
				$userInfor = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					'fullname' => $this->input->post('fullname'),
					'phone_number' => $this->input->post('phone'),
					'role' => 2
				);
				if($this->user->create($userInfor)){
					$this->session->set_flashdata('mess', 'Create success!');
					return redirect(base_url());
				}
				$this->session->set_flashdata('mess', 'User already exist!');
			}
		}
		$data['temp'] = 'user/create';
		return $this->load->view('user/template', $data);
	}

	public function updateUser()
	{
		if(!isset($_SESSION['user'])){
			return redirect(base_url('login'));
		}
		$info = $this->session->userdata('user');
		$id = $this->uri->segment(2);
		if(!$this->user->findOrFail($id))
			return show_404();
		if($id != $info['id'])
			return show_error('permission denied', 403);
		if($this->input->post()){
			$this->form_validation->set_rules('fullname', 'fullname', 'required|max_length[20]');
			$this->form_validation->set_rules('phone', 'phone number', 'required|min_length[10]|max_length[11]');
			if($this->form_validation->run()){
				$userInfor = array(
					'fullname' => $this->input->post('fullname'),
					'phone_number' => $this->input->post('phone'),
					'username' => $info['username'],
					'password' => $info['password'],
					'role' => $info['role']
				);
				if($this->user->update($id, $userInfor)){
					$this->session->set_flashdata('mess', 'Update success!');
					$_SESSION['user']['fullname'] = $userInfor['fullname'];
					$_SESSION['user']['phone_number'] = $userInfor['phone_number'];
				}
				else
				$this->session->set_flashdata('mess', 'User already exist!');
			}
		}
		$info = $this->session->userdata('user');
		$data['info'] = $info;
		$data['temp'] = 'user/edit';
		return $this->load->view('user/template', $data);
	}

	public function deleteUser()
	{
		if(!isset($_SESSION['user'])){
			return redirect(base_url('login'));
		}
		$user = $this->session->userdata('user');
		if($user['role'] != 1)
		 	return show_error('permission denied', 403);
		$id = $this->uri->segment(2);
		if(!$this->user->findOrFail($id))
			return show_404();
		$this->user->delete($id);
		$this->session->set_flashdata('mess', 'Delete success!');
		return redirect(base_url());
	}

	public function login()
	{
		if(isset($_SESSION['user'])){
			return redirect(base_url());
		}
		if($this->input->post()){
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			if($this->form_validation->run()){
				$userInfor = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password'))
				);
				$checkLogin = $this->user->checkLogin($userInfor);
				if(empty($checkLogin)){
					$this->session->set_flashdata('mess', 'Info incorrect');
				}
				else{
					$this->session->set_userdata('user', $checkLogin);
					return redirect(base_url());
				}
			}
		}
		return $this->load->view('login/login');
	}

	public function index()
	{
		if(isset($_SESSION['user'])){
			$users = $this->user->list();
			$data['users'] = $users;
			$data['temp'] = 'user/home';
			return $this->load->view('user/template', $data);
		}
		return redirect(base_url('login'));
	}

	public function logout()
	{
		$this->session->sess_destroy();
		return redirect(base_url('login'));
	}
}