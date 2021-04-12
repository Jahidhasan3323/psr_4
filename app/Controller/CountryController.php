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

        return $this->create('country',$_POST);
    }


    public function showData($id){
        return $this->show('country',$id);
    }

    public function dataUpdate(){

        return $this->update('country',$_POST,$_POST['id']);
    }

    public function dataDelete($id){
        return $this->delete('country',$id);
    }



}