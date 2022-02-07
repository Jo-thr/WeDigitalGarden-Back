<?php
require_once "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define("API_HOST", $_ENV["APP_URL"]);

$openapi = \OpenApi\scan(__DIR__.'/app');

file_put_contents(__DIR__.'/docs/api.yml', $openapi->toYaml());
file_put_contents(__DIR__.'/docs/api.json', $openapi->toJson());