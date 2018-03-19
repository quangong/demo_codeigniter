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
		if($this->input->post()){
			$this->form_validation->set_rules('username', 'username', 'required|min_length[6]|max_length[10]');
			$this->form_validation->set_rules('password', 'password', 'required|min_length[6]|max_length[10]');
			if($this->form_validation->run()){
				$userInfor = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password'))
				);
				if($this->user->create($userInfor)){
					$this->session->set_flashdata('mess', 'create success!');
					return redirect(base_url());
				}
				$this->session->set_flashdata('mess', 'user already exist!');
			}
		}
		return $this->load->view('user/create');
	}

	public function updateUser()
	{
		$id = $this->uri->segment(2);
		if(!$this->user->findOrFail($id))
			return $this->load->view('errors/error_404');
		$info = $this->user->getUser($id);
		if($this->input->post()){
			$this->form_validation->set_rules('username','username', 'required|min_length[6]|max_length[10]');
			$this->form_validation->set_rules('password', 'password', 'required|min_length[6]|max_length[10]');
			if($this->form_validation->run()){
				$userInfor = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password'))
				);
				if($this->user->update($id, $userInfor)){
					$this->session->set_flashdata('mess', 'update success!');
					return redirect(base_url());
				}
				$this->session->set_flashdata('mess', 'user already exist!');
			}
		}
		$data['info'] = $info;
		return $this->load->view('user/edit',$data);
	}

	public function deleteUser()
	{
		$id = $this->uri->segment(2);
		if(!$this->user->findOrFail($id))
			return $this->load->view('errors/error_404');
		$this->user->delete($id);
		$this->session->set_flashdata('mess', 'delete success!');
		return redirect(base_url());
	}

	public function login()
	{
		if($this->input->post()){
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			if($this->form_validation->run()){
				$userInfor = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password'))
				);
				$checkLogin = $this->user->checkLogin($userInfor);
				if(!$checkLogin){
					$this->session->set_flashdata('mess', 'info incorrect');
				}
				else{
					$this->session->set_userdata('user', $userInfor);
					return redirect(base_url());
				}
			}
		}
		return $this->load->view('user/login');
	}

	public function index()
	{
		if(isset($_SESSION['user'])){
			$users = $this->user->list();
			$data['users'] = $users;
			return $this->load->view('user/home', $data);
		}
		return redirect(base_url('login'));
	}

	public function logout()
	{
		$this->session->sess_destroy();
		return redirect(base_url('login'));
	}
}