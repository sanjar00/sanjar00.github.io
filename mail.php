<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$token = "1124908145:AAGRZQy_YJ4kTVDmKdcQH57rZTWN0GwGaDg";
$chat_id = "-355113205";
$arr = array(
  'Имя: ' => $name,
  'Почта: ' => $email,
  'Текст: ' => $message
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  header('Location: offer.html');
} else {
  echo "Error";
}
?>