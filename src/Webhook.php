<?php

namespace Kvash\Gidpay;

Class Webhook{
    private $sign;
    private $shop_id;
    private $invoice;
    private $amount;
    private $secret;
    public function __construct($shop_id, $amount, $invoice, $secret, $sign){
        $this->sign = $sign;
        $this->shop_id = $shop_id;
        $this->invoice = $invoice;
        $this->amount = $amount;
        $this->secret = $secret;
    }

    public function check(){
        $sign = md5($this->shop_id.":".$this->amount.":".$this->secret.":".$this->invoice);
        if($sign !== $this->sign){
            return false;
        }

        return true;
    }
}


?>