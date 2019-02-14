<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catapi extends CI_Controller {
      function __construct()
    {
        parent::__construct();
        $this->load->model("Home_model");
        $this->page_name=$_SERVER['PHP_SELF'];
        $this->server_ip=$_SERVER['REMOTE_ADDR'];
        if($this->session->userdata('isLogin'))
		{
			$this->load->model("Home_model");
		}
		else
		{
			return redirect(base_url('Login/login'));
		}	
		
    }

	function listthecat()
	{	
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.thecatapi.com/v1/images/search?limit=10&page=1",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
    "x-api-key: DEMO-API-KEY"
     ),
  ));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} 
else
{
echo "<h1>List Cat Image </h1>";
echo "<h3><a href='http://localhost/ci/Catapi/myfav'>MY FAVORITE</a><h3>";

$result['data']=json_decode($response);
$this->load->view('cat/list', $result);
}
}

function addfav($image_id)
{
 $image_id="$image_id";	
 $userid='omyelxerisp112233';
 $postdata = [
 	   'image_id'   => $image_id,
       'sub_id'     => $userid
 ];
 $curl = curl_init();
 curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.thecatapi.com/v1/favourites/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($postdata),
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json",
    "x-api-key: DEMO-API-KEY"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
} 
}

function myfav()
{
 $userid='omyelxerisp112233';	
 $curl = curl_init();

curl_setopt_array($curl, array(
  //CURLOPT_URL => "https://api.thecatapi.com/v1/favourites?sub_id=".$userid,
  CURLOPT_URL => "https://api.thecatapi.com/v1/favourites?sub_id=".$userid,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "x-api-key: DEMO-API-KEY"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
}	
	
}










         
