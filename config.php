<?php
//Simple MVC Configuration File
//Inicialização da variável $config
unset($config);
$config = new stdClass();
$config->defaultClass = "Home";
$config->base_url = '/daw2018/comichub/';
$config->url = 'http://localhost'.$config->base_url;
$config->asset = $config->base_url.'view/templates/';
$config->template = 'default';

$config->dbuser = 'root'; //nomedoaluno
$config->dbpassword = ''; //senha
$config->dbname ='comichub';//nomedoaluno
$config->dbhost = '127.0.0.1';
$config->dbdrive = 'mysql';











