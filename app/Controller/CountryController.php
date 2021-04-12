<?php
namespace App\Controller;

class CountryController extends BaseController {

    public function __construct(){
    }

    /**
     *
     */
    public function dataGet(){
        return $this->list('country');
    }

    public function dataSet(){

        $query= $this->create('country',$_POST);

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
        return $this->show('country',$id);
    }

    public function dataUpdate(){

        $query=$this->update('country',$_POST,$_POST['id']);
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
        $query= $this->delete('country',$id);
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