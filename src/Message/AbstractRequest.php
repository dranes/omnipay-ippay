<?php

namespace Omnipay\Ippay\Message;

use Guzzle\Http\Exception\ClientErrorResponseException;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{

    protected $sandboxEndpoint = "https://testgtwy.ippay.com/ippay";
    protected $productionEndpoint = "https://gtwy.ippay.com/ippay";

    public function getTerminalId()
    {
        return $this->getParameter('terminal_id');
    }

    public function setTerminalId($value)
    {
        return $this->setParameter('terminal_id', $value);
    }

    public function getHeaders()
    {
        $headers = [];

        return $headers;
    }

    public function send()
    {
        $data = $this->getData();
        
        if($data['TransactionType'] == 'CHECK') {
            $xml = $this->dataCheck($data);
        } else {
            $xml = $this->dataSale($data);
        }
        
        $headers = array_merge(
            $this->getHeaders(),
            ['Content-Type' => 'text/xml']
        );

        return $this->sendData($xml, $headers);
    }

    public function dataCheck($data)
    {
        $xml = '';
        $xml .= "<TransactionType>CHECK</TransactionType>";
        $xml .= "<TerminalID>" . $this->getTerminalId() . "</TerminalID>";
        $xml .= "<CardName>" . $data['BankName'] . "</CardName>";
        $xml .= "<TotalAmount>" . $data['TotalAmount'] . "</TotalAmount>";
        $xml .= "<ACH Type='" . $data['Type'] . "' SEC='" . $data['SEC'] . "'>";
            $xml .= "<Token>" . $data['Token'] . "</Token>";
            $xml .= "<CheckNumber>" . $data['CheckNumber'] . "</CheckNumber>";
        $xml .= "</ACH>";
        $xml = "<ippay>" . $xml . "</ippay>";

        return $xml;
    }

    public function dataSale($data)
    {
        
        $xml = null;
        foreach($data as $node => $value) {
            $xml .= "<{$node}>{$value}</{$node}>";
        }

        $xml .= "<TerminalID>" . $this->getTerminalId() . "</TerminalID>";
        $xml = "<ippay>" . $xml . "</ippay>";

        return $xml;
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

    public function getEndpoint()
    {
        $endpoint = $this->getTestMode() ? $this->sandboxEndpoint : $this->productionEndpoint;
        return  $endpoint;
    }

    public function getHttpMethod()
    {
        return 'POST';
    }
}
