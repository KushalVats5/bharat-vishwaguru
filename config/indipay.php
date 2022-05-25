<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Indipay Service Config
    |--------------------------------------------------------------------------
    |   gateway = CCAvenue / PayUMoney / EBS / Citrus / InstaMojo / ZapakPay / Paytm / Mocker
     */

    'gateway' => 'CCAvenue', // Replace with the name of default gateway you want to use

    'testMode' => true, // True for Testing the Gateway [For production false]

    /* 'ccavenue' => [                         // CCAvenue Parameters
    'merchantId'  => env('INDIPAY_MERCHANT_ID', '34353'),
    'accessCode'  => env('INDIPAY_ACCESS_CODE', 'AVTB03IC81AD56BTDA'),
    'workingKey' => env('INDIPAY_WORKING_KEY', 'B57BCA91F053122B602B338A32DA220B'),

    // Should be route address for url() function
    'redirectUrl' => env('INDIPAY_REDIRECT_URL', 'http://127.0.0.1/indipay/response'),
    'cancelUrl' => env('INDIPAY_CANCEL_URL', 'http://127.0.0.1/indipay/response'),

    'currency' => env('INDIPAY_CURRENCY', 'INR'),
    'language' => env('INDIPAY_LANGUAGE', 'EN'),
    ], */

    'ccavenue' => [ // CCAvenue Parameters
        'merchantId' => env('INDIPAY_MERCHANT_ID', '34353'),
        'accessCode' => env('INDIPAY_ACCESS_CODE', 'AVPF04JE26AN80FPNA'),
        'workingKey' => env('INDIPAY_WORKING_KEY', 'ABCD522FCA6E0E5F4E53AD764362D4A2'),

        // Should be route address for url() function
        'redirectUrl' => env('INDIPAY_REDIRECT_URL', 'http://taxring.local/tr/user/gst-return-file/back-to-seller'),
        'cancelUrl' => env('INDIPAY_CANCEL_URL', 'http://taxring.local/tr/user/gst-return-file/back-to-seller'),

        'currency' => env('INDIPAY_CURRENCY', 'INR'),
        'language' => env('INDIPAY_LANGUAGE', 'EN'),
    ],

    'payumoney' => [ // PayUMoney Parameters
        'merchantKey' => env('INDIPAY_MERCHANT_KEY', ''),
        'salt' => env('INDIPAY_SALT', ''),
        'workingKey' => env('INDIPAY_WORKING_KEY', ''),

        // Should be route address for url() function
        'successUrl' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
        'failureUrl' => env('INDIPAY_FAILURE_URL', 'indipay/response'),
    ],

    'ebs' => [ // EBS Parameters
        'account_id' => env('INDIPAY_MERCHANT_ID', ''),
        'secretKey' => env('INDIPAY_WORKING_KEY', ''),

        // Should be route address for url() function
        'return_url' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
    ],

    'citrus' => [ // Citrus Parameters
        'vanityUrl' => env('INDIPAY_CITRUS_VANITY_URL', ''),
        'secretKey' => env('INDIPAY_WORKING_KEY', ''),

        // Should be route address for url() function
        'returnUrl' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
        'notifyUrl' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
    ],

    'instamojo' => [
        'api_key' => env('INSTAMOJO_API_KEY', ''),
        'auth_token' => env('INSTAMOJO_AUTH_TOKEN', ''),
        'redirectUrl' => env('INDIPAY_REDIRECT_URL', 'indipay/response'),
    ],

    'mocker' => [
        'service' => env('MOCKER_SERVICE', 'default'),
        'redirect_url' => env('MOCKER_REDIRECT_URL', 'indipay/response'),
    ],

    'zapakpay' => [
        'merchantIdentifier' => env('ZAPAKPAY_MERCHANT_ID', ''),
        'secret' => env('ZAPAKPAY_SECRET', ''),
        'returnUrl' => env('ZAPAKPAY_RETURN_URL', 'indipay/response'),
    ],

    'paytm' => [
        'MERCHANT_KEY' => env('PAYTM_MERCHANT_KEY', ''),
        'MID' => env('PAYTM_MID', ''),
        'CHANNEL_ID' => env('PAYTM_CHANNEL_ID', 'WEB'),
        'WEBSITE' => env('PAYTM_WEBSITE', 'WEBSTAGING'),
        'INDUSTRY_TYPE_ID' => env('PAYTM_INDUSTRY_TYPE_ID', 'Retail'),
        'REDIRECT_URL' => env('PAYTM_REDIRECT_URL', 'indipay/response'),
    ],

    // Add your response link here. In Laravel 5.2+ you may use the VerifyCsrf Middleware.
    'remove_csrf_check' => [
        'tr/user/gst-return-file/back-to-seller',
        'indipay/response',
    ],

];