<?php

use App\core\Model;

class RelatorioModel extends Model {
    public function __construct(){}

    public function getDataRelatorio($cardapioId){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM pedidos where status = 2 and cardapio_id = ?";
        $result = $pdo->prepare($query);
        $result->execute([$cardapioId]);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
}