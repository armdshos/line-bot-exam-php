<?php
$accessToken = "IKtQS7iWe72sF7u0/a6PpFVxuuiXnZ0Nc864Q8wd+U7dRaqpMjLeRXk/8A1QWQAHQLqPuTQj2XC8hWvjJDV5XMvtIlClUpSj0DPKuepgqJsWHwRFl9BHBrvxP6g9PVWnVJyMra6tTGOZK9wWrPP0rwdB04t89/1O/w1cDnyilFU=";
   //$content = file_get_contents('php://input');
   //$arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = 'สวัสดี';//$arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = 'Ud4d744beed535713bb7f605ca0e1eba6';//$arrayJson['events'][0]['source']['userId'];
   #ตัวอย่าง Message Type "Text + Sticker"
   //if($message == "สวัสดี"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "รูปโลโก้";
      $arrayPostData['messages'][1]['type'] = "image";
      $arrayPostData['messages'][1]['originalContentUrl'] = "https://youant.net/green/images/48412313_558355137924389_6011670775092740096_n.jpg";
      $arrayPostData['messages'][1]['previewImageUrl'] = "https://youant.net/green/images/48412313_558355137924389_6011670775092740096_n.jpg";
      pushMsg($arrayHeader,$arrayPostData);
   //}
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;

?>
