<?php

namespace Omnipay\Ippay\Message;

class PingRequest extends AbstractRequest
{
    public function getTransactionType()
    {
        return $this->getParameter('transaction_type');
    }

    public function setTransactionType($value)
    {
        return $this->setParameter('transaction_type', $value);
    }
    
    public function getData()
    {
        
        $data = array();

        $data['TransactionType'] = $this->getTransactionType();
        
        return $data;
    }
}
