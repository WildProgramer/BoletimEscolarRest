<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

require_once('../api/login.php');
require_once('../api/prova.php');
require_once('../api/exame.php');
require_once('../api/token.php');



$app->run();