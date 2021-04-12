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
        $conn=$this->connection();
        $title=$_POST['title'];
        $country_id=(int)$_POST['country_id'];
        $sql="INSERT INTO city(title,country_id) VALUES ('$title','$country_id')";
        $result = $conn->query($sql);
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