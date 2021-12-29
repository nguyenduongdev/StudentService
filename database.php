<?php
//kết nối database duong có sẵn
// try {
//     $conn = new PDO('mysql:host=localhost;dbname=duong','root','duongcoi1803');
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
//     // Thông báo thành công
//     echo "Kết nối thành công";
// } catch (PDOException $e) {
//     echo "Kết nối thất bại: " . $e->getMessage();
// }
 
// Tạo database = php



function createDb(){
    try {
        $conn2 = new PDO('mysql:host=localhost','root','duongcoi1803');
       $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = 'CREATE DATABASE Student';
         $conn2 ->exec($sql);  
      echo 'tạo thành công';
    } catch (PDOException $e) {
        echo "tạo thất bại " . $e->getMessage();
    }
    $conn2=null;
}
function createTable($table){
    try {
       $conn = new PDO('mysql:host=localhost;dbname='.$table,'root','duongcoi1803');
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "CREATE table $table.class(
        classID varchar(30) not null primary key,
        className nvarchar(100),
        classMember int
        );";
       $conn->exec($sql);
        echo ' tạo bảng thành công';

    } catch (PDOException $e) {
       echo "tạo bảng thất bại". $e->getMessage();
    }
    $conn=null;
}
$tableStudent ='Student';

    function insertTable($table){
     try {
        $conn = new PDO('mysql:host=localhost;dbname='.$table,'root','duongcoi1803');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO class(classID,className,classMember)
        values('C19067',N'Lớp 13',22),
        ('C19069',N'Lớp 12',23),
        ('C19061',N'Lớp 11',28);
        ";
        $conn->exec($sql);
        $last_id=$conn->lastInsertId(); //tạo id cho insert
        $conn->commit(); //mọi thứ thành công thì commit 
        echo 'insert thành công';
     } catch (PDOException $e) {
          $conn->rollback(); //lỗi thì quay lại các thao tác
         echo 'insert lỗi'.$e->getMessage();
     }
     $conn =null;
    }

    function insertTable2($table){
        try {
           $conn = new PDO('mysql:host=localhost;dbname='.$table,'root','duongcoi1803');
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $stmt =$conn->prepare( "INSERT INTO class(classID,className,classMember)
           values(:id,:name,:quantity)");
           //cbi các tham số sql và bind
           $stmt->bindParam(':id',$id);
           $stmt->bindParam(':name',$name);
           $stmt->bindParam(':quantity',$quantity);
            //thêm lần 1
            $id ='C19051';
            $name="Lớp WE17202";
            $quantity=14;
            $stmt->execute();

             //thêm lần 2
             $id ='C19052';
             $name="Lớp WE17201";
             $quantity=18;
             $stmt->execute();

           echo 'insert thành công';
        } catch (PDOException $e) {
            echo 'insert lỗi'.$e->getMessage();
        }
        $conn =null;
       }

function selectTable($table){
try {
    $conn = new PDO('mysql:host=localhost;dbname='.$table,'root','duongcoi1803');
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("SELECT * from class");
    $sql -> execute();
    //khai báo fecth kiểu mảng
    $sql -> setFetchMode(PDO::FETCH_ASSOC);
    $result = $sql->fetchAll();
    print_r($result);
    echo '<br>';
    for($i=0;$i<count($result);$i++){
       echo $result[$i]['className'].'<br>';
       echo $result[$i]['classID'].'<br>';
       echo $result[$i]['classMember'].'<br>';
    }
} catch (PDOException $e) {
    echo 'Lỗi select'.$e->getMessage();
}
$conn=null;
}
function deleteTable($table,$id){
    try {
        $conn= new PDO('mysql:host=localhost;dbname='.$table,'root','duongcoi1803');
        $stmt = $conn->prepare('Delete from class where classID="'.$id.'"');
        $stmt->execute();
        echo 'đã xóa thành công';
    } catch (PDOException $e) {
        echo 'Lỗi delete'.$e->getMessage();
    }
}
function updateTable($table,$id){
   try {
    $conn = new PDO('mysql:host=localhost;dbname='.$table,'root','duongcoi1803');
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql ='UPDATE class SET classMember=21  where classID="'.$id.'"';
    $conn->exec($sql);
    echo 'đã cập nhật';
   } catch (PDOException $e) {
      echo 'lỗi update'.$e->getMessage();
   }
   $conn=null;
}




    // createTable($tableStudent);
    // insertTable($tableStudent);
    // insertTable2($tableStudent);
    // deleteTable($tableStudent,'C19052');
//     updateTable($tableStudent,'C19069');
// selectTable($tableStudent);

function getAccount(){
    $name='';
    $id='';
    function checkData($id,$name){
        try {
          $conn = new PDO('mysql:host=localhost;dbname=Student','root','duongcoi1803');
          $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $sql =$conn->prepare( "SELECT * FROM class WHERE className=\"$name\" AND classID =\"$id\" "); 
          $sql->execute();
          $sql->setFetchMode(PDO::FETCH_ASSOC);
          $result = $sql->fetchAll();
         
         foreach($result as $keys){
             print_r($keys);
            foreach($keys as $key => $value){
                echo '<br>'.$key.' : '.$value;
            }
         }
         if(!$result){
             echo 'đăng nhập không thành công';
            header('Location: https://google.com'); //chuyển hướng sang google
         }else{
            echo '</br> đã đăng nhập';
            saveCookie($id,$name);
         }
        } catch (PDOException $e) {
            echo 'không tìm thấy'.$e->getMessage();
      }
    }
function saveCookie($id,$name){
setcookie('classID',$id,time()+3600);
setcookie('className',$name,time()+3600);
if(!empty($_COOKIE)){
    var_dump($_COOKIE);
}
}
            // Tìm kiếm theo form 
    if(isset($_POST['sub'])){
        // var_dump($_POST);
        if(!empty($_POST['id'])&& !empty($_POST['name']) ){
            $id= $_POST['id'];
             $name =$_POST['name'];
             echo $name,$id;
             checkData($id,$name );           
        }       
    }
  
}
// require("progess_form.php");  // dùng 2 lần require sẽ fatal error 
require_once("progess_form.php"); //dùng 2 lần require_one sẽ k gây lỗi
require_once("progess_form.php");
// include("progess_form.php"); //dùng 2 lần include sẽ cảnh báo err. ct vẫn chạy
say();
// timeZone();
calTime();
getAccount();
// header('Content-Type: image/png');
foreach($_SERVER as $key => $value){
    echo $key.' : '.$value.'<br>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    .form{
        width: 350px;
        margin: 50px auto;
    }
</style>
<body>
    <div class="form">
         <form id="form" action="" method="POST">
        <div class="mb-3">
        <input type="text" class="form-control" id="className"name="name" placeholder="Nhập tên lớp">
      <input type="text" class="form-control" id="id"name="id" placeholder="Nhập ID">
        </div>
         <button type="submit" name="sub" class="btn btn-primary">Tìm kiếm</button>
        </form>
    </div>
    <div class="show"></div>
    <!-- <script>
        document.getElementById('form').onsubmit = function(e){
            e.preventDefault();
        }
    </script> -->
    
</body>
</html>