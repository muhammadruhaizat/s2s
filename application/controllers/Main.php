<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
		ini_set('memory_limit', '-1');
		$query = $this->db->query('SELECT * FROM senarai_sekolah LEFT JOIN assessment ON senarai_sekolah.KodSekolah = assessment.IDSchool WHERE senarai_sekolah.Latitude != "0"');
		$data['senarai_sekolah'] = $query->result();
		$this->load->view('main',$data);
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
					echo $query->row()->tahap."|".$query->row()->username."|".$query->row()->daerah;
				}else{
					echo "Gagal";
				}
			break;
			case "GetSchoolByDaerah":
				$Daerah = $obj->Daerah;
				
				$query = $this->db->query("SELECT * FROM senarai_sekolah WHERE BandarSurat = '$Daerah'");
				$data['senarai_sekolah'] = $query->result();
				
				echo json_encode($data['senarai_sekolah']);
			break;
			case "GetSchoolByKodSekolah":
				$KodSekolah = $obj->KodSekolah;
				
				$query = $this->db->query("SELECT * FROM senarai_sekolah WHERE KodSekolah = '$KodSekolah'");
				$data['data_sekolah'] = $query->row();
				
				echo json_encode($data['data_sekolah']);
			break;
			case "GetDaerahByNegeri":
				$Negeri = $obj->Negeri;
				
				$query = $this->db->query("SELECT BandarSurat FROM senarai_sekolah WHERE Negeri = '$Negeri' GROUP BY BandarSurat");
				$data['senarai_bandar_surat'] = $query->result();
				
				echo json_encode($data['senarai_bandar_surat']);
			break;
			case "GetDaerahAll":
				$query = $this->db->query("SELECT BandarSurat FROM senarai_sekolah GROUP BY BandarSurat");
				$data['senarai_bandar_surat'] = $query->result();
				
				echo json_encode($data['senarai_bandar_surat']);
			break;
			case "BasGetDaerahByNegeri":
				$Negeri = $obj->Negeri;
				
				$query = $this->db->query("SELECT daerah FROM pengendali_bas WHERE negeri = '$Negeri' GROUP BY daerah");
				$data['senarai_bandar_surat'] = $query->result();
				
				echo json_encode($data['senarai_bandar_surat']);
			break;
			case "BasGetDaerahAll":
				$query = $this->db->query("SELECT daerah FROM pengendali_bas GROUP BY daerah");
				$data['senarai_bandar_surat'] = $query->result();
				
				echo json_encode($data['senarai_bandar_surat']);
			break;
		}
	}
	function POI_info($namaSekolah){
		$query = $this->db->query("SELECT *,COUNT(assessment.IDSchool) AS ACount,(SELECT COUNT(ID) FROM pengendali_bas WHERE daerah = senarai_sekolah.BandarSurat) AS BCount FROM senarai_sekolah LEFT JOIN assessment ON senarai_sekolah.KodSekolah = assessment.IDSchool WHERE senarai_sekolah.NamaSekolah = ?", array(rawurldecode($namaSekolah)));
		$case = $query->row();
		$data['InfoSekolah'] = $case;

		$this->load->view('poi', $data);
	}
}
