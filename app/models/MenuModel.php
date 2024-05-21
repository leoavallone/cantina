<?php

use App\core\Model;

class MenuModel extends Model {
    public function __construct(){}

    public function getDataMenu(){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM cardapio WHERE status = 2 ORDER BY id ASC LIMIT 1";
        $result = $pdo->prepare($query);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createPedido($cardapioId,$itens,$total,$pagamento,$nome,$modalidade,$status){
        $pdo = $this->getPDO();
        $query = "INSERT INTO pedidos (cardapio_id, itens, total, pagamento, nome, modalidade, status) values(?,?,?,?,?,?,?)";
        $result = $pdo->prepare($query);
        return $result->execute([$cardapioId,$itens,$total,$pagamento,$nome,$modalidade,$status]);
    }

    public function editarPedido($id,$nome,$descricao,$quantidade){
        $pdo = $this->getPDO();
        $query = "UPDATE estoque SET nome=?, descricao=?, quantidade=? WHERE id=?";
        $result = $pdo->prepare($query);
        return $result->execute([$nome,$descricao,$quantidade,$id]);
    }

    public function deletarPedido($id){
        $pdo = $this->getPDO();
        $query = "DELETE FROM estoque WHERE id=?";
        $result = $pdo->prepare($query);
        return $result->execute([$id]);
    }

    public function searchItemMenuByCat($cardapioId, $categoria){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM cardapio_itens WHERE cardapio_id = ? AND categoria=?";
        $result = $pdo->prepare($query);
        $result->execute([$cardapioId,$categoria]);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getItemByName($nome,$cardapioId){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM cardapio_itens WHERE nome = ? AND cardapio_id=?";
        $result = $pdo->prepare($query);
        $result->execute([$nome,$cardapioId]);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function atualizaQtd($id,$nome,$quantidade){
        $pdo = $this->getPDO();
        $query = "UPDATE cardapio_itens SET quantidade=? WHERE nome=? AND cardapio_id=?";
        $result = $pdo->prepare($query);
        return $result->execute([$quantidade,$nome,$id]);
    }
}