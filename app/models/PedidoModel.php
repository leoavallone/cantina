<?php

use App\core\Model;

class PedidoModel extends Model {
    public function __construct(){}

    public function getDataPedido(){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM pedidos where status = 1";
        $result = $pdo->prepare($query);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function finalizarPedido($id){
        $pdo = $this->getPDO();
        $query = "UPDATE pedidos SET status= 2 WHERE id=?";
        $result = $pdo->prepare($query);
        return $result->execute([$id]);
    }
}