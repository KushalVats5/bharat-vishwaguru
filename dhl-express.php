<?php

    $url = 'https://sandbox-api.postmen.com/v3/rates';
    $method = 'GET';
    $headers = array(
        "content-type: application/json",
        "postmen-api-key: 8fc7966b-679b-4a57-911d-c5a663229c9e"
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => $headers,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
?>
