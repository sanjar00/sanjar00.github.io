<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Создание формы обратной связи</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<script>
  fbq('track', 'Purchase');
</script>
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
	
// отправка сообщения
if(@mail($mess, $tbot)) {
	

   $variable = <<<XYZ
<div class="section block-1" style="
font-family: sans-serif;">
    <div class="wrap" style="height: 500px">
        <div class="top-title top-title-c" style="text-align: center;padding: 30px 0;">
            <h2 style="color: white; font-size: 28px">Спасибо. Ваш заказ принят!</h2>
            <div style="color: white; font-size: 23px">Наш оператор свяжется с вами в ближайшее время</div>
        </div>
    </div>
XYZ;
echo $variable;

} else {
	echo "<center>Простите, но заказ не был принят. Попробуйте еще раз!</center>";
}

?>

</body>
</html>
