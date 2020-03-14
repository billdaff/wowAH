<?php

function curl_get($url, array $get = NULL, array $options = array())
{ 
    $defaults = array(
        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 4
    );

    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    return $result;
}


function generateToken($clientCreds){
    $ch = curl_init();

    
    curl_setopt($ch, CURLOPT_USERPWD, $clientCreds['clientID'] . ":" . $clientCreds['clientSecret']);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, 'https://us.battle.net/oauth/token');
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');

    $key = (json_decode(curl_exec($ch)));
    echo "JEYEKJHNJSHBJBH". $key;
    curl_close($ch);
    return $key;
}
function getAllRealmID ($token){
    $options = [
        'payload' => [
            'namespace'=>'dynamic-us',
            'locale'=>'en_US',
            'access_token'=>$token
        ],
        'url' => 'https://us.api.blizzard.com/data/wow/connected-realm/index'
    ];
    return curl_get($options['url'],$options['payload']);

}

// function callAH($token){
//     $result = (new Client())->post(' --header "Authorization: Bearer '.$token.'" <REST API URL>
// }
