<?php



require "vendor/autoload.php";

$access_token = 'IKtQS7iWe72sF7u0/a6PpFVxuuiXnZ0Nc864Q8wd+U7dRaqpMjLeRXk/8A1QWQAHQLqPuTQj2XC8hWvjJDV5XMvtIlClUpSj0DPKuepgqJsWHwRFl9BHBrvxP6g9PVWnVJyMra6tTGOZK9wWrPP0rwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '51dde56e498eb4f015f49b76d3726334';

$pushID = 'Ud4d744beed535713bb7f605ca0e1eba6';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('เชื่อมฐาน database : connection success.. ');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
