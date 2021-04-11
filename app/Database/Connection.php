<?php
namespace App\Database;
use mysqli;
class Connection {

    public function connection(){
        return $connection = new mysqli("localhost", "root", "", "psr_4");

    }

}