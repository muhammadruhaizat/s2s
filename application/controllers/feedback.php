<?php
class feedback extends CI_Controller {

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
    }
	public function index()
	{
		$query = $this->db->query('SELECT * FROM senarai_sekolah');
		$data['senarai_sekolah'] = $query->result();
		
		$this->load->view("header");
		$this->load->view('feedback/index',$data);
		$this->load->view("footer");
	}

	function processdata()
	{
		ini_set('MAX_EXECUTION_TIME', -1);


            $schoolID  = $this->input->post('schoolID');
            $Nama  = $this->input->post('Nama');
            $Emel  = $this->input->post('Emel');
            $NoTelefon  = $this->input->post('NoTelefon');
            $Feedback  = $this->input->post('Feedback');
            $Kategori  = $this->input->post('Kategori');
            
       ////Prepare upload data - value
        $upload_data = Array(
            'KodSekolah' => $schoolID,
            'nama' => $Nama,
            'emel' => $Emel,
            'nofon' => $NoTelefon,
            'Feedback' => $Feedback,
            'kategori' => $Kategori,

        );
        ////Insert into table feedback
        $this->db->insert('feedback', $upload_data);


        //Alert success redirect to ?success
		//redirect("main");
		$this->load->view("feedbacktq");

    }
	
	
	
}
