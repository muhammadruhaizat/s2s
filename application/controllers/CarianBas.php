<?php
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') OR exit('No direct script access allowed');

class CarianBas extends CI_Controller {

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
		//if($daerah == null){
			$query = $this->db->query('SELECT * FROM pengendali_bas');
			$data['senarai_pengendali_bas'] = $query->result();
		//}else{
		//	$query = $this->db->query('SELECT * FROM pengendali_bas WHERE daerah = '.$daerah);
		//	$data['senarai_pengendali_bas'] = $query->result();			
		//}

		//$data["daerahStr"] = $daerah;
		
		$query = $this->db->query('SELECT daerah FROM pengendali_bas GROUP BY daerah');
		$data['senarai_bandar_surat'] = $query->result();
		
		$query = $this->db->query('SELECT negeri FROM pengendali_bas GROUP BY negeri');
		$data['senarai_negeri'] = $query->result();
		
		$this->load->view('carianbas',$data);
	}
	public function caridaerah($daerah)
	{
		$decodedURL = rawurldecode($daerah);
		$query = $this->db->query("SELECT * FROM pengendali_bas WHERE daerah = '$decodedURL'");
		$data['senarai_pengendali_bas'] = $query->result();

		$data["daerahStr"] = $decodedURL;
		
		$this->load->view('carianbas',$data);
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
			case "LogIn":
				$Username = $obj->Username;
				$Password = $obj->Password;
				
				$query = $this->db->query("SELECT * FROM user WHERE username = '$Username' AND katalaluan = '$Password'");
				if($query->num_rows() > 0){
					echo $query->row()->tahap;
				}else{
					echo "Gagal";
				}
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
