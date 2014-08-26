<?php
	//unset cookies by expiring them in the past
	$expire = time()-1000;
	
	setcookie("from", null, $expire);
	setcookie("to", null, $expire);
	setcookie("subject", null, $expire);
	setcookie("body", null, $expire);

	header('Location: ./');
?>