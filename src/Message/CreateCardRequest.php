<?php

namespace Omnipay\Ippay\Message;

class CreateCardRequest extends AbstractRequest
{

    public function getData()
    {
        $this->getCard()->validate();

        $data = array();
        $data['TransactionType'] = 'TOKENIZE';
        $data['CardExpMonth'] = $this->getCard()->getExpiryDate('m');
        $data['CardExpYear'] = $this->getCard()->getExpiryDate('y');
        $data['CardNum'] = $this->getCard()->getNumber();
        
        return $data;
    }
}
