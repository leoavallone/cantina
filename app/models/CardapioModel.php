<?php

use Leandrodonascimento\Cantina\Core\Model;

class CardapioModel extends Model {
    public function __construct(){}

    public function getDataEstoque(){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM cardapio";
        $result = $pdo->prepare($query);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createEstoque($descricao,$data,$status){
        $pdo = $this->getPDO();
        date_default_timezone_set('America/Sao_Paulo');
        $dataFormatada = $data ? strtotime($data) : "";
        $query = "INSERT INTO cardapio (descricao, data, status) values(?,?,?)";
        $result = $pdo->prepare($query);
        return $result->execute([$descricao,$dataFormatada,$status]);
    }
}