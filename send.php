<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Создание формы обратной связи</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<style>
.block-1{
    color: #fff;
font-size: 30px;
    border: 0;
    background: #f09433;
    background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
    background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);

}
</style>

<?php 

$username = strip_tags($_POST['name']);   // сохраняем в переменную данные полученные из поля c именем
$usertel = strip_tags($_POST['phone']); // сохраняем в переменную данные полученные из поля c телефонным номером
$amount = strip_tags($_POST['amount']);

$token = "1124908145:AAGRZQy_YJ4kTVDmKdcQH57rZTWN0GwGaDg";
$chatid = "818962424";
$mess = "
Name: $username
Phone: $usertel
Amount: $amount
";
$tbot = file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chatid."&text=".urlencode($mess));
	


</body>
</html>
