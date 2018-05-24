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
     * Purchase Request
     *
     * After create a Bank Account or a Credit Card you can charge a client
     * with this method, you need to pass the transaction reference returned by either
     * the Bank Account method or the Credit Card method.
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\PurchaseRequest', $parameters);
    }

    /**
     * Create Credit Card Request
     *
     * Create a Credit Card and associate with a customer it's important
     * to save the transaction reference to ue it later on purchase request.
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Ippay\Message\CreateCardRequest', $parameters);
    }

    /**
     * Void Request
     *
     * Any succesfully authorized payment that has not yet been submitted
     * as part of and end-of-day batch can be voided.
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function void(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\VoidRequest', $parameters);
    }

    /**
     * Refund Request
     *
     * Any Settled payment can be refunded.
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\RefundRequest', $parameters);
    }

    /**
     * Retrieve Payment
     *
     * Single Payment Objects
     *
     * @param  array|array $parameters
     * @return \Omnipay\Paysimple\Message\Response
     */
    public function retrievePayment(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paysimple\Message\RetrievePayment', $parameters);
    }
}
