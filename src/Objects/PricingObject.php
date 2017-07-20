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
     * @var null|string
     */
    private $transactionType;

    /** @var null|string */
    private $currencyCode;

    /** @var null|float */
    private $price;

    /** @var null|PricePerUnitAreaObject */
    private $pricePerUnitArea;

    /**
     * Enum (per_person_per_week, per_week, per_month, per_quarter, per_year)
     *
     * @var null|string
     */
    private $rentFrequency;

    /**
     * Enum (fixed_price, from, guide_price, non_quoting, offers_in_the_region_of, offers_over, price_on_application,
     * sale_by_tender)
     *
     * @var null|string
     */
    private $priceQualifier;

    /** @var null|bool */
    private $auction;

    /**
     * @return null|string
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
    public function setTransactionType(string $transactionType): self
    {
        $this->transactionType = $transactionType;

        return $this;
    }

    /**
     * @return null|string
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
    public function setCurrencyCode(string $currencyCode): self
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * @return null|float
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
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return null|PricePerUnitAreaObject
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
    public function setPricePerUnitArea(PricePerUnitAreaObject $pricePerUnitArea): self
    {
        $this->pricePerUnitArea = $pricePerUnitArea;

        return $this;
    }

    /**
     * @return null|string
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
    public function setRentFrequency(string $rentFrequency): self
    {
        $this->rentFrequency = $rentFrequency;

        return $this;
    }

    /**
     * @return null|string
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
    public function setPriceQualifier(string $priceQualifier): self
    {
        $this->priceQualifier = $priceQualifier;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setAuction(bool $auction): self
    {
        $this->auction = $auction;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
    {
        return array_filter([
            'transaction_type' => $this->getTransactionType(),
            'currency_code' => $this->getCurrencyCode(),
            'price' => $this->getPrice(),
            'price_per_unit_area' => $this->getPricePerUnitArea(),
            'rent_frequency' => $this->getRentFrequency(),
            'price_qualifier' => $this->getPriceQualifier(),
            'auction' => $this->isAuction(),
        ]);
    }
}
