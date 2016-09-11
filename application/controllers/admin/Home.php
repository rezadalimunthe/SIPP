<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_sipp')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/home_model');
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in_sipp'))
		{
			$data['TotalPasar'] 	= $this->home_model->select_count_pasar()->result();
			//$data['TotalProduk'] 	= $this->home_model->select_count_produk()->result();
			//$data['TotalDokter'] 	= $this->home_model->select_count_dokter()->result();
			//$data['TotalPerawat']   = $this->home_model->select_count_perawat()->result();
			$this->template->display('admin/home_view', $data);
		}
		else
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
}
/* Location: ./application/controller/admin/Home.php */