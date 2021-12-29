<?php
$so1 = $so2 = $cal = $result = '';

$so1 = $_REQUEST['so1'];
$so2 = $_REQUEST['so2'];
$cal = $_REQUEST['cal'];
switch ($cal) {
  case '+':
    $result = $so1 + $so2;
    break;
  case '-':
    $result = $so1 - $so2;
    break;
  case '*':
    $result = $so1 * $so2;
    break;
  case '/':
    $result = $so1 / $so2;
    break;
  case '%':
    $result = $so1 % $so2;
    break;
    echo $result;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq8iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
  #form {
    width: 400px;
    margin: 0 auto;
  }
  .table{
    width: 350px;
    margin: 0 auto;
  }
  td,tr{
    border:1px solid #eee;
  }
  td button{
    width: 100%;
  }
  td{
    padding: 0 !important;
  
    width:  30px !important;
  }
  #result{
    width: 100%;
  }
</style>

<body>

  <form action="" method="GET" id="form">
    <div class="mb-3">
      <input type="number" name="so1" value="<?=$so1?>" class="form-control" id="number" placeholder="Nhập số">
    </div>
    <div class="mb-3">
      <select name="cal" id="" required="true">
        <option value="">Chọn phép toán</option>
        <option value="+" <?= $cal == "+" ? "selected" : ""; ?>>+</option>
        <option value="-" <?= $cal == "-" ? "selected" : ""; ?>>-</option>
        <option value="*" <?= $cal == "*" ? "selected" : ""; ?>>*</option>
        <option value="/" <?= $cal == "/" ? "selected" : ""; ?>>/</option>
        <option value="%" <?= $cal == "%" ? "selected" : ""; ?>>%</option>
      </select>
    </div>
    <div class="mb-3">
      <input required="true"  value="<?=$so2?>" type="number" name="so2" class="form-control" id="number" placeholder="Nhập số">
    </div>
    <button type="submit" class="btn btn-primary">Tính</button>
    <p>Kết quả: <?php echo $result; ?></p>
  </form>


  <table class="table">
  <thead>
    <tr>
      <th colspan='7'><input name="result" id ="result"type="text"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td><button value="7">7</button></td>
      <td><button value="8">8</button></td>
      <td><button value="9">9</button></td>
      <td><button value="/">/</button></td>
      <td><button value="C">C</button></td>
    </tr>
    <tr>
     
      <td><button value="4">4</button></td>
      <td> <button value="5">5</button></td>
      <td> <button value="6">6</button></td>
      <td> <button value="*">*</button></td>
      <td> <button value="AC">AC</button></td>
    </tr>
    <tr>
     
      <td> <button value="1">1</button></td>
      <td> <button value="2">2</button></td>
      <td> <button value="3">3</button></td>
      <td> <button value="-">-</button></td>
      <td rowspan='2'> <button value="=">=</button></td>
    </tr>
    <tr>
      <td colspan="2" ><button value="0">0</button></td>
      <td> <button value=".">.</button></td>
      <td> <button value="+">+</button></td>
      
    </tr>
  </tbody>
</table>
</body>

</html>