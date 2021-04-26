<?php

class Info
{
    public $name;
    public $chave;
    public $body;
    public $created_at;
}

interface InfoDAO
{
    public function insert(Info $info);
    public function getInfo();
}