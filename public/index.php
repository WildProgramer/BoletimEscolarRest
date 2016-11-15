<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

require_once('../api/login.php');
require_once('../api/prova.php');
require_once('../api/exame.php');
require_once('../api/token.php');
require_once('../api/databimestre.php');
require_once('../api/provas_anteriores.php');



$app->run();