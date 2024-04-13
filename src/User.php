<?php
namespace Kvash\Gidpay;
class User {
    private $key;

    public function __construct($key){
        $this->key = $key;
    }

    public function userInfo(){
        return $this->curl("https://gidpay.ru/api/user", $this->key, null);
    }

    public function userPayout(){
        return $this->curl("https://gidpay.ru/api/withdrawal", $this->key, null);
    }

    public function PayMethod(){
        return $this->curl("https://gidpay.ru/api/method", $this->key, null);
    }

    public function CreateWithdrawal($data = []){
        return $this->curl("https://gidpay.ru/api/withdrawalcreate", $this->key, $data);
    }

    
    private function curl($url, $key, $data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("X-API-Key: $key"));
       if($data != null) curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if($resp['status'] == 'error'){
            return ['status' => 'error', 'error' => $resp['error']];
        }

        return $resp;
    }
}


?>