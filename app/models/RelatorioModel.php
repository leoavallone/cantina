<?php

use App\core\Model;

class RelatorioModel extends Model {
    public function __construct(){}

    public function getDataRelatorio(){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM pedidos where status = 2";
        $result = $pdo->prepare($query);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
}