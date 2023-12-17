<?php
namespace Kvash\Gidpay;
class User {
    private $key;

    public function __construct($key){
        $this->key = $key;
    }

    public function userInfo(){
        return $this->curl("https://gidpay.ru/api/user", $this->key);
    }

    public function userPayout(){
        return $this->curl("https://gidpay.ru/api/withdrawal", $this->key);
    }

    
    private function curl($url, $key){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("X-API-Key: $key"));
        curl_setopt($curl, CURLOPT_POSTFIELDS, NULL);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = json_decode(curl_exec($curl), true);
        curl_close($curl);
        return $resp;
    }
}


?>