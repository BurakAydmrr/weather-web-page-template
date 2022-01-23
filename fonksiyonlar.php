<?php


  function havaDurumu($sehir){

    function startBot($site_url , $timeout = 5)
    {

      $ch = curl_init();

      $tarayici = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:32.0) Gecko/20100101 Firefox/32.0';

      curl_setopt($ch, CURLOPT_URL,$site_url);

      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
      curl_setopt($ch, CURLOPT_HEADER         , 0);
      curl_setopt($ch, CURLOPT_TIMEOUT        , $timeout);
      curl_setopt($ch, CURLOPT_USERAGENT      , $tarayici);

      $result = curl_exec($ch);
      curl_close($ch);

      return $result;

    }

    $apikey = '4e70ca8f0e209b0a9571d633d70d8335'; 
    $kaynak = startBot('api.openweathermap.org/data/2.5/forecast?id='.$sehir.'&mode=json&units=metric&appid='.$apikey);

    $jsoncikti = json_decode($kaynak,true);

    $bir_onceki_gun = '';

    foreach ($jsoncikti['list'] as $key => $value) {

      if(date('d.m.Y', $value['dt'])==$bir_onceki_gun){

        $gun[$bir_onceki_gun][date('H:i', $value['dt'])] = array(
          'sicaklik'=>$value['main']['temp'],
          'hiz'=>$value['wind']['speed'],
          'icon'=>$value['weather'][0]['icon']
        );


      }else{

        $gun[date('d.m.Y', $value['dt'])] = array( date('H:i', $value['dt']) => array(
          'sicaklik'=>$value['main']['temp'],
          'hiz'=>$value['wind']['speed'],
          'icon'=>$value['weather'][0]['icon']
        ));

      }

      $bir_onceki_gun = date('d.m.Y', $value['dt']);
    }

    return $gun;

  }

 ?>
