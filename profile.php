<?php


$access_token = 'IKtQS7iWe72sF7u0/a6PpFVxuuiXnZ0Nc864Q8wd+U7dRaqpMjLeRXk/8A1QWQAHQLqPuTQj2XC8hWvjJDV5XMvtIlClUpSj0DPKuepgqJsWHwRFl9BHBrvxP6g9PVWnVJyMra6tTGOZK9wWrPP0rwdB04t89/1O/w1cDnyilFU=';

$userId = 'Ud4d744beed535713bb7f605ca0e1eba6';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

