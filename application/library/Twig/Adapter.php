<?php
/**
*twig adapter for yaf
*@author lvshuang1201@gmail.com
*
*/
class Twig_Adapter implements Yaf_View_Interface
{
	private $twig = null;

	private $strLoader = null;

	private $fileLoader = null;

	private $strTwig = null;

	private $fileTwig = null;

	public function __construct($tplPath, $tplCachePath = null)
	{
		require_once dirname(__FILE__) . '/lib/Twig/Autoloader.php';
		Twig_Autoloader::register();
		if (!$this->strLoader) {
			$this->strLoader = new Twig_Loader_String();
		}
		if (!$this->fileLoader) {
			$this->fileLoader = new Twig_Loader_Filesystem($tplPath);
		}
		if (!$this->strTwig) {
			$this->strTwig = new Twig_Environment($this->strLoader);
		}
		if (!$this->fileTwig) {
			$this->fileTwig = new Twig_Environment($this->fileLoader, array(
				'cache' => $tplCachePath
			));
		}
	}

	public function render($tpl, $tpl_vars = NULL)
	{
		return $this->fileTwig->render($tpl, $tpl_vars);
	}

	public function renderStr($str, array $vars = null)
	{
		return $this->strTwig->render($str, $vars);
	}

    public function display($tpl, $tpl_vars = NULL)
    {
    	echo $this->fileTwig->render($tpl, $tpl_vars);
    }

    public function displayStr($str, array $vars = null)
    {
    	echo $this->strTwig->render($str, $vars);
    }

    public function __get($name)
    {
    	return $this->$name;
    }

	public function assign($name, $value = NULL )
	{

	}
	public function setScriptPath($view_directory )
	{
	}
	public function getScriptPath()
	{
	}

}