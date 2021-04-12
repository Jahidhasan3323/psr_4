<?php
namespace App\Controller;

use App\Database\Connection;
use mysql_xdevapi\Result;

class BaseController{

    public $connection;
    public function __construct(){
        $this->connection=$this->connection();
    }

    public function connection(){
        $con = new Connection();
        $connection=$con->connection();
    // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }

    public function list($table, $index='*'){
        $conn=$this->connection();
        $sql="SELECT $index from $table ";
        return $conn->query($sql);
    }

    public function create($table,$data){
        $conn=$this->connection();
        $index=array_keys($data);
        array_pop($index);
        $index=implode(',',$index);
        $value=array_values($data);
        array_pop($value);
        $value=implode(',',$value);
        $sql="INSERT INTO $table ($index) VALUES ('$value')";
        $result = $conn->query($sql);

    }

    public function show($table, $id){
        $conn=$this->connection();
        $sql="SELECT * FROM $table where id=$id";
        return $conn->query($sql);
    }

    public function delete($table, $id){
        $conn=$this->connection();
        $sql="DELETE FROM $table where id=$id";
        return $conn->query($sql);
    }

    public function update($table,$data,$id){
        $conn=$this->connection();
        $index=array_keys($data);
        array_pop($index);
        array_shift($index);
        $value=array_values($data);
        array_shift($value);
        $queryDta='';
        $i=0;
        foreach ($index as $row){
            $queryDta.=$index[$i]."='".$value[$i]."',";
            $i++;
        }
        $queryDta=substr($queryDta, 0, -1);
        $sql="UPDATE $table SET $queryDta where id=$id ";
        $result = $conn->query($sql);

    }
    
    public function listJoin($table, $joinTable,$tableColumn,$joinTableColumn,$selectJoinTableData){
        $conn=$this->connection();
        $sql="SELECT $table.*, $joinTable.$selectJoinTableData from $table  LEFT JOIN $joinTable ON $table.$tableColumn = $joinTable.$joinTableColumn";
        return $conn->query($sql);
    }
}