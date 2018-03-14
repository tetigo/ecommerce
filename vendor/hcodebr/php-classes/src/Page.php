<?php

namespace Hcode;

use Rain\Tpl;

class Page{

	private $tpl;
	private $options = array();
	private $defaults = array(
		"data"=>array()
	);

	public function __construct($opts = array(), $tpl_dir = "views/"){

		$this->options = array_merge($this->defaults, $opts);

		$caminho = $_SERVER['DOCUMENT_ROOT'] . substr($_SERVER['REQUEST_URI'], 1);

		if ($tpl_dir == "views/admin/"){
			$teste = explode('/', $caminho);
			array_pop($teste);
			array_pop($teste);
			$teste = implode('/', $teste) . '/';
			$caminho = $teste;
		}

		$config = array(

			"tpl_dir"       => $caminho . $tpl_dir,
			"cache_dir"     => $caminho . "views-cache/",
			"debug"         => true,
			"templates.path" => $caminho
		);

		Tpl::configure( $config );

		$this->tpl = new Tpl;

		#$this->setData($this->options['data']);

		foreach ($this->options['data'] as $key => $value) 		{
			$this->tpl->assign($key, $value);
		}

		$this->tpl->draw('header');

	}
	
	// private setData($data = array())
	// {
	// 	foreach ($data as $key => $value) 		{
	// 		$this->tpl->assign($key, $value);
	// 	}		
	// }

	public function setTpl($name, $data = array(), $returnHTML = false)
	{
		#$this->setData($data);

		foreach ($data as $key => $value) 		{
			$this->tpl->assign($key, $value);
		}

		return $this->tpl->draw($name, $returnHTML);
		
	}

	

	


	public function __destruct(){
		
		$this->tpl->draw('footer');

	}
}
	
?>