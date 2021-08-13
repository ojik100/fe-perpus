<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct(){
	 parent::__construct();
    //  $this->load->library('pdf');

	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->helper(array('form', 'url'));
    //  $this->load->model('M_Admin');
     	if($this->session->userdata('masuk_sistem_rekam') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
     }
     
    public function index()
    {	
        $this->data['idbo'] = $this->session->userdata('ses_id');
        //  $this->data['user'] = $this->db->query('select buku_id,sampul,isbn,lampiran from tbl_buku');

        $this->data['title_web'] = 'Data User ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('laporan/laporan',$this->data);
        $this->load->view('footer_view',$this->data);

    }
     
  
}
