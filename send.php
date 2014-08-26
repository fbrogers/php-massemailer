<?php
	if(is_post()){
		//check required fields
		verify_required_fields(['verify_submit']);

		$f = new FormProcessor();
		$f->from($_COOKIE['from']);
		$f->to($_COOKIE['to']);
		$f->subject($_COOKIE['subject']);

		//body section
		$body = '<html><head><meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" /></head>
		<body style="margin: 2em;">
		<style type="text/css">
			body {
				font-family: \'Times New Roman\', \'Georgia\', serif;
			}
			ul.space li{
				margin-bottom: 1em;
			}
		</style>';

		$body .= $_COOKIE['body'];
		$body .= '</body></html>';
		$f->body($body, false);

		//recipients
		if($_POST['bcc'] != null){
			$f->bcc(explode(",", $_POST['bcc']));
		}

		$f->send('?id=thanks');
	}
?>