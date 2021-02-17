<?php

namespace Omnipay\Ippay\Message;

class CreateBankAccountRequest extends AbstractRequest
{

    public function getAccountNumber()
    {
        return $this->getParameter('account_number');
    }

    public function setAccountNumber($value)
    {
        return $this->setParameter('account_number', $value);
    }

    public function getRoutingNumber()
    {
        return $this->getParameter('routing_number');
    }

    public function setRoutingNumber($value)
    {
        return $this->setParameter('routing_number', $value);
    }

    public function getData()
    {
        $data = array();
        $data['TransactionType'] = 'TOKENIZE';
        $data['AccountNumber'] = $this->getAccountNumber();
        $data['ABA'] = $this->getRoutingNumber();
        
        return $data;
    }
}
