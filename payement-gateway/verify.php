<?php
require('config.php');
require_once("../php/db-connect.php");

session_start();
$conn = Conn::connect();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    // $html = "<p>Your payment was successful</p>
    //          <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
    $id = $_POST['razorpay_payment_id'];
    if (isset($_COOKIE['user_id'])) {
        $userId = $_COOKIE['user_id'];
    }
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
    }
    $leadId = $_SESSION['lead_id'];
    $email = $_SESSION['email'];
    $sql = "INSERT INTO payment(payment_id, user_id, lead_id, purchased_on) VALUES('$id', $userId, $leadId, NOW())";
    $sql1 = "UPDATE leads SET person_count = person_count-1 WHERE lead_id=$leadId";
    $sql2 = "SELECT * FROM leads WHERE lead_id='$leadId'";

    if ($conn->query($sql)) {
        $conn->query($sql1);
        $result2 = $conn->query($sql2);
        $leadRow = $result2->fetch_assoc();
        $html =  '<div style="width: 50%;margin: 0 auto;margin-top: 5rem;box-shadow: 0 0 10px 10px #eee;"><h3 style="color: white;padding: 10px 25px;background-color:#fa8a11;">Thanks for buying lead with Archue . Lead are also send in your dashboard for future use. For any queries reach us at <a href="mailto:admin@archue.com">admin@archue.com</a></h3>
        <div style="padding: 10px 28px;">
        <p>Lead details are:</p>
        <p>Name:'.$leadRow['name'].'</p>
        <p>Email:'.$leadRow['email'].'</p>
        <p>Contact:'. $leadRow['phone'].'</p>
        <p>Description:' . $leadRow['description'].'</p>
        <a href="/dashboard">Go to dashboard</a></div></div>';
        sendMail($email, $leadRow);
    } else {
        $html =  'error'.$conn->error;
    }


}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p><div><a href='/'>Go to Home</a></div>";
}

echo $html;
function sendMail($email, $leadInfo) {
			$to = $email;
			// For testing purpose only.
			// $to = "rizwan.raza987@gmail.com";
			$subject = "Lead Details";
			$msg = "<html>
						<body>
							<table>
								<tr>
								  <th>Name</th>
								  <th>Contact Number</th>
								  <th>Description</th>
								</tr>
								<tr>
								  <td>".$leadInfo['name']."</td>
								  <td>".$leadInfo['phone']."</td>
								  <td>".$leadInfo['description']."</td>
								</tr>
							</table>
						</body>
					</html>
			       ";
			$headers = "MIME-Version:1.0" . PHP_EOL;
			$headers .= "Content-Type:text/html;charset=UTF-8";
			$headers .= "From: Archue Payment <info@archue.com>";
			return mail($to, $subject, $msg, $headers);
}

