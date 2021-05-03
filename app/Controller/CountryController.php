<?php
namespace App\Controller;

use App\Controller\QueryController;

class CountryController extends BaseController {

    private $query;
    public function __construct(){
        $this->query = new QueryController();
    }

    /**
     *
     */
    public function dataGet(){

        return $this->query->list('country');
    }

    public function dataSet(){

        $query= $this->query->create('country',$_POST);
        $this->alert($query,"Data updated successfully");
        header("Location:index.php");
    }


    public function showData($id){
        return $this->query->show('country',$id);
    }

    public function dataUpdate(){

        $query=$this->query->update('country',$_POST,$_POST['id']);
        $this->alert($query,"Data updated successfully");
        header("Location:index.php");
    }

    public function dataDelete($id){
        $query= $this->query->delete('country',$id);
        $this->alert($query,"Data updated successfully");
        header("Location:index.php");
    }



}