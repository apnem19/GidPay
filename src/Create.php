<?php
namespace Kvash\GidPay;
Class Create {
    private $url;
    private $shop_id;
    private $invoice;
    private $amount;
    private $public_key;

    public function __construct($shop_id, $amount, $invoice, $public_key) {
        $this->url = "https://gidpay.ru/api/pay";
        $this->invoice = $invoice;
        $this->amount = $amount;
        $this->public_key = $public_key;
        $this->shop_id = $shop_id;
    }

    public function getUrl() {
        $data = [
            'shop_id' => $this->shop_id,
            'transaction_id' => $this->invoice,
            'amount' => $this->amount,
            'public_key' => $this->public_key,
            'method' => 'full'
        ];
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = json_decode(curl_exec($curl), true);
        curl_close($curl);
        
        if($resp['status'] === 'error'){
            return $resp['error'];
        }

        return $resp['success']['url'];
    }

}
?>