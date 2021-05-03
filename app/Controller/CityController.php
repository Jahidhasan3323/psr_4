<?php
namespace App\Controller;

class CityController extends BaseController {

    private $query;

    public function __construct(){
        $this->query = new QueryController();
    }

    /**
     *
     */
    public function dataGet(){
        return $this->query->listJoin('city','country','country_id','id','name');

    }

    public function dataSet(){
        $query= $this->query->create('city',$_POST);
        $this->alert($query,"Data updated successfully");
        header("Location:index.php");
    }


    public function showData($id){
        return $this->query->show('city',$id);
    }

    public function dataUpdate(){
        $query= $this->query->update('city',$_POST,$_POST['id']);
        $this->alert($query,"Data updated successfully");
        header("Location:index.php");
    }

    public function dataDelete($id){
        $query= $this->query->delete('city',$id);
        $this->alert($query,"Data updated successfully");
        header("Location:index.php");
    }



}