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

	private $viewPath = $tplPath;



	public function __construct($tplPath, $tplCachePath = null)
	{
		require_once dirname(__FILE__) . '/Autoloader.php';
		Twig_Autoloader::register();
		$this->viewPath = $tplPath;
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
				// 'cache' => $tplCachePath,
				// 'debug' => true
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
    	if (!empty($tpl_vars)) {
    		$tpl_vars = array_merge($tpl_vars, array('viewPath' => $this->viewPath));
    	}
    	echo $this->fileTwig->display($tpl, $tpl_vars);
    }

    public function displayStr($str, array $vars = null)
    {
    	echo $this->strTwig->display($str, $vars);
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