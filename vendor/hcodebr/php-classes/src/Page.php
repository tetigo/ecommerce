<?php

namespace Hcode;

use Rain\Tpl;

class Page{

	private $tpl;
	private $options = array();
	private $defaults = array(
		"data"=>array()
	);

	public function __construct($opts = array()){

		$this->options = array_merge($this->defaults, $opts);

		$caminho = $_SERVER['DOCUMENT_ROOT'] . substr($_SERVER['REQUEST_URI'], 1);
		$config = array(

			"tpl_dir"       => $caminho . "views/",
			"cache_dir"     => $caminho . "views-cache/",
		"debug"         => false
		);

		echo "<hr>";
		echo $config['tpl_dir'];
		echo "<hr>\r\n\r\n";

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