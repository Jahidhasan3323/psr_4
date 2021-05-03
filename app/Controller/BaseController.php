<?php
namespace App\Controller;

use mysql_xdevapi\Result;

class BaseController{

    public function alert($status, $message){
        session_start();
        if ($status == 1) {
            $_SESSION['success'] = $message;
        } else {
            $_SESSION['danger'] = "Operation failed try again!";
        }
    }

}