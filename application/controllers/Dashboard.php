<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
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
	 public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }
	public function index()
	{
		$query = $this->db->query('SELECT COUNT(KodSekolah) FROM senarai_sekolah');
		$data['total_senarai_sekolah'] = $query->result();
		
		$query = $this->db->query('SELECT COUNT(KodSekolah) FROM senarai_sekolah AS ss INNER JOIN assessment AS a ON ss.KodSekolah = a.IDSchool');
		$data['total_senarai_sekolah_rated'] = $query->result();
		
		$this->load->view('dashboard',$data);
	}
	
	public function ajax(){
		$obj = json_decode($this->input->post('datastr'));
		$mode = $obj->mode;
		
		switch($mode){
			case "InsertLatLong":
				$KodSekolah = $obj->KodSekolah;
				$Lat = $obj->Lat;
				$Long = $obj->Long;
				
				$data = array(
					   'Latitude' => $Lat,
					   'Longitude' => $Long
					);

				$this->db->where('KodSekolah', $KodSekolah);
				$this->db->update('senarai_sekolah', $data); 
			break;
		}
	}
	function POI_info($namaSekolah){
		$query = $this->db->query("SELECT *,COUNT(assessment.IDSchool) AS ACount FROM senarai_sekolah LEFT JOIN assessment ON senarai_sekolah.KodSekolah = assessment.IDSchool WHERE senarai_sekolah.NamaSekolah = ?", array(rawurldecode($namaSekolah)));
		$case = $query->row();
		$data['InfoSekolah'] = $case;

		$this->load->view('poi', $data);
	}
}
