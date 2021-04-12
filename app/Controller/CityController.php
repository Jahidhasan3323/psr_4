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
        return $this->create('city',$_POST);
    }


    public function showData($id){
        return $this->show('city',$id);
    }

    public function dataUpdate(){
        $conn=$this->connection();
        return $this->update('city',$_POST,$_POST['id']);
    }

    public function dataDelete($id){
        return $this->delete('city',$id);
    }



}