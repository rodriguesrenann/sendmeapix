<?php

require_once 'models/info.php';

class InfoDaoMysql implements InfoDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insert(Info $info)
    {
        $sql = $this->pdo->prepare('INSERT INTO info (name, chave, body, created_at) VALUES (:name, :chave, :body, :created_at)');
        $sql->bindValue(':name', $info->name);
        $sql->bindValue(':chave', $info->chave);
        $sql->bindValue(':body', $info->body);
        $sql->bindValue(':created_at', $info->created_at);
        
        $sql->execute();

        return true;
    }

    public function getInfo()
    {
        $sql = $this->pdo->query('SELECT * FROM info');

        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        }
    }
}
