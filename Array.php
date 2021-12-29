<?php
$arrName = ['Hữu', 'Hải', 'Hùng'];
echo $arrName[2] . '<br>';
echo $arrName[1] . '<br>';
echo $arrName[0] . '<br>';
var_dump($arrName);
class car
{
    public string $carName;
    public int $id;
    public function __construct($carName, $id)
    {
        $this->carName = $carName;
        $this->id = $id;
    }
    public function getCarName()
    {
        return $this->carName;
    }
};
$vincar = new car('xe vinfast', 12);
echo $vincar->getCarName();
$regex = '/\d+/';
if (preg_match($regex, 'hello')) {
    'la so';
} else {
    echo 'khong phai so';
}
echo '<br>';
//1. array_combine($array_keys, $array_values): gộp mảng theo key value
$arrKey = ['1', '2', '3'];
$value = ['Mot', 'Hai', 'Ba'];
print_r(array_combine($arrKey, $value)); //  hai mảng phải bằng nhau số phần tử
echo '<br>';
//2. array_count_values //đếm số lần xuất hiện
print_r(array_count_values($arrKey));
echo '<br>';
//3. array_push
array_push($arrKey, '4', '5');
print_r($arrKey);
echo '<br>';

//4. array_pop xóa phần tử cuối cùng
$pop = array_pop($arrKey);
print_r($pop);
print_r($arrKey);
echo '<br>';
//5. array_pad($array, $size, $value)
$pad = array_pad($value, -6, 'âm'); //giãn mảng nếu -$size thì giãn đầu +$size thì cuối
print_r($pad);
//6 .array_shift xóa đầu
array_shift($pad);
print_r($pad);
echo '<br>';
//7.array_unshift(&$array, $value1, $value2, …) thêm đầu
array_unshift($pad, 'thêm âm');
print_r($pad);
//8. is_array() boolean 

if (is_array($value)) {
    echo 'là mảng' . '<br>';
} else {
    echo 'không phải mảng' . '<br>';
}
$kq = is_array($pad) ? 'là mảng' : 'không phải mảng';
echo $kq . '<br>';
//9. in_array($needle, $array) kt có nằm trong mảng

$kq2 = in_array('Thêm âm', $pad) ? ' nằm trong mảng' : 'không nằm trong mảng';
echo $kq2 . '<br>';


$arrPhone = ['ip' => 'iphone', 'ss' => 'samsung', 'hw' => 'hawei'];
// 10. . array_key_exists($key, $searcharray)
// Kiểm tra key $key có tồn tại trong mảng $searcharray không,
//  trả về true nếu có và false nếu không có.
$kq3 = array_key_exists('ip', $arrPhone) ? 'key nằm trong arr' : 'key k nằm trog arr';
echo $kq3 . '<br>';
// 11 .array_unique( $array )Loại bỏ giá trị trùng trong mảng $array.
$arrUnique = [2, 4, 5, 4, 4, 6, 7, 8];
$unique = array_unique($arrUnique);
print_r($unique);
// 12. array_values ($array )Chuyển mảng $array sang dạng mảng chỉ mục.
$arrValue = array_values($arrPhone);
print_r($arrValue);
//implode mảng => chuỗi 
echo implode(' ', $arrValue);

echo 'hello word';
//database 
  
?>