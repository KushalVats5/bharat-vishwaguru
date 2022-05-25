<?php
function xe_account_info(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://xecdapi.xe.com/v1/account_info");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    
    curl_setopt($ch, CURLOPT_USERPWD, 'gatewayglobal679223520' . ':' . '8gcoc1vnr8tdf1f801dqp40hu8');
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    print_r($result);
}
function xe_convert_to($from = 'USD', $to = 'INR', $amount = '1.00'){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://xecdapi.xe.com/v1/convert_to.json/?to=".$from."&from=".$to."&amount=".$amount);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    
    curl_setopt($ch, CURLOPT_USERPWD, 'gatewayglobal679223520' . ':' . '8gcoc1vnr8tdf1f801dqp40hu8');
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    print_r($result);
}
xe_account_info();
xe_convert_to('GBP', 'INR', 2);



function getCountryIp()
{
    $currency = new Zend_Currency();
    $countryCode = $this->getCountryFromIP();
    $currencyCode = $currency->getCurrencyList($countryCode);
    $localCurrency = $this->currency('USD',$currencyCode[0],50);
    $var['currencyCode'] = $currencyCode[0];
    $var['currency'] = $localCurrency;
    return $var;
}



//use to convert currency



function currency($from_Currency, $to_Currency, $amount)
 {
        $amount = urlencode($amount);
        $from_Currency = urlencode($from_Currency);
        $to_Currency = urlencode($to_Currency);
        $url = "http://www.google.com/ig/calculator?hl=en&q=$amount$from_Currency=?$to_Currency";
        $ch = curl_init();
        $timeout = 0;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $rawdata = curl_exec($ch);
        curl_close($ch);
        $data = explode('"', $rawdata);
        $data = explode(' ', $data['3']);
        $stripped = ereg_replace("[^A-Za-z0-9.+]", "", $data['0']);//remove special char
        return round($stripped,3);
//        $var = $data['0'];
//        return $var;
//        return round($var, 8);
    }

 //get ip-address and show country code


 function getCountryFromIP()
 {
     $ip = $_SERVER['REMOTE_ADDR'];

    $country = exec("whois $ip  | grep -i country"); // Run a local whois and get the result back
    //$country = strtolower($country); // Make all text lower case so we can use str_replace happily
    // Clean up the results as some whois results come back with odd results, this should cater for most issues
    $country = str_replace("country:", "", "$country");
    $country = str_replace("Country:", "", "$country");
    $country = str_replace("Country :", "", "$country");
    $country = str_replace("country :", "", "$country");
    $country = str_replace("network:country-code:", "", "$country");
    $country = str_replace("network:Country-Code:", "", "$country");
    $country = str_replace("Network:Country-Code:", "", "$country");
    $country = str_replace("network:organization-", "", "$country");
    $country = str_replace("network:organization-usa", "us", "$country");
    $country = str_replace("network:country-code;i:us", "us", "$country");
    $country = str_replace("eu#countryisreallysomewhereinafricanregion", "af", "$country");
    $country = str_replace("", "", "$country");
    $country = str_replace("countryunderunadministration", "", "$country");
    $country = str_replace(" ", "", "$country");

    return $country;
 }
 getCountryIp();
?>