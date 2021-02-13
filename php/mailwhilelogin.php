<?php
	$to = $_POST['email'];
	$subject = "Archue Login Information";

	$message = "
	<table style='width: 100%;'>
		<tr style='width: 100%;'>
			<td><img style='width:100%' src='https://archue.com/image/LOGIN_PAGE_FOR_MAIL.jpg' /></td>
		</tr>
	</table>
	";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From : Archue Login <info@archue.com>";

	if(mail($to,$subject,$message,$headers)){
		$resp['status'] = "Sent";
	}else{
		$resp['status'] = "Failed";
	}

	echo json_encode($resp);

?>