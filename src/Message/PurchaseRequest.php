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

    public function getTransactionType()
    {
        return $this->getParameter('transaction_type');
    }

    public function setTransactionType($value)
    {
        return $this->setParameter('transaction_type', $value);
    }

    public function getUserHost()
    {
        return $this->getParameter('user_host');
    }

    public function setUserHost($value)
    {
        return $this->setParameter('user_host', $value);
    }
    
    public function getData()
    {
        
        $data = array();

        $data['TransactionType'] = $this->getTransactionType();
        $data['Token'] = $this->getToken();
        $data['TotalAmount'] = number_format($this->getAmount(), 2, "", "");
        $data['UserHost'] = $this->getUserHost();
        
        return $data;
    }
}
