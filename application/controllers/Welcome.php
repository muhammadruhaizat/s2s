<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		//$query = $this->db->query("SELECT * FROM senarai_sekolah GROUP BY BandarSurat;");
		//
		//$i = 1;
		//foreach($query->result() as $EachDaerah){
		//	$unamerun = sprintf("%05d",$i);
		//	$inQuery = $this->db->query("INSERT INTO user (username,katalaluan,tahap,daerah) VALUES('ND$unamerun','ndpwd',1,'$EachDaerah->BandarSurat')");
		//	$i++;
		//}
		
		$this->load->view('welcome_message');
	}
}
