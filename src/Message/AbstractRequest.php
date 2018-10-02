<?php

namespace Omnipay\Paysimple\Message;

use Guzzle\Http\Exception\ClientErrorResponseException;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{

    protected $sandboxEndpoint = "https://testgtwy.ippay.com/ippay";
    protected $productionEndpoint = "";

    public function getTerminalId()
    {
        return $this->getParameter('terminal_id');
    }

    public function getHeaders()
    {
        $headers = [];

        return $headers;
    }

    public function send()
    {
        $data = $this->getData();
        $xml = null;
        foreach($data as $node => $value) {
            $xml .= "<{$node}>{$value}</{$node}>";
        }

        $xml = "<ippay>" . $xml . "</ippay>";
        
        $headers = array_merge(
            $this->getHeaders(),
            ['Content-Type' => 'text/xml']
        );

        return $this->sendData($xml, $headers);
    }

    public function sendData($data, array $headers = [])
    {
        
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getEndPoint(),
            $headers,
            $data
        );
 
        return (new Response($this, $httpResponse->getBody()->getContents()));
    }

    public function getHttpMethod()
    {
        return 'POST';
    }
}
