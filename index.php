<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	#echo "OK";
	$sql = new \Hcode\DB\Sql();
	$results = $sql->select("select * from tb_users");
	
	echo "<pre>";
	echo print_r($results);
	echo "</pre>";
	
});


$app->run();

 ?>