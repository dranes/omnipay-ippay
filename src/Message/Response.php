<?php

namespace Omnipay\Ippay\Message;

class Response implements \Omnipay\Common\Message\ResponseInterface
{
    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function getRequest()
    {
        $this->request;
    }
    
    public function isSuccessful()
    {
        $response = new \SimpleXMLElement($this->response);

        return ($response->ActionCode == "000");
    }
    
    public function isRedirect()
    {
        return false;
    }

    public function isCancelled()
    {
        return false;
    }
    
    public function getMessage()
    {
        return $this->response;
    }
    
    public function getCode()
    {
        return $this->response->getStatusCode();
    }

    public function getTransactionReference()
    {
        $response = new \SimpleXMLElement($this->response);
        return $response->TransactionID;
    }

    public function getData()
    {
        return $this->request->getData();
    }
}
