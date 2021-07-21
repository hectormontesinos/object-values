<?php
namespace App\Objects;

use Assert\Assertion;
use Assert\AssertionFailedException;

class Price
{
    const CURRENCIES = ['EUR', 'USD'];
    private $amount;
    private $currency;

    /**
     * Price constructor.
     * @param float $amount
     * @param string $currency
     * @throws AssertionFailedException
     */
    private function __construct(float $amount, string $currency)
    {
        $this->checkAmount($amount);
        $this->checkCurrency($currency);

        $this->amount = $amount;
        $this->currency = $currency;
    }
    /**
     * @param float $amount
     * @throws AssertionFailedException
     */
    private function checkAmount(float $amount)
    {
        Assertion::max(0, $amount);
    }
    /**
     * @param string $currency
     * @throws AssertionFailedException
     */
    private function checkCurrency(string $currency)
    {
        Assertion::string($currency);
        Assertion::inArray($currency, self::CURRENCIES);
    }

    /**
     * @param float $amount
     * @return Price
     * @throws AssertionFailedException
     */
    public static function createPriceInDollars(float $amount): Price
    {
        return new self($amount, 'USD');
    }
    /**
     * @param float $amount
     * @return Price
     * @throws AssertionFailedException
     */
    public static function createPriceInEuros(float $amount): Price
    {
        return new self($amount, 'EUR');
    }
    /**
     * @return float
     */
    public function getAmount() : float
    {
        return $this->amount;
    }
    /**
     * @return string
     */
    public function getCurrency() : string
    {
        return $this->currency;
    }
}
