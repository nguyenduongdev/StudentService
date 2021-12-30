<?php

class control
{
    public student $st;
    private $conn;
    function __construct()
    {
    }
    private  function connect()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=duong', 'root', 'duongcoi1803');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    private  function disConnect()
    {
        if ($this->conn) {
            $this->conn = null;
        }
    }
    public  function add($data, $table)
    {
        try {
            $tbValue = '';
            $tbName = '';
            $this->connect();
            foreach ($data as $key => $values) {
                $tbName .= ",$key";
                switch ($key) {
                    case 'age':
                        $tbValue .= ",$values";
                        break;
                    default:
                        $tbValue .= ",'$values'";
                }
            }
            $a = trim($tbName, ',');
            $b = trim($tbValue, ',');
            $stmp = $this->conn->prepare("INSERT INTO $table($a) VALUE($b)");
            $stmp->execute();
            echo 'đã insert thành công';
            $this->disConnect();
        } catch (PDOException $e) {
            echo 'Lỗi insert' . $e->getMessage();
        }
    }
    public  function edit($data, $table, $where)
    {
        try {
            $tbValue = '';
        $tbName = '';
        $this->connect();
        foreach ($data as $key => $values) {
            $tbName .= ",$key";
            switch ($key) {
                case 'age':
                    $tbValue .= ",$key=$values";
                    break;
                default:
                    $tbValue .= ",$key='$values'";
            }
        }
      $a= trim($tbValue, ',');
       $stmp= $this->conn->prepare("UPDATE $table SET $a $where ");
        $stmp->execute();
        echo 'đã sửa';
        $this->disConnect();
        } catch (PDOException $e) {
            echo 'lỗi update'.$e->getMessage();
        }
    }
    public  function delete( $table, $where)
    {
        try {
        $this->connect();
       $stmp= $this->conn->prepare("DELETE FROM $table $where ");
        $stmp->execute();
        $this->disConnect();
        } catch (PDOException $e) {
            echo 'lỗi'.$e->getMessage();
        }
    }
    public  function showData($table,$where)
    {
        try {
            $this->connect();
        $stmp =$this->conn->prepare("SELECT * FROM $table $where");
        $stmp->execute();
        $stmp->setFetchMode(PDO::FETCH_ASSOC);
       $result= $stmp->fetchALl();   
        // foreach($result as $keys) {
        //     foreach ($keys as $key=>$value){
        //         echo "$key :  $value <br>";
        //     }
        // }
        return $result;
        $this->disConnect();
        } catch (PDOException $e) {
            echo 'lỗi select '.$e->getMessage().'<br>';
        }
    }
}
$arr = array(
    "name" => "Nguyễn Long",
    "id" => "PH19064",
    "address" => "Nam Sách HD",
    "gender" => "Nam",
    "age" => 29
);
$con = new control();
// $con->add($arr, 'sinhVien');
// $con->edit($arr,'sinhvien'," where id = 'PH19061' ");
// $con->delete('sinhVien',"where id = 'PH19061' ");
// $con->showData('sinhVien');
