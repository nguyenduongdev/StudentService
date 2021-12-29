<?php 
session_start();
// upload file vào thư mục
// var_dump($_POST);
// if(isset($_POST['upload'])){
//     if(isset($_FILES['files']) && !$_FILES['files']['error']){
//         move_uploaded_file($_FILES['files']['tmp_name'],'./file/'.$_FILES['files']['name']);
//         echo 'đã thêm vào thư mục file';
//     }
//     else{
//         echo 'error';
//     }
// }

// open file 
$input = @fopen('input.txt','r');
if(!$input){
    echo ' Không tìm thấy file';
}else{
    while(!feof($input)){ //lặp qua từng kí tự
       echo fgets($input);   
    }
    fclose($input);
}
echo filesize('input.txt').'<br>';
 $inputs = @fopen('inputs.txt','a+');
if(!$inputs){
    echo 'không tìm thấy file';
}else{
    $data = ' add ';
    fwrite($inputs,$data);
    echo file_get_contents('inputs.txt');
     fclose($inputs);
}

if(isset($_POST['upload'])){
    if(!file_exists('accset')){
        mkdir('accset',0777,true); //nếu chưa có tự tạo file
    }
    if(isset($_FILES['files'])&& !$_FILES['files']['error']){
    move_uploaded_file($_FILES['files']['tmp_name'],"./accset/".$_FILES['files']["name"]);
    echo 'thêm vào file';
    }else{
        echo '<br> lỗi';
    }
}
// render account
if(isset($_POST)){
    if(isset($_POST["names"])&& isset($_POST['pass'])){
        $name= $_POST["names"];
       $pass= $_POST["pass"];
       setcookie('account',$_POST['names'],time()+3600);
       $_SESSION['name']=$_POST["names"];
        $_SESSION['pass']=$_POST["pass"]; 
        if(!empty($_COOKIE['account'])){
            var_dump($_COOKIE).'<br>';
            echo $_COOKIE['account'].'<br>';
        } else{
            echo "cookie lỗi";
        }
    }else{
        $name='';
        $pass='';
    }
}


if(isset($_SESSION)){
    var_dump($_SESSION);
echo session_id().'<br>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
.form {
    width: 500px;
    margin: 110px auto;
}

.form2 {
    width: 500px;
    margin: 110px auto;
}
</style>
<body>
    <div class="form">
        <form action="" method="POST" enctype="multipart/form-data" id="form">
            <input type="file" name="files">
            <button id="btn" name="upload" value="Upload">submit</button>
        </form>
    </div>
    <div class="form2">
        <form action='' method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" id="name" name="names" placeholder="Name">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="renderAccount">
    <?php 
    if(!$_SESSION['name']=='' && !$_SESSION['pass']==''){
        echo '<h2> Tài khoản: '.$_SESSION['name'].'</h2>';
        echo '<h2> Mật khẩu: '.$_SESSION['pass'].'</h2>';
    }
         ?>
    </div>
</body>

</html>