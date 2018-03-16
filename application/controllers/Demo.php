<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Demo extends CI_Controller{
	function __construct(){
          parent::__construct();
          $this->load->model('user');
    }
  	// public function index(){
	// 	echo "<a href='/abc'>hello world</a>";
	// }

	public function index(){
		// $title     = "Mint tea";
		// $url_title = url_title($title, "dash", TRUE);
		// echo $url_title; 
		//echo $this->someclass->sum();die();
		// $this->load->model('user');
		// $user = $this->user->getUser(1,2);//var_dump($user);die();
		// $this->load->view('demo_form_helper');
		echo "hello world";
	}

	// public function welcome(){
	// 	echo "hi quang";
	// }

	public function helperDemo(){
		$this->load->helper(array('demo_helper'));
		echo testDemoHelper();
	}

	public function libraryDemo(){
		$this->load->library('democlass');
		echo $this->democlass->sum(1,2);
	}

	public function demoFormHelper(){
		$user=array(
	    "name" => "username",
	    "size" => "25",
		);
		$pass=array(
	    "name" => "pass",
	    "size" => "25",
		);
		$data['user']=$user;
		$data['pass']=$pass;
		$this->load->view('demo_form_helper',$data);
	}

	public function demoCRUD(){
		$data['username']='demo2';
		$data['password']=md5('secret');
		//$this->user->create($data);
		//$this->user->update(3,$data);
		$this->user->delete(3);
	}
}