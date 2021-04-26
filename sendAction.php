<?php 

require_once 'config.php';
require_once 'models/Info.php';
require_once 'dao/InfoDaoMysql.php';

$key = filter_input(INPUT_POST, 'key');
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$body = filter_input(INPUT_POST, 'body');

if($key && $body) {
    
    $infoDao = new InfoDaoMysql($pdo);

    $newInfo = new Info();
    $newInfo->chave = $key;
    $newInfo->body = $body;
    $newInfo->created_at = date('Y-m-d H:i:s');
    
    $newInfo->name = $name ?? '';

    $infoDao->insert($newInfo);

    header('Location:index.php');
    exit;
} 


header('Location:index.php');
exit;