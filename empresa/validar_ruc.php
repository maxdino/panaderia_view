<?php 

$curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://dniruc.apisperu.com/api/v1/ruc/10206540121',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im1heC5oaWxhcmlvMzUxQGdtYWlsLmNvbSJ9.mCCS9RsZR7QlO559rdbfSkGwaNZ64uN_OFtz4n3dFJk'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $ruc = json_decode($response, true);
        var_dump($ruc);
?>