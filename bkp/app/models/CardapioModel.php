<?php

use App\core\Model;

class CardapioModel extends Model {
    public function __construct(){}

    public function getDataCardapio(){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM cardapio";
        $result = $pdo->prepare($query);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createCardapio($descricao,$data,$status){
        $pdo = $this->getPDO();
        $query = "INSERT INTO cardapio (descricao, data, status) values(?,?,?)";
        $result = $pdo->prepare($query);
        return $result->execute([$descricao,$data,$status]);
    }

    public function editarCardapio($id,$descricao,$status){
        $pdo = $this->getPDO();
        $query = "UPDATE cardapio SET descricao=?, status=? WHERE id=?";
        $result = $pdo->prepare($query);
        return $result->execute([$descricao,$status,$id]);
    }

    public function deletarCardapio($id){
        $pdo = $this->getPDO();
        $query = "DELETE FROM cardapio WHERE id=?";
        $result = $pdo->prepare($query);
        return $result->execute([$id]);
    }

    public function createItemCardapio($cardapioId,$nome,$categoria,$quantidade,$preco,$descricao){
        $pdo = $this->getPDO();
        $query = "INSERT INTO cardapio_itens (cardapio_id, nome, categoria, quantidade, preco, descricao) values(?,?,?,?,?,?)";
        $result = $pdo->prepare($query);
        return $result->execute([$cardapioId,$nome,$categoria,$quantidade,$preco,$descricao]);
    }

    public function updateItemCardapio($id,$nome,$descricao,$preco,$quantidade){
        $pdo = $this->getPDO();
        $query = "UPDATE cardapio_itens SET nome=?, descricao=?, preco=?, quantidade=? WHERE id=?";
        $result = $pdo->prepare($query);
        return $result->execute([$nome,$descricao,$preco,$quantidade,$id]);
    }

    public function getDataItemCardapio($cardapioId){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM cardapio_itens WHERE cardapio_id=?";
        $result = $pdo->prepare($query);
        $result->execute([$cardapioId]);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deletarItemCardapio($id){
        $pdo = $this->getPDO();
        $query = "DELETE FROM cardapio_itens WHERE id=?";
        $result = $pdo->prepare($query);
        return $result->execute([$id]);
    }
}