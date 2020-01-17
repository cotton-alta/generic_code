<?php

//確認画面
//ワンタイムチケットの発行
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(48));
$token = htmlspecialchars($_SESSION['token'], ENT_QUOTES);

?>
<!doctype html>
<html>
<head>
</head>
<body>
	<form action="onetimeTicket2.php" method="post">
	<input type="hidden" name="token" value="<?php echo $token ?>">
</form>
</body>	
</html>
