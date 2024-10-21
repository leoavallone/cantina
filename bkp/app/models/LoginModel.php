<?php

use App\core\Model;

class LoginModel extends Model {
    public function __construct(){}

    public function getDataUser($email){
        $pdo = $this->getPDO();
        $query = "SELECT * FROM users WHERE email = ?";
        $result = $pdo->prepare($query);
        $result->execute([$email]);
        return $result->fetch(\PDO::FETCH_ASSOC);
    }
}