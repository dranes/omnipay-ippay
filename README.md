# omnipay-ippay

**IPpay driver for the Omnipay PHP payment processing library**

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements [IPpay](https://www.ippay.com/) support for Omnipay.

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "dranes/omnipay-ippay": "~1.0"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update

## Basic Usage (Tokenization)

```
use Omnipay\Omnipay;
use Omnipay\Common\GatewayFactory;
use Omnipay\Common\Helper;
use Omnipay\Common\CreditCard;

$gateway = Omnipay::create('Ippay');
$gateway->setTerminalId('xxxxxxxx');
$gateway->setTestMode(true);

$creditCardData = [
    'firstName' => 'John',
    'lastName' => 'Doe',
    'number' => '4111111111111111',
    'expiryMonth' => '02',
    'expiryYear' => '22',
    'cvv' => '123'
];

$card = new CreditCard($creditCardData);
$ccResponse = $gateway->createCard([
    'card' => $card
])->send();    

$message = $ccResponse->getMessage();

$response = new \SimpleXMLElement($message);
if($ccResponse->isSuccessful()) {
    $token = $response->Token;
} else {
    $error = $response->ResponseText;
}

```

## Basic Usage (Sale with a token)

```
use Omnipay\Omnipay;
use Omnipay\Common\GatewayFactory;
use Omnipay\Common\Helper;
use Omnipay\Common\CreditCard;

$gateway = Omnipay::create('Ippay');
$gateway->setTerminalId('xxxxxxxx');
$gateway->setTestMode(true);

$response = $gateway->purchase([
    'transaction_type' => 'SALE',
    'amount' => 100, 
    'token' => $token, //previously saved
])->send();

$message = $response->getMessage();
$response = new \SimpleXMLElement($message);

if($response->isSuccessful()) {
    $transaction_reference = $response->getTransactionReference();
} else {
    $error = $response->ResponseText);
}

```


For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/thephpleague/omnipay-payflow/issues),
or better yet, fork the library and submit a pull request.
