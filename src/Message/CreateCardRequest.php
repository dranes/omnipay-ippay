<?php

namespace Omnipay\Ippay\Message;

class CreateCardRequest extends AbstractRequest
{

    public function getCardNum()
    {
        return $this->getParameter('CardNum');
    }

    public function getCardExpMonth()
    {
        return $this->getParameter('CardExpMonth');
    }

    public function getCardExpYear()
    {
        return $this->getParameter('CardExpYear');
    }

    public function getData()
    {
        $this->getCard()->validate();

        $data = array();
        $data['TransactionType'] = 'TOKENIZE';

        $data['CardNum'] = $this->getCardNum();

        $data['CardExpMonth'] = $this->getCard()->getExpiryDate('m');
        $data['CardExpYear'] = $this->getCard()->getExpiryDate('yy');
        $data['CardNum'] = $this->getCard()->getNumber();
        
        return $data;
    }

    public function getEndpoint()
    {
        $endpoint = $this->getTestMode() ? $this->sandboxEndpoint : $this->productionEndpoint;
        return  $endpoint . '/v4/account/creditcard';
    }
}
