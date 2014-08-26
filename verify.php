<?php
	if(!is_post()){
		die();
	}

	$links = ['Edit Data' => './'];

	//init
	$title = 'Verify Data';
	$expire = time()+60*60*24*7; //one week
	$bcc = [];
	$bcc_string = null;
	
	//check required fields
	verify_required_fields(['from', 'to', 'subject', 'body']);

	//check for previous emails
	setcookie("from", $_POST['from'], $expire);
	setcookie("to", $_POST['to'], $expire);
	setcookie("subject", $_POST['subject'], $expire);
	setcookie("body", $_POST['body'], $expire);

	//upload
	if($_FILES['bcc']['error'] === 0){
		$dump = file($_FILES['bcc']['tmp_name'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		foreach($dump as $line){
			try{
				FormProcessor::verifyEmails($line);
				if(!in_array($line, $bcc)){
					$bcc[] = strtolower($line);
				}
			}
			catch(Exception $e){}
		}
	}

	//text input
	if($_POST['bcc_text'] != null){
		$text = explode("\r\n", $_POST['bcc_text']);
		$text = FormProcessor::postClean($text);
		FormProcessor::verifyEmails($text);
		$bcc = array_merge($bcc, $text);
	}

	sort($bcc, SORT_NATURAL | SORT_FLAG_CASE);
	$bcc_string .= implode(",", $bcc);
?>

<div class="right">
	<p>
		<strong>From:</strong> <?= $_POST['from'] ?> &ndash;
		<strong>To:</strong> <?= $_POST['to'] ?> &ndash;
		<strong>Subject:</strong> <?= $_POST['subject'] ?> 
	</p>
	<div class="verify">
		<?= $_POST['body'] ?>
	</div>

	<div class="hr-clear"></div>

	<form class="fieldset" method="post" action="?id=send">
		<div class="submitbox">
			<input type="hidden" name="bcc" value="<?= $bcc_string ?>" />
			<input type="submit" name="verify_submit" value="Send Email" />
		</div>
	</form>

	<div class="hr-clear"></div>
</div>

<div class="sidebar-left">
	<p>Email Addresses Uploaded</p>
	<div class="upload">
		<?php 
		if(!empty($bcc)){
			echo '<ol>';
			foreach ($bcc as $address) {
				echo '<li>'.$address.'</li>';
			}
			echo '</ol>';
		}else{
			echo 'None submitted.';
		}
		?>
	</div>
</div>