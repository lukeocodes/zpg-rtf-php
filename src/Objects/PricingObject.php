<?php

namespace ZpgRtf\Objects;

/**
 * The pricing object's structure is determined by whether its component attribute transaction_type indicates that the
 * listing is for sale or rent. Please note that we do not currently support multiple pricing, nor multiple
 * transaction_types, for a single listing. If you do have multiple pricing models, perhaps due to a range of incentive
 * schemes being available, then you should supply the non-subsidised price in the pricing object and indicate available
 * incentive plans via listing/update:buyer_incentives.
 */
class PricingObject implements \JsonSerializable
{
    /**
     * Enum (rent, sale)
     *
     * @var string
     */
    private $transactionType;

    /** @var string */
    private $currencyCode;

    /** @var float */
    private $price;

    /** @var PricePerUnitAreaObject */
    private $pricePerUnitArea;

    /**
     * Enum (per_person_per_week, per_week, per_month, per_quarter, per_year)
     *
     * @var string
     */
    private $rentFrequency;

    /**
     * Enum (fixed_price, from, guide_price, non_quoting, offers_in_the_region_of, offers_over, price_on_application,
     * sale_by_tender)
     *
     * @var string
     */
    private $priceQualifier;

    /** @var bool */
    private $auction;

    /**
     * @return string
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * @param string $transactionType
     *
     * @return PricingObject
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     *
     * @return PricingObject
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return PricingObject
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return PricePerUnitAreaObject
     */
    public function getPricePerUnitArea()
    {
        return $this->pricePerUnitArea;
    }

    /**
     * @param PricePerUnitAreaObject $pricePerUnitArea
     *
     * @return PricingObject
     */
    public function setPricePerUnitArea(PricePerUnitAreaObject $pricePerUnitArea)
    {
        $this->pricePerUnitArea = $pricePerUnitArea;

        return $this;
    }

    /**
     * @return string
     */
    public function getRentFrequency()
    {
        return $this->rentFrequency;
    }

    /**
     * @param string $rentFrequency
     *
     * @return PricingObject
     */
    public function setRentFrequency($rentFrequency)
    {
        $this->rentFrequency = $rentFrequency;

        return $this;
    }

    /**
     * @return string
     */
    public function getPriceQualifier()
    {
        return $this->priceQualifier;
    }

    /**
     * @param string $priceQualifier
     *
     * @return PricingObject
     */
    public function setPriceQualifier($priceQualifier)
    {
        $this->priceQualifier = $priceQualifier;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAuction()
    {
        return $this->auction;
    }

    /**
     * @param bool $auction
     *
     * @return PricingObject
     */
    public function setAuction($auction)
    {
        $this->auction = $auction;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return [
            'transaction_type' => $this->getTransactionType(),
            'currency_code' => $this->getCurrencyCode(),
            'price' => $this->getPrice(),
            'price_per_unit_area' => $this->getPricePerUnitArea(),
            'rent_frequency' => $this->getRentFrequency(),
            'price_qualifier' => $this->getPriceQualifier(),
            'auction' => $this->isAuction(),
        ];
    }
}
