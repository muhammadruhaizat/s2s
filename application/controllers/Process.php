<?php
class Process extends CI_Controller {

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
		//$dataset = $this->db->query("SELECT * FROM tbl_dataset;")->result();
		//$data["dataset"] = $dataset;
		//$data["mapout"] = "";
		//$this->load->view("header", $data);
		//$this->load->view('process/index',$data);
		//$this->load->view("footer", $data);
        
	}
	
	function processdata()
	{
		
		
		
		
		
		
		
		ini_set('MAX_EXECUTION_TIME', -1);


            $NOL  = $this->input->post('NOL');
            $MT  = $this->input->post('MT');
            $SWDS  = $this->input->post('SWDS');
            $SWPS  = $this->input->post('SWPS');
            $Curvature  = $this->input->post('Curvature');
            $QOC  = $this->input->post('QOC');
            $SD  = $this->input->post('SD');
            $LW  = $this->input->post('LW');
            $Delineation  = $this->input->post('Delineation');
            $Grade  = $this->input->post('Grade');
            $RC  = $this->input->post('RC');
            $SRG  = $this->input->post('SRG');
            $SMTC  = $this->input->post('SMTC');
            $VP  = $this->input->post('VP');
            $SRS  = $this->input->post('SRS');
            $SZW  = $this->input->post('SZW');
            $SL  = $this->input->post('SL');
            $PCF  = $this->input->post('PCF');
            $PCQ  = $this->input->post('PCQ');
            $IT  = $this->input->post('IT');
            $IQ  = $this->input->post('IQ');
            $PF  = $this->input->post('PF');
            $EFI  = $this->input->post('EFI');
            $OS85P  = $this->input->post('OS85P');
            $TS  = $this->input->post('TS');
            $SWDSS = '0';
            $SWPSS = '0';
			
			
			

        
        //$this->load->helper(array('Process', 'url'));

        //$this->load->library('form_validation');

        //$this->form_validation->set_rules('NOL', 'NOL', 'required');

        //if ($this->form_validation->run() == FALSE)
            //{
                //$this->load->view('formsuccess');
            //}
                //else
            //{




            if ($SWDS == '20') {
                $SWDSS = '90';
            } else if ($SWDS == '5') {
                $SWDSS = '50';
            } else if ($SWDS == '6') {
                $SWDSS = '60';
            }

            if ($SWPS == '20') {
                $SWPSS = '90';
            } else if ($SWPS == '5') {
                $SWPSS = '50';
            } else if ($SWPS == '6') {
                $SWPSS = '60';
            }


            $ADSSRS = $SWDS * $Curvature * $QOC * $SD * $LW * $Delineation * $Grade * $RC * $SMTC * $VP * $SRS * $SZW * $SL * $SWDSS * $EFI * $OS85P;

            $APSSRS = $SWPS * $Curvature * $QOC * $SD * $LW * $Delineation * $Grade * $RC * $SMTC * $VP * $SRS * $SZW * $SL * $SWPSS * $EFI * $OS85P;

            $CIRSRS = $NOL * $MT * $PCF * $PCQ * $IT * $IQ * $PF * $SRG * $SL * $SD * $VP * $SZW * $SMTC * '90' * $EFI * $OS85P;

            $CSRSRS = $NOL * $MT * $PCF * $PCQ * $IT * $IQ * $PF * $SRG * $SL * $SD * $VP * $SZW * $SMTC * '90' * $EFI * $OS85P;

            $AV_Walk = ($ADSSRS + $APSSRS) * '0.5';

            $SR = $AV_Walk + $CIRSRS + $CSRSRS;

            if ($SR >= '90') {
                $star_rate = '1';
            } else if ($SR >= '40' && $SR < '90') {
                $star_rate = '2';
            } else if ($SR >= '15' && $SR < '40') {
                $star_rate = '3';
            } else if ($SR >= '5' && $SR < '15') {
                $star_rate = '4';
            } else if ($SR >= '0' && $SR < '5') {
                $star_rate = '5';
            }
				
        ////Prepare upload data
        $upload_data = Array(
            'NOL' => $NOL,
            'MT' => $MT,
            'SWDS' => $SWDS,
            'SWPS' => $SWPS,
            'Curvature' => $Curvature,
            'QOC' => $QOC,
            'SD' => $SD,
            'LW' => $LW,
            'Delineation' => $Delineation,
            'Grade' => $Grade,
            'RC' => $RC,
            'SRG' => $SRG,
            'SMTC' => $SMTC,
            'VP' => $VP,
            'SRS' => $SRS,
            'SZW' => $SZW,
            'SL' => $SL,
            'PCF' => $PCF,
            'PCQ' => $PCQ,
            'IT' => $IT,
            'IQ' => $IQ,
            'PF' => $PF,
            'EFI' => $EFI,
            'OS85P' => $OS85P,
            'TS' => $TS,
            'ADSSRS' => $ADSSRS,
            'APSSRS' => $APSSRS,
            'CIRSRS' => $CIRSRS,
            'CSRSRS' => $CSRSRS,
            'AV_Walk' => $AV_Walk,
            'SR' => $SR,
            'star_rate' => $star_rate,

        );
        ////Insert into tbl_uploads
        $this->db->insert('assessment', $upload_data);

        $_COOKIE['star'] = $star_rate;

        //Alert success redirect to ?success
		//redirect("main");
		$this->load->view("displaystar");

    }
        
	//}
}
