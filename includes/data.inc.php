<?php if(!isset($data) or !($data instanceof TemplateData)) die('Data not passed.');

$data->site_template('ucf');
$data->site_meta('robots', 'noindex'); 
$data->site_title('IT Mass Emailer');
$data->site_subtitle('SDES Information Technology');
$data->site_subtitle_href('../');
$data->site_css('https://assets.sdes.ucf.edu/css/sdes_survey.css','screen');
$data->site_css('css/style.css','screen');
$data->site_billboard(false);

?>