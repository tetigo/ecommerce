<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;

$app = new Slim();

$app->config('debug', true);

$app->get("/admin/", function() {
	
	$page = new PageAdmin();  #chama o header
	$page->setTpl("index");   #chama o body
						      #o destrutor chama o footer
});

$app->get('/', function() {
    
	$page = new Page();       #chama o header
	$page->setTpl("index");   #chama o body
						      #o destrutor chama o footer
});
$app->run();

?>