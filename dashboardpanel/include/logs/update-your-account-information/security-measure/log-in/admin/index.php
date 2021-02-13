<?php
require_once __DIR__ . '/../function.php';

$actual_page = 'home';
if ($_GET['logout'])
{
	session_destroy();
}

## Count Allow Visitor
$count_allow = file_get_contents("../logs/Allow.html");
$allow = explode("<br>", $count_allow);
$return_allow = count($allow);

## Count Block Visitor
$count_block = file_get_contents("../logs/Block.html");
$block = explode("<br>", $count_block);
$return_block = count($block);
?>

<?php require 'page/header.php'; ?>

<body>

	<div id="main">

    <?php require 'page/sidebar.php'; ?>

		<div class="content">
			<div class="half-container">
				<div class="head"><a href="../logs/Allow.html" style="text-decoration: none"><?=$return_allow-1;?> Visitor</a></div>
			</div>

			<div class="half-container">
				<div class="head"><a href="../logs/Block.html" style="text-decoration: none"><?=$return_block-1;?> Blocker</a></div>
			</div>
			<div class="clear"></div>
			
<p>
<div align="left" style="margin-left:40px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:normal;"><li>Api Key = Api Key Configuration</li></font></div>
<div align="left" style="margin-left:40px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:normal;"><li>3D Secure = Get VBV</li></font></div>
<div align="left" style="margin-left:40px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:normal;"><li>Filter = Block visitor if fill data with bad words.</li></font></div>
<div align="left" style="margin-left:40px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:normal;"><li>Proxy Bllock = Block Visitor if visit using IP, Proxy, VPN</li></font></div>
<div align="left" style="margin-left:40px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:normal;"><li>Blocker = Block visitor if visit with blocked data.</li></font></div>
<div align="left" style="margin-left:40px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:normal;"><li>Lock Language = Fitur Detect Language (JP/CN/FR/ES/CL/TH/DE/NL/MY/PE/CO/AR/MX/EC/PY/UY)</li></font></div>
<div align="left" style="margin-left:40px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:normal;"><li>Translate = Automatic translate text with visitor language.</li></font></div>
<div align="left" style="margin-left:40px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:normal;"><li>Get Photo = Fitur Upload Photo Selfie ID/Driving License/Passport</li></font></div>
<div align="left" style="margin-left:40px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:normal;"><li>Email Result = Your email for sending the result.</li></font></div>
<div align="left" style="margin-left:40px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:normal;"><li>Get Bank = Auto Detect Bank</li></font></div>
	</div>
	
	<div class="clear"></div>
</div>
	<?php require 'page/footer.php'; ?>
</body>
</html>
