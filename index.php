<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	#echo "OK";
	#$sql = new \Hcode\DB\Sql();
	#$results = $sql->select("select * from tb_users");
	#echo "<pre>";
	#echo print_r($results);
	#echo "</pre>";

	$page = new Page();       #chama o header
	$page->setTpl("index");   #chama o body
						      #o destrutor chama o footer
});

// echo "<hr>";
// echo "<pre>";
// $teste = $_SERVER['DOCUMENT_ROOT'] . substr($_SERVER['REQUEST_URI'], 1);
// echo print_r($teste);
// echo "</pre>";


$app->run();

 ?>