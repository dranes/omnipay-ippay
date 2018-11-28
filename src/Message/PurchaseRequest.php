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

    public function getSEC()
    {
        return $this->getParameter('sec');
    }

    public function setSEC($value)
    {
        return $this->setParameter('sec', $value);
    }

    public function getType()
    {
        return $this->getParameter('type');
    }

    public function setType($value)
    {
        return $this->setParameter('type', $value);
    }

    public function getCheckNumber()
    {
        return $this->getParameter('check_number');
    }

    public function setCheckNumber($value)
    {
        return $this->setParameter('check_number', $value);
    }

    public function getTransactionType()
    {
        return $this->getParameter('transaction_type');
    }

    public function setTransactionType($value)
    {
        return $this->setParameter('transaction_type', $value);
    }

    public function getBankName()
    {
        return $this->getParameter('bank_name');
    }

    public function setBankName($value)
    {
        return $this->setParameter('bank_name', $value);
    }
    
    public function getData()
    {
        
        $data = array();

        $data['TransactionType'] = $this->getTransactionType();
        $data['Token'] = $this->getToken();
        $data['TotalAmount'] = number_format($this->getAmount(), 2, "", "");
        $data['SEC'] = $this->getSEC();
        $data['CheckNumber'] = $this->getCheckNumber();
        $data['Type'] = $this->getType();
        $data['BankName'] = $this->getBankName();
        
        return $data;
    }
}
