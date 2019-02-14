
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
      function __construct()
    {
        parent::__construct();
        $this->load->model("Home_model");
        $this->page_name=$_SERVER['PHP_SELF'];
        $this->server_ip=$_SERVER['REMOTE_ADDR'];
    }

public function ajax()
 {
   $this->load->view('ajax');
 }
	public function ajaxcall()
	{
	 print_r(json_encode($this->Home_model->getAllUser_model()));
	}
	
	
	
}
