<?php 

//***************** Страница с завершением заказа ******************
session_start();
 
// формируем массив с товарами в заказе (если товар один - оставляйте только первый элемент массива)
$products_list = array(
    0 => array(
            'product_id' => '7',    //код товара (из каталога CRM)
            'price'      => '430000', //цена товара 1
            'count'      => '1',                     //количество товара 1
            // если есть смежные товары, тогда количество общего товара игнорируется
            'subs'       => array(
                                0  => array(
                                        'sub_id' => $_REQUEST['product_id'],
                                        'count'  => '1'
                                        ),
                                // 1  => array(
                                //         'sub_id' => $_REQUEST['product_id'],
                                //         'count'  => '1'
                                //         )
            )
    ),
    // 1 => array(
    //         'product_id' => $_REQUEST['product_id'],    //код товара 2 (из каталога CRM)
    //         'price'      => $_REQUEST['product_price'], //цена товара 2
    //         'count'      => '1',                     //количество товара 2
    //         // если есть смежные товары, тогда количество общего товара игнорируется
    //         'subs'       => array(
    //                             0  => array(
    //                                     'sub_id' => $_REQUEST['product_id'],
    //                                     'count'  => '1'
    //                                     ),
    //                             1  => array(
    //                                     'sub_id' => $_REQUEST['product_id'],
    //                                     'count'  => '1'
    //                                     )
    //         )
    //     )
);
$products = urlencode(serialize($products_list));
$sender = urlencode(serialize($_SERVER));
// параметры запроса
$data = array(
    'key'             => '793feb3fc55045c15de6ae23f00bace4', //Ваш секретный токен
    'order_id'        => number_format(round(microtime(true)*10),0,'.',''), //идентификатор (код) заказа (*автоматически*)
    'country'         => 'UA',                         // Географическое направление заказа
    'office'          => '1',                          // Офис (id в CRM)
    'products'        => $products,                    // массив с товарами в заказе
    'bayer_name'      => $_REQUEST['name'],            // покупатель (Ф.И.О)
    'phone'           => $_REQUEST['phone'],           // телефон
    'email'           => $_REQUEST['email'],           // электронка
    'comment'         => $_REQUEST['product_name'],    // комментарий
    'delivery'        => $_REQUEST['delivery'],        // способ доставки (id в CRM)
    'delivery_adress' => $_REQUEST['delivery_adress'], // адрес доставки
    'payment'         => '',                           // вариант оплаты (id в CRM)
    'sender'          => $sender,                        
    'utm_source'      => $_SESSION['utms']['utm_source'],  // utm_source
    'utm_medium'      => $_SESSION['utms']['utm_medium'],  // utm_medium
    'utm_term'        => $_SESSION['utms']['utm_term'],    // utm_term
    'utm_content'     => $_SESSION['utms']['utm_content'], // utm_content
    'utm_campaign'    => $_SESSION['utms']['utm_campaign'],// utm_campaign
    'additional_1'    => '',                               // Дополнительное поле 1
    'additional_2'    => '',                               // Дополнительное поле 2
    'additional_3'    => '',                               // Дополнительное поле 3
    'additional_4'    => ''                                // Дополнительное поле 4
);
 
// запрос
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://hotsaleuz.lp-crm.biz/api/addNewOrder.html');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$out = curl_exec($curl);
curl_close($curl);
//$out – ответ сервера в формате JSON


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Создание формы обратной связи</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1057730507767684');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1057730507767684&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->




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

$sendto   = "klinaop@gmail.com"; // почта, на которую будет приходить письмо
$username = $_POST['name'];   // сохраняем в переменную данные полученные из поля c именем
$usertel = $_POST['phone']; // сохраняем в переменную данные полученные из поля c телефонным номером
$amount = $_POST['amount'];

// Формирование заголовка письма
$subject  = "Новое сообщение";
$headers  = "From: " . strip_tags($usermail) . "\r\n";
$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";

// Формирование тела письма
$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Cообщение с сайта</h2>\r\n";
$msg .= "<p><strong>От кого:</strong> ".$username."</p>\r\n";
$msg .= "<p><strong>Телефон:</strong> ".$usertel."</p>\r\n";
$msg .= "<p><strong>Кол-во:</strong> ".$amount."</p>\r\n";
$msg .= "</body></html>";

// отправка сообщения
if(@mail($sendto, $subject, $msg, $headers)) {
	

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
