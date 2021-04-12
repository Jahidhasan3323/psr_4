<?php
namespace App\Controller;

class CityController extends BaseController {

    public function __construct(){
    }

    /**
     *
     */
    public function dataGet(){
        return $this->listJoin('city','country','country_id','id','name');

    }

    public function dataSet(){
        $query= $this->create('city',$_POST);
        session_start();
        if ($query == 1) {
            $_SESSION['success'] = "Data updated successfully";
            header("Location:index.php");
        } else {
            $_SESSION['danger'] = "Operation failed try again!";
            header("Location:index.php");
        }
    }


    public function showData($id){
        return $this->show('city',$id);
    }

    public function dataUpdate(){
        $conn=$this->connection();
        $query= $this->update('city',$_POST,$_POST['id']);
        session_start();
        if ($query == 1) {
            $_SESSION['success'] = "Data updated successfully";
            header("Location:index.php");
        } else {
            $_SESSION['danger'] = "Operation failed try again!";
            header("Location:index.php");
        }
    }

    public function dataDelete($id){
        $query= $this->delete('city',$id);
        session_start();
        if ($query == 1) {
            $_SESSION['success'] = "Data updated successfully";
            header("Location:index.php");
        } else {
            $_SESSION['danger'] = "Operation failed try again!";
            header("Location:index.php");
        }
    }



}