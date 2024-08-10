<?php

if (!function_exists('netGsmSmsGonder')) {
function netGsmSmsGonder($gsmno, $message, $startdate="", $stopdate="") { 

    $filter=0;
    $msgheader="ASDFG";
    $appkey="111111";
    $usercode="11111";
    $password="1111*"; // alt kullanııcı oluşturulur onun şifresi girilir
   
  $curl = curl_init();

  curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.netgsm.com.tr/sms/send/get',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array(
          'usercode' => $usercode,
          'password' => $password,
          'gsmno' => $gsmno,
          'message' => $message,
          'msgheader' => $msgheader,
          'filter' => $filter,
          'startdate' => $startdate,
          'stopdate' => $stopdate,
          'appkey' => $appkey
      ),
  ));

  $response = curl_exec($curl);
  curl_close($curl);
//    $sonuc = smsGonder("5056851443","deneme mesajı ");  şeklinde kullanılır
  return $response;
}

}


