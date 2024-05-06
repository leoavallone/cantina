<?php

use App\core\Model;

class MenuModel extends Model {
    public function __construct(){}

    public function getDataEstoque(){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM estoque";
        $result = $pdo->prepare($query);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createEstoque($nome,$descricao,$quantidade){
        $pdo = $this->getPDO();
        $query = "INSERT INTO estoque (nome, descricao, quantidade) values(?,?,?)";
        $result = $pdo->prepare($query);
        return $result->execute([$nome,$descricao,$quantidade]);
    }

    public function editarEstoque($id,$nome,$descricao,$quantidade){
        $pdo = $this->getPDO();
        $query = "UPDATE estoque SET nome=?, descricao=?, quantidade=? WHERE id=?";
        $result = $pdo->prepare($query);
        return $result->execute([$nome,$descricao,$quantidade,$id]);
    }

    public function deletarEstoque($id){
        $pdo = $this->getPDO();
        $query = "DELETE FROM estoque WHERE id=?";
        $result = $pdo->prepare($query);
        return $result->execute([$id]);
    }

    public function searchItemMenuByCat($categoria){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM cardapio_itens WHERE categoria=?";
        $result = $pdo->prepare($query);
        $result->execute([$categoria]);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
}