<?php

namespace Omnipay\Ippay\Message;

class PurchaseRequest extends AbstractRequest
{
    
    public function getToken()
    {
        return $this->getParameter('token');
    }

    public function setToken($value)
    {
        return $this->setParameter('token', $value);
    }

    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }

    public function getData()
    {
        
        $data = array();

        $data['TransactionType'] = 'SALE';
        $data['Token'] = $this->getToken();
        $data['TotalAmount'] = number_format($this->getAmount(), 2, "", "");
        
        return $data;
    }
}
