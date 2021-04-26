<?php

try{
   $pdo = new PDO('mysql:dbname=pix;host=127.0.0.1', 'root', '');
}catch(PDOException $e) {
    echo 'Error: '.$e->getMessage();
}