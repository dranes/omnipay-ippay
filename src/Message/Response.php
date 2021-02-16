<?php

namespace Omnipay\Ippay\Message;

class Response implements \Omnipay\Common\Message\ResponseInterface
{
    const WRONG_CREDENTIALS_MESSAGE = 'Cannot determine the URL for the processor.';

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

    public function wrongCredentials()
    {
        $message = (string)(new \SimpleXMLElement($this->getMessage()))->ErrMsg;
        return trim($message) === self::WRONG_CREDENTIALS_MESSAGE;
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
