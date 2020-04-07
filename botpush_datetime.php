<?php

require "vendor/autoload.php";

$access_token = 'IKtQS7iWe72sF7u0/a6PpFVxuuiXnZ0Nc864Q8wd+U7dRaqpMjLeRXk/8A1QWQAHQLqPuTQj2XC8hWvjJDV5XMvtIlClUpSj0DPKuepgqJsWHwRFl9BHBrvxP6g9PVWnVJyMra6tTGOZK9wWrPP0rwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '51dde56e498eb4f015f49b76d3726334';

$pushID = 'Ud4d744beed535713bb7f605ca0e1eba6';

$dayTH = ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'];
$monthTH = [null,'มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];
$monthTH_brev = [null,'ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
    global $dayTH,$monthTH;   
    $thai_date_return = date("j",$time);   
    $thai_date_return.=" ".$monthTH[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);   
    $thai_date_return.= " เวลา ".date("H:i:s",$time);
    return $thai_date_return;   
} 

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$dateData=time(); // วันเวลาขณะนั้น
$date_show_th = 'เวลาปัจจุบัน :'.thai_date_and_time($dateData);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($date_show_th);
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();



