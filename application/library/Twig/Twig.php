<?php
namespace Twig;

class Twig {

	public function __construct() {
		require_once dirname(__FILE__) . '/lib/Twig/Autoloader.php';
		Twig_Autoloader::register();

		$loader = new Twig_Loader_Filesystem('/path/to/templates');
		$twig = new Twig_Environment($loader, array(
    		'cache' => '/path/to/compilation_cache',
		));
	}

	public static function render($template, $options) {
		$ot
	}

}

