<?php

namespace Omnipay\Ippay\Message;

class CreateBankAccountRequest extends AbstractRequest
{

    public function getAccountNumber()
    {
        return $this->getParameter('AccountNumber');
    }

    public function setAccountNumber($value)
    {
        return $this->setParameter('AccountNumber', $value);
    }

    public function getRoutingNumber()
    {
        return $this->getParameter('RoutingNumber');
    }

    public function setRoutingNumber($value)
    {
        return $this->setParameter('RoutingNumber', $value);
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
