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


            $SchoolID = $this->input->post('schoolID');
			
            $NOL  = $this->input->post('NOL');
                $NOL = explode(':', $NOL);
            $MT  = $this->input->post('MT');
                $MT = explode(':', $MT);
            $SWDS  = $this->input->post('SWDS');
                $SWDS = explode(':', $SWDS);
            $SWPS  = $this->input->post('SWPS');
                $SWPS = explode(':', $SWPS);
            $Curvature  = $this->input->post('Curvature');
                $Curvature = explode(':', $Curvature);
            $QOC  = $this->input->post('QOC');
                $QOC = explode(':', $QOC);
            $SD  = $this->input->post('SD');
                $SD = explode(':', $SD);
            $LW  = $this->input->post('LW');
                $LW = explode(':', $LW);
            $Delineation  = $this->input->post('Delineation');
                $Delineation = explode(':', $Delineation);
            $Grade  = $this->input->post('Grade');
                $Grade = explode(':', $Grade);
            $RC  = $this->input->post('RC');
                $RC = explode(':', $RC);
            $SRG  = $this->input->post('SRG');
                $SRG = explode(':', $SRG);
            $SMTC  = $this->input->post('SMTC');
                $SMTC = explode(':', $SMTC);
            $VP  = $this->input->post('VP');
                $VP = explode(':', $VP);
            $SRS  = $this->input->post('SRS');
                $SRS = explode(':', $SRS);
            $SZW  = $this->input->post('SZW');
                $SZW = explode(':', $SZW);
            $SL  = $this->input->post('SL');
                $SL = explode(':', $SL);
            $PCF  = $this->input->post('PCF');
                $PCF = explode(':', $PCF);
            $PCQ  = $this->input->post('PCQ');
                $PCQ = explode(':', $PCQ);
            $IT  = $this->input->post('IT');
                $IT = explode(':', $IT);
            $IQ  = $this->input->post('IQ');
                $IQ = explode(':', $IQ);
            $PF  = $this->input->post('PF');
                $PF = explode(':', $PF);
            $EFI  = $this->input->post('EFI');
            $OS85P  = $this->input->post('OS85P');
                $OS85P = explode(':', $OS85P);
            $TS  = $this->input->post('TS');
            $SWDSS = '0';
            $SWPSS = '0';

            if(empty($NOL[1])|| empty($MT[1])||empty($SWDS[1])|| empty($SWPS[1])|| empty($Curvature[1])||empty($QOC[1])|| empty($SD[1]) || empty($LW[1]) || empty($Delineation[1]) || empty($Grade[1]) || empty($RC[1]) || empty($SRG[1]) || empty($SMTC[1]) || empty($VP[1]) || empty($SRS[1]) || empty($SZW[1]) || empty($SL[1]) || empty($PCF[1]) || empty($PCQ[1]) || empty($IT[1]) || empty($IQ[1]))  || empty($PF[1]) || empty($EFI) || empty($OS85P[1]) || empty($TS){
                ?>
                    <script>
                        alert("Please fill all the required fields!");
                        window:location="/s2s/datainput";
                    </script>
                <?php
            } else {

        
            if ($SWDS[1] == '20') {
                $SWDSS = '90';
            } else if ($SWDS[1] == '5') {
                $SWDSS = '50';
            } else if ($SWDS[1] == '6') {
                $SWDSS = '60';
            }

            if ($SWPS[1] == '20') {
                $SWPSS = '90';
            } else if ($SWPS[1] == '5') {
                $SWPSS = '50';
            } else if ($SWPS[1] == '6') {
                $SWPSS = '60';
            }


            $ADSSRS = $SWDS[1] * $Curvature[1] * $QOC[1] * $SD[1] * $LW[1] * $Delineation[1] * $Grade[1] * $RC[1] * $SMTC[1] * $VP[1] * $SRS[1] * $SZW[1] * $SL[1] * $SWDSS * $EFI * $OS85P[1];

            $APSSRS = $SWPS[1] * $Curvature[1] * $QOC[1] * $SD[1] * $LW[1] * $Delineation[1] * $Grade[1] * $RC[1] * $SMTC[1] * $VP[1] * $SRS[1] * $SZW[1] * $SL[1] * $SWPSS * $EFI * $OS85P[1];

            $CIRSRS = $NOL[1] * $MT[1] * $PCF[1] * $PCQ[1] * $IT[1] * $IQ[1] * $PF[1] * $SRG[1] * $SL[1] * $SD[1] * $VP[1] * $SZW[1] * $SMTC[1] * '90' * $EFI * $OS85P[1];

            $CSRSRS = $NOL[1] * $MT[1] * $PCF[1] * $PCQ[1] * $IT[1] * $IQ[1] * $PF[1] * $SRG[1] * $SL[1] * $SD[1] * $VP[1] * $SZW[1] * $SMTC[1] * '90' * $EFI * $OS85P[1];

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
				
        ////Prepare upload data - value
        $upload_data = Array(
            'NOL' => $NOL[1],
            'MT' => $MT[1],
            'SWDS' => $SWDS[1],
            'SWPS' => $SWPS[1],
            'Curvature' => $Curvature[1],
            'QOC' => $QOC[1],
            'SD' => $SD[1],
            'LW' => $LW[1],
            'Delineation' => $Delineation[1],
            'Grade' => $Grade[1],
            'RC' => $RC[1],
            'SRG' => $SRG[1],
            'SMTC' => $SMTC[1],
            'VP' => $VP[1],
            'SRS' => $SRS[1],
            'SZW' => $SZW[1],
            'SL' => $SL[1],
            'PCF' => $PCF[1],
            'PCQ' => $PCQ[1],
            'IT' => $IT[1],
            'IQ' => $IQ[1],
            'PF' => $PF[1],
            'EFI' => $EFI,
            'OS85P' => $OS85P[1],
            'TS' => $TS,
            'ADSSRS' => $ADSSRS,
            'APSSRS' => $APSSRS,
            'CIRSRS' => $CIRSRS,
            'CSRSRS' => $CSRSRS,
            'AV_Walk' => $AV_Walk,
            'SR' => $SR,
            'star_rate' => $star_rate,
            'IDSchool' => $SchoolID
        );
        ////Insert into assessment table for values
        $this->db->insert('assessment', $upload_data);


        ////Prepare upload data - text
        $upload_data_text = Array(
            'NOL' => $NOL[0],
            'MT' => $MT[0],
            'SWDS' => $SWDS[0],
            'SWPS' => $SWPS[0],
            'Curvature' => $Curvature[0],
            'QOC' => $QOC[0],
            'SD' => $SD[0],
            'LW' => $LW[0],
            'Delineation' => $Delineation[0],
            'Grade' => $Grade[0],
            'RC' => $RC[0],
            'SRG' => $SRG[0],
            'SMTC' => $SMTC[0],
            'VP' => $VP[0],
            'SRS' => $SRS[0],
            'SZW' => $SZW[0],
            'SL' => $SL[0],
            'PCF' => $PCF[0],
            'PCQ' => $PCQ[0],
            'IT' => $IT[0],
            'IQ' => $IQ[0],
            'PF' => $PF[0],
            'EFI' => $EFI,
            'OS85P' => $OS85P[0],
            'TS' => $TS,
            'ADSSRS' => $ADSSRS,
            'APSSRS' => $APSSRS,
            'CIRSRS' => $CIRSRS,
            'CSRSRS' => $CSRSRS,
            'AV_Walk' => $AV_Walk,
            'SR' => $SR,
            'star_rate' => $star_rate,
            'IDSchool' => $SchoolID
        );
        ////Insert into assessment table for text
        $this->db->insert('assessment_text', $upload_data_text);

		$data["KodSekolah"] = $SchoolID;
        //Alert success redirect to ?success
		//redirect("main");
		$this->load->view("displaystar",$data);

    }
    function processFromCarian($KodSekolah){
		$data["KodSekolah"] = $KodSekolah;
		$this->load->view("displaystar",$data);
	}
    }
	//}
}
