<?php
require_once 'C:\WebDFS\Websites\_phplib\sdestemplate\template_data.php';
try{
	$data = new TemplateData;
	require_once 'includes/data.inc.php';
	$data->load_page(new TemplatePage($data));
	new TemplateFrame($data);
} catch(Exception $e){
	die('Exception: '.$e->getMessage());
}
?>