<?php
namespace Kvash\GidPay;
class User{
    private $email;
    private $password;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function userInfo(){
        return $this->curl("https://gidpay.ru/api/user", $this->email, $this->password);
    }

    public function userPayout(){
        return $this->curl("https://gidpay.ru/api/withdrawal", $this->email, $this->password);
    }

    
    private function curl($url, $email, $password){
        $data = [
            "email" => $email,
            "password" => $password,
        ];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = json_decode(curl_exec($curl), true);
        curl_close($curl);
        return $resp;
    }
}


?>