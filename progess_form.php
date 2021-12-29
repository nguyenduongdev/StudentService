<?php
function Request(){
    if (isset($_REQUEST['email'])) {
        // var_dump($_REQUEST);
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        if (isset($_REQUEST['check'])) {
            $check = $_REQUEST['check'];
            echo $email . ' <br>' . $password . ' <br>' . $check;
        }
    }
}
function say(){
    echo 'hello đây là page progess_form';
}
function calTime(){
    $time=mktime(0, 0, 0,(20-10),12,2021); //hàm tính thời gian
    $tomorrow = mktime(0, 0, 0,date('m'),date('d')+1,date('Y'));
    $lastMonth = mktime(0, 0, 0,date('m')-1,date('d'),date('Y'));
    $nextYear = mktime(0, 0, 0,date('m'),date('d'),date('Y')+1);

    echo date('d/m/Y',$time).' => Hiện tại<br>';
    echo date('d/m/Y',$tomorrow).'=> Ngày mai<br>';
    echo date('d/m/Y',$lastMonth).'=> tháng trước<br>';
    echo date('d/m/Y',$nextYear).'=> Năm sau<br>';
   
    
}
//các múi giờ các quốc gia
function timeZone(){
    date_default_timezone_set('Asia/Ho_Chi_Minh'); //set time zone là việt nam
    $timeZone = DateTimeZone::listIdentifiers();  // show list time zone world 
    foreach($timeZone as $item){
        echo $item.' <br>';
    }
    echo date('Y'). ' <br>';
    echo date('d'). ' <br>';
    echo date('h'). ' <br>';
    echo date('i'). ' <br>';
echo date('d/m/Y - H:i:s');
}

?>
