<?php

/**
 * IPpay Gateway
 */
namespace Omnipay\Ippay;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Ippay';
    }

    /**
     * Get the gateway terminal id
     *
     * @return string
     */
    public function getTerminalId()
    {
        return $this->getParameter('terminal_id');
    }

    /**
     * set gateway terminal id
     *
     * @return string
     */
    public function setTerminalId($value)
    {
        return $this->setParameter('terminal_id', $value);
    }

    /**
     * Purchase Request
     *
     * After create a Bank Account or a Credit Card you can charge a client
     * with this method, you need to pass the transaction reference returned by either
     * the Bank Account method or the Credit Card method.
     *
     * @param  array|array $parameters
     * @return \Omnipay\Ippay\Message\Response
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Ippay\Message\PurchaseRequest', $parameters);
    }

    /**
     * Create Credit Card Request
     *
     * Create a Credit Card and associate with a customer it's important
     * to save the transaction reference to use it later on purchase request.
     *
     * @param  array|array $parameters
     * @return \Omnipay\Ippay\Message\Response
     */
    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Ippay\Message\CreateCardRequest', $parameters);
    }

    /**
     * Create Bank Account Request
     * 
     */

    public function createBankAccount(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Ippay\Message\CreateBankAccountRequest', $parameters);
    }
}
