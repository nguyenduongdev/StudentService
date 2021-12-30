<?php
include 'studentControl.php';
session_start();
class View extends control
{
    public control $c;
    public student $sv;

    public function __construct()
    {
    }
    //thêm
    public function adds($data, $table)
    {
        if (!empty($data)) {
            parent::add($data, $table);
        }
    }
    //Sửa
    public function updateByID($data, $table, $id)
    {
        if (!empty($data) && !empty($id)) {
            parent::edit($data, $table, "where id ='$id' ");
        }
    }
    //xóa
    public function deleteByID($id)
    {
        parent::delete('sinhvien', "where id = '$id' ");
    }
    public function showDatas($table, $where)
    {
        return  parent::showData($table, $where);
    }
}
//lấy data từ form
function getData()
{
    $a = array();
    if (isset($_POST['btn'])) {
        array_pop($_POST);
        $a = $_POST;
        return $a;
    }
}
//lấy id qua form
function getID($form, $id)
{
    if (isset($_GET[$form])) {
        array_pop($_GET);
        $id = $_GET[$id];
        return $id;
    }
}
//lấy dữ liệu từ form
function getDatabyForm($form)
{
    if (isset($_POST[$form])) {
        array_pop($_POST);
        $datas = array();
        foreach ($_POST as $key => $val) {
            $datas[trim($key, '2')] = $val;
        }
        return $datas;
    }
}

$id = getID('btns', 'ids');
$view = new View();
$datas = $view->showDatas('sinhVien', "where id='$id' ");
echo "<br>";
$view->adds(getData(), 'sinhVien');
$view->updateByID(getDatabyForm('btn2'), 'sinhVien', $id);

if (isset($_GET['btnDelete'])) {
    $id2 = getID('btnDelete', 'id2');
    $_SESSION['id'] = $id2;
    $datas2 = $view->showDatas('sinhVien', "where id='$id2' ");
}

if (isset($_GET['delete'])) {
    if (isset($_SESSION['id'])) {
        $view->deleteByID($_SESSION['id']);
    }
    session_unset();
}
$all = $view->showDatas('sinhvien', '');





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
    #form,
    #formEdit,
    #formEdit2 {
        width: 350px;
        margin: 50px auto;
    }

    .formRegister h2,
    .formEdit h2 {
        text-align: center;
    }

    .showDelete {
        text-align: center;
    }

    .table {
        width: 600px;
        margin: 20px auto;
    }

    .table th,
    td {
        border: 1px solid #eee;
    }

    .showBorder {
        border: 1px solid grey;
        box-shadow: 0 4px 5px grey;
        padding: 8px;
    }

    .option {
        width: 700px;
        margin: 20px auto;
        display: flex;
        justify-content: space-between;

    }

    .option h2 {
        font-size: 15px;
        padding: 4px;
        background-color: #eee;
        line-height: 2.2;
        border-radius: 3px;
    }
.option li{
    list-style-type: none;
    width: 160px;
}
    .option li> h2:hover {
        opacity: 0.7;
        cursor: pointer;
    }
</style>

<body>
    <div >
        <ul class="option">
            <li>
                <h2>Thêm sinh viên</h2>
            </li>
            <li>
                <h2>Sửa thông tin</h2>
            </li>
            <li>
                <h2>Xóa sinh viên</h2>
            </li>
            <li>
                <h2>Hiển thị danh sách</h2>
            </li>

        </ul>




    </div>
    <!-- Thêm mới sinh viên -->
    <div class="formRegister ">
        <h2>Thêm sinh viên vào lớp</h2>
        <form method="post" action="" id="form" class="showBorder">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên">
            </div>
            <div class="mb-3">
                <input type="text" name="id" class="form-control" id="name" placeholder="Nhập mã số">
            </div>
            <div class="mb-3">
                <input type="text" name="address" class="form-control" id="name" placeholder="Nhập địa chỉ">
            </div>
            <div class="mb-3">
                <label for="man">Nam</label>
                <input type="radio" name="gender" id="man" value="Nam">
                <label for="feman">Nữ</label>
                <input type="radio" name="gender" id="feman" value="Nữ">
            </div>
            <div class="mb-3">
                <input type="text" name="age" class="form-control" id="name" placeholder="Nhập tuổi">
            </div>

            <button type="submit" name="btn" class="btn btn-primary" value="">Thêm vào Danh Sách</button>
        </form>
    </div>
    <!-- SỬA thông tin sinh viên -->
    <div class="formEdit ">
        <h2>Sửa thông tin sinh viên</h2>
        <form method="get" action="" id="formEdit" class="showBorder">

            <div class="mb-3">
                <input type="text" value="<?php if (!empty($datas[0]['id'])) echo $datas[0]['id'] ?>" class="form-control" id="id" name="ids" class="form-control" id="name" placeholder="Nhập mã số">
                <p><?php $errMess = empty($datas[0]['id']) ? 'Nhập sai id' : '';
                    echo $errMess;  ?></p>
            </div>
            <button type="submit" name="btns" class="btn btn-primary" value="">Tìm kiếm</button>
        </form>
    </div>
    <div class="edit">
        <form method="post" action="" id="formEdit2" class="showBorder">
            <div class="mb-3">
                <input type="text" name="name2" value="<?php if (!empty($datas[0]['name'])) echo $datas[0]['name'] ?>" class="form-control" id="name" placeholder="Nhập tên">
            </div>
            <div class="mb-3">
                <input type="text" name="id2" value="<?php if (!empty($datas[0]['id'])) echo $datas[0]['id'] ?>" class="form-control" id="id" placeholder="Nhập mã số">
            </div>
            <div class="mb-3">
                <input type="text" name="address2" value="<?php if (!empty($datas[0]['address'])) echo $datas[0]['address'] ?>" class="form-control" id="name" placeholder="Nhập địa chỉ">
            </div>
            <div class="mb-3">
                <label for="man">Nam</label>
                <input type="radio" name="gender2" id="man" value="Nam" <?php if (!empty($datas[0]['gender']) && $datas[0]['gender'] == 'Nam')  echo 'checked' ?>>
                <label for="feman">Nữ</label>
                <input type="radio" name="gender2" id="feman" value="Nữ" <?php if (!empty($datas[0]['gender']) && $datas[0]['gender'] == 'Nữ') echo 'checked' ?>>
            </div>
            <div class="mb-3">
                <input type="text" name="age2" value="<?php if (!empty($datas[0]['age'])) echo $datas[0]['age'] ?>" class="form-control" id="name" placeholder="Nhập tuổi">
            </div>
            <button type="submit" name="btn2" class="btn btn-primary" value="">Lưu thông tin</button>
        </form>
    </div>
    <!-- XÓA sinh viên -->
    <div class="formEdit ">
        <h2>Xóa sinh viên theo ID</h2>
        <form method="get" action="" id="formEdit" class="showBorder">

            <input type="text" value="<?php if (!empty($datas2[0]['id'])) echo $datas2[0]['id'] ?>" class="form-control" id="id" name="id2" class="form-control" id="name" placeholder="Nhập mã số">
            <p><?php $errMess2 = empty($datas2[0]['id']) ? 'Nhập sai id' : '';
                echo $errMess2;  ?></p>
            <button type="submit" name="btnDelete" class="btn btn-primary" value="">Tìm kiếm</button>
            <div class="showDelete">
                <?php
                if (!empty($datas2)) {
                    foreach ($datas2 as $data) {
                        foreach ($data as $key => $val) {
                            echo $key . ' : ' . $val . '<br>';
                        }
                    }
                }
                ?>
                <button type="submit" name="delete" class="btn btn-primary" value="">Xóa Sinh Viên</button>
            </div>
        </form>
    </div>
    <div class="showAll showDelete">
        <h2>Danh sách sinh viên</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Mã sinh viên</th>
                    <th scope="col">Tuổi</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Quê quán</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($all as $data) {
                    echo '<tr>';
                    foreach ($data as $key => $val) {
                        echo  '<td> ' . $val . '</td>  ';
                    }
                    echo '</tr>';
                } ?>

            </tbody>
        </table>
    </div>
</body>


</html>