<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepemilikan extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_sipp')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/kepemilikan_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in_sipp'))
		{
			$this->template->display('admin/kepemilikan_view');
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function data_list() {
        $List = $this->kepemilikan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row = array();
            $kepemilikan_id = $r->kepemilikan_id;

            $row[] = $no;
            $row[] = $r->kepemilikan_nama;
            $row[] = '<button type="button" class="btn btn-primary btn-xs edit_button" data-toggle="modal" data-target="#edit" data-id="'.$r->kepemilikan_id.'" data-name="'.$r->kepemilikan_nama.'" title="Edit Data"><i class="icon-pencil"></i> Edit</button>
            		<a onclick="hapusData('.$kepemilikan_id.')"><button class="btn btn-danger btn-xs" title="Hapus Data"><i class="icon-trash"></i> Hapus</button></a>';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" 				=> $_POST['draw'],
                        "recordsTotal" 		=> $this->kepemilikan_model->count_all(),
                        "recordsFiltered" 	=> $this->kepemilikan_model->count_filtered(),
                        "data" 				=> $data,
                );
        
        echo json_encode($output);
    }

	public function savedata() {		
		$this->kepemilikan_model->insert_data();
		$this->session->set_flashdata('notification','Simpan Data Sukses.');
 		redirect(site_url('admin/kepemilikan'));
	}
	
	public function updatedata() {		
		$this->kepemilikan_model->update_data();
		$this->session->set_flashdata('notification','Update Data Sukses.');
		redirect(site_url('admin/kepemilikan'));
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url('admin/kepemilikan'));
		} else {
			$this->kepemilikan_model->delete_data($kode);
			$this->session->set_flashdata('notification','Hapus Data Sukses.');
			redirect(site_url('admin/kepemilikan'));
		}
	}	
}
/* Location: ./application/controller/admin/Kepemilikan.php */