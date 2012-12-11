<?php
class Editor_UploadController extends Common_Controller_Base 
{
	public function indexAction()
	{
		var_dump($_FILES); 
		echo json_encode(array('error' => 0, 'url' => 'www.howzhi.com'));
	}
}