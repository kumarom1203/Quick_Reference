<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
 <br>   
 <br>   
 <br>   
<?php
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'yourmail@mail.com';
$password = 'mailpassword';
/* try to connect */

/*
 1. ENABLE IMAP EXTENTION IN PHP INI FILE IN LOCAL XAMPP OR INSTALL IMAP EXTENTION ON YOUR SERVER.
 2. ALLOW LESS SECURE APP ACCESS IN MAIL SECURITY. 
 3. ALLOW IMAP ACCESS IN MAIL IMAP/POP SETTINGS.
 */


$inbox = imap_open($hostname,$username,$password) or  die('Cannot connect to Gmail: ' . imap_last_error());
$emails = imap_search($inbox,'UNSEEN');

/* if emails are returned, cycle through each... */
if($emails) {
	
	/* begin output var */
	$output = '';
	
	/* put the newest emails on top */
	rsort($emails);
	
	/* for every email... */
	foreach($emails as $email_number) 
	{
		echo '<table class="table table-bordered"><tbody>';
		/* get information specific to this email */
		//$overview = imap_fetch_overview($inbox,$email_number);
		//$header =   imap_fetchheader($inbox,$email_number);
		$header = imap_headerinfo($inbox, $email_number);
		$from = $header->from[0]->mailbox . "@" . $header->from[0]->host;
		$reply = $header->reply_to[0]->mailbox . "@" . $header->reply_to[0]->host;
		$body =   imap_fetchbody($inbox,$email_number,1);

		/*
        (empty) - Entire message
         0 - Message header
         1 - MULTIPART/ALTERNATIVE
         1.1 - TEXT/PLAIN
         1.2 - TEXT/HTML
         2 - MESSAGE/RFC822 (entire attached message)
         2.0 - Attached message header
         2.1 - TEXT/PLAIN
         2.2 - TEXT/HTML
         2.3 - file.ext
		*/
        
        //print_r($overview);
	    //echo "<pre>";
        //print_r($header);
        //echo "</pre>";
        //print_r($from);
        //print_r($body);

        echo "<tr><th>From: </th><td>".@$from." [".$header->fromaddress."]</td><th>Date: </th><td>".@$header->date."</td></tr>";
        echo "<tr><th>To: </th><td>".@$header->toaddress."</td><th>Reply: </th><td>".@$reply." [".@$header->reply_to[0]->personal."]</td></tr>";
        echo "<tr><th>Subject: </th><td colspan='3'>".$header->subject."</td></tr>";
        echo "<tr><td colspan='4'>".@$body."</td></tr>";
        echo '</tbody></table>';
        echo "<br><br>";
	}
	
	//echo $output;
	//print_r($emails);
	
} 

/* close the connection */
imap_close($inbox);
?>
  
</div>

</body>
</html>