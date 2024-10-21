<?php

use App\core\Model;

class PedidoModel extends Model {
    public function __construct(){}

    public function getCardapio(){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM cardapio WHERE status = 2 ORDER BY id ASC LIMIT 1";
        $result = $pdo->prepare($query);
        $result->execute();
        return $result->fetch();
    }

    public function getDataPedido(){
        $cardapioId = $this->getCardapio();
        $pedidos = [];
        if(count($cardapioId) > 0){
            $pdo = $this->getPDO();
            $query = "SELECT * FROM pedidos where cardapio_id = ?";
            $result = $pdo->prepare($query);
            $result->execute([$cardapioId['id']]);
            $pedidos = $result->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $pedidos;
    }


    public function finalizarPedido($id){
        $pdo = $this->getPDO();
        $query = "UPDATE pedidos SET status= 2 WHERE id=?";
        $result = $pdo->prepare($query);
        return $result->execute([$id]);
    }
}