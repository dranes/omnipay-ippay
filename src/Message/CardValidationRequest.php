<?php

namespace Omnipay\Ippay\Message;

class CardValidationRequest extends AbstractRequest
{
    
    public function getCardNum()
    {
        return $this->getParameter('card_num');
    }

    public function setCardNum($value)
    {
        return $this->setParameter('card_num', $value);
    }

    public function getTotalAmount()
    {
        return $this->getParameter('total_amount');
    }

    public function setTotalAmount($value)
    {
        return $this->setParameter('total_amount', $value);
    }

    public function getCardExpMonth()
    {
        return $this->getParameter('card_exp_month');
    }

    public function setCardExpMonth($value)
    {
        return $this->setParameter('card_exp_month', $value);
    }

    public function getCardExpYear()
    {
        return $this->getParameter('card_exp_year');
    }

    public function setCardExpYear($value)
    {
        return $this->setParameter('card_exp_year', $value);
    }

    public function getCvv2()
    {
        return $this->getParameter('cvv2');
    }

    public function setCvv2($value)
    {
        return $this->setParameter('cvv2', $value);
    }

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
        $data['CardNum'] = $this->getCardNum();
        $data['CardExpMonth'] = $this->getCardExpMonth();
        $data['CardExpYear'] = $this->getCardExpYear();
        $data['TotalAmount'] = number_format($this->getTotalAmount(), 2, "", "");
        $data['CVV2'] = $this->getCvv2();
        
        return $data;
    }
}
