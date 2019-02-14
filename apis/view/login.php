<!DOCTYPE html>
<html lang="en">
<head>
  <title>Codeigniter-3.1.9</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<h1 style="text-align: center;">Login</h1>
<div class="row">
	<div class="col-md-4">
<form action="<?php echo base_url('Login/doLogin'); ?>" method="POST">
	<input class="form-control" type="text" name="username" placeholder="Enter User Name">
	<br>
	<br>
	<input class="form-control" type="password" name="password" placeholder="Enter Password">
	<br>
	<br>
	<input class="btn btn-success" type="submit" value="Login">
</form>
<br>
<div style="text-align: center;color: red">
<?php 
if($this->session->flashdata('error_msg')) 
{ 
echo $this->session->flashdata('error_msg');
}
?>
</div>
</div>
  </div>
</div>

</body>
</html>
