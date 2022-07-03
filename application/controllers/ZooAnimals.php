<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ZooAnimals extends CI_Controller {

	public function index()
	{
		$this->load->model('Animal');

		$data['animals'] = $this->Animal->get_animals();
		$data['hour'] = get_cookie("hour");
		// echo '<pre>';
		// print_r($data['animals']);
		$this->load->view('welcome_message', $data);
	}

	public function feed ()
	{
		$this->load->model('zoo');
		$this->zoo->feed_animals();
		redirect('/', 'refresh');
	}

	public function reset ()
	{
		$this->load->model('zoo');
		$cookie = array(
			'name'   => 'hour',
			'value'  => '0',
			'expire' => '3600',
			'domain' => '',
			'path'   => '/',
			'secure' => TRUE
		 );
		set_cookie( $cookie);
		$this->zoo->reset_zoo();
		redirect('/', 'refresh');
	}

	public function interval ()
	{
		$this->load->model('zoo');
		$lastHour = get_cookie("hour")+1;
		$cookie = array(
			'name'   => 'hour',
			'value'  => strval($lastHour),
			'expire' => '3600',
			'domain' => '',
			'path'   => '/',
			'secure' => TRUE
		 );
		set_cookie( $cookie);
		$this->zoo->increment_zoo_interval($lastHour);
		redirect('/', 'refresh');
	}
}
