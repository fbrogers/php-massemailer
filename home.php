<?php
	$title = 'Build An Email';
	$links = ['Clear Cookies' => '?id=clear'];

	$from = null;
	$to = null;
	$subject = null;
	$body = null;

	if(isset($_COOKIE['subject']) && !empty($_COOKIE['subject'])){
		$from = $_COOKIE['from'];
		$to = $_COOKIE['to'];
		$subject = $_COOKIE['subject'];
		$body = $_COOKIE['body'];
	}
?>

<form class="fieldset" method="post" action="?id=verify" enctype="multipart/form-data">
	<fieldset>
		<legend>Basic Email Fields</legend>		
		<div class="space-left">
			<p>
				<strong>Body</strong><br />
				The body may contain pure HTML; use with caution!
			</p>
		</div>		
		<div class="shift-right">
			<label for="from">From</label>
			<input type="text" name="from" id="from" value="<?= $from ?>" />

			<label for="to">To</label>
			<input type="text" name="to" id="to" value="<?= $to ?>" />

			<label for="subject">Subject</label>
			<input type="text" name="subject" id="subject" value="<?= $subject ?>" />

			<label for="body">Body</label>
			<textarea rows="20" cols="61" name="body" id="body"><?= $body ?></textarea>
		</div>
	</fieldset>

	<fieldset>
		<legend>Recipients</legend>	
		<div class="space-left">
			<p>
				<strong>Uploads</strong><br />
				The only allowable upload type is a TXT file with a single email address
				on each line.
			</p>
		</div>		
		<div class="shift-right">
			<label for="bcc">Upload</label>
			<input type="file" name="bcc" id="bcc" />

			<label for="bcc_text">Text Input</label>
			<textarea rows="5" cols="61" name="bcc_text" id="bcc_text"></textarea>
		</div>
	</fieldset>
	<div class="submitbox">
		<input type="submit" value="Verify Data" />
	</div>
</form>