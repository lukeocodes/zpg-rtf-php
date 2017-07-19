<?php

namespace ZpgRtf\Objects;

use ZpgRtf\Helpers\DateTimeHelper;

/**
 * The listing object structures the listing payload.
 */
class ListingObject implements \JsonSerializable
{
    /** @var bool **/
    private $accessibility;

    /** @var string e.g. '£10 per person' **/
    private $administrationFees;

    /** @var float e.g. 150.00 **/
    private $annualBusinessRates;

    /** @var AreasObject **/
    private $areas;

    /** @var int **/
    private $availableBedrooms;

    /** @var DateTimeHelper **/
    private $availableFromDate;

    /** @var bool **/
    private $basement;

    /** @var int **/
    private $bathrooms;

    /**
     * Array of enum (electricity, gas, internet, satellite_cable_tv, telephone, tv_licence, water)
     *
     * @var array ['water', 'tv_licence']
     */
    private $billsIncluded;

    /** @var string e.g. 'ref-1234' **/
    private $branchReference;

    /** @var bool **/
    private $burglarAlarm;

    /** @var bool **/
    private $businessForSale;

    /**
     * Array of enum (equity_loan, help_to_buy, mi_new_home, new_buy, part_buy_part_rent, shared_equity,
     * shared_ownership)
     *
     * @var array e.g. ['equity_loan', 'help_to_buy']
     */
    private $buyerIncentives;

    /**
     * Enum (commercial, residential)
     *
     * @var string e.g. 'residential'
     */
    private $category;

    /**
     * Enum (full, partial, none)
     *
     * @var string e.g. 'full'
     **/
    private $centralHeating;

    /** @var bool **/
    private $chainFree;

    /**
     * @see http://www.planningportal.gov.uk/permission/commonprojects/changeofuse
     *
     * @var array e.g. ['A3', 'D2']
     */
    private $commercialUseClasses;

    /**
     * Enum (electricity, fibre_optic, gas, satellite_cable_tv, telephone, water)
     *
     * @var array e.g. ['electricity', 'gas']
     */
    private $connectedUtilities;

    /** @var bool **/
    private $conservatory;

    /** @var int e.g. 1899 **/
    private $constructionYear;

    /** @var array **/
    private $content;

    /**
     * Enum (A, B, C, D, E, F, G, H, I)
     *
     * @var string
     */
    private $councilTaxBand;

    /**
     * Enum (excellent, good, average, needs_modernisation)
     *
     * @var string
     */
    private $decorativeCondition;

    /** @var float **/
    private $deposit;

    /** @var array **/
    private $detailedDescription;

    /** @var string **/
    private $displayAddress;

    /** @var bool **/
    private $doubleGlazing;

    /** @var EpcRatingsObject **/
    private $epcRatings;

    /** @var array **/
    private $featureList;

    /** @var bool **/
    private $fireplace;

    /** @var bool **/
    private $fishingRights;

    /**
     * Enum (penthouse, <integers greater than zero>, ground, basement)
     *
     * @var array e.g. ['basement', 'ground', 1, 2]
     */
    private $floorLevels;

    /** @var int **/
    private $floors;

    /**
     * Emum (furnished, furnished_or_unfurnished, part_furnished, unfurnished)
     *
     * @var string e.g. 'furnished'
     */
    private $furnishedState;

    /** @var GoogleStreetViewObject **/
    private $googleStreetView;

    /** @var float **/
    private $groundRent;

    /** @var bool **/
    private $gym;

    /** @var LeaseExpiryObject **/
    private $leaseExpiry;

    /**
     * Enum (available, under_offer, sold_subject_to_contract, sold, let_agreed, let)
     *
     * @var string e.g. 'available'
     */
    private $lifeCycleStatus;

    /**
     * Enum(category_a, category_b, category_c, grade_a, grade_b, grade_b_plus, grade_one, grade_two, grade_two_star,
     * locally_listed)
     *
     * @var string
     */
    private $listedBuildingGrade;

    /** @var string e.g. 'listing-1234' **/
    private $listingReference;

    /** @var int **/
    private $livingRooms;

    /** @var LocationObject **/
    private $location;

    /** @var bool **/
    private $loft;

    /** @var bool **/
    private $newHome;

    /** @var DateTimeHelper **/
    private $openDay;

    /** @var bool **/
    private $outbuildings;

    /**
     * Enum (balcony, communal_garden, private_garden, roof_terrace, terrace)
     *
     * @var array
     */
    private $outsideSpace;

    /**
     * Enum (double_garage, off_street_parking, residents_parking, single_garage, underground)
     *
     * @var array
     */
    private $parking;

    /** @var bool **/
    private $petsAllowed;

    /** @var bool **/
    private $porterSecurity;

    /** @var PricingObject **/
    private $pricing;

    /**
     * @see self::PROPERTY_TYPES
     *
     * @var string
     */
    private $propertyType;

    /**
     * @see https://www.gov.uk/correct-your-business-rates
     *
     * @var float
     */
    private $rateableValue;

    /** @var MinimumContractLengthObject **/
    private $rentalTerm;

    /** @var bool **/
    private $repossession;

    /** @var bool **/
    private $retirement;

    /** @var int **/
    private $sapRating;

    /** @var ServiceChargeObject **/
    private $serviceCharge;

    /** @var bool **/
    private $serviced;

    /** @var bool **/
    private $sharedAccommodation;

    /** @var string **/
    private $summaryDescription;

    /** @var bool **/
    private $swimmingPool;

    /** @var bool **/
    private $tenanted;

    /** @var TenantEligibilityObject **/
    private $tenantEligibility;

    /** @var bool **/
    private $tennisCourt;

    /**
     * Enum (feudal, freehold, leasehold, share_of_freehold)
     *
     * @var string
     */
    private $tenure;

    /** @var int **/
    private $totalBedrooms;

    /** @var bool **/
    private $utilityRoom;

    /** @var bool **/
    private $waterfront;

    /** @var bool **/
    private $woodFloors;

    /** @var array */
    const PROPERTY_TYPES = [
        self::BARN_CONVERSION => 'Barn conversion',
        self::BLOCK_OF_FLATS => 'Block of flats',
        self::BUNGALOW => 'Bungalow',
        self::BUSINESS_PARK => 'Business park',
        self::CHALET => 'Chalet',
        self::CHATEAU => 'Chateau',
        self::COTTAGE => 'Cottage',
        self::COUNTRY_HOUSE => 'Country house',
        self::DETACHED => 'Detached',
        self::DETACHED_BUNGALOW => 'Detached bungalow',
        self::END_TERRACE => 'End terrace',
        self::EQUESTRIAN => 'Equestrian',
        self::FARM => 'Farm',
        self::FARMHOUSE => 'Farmhouse',
        self::FINCA => 'Finca',
        self::FLAT => 'Flat',
        self::HOTEL => 'Hotel',
        self::HOUSEBOAT => 'Houseboat',
        self::INDUSTRIAL => 'Industrial',
        self::LAND => 'Land',
        self::LEISURE => 'Leisure',
        self::LIGHT_INDUSTRIAL => 'Light industrial',
        self::LINK_DETACHED => 'Link detached',
        self::LODGE => 'Lodge',
        self::LONGERE => 'Longere',
        self::MAISONETTE => 'Maisonette',
        self::MEWS => 'Mews',
        self::OFFICE => 'Office',
        self::PARK_HOME => 'Park home',
        self::PARKING => 'Parking',
        self::PUB_BAR => 'Pub bar',
        self::RESTAURANT => 'Restaurant',
        self::RETAIL => 'Retail',
        self::RIAD => 'Riad',
        self::SEMI_DETACHED => 'Semi detached',
        self::SEMI_DETACHED_BUNGALOW => 'Semi detached bungalow',
        self::STUDIO => 'Studio',
        self::TERRACED => 'Terraced',
        self::TERRACED_BUNGALOW => 'Terraced bungalow',
        self::TOWN_HOUSE => 'Town house',
        self::VILLA => 'Villa',
        self::WAREHOUSE => 'Warehouse',
    ];

    /** @var string */
    const BARN_CONVERSION = 'barn_conversion';

    /** @var string */
    const BLOCK_OF_FLATS = 'block_of_flats';

    /** @var string */
    const BUNGALOW = 'bungalow';

    /** @var string */
    const BUSINESS_PARK = 'business_park';

    /** @var string */
    const CHALET = 'chalet';

    /** @var string */
    const CHATEAU = 'chateau';

    /** @var string */
    const COTTAGE = 'cottage';

    /** @var string */
    const COUNTRY_HOUSE = 'country_house';

    /** @var string */
    const DETACHED = 'detached';

    /** @var string */
    const DETACHED_BUNGALOW = 'detached_bungalow';

    /** @var string */
    const END_TERRACE = 'end_terrace';

    /** @var string */
    const EQUESTRIAN = 'equestrian';

    /** @var string */
    const FARM = 'farm';

    /** @var string */
    const FARMHOUSE = 'farmhouse';

    /** @var string */
    const FINCA = 'finca';

    /** @var string */
    const FLAT = 'flat';

    /** @var string */
    const HOTEL = 'hotel';

    /** @var string */
    const HOUSEBOAT = 'houseboat';

    /** @var string */
    const INDUSTRIAL = 'industrial';

    /** @var string */
    const LAND = 'land';

    /** @var string */
    const LEISURE = 'leisure';

    /** @var string */
    const LIGHT_INDUSTRIAL = 'light_industrial';

    /** @var string */
    const LINK_DETACHED = 'link_detached';

    /** @var string */
    const LODGE = 'lodge';

    /** @var string */
    const LONGERE = 'longere';

    /** @var string */
    const MAISONETTE = 'maisonette';

    /** @var string */
    const MEWS = 'mews';

    /** @var string */
    const OFFICE = 'office';

    /** @var string */
    const PARK_HOME = 'park_home';

    /** @var string */
    const PARKING = 'parking';

    /** @var string */
    const PUB_BAR = 'pub_bar';

    /** @var string */
    const RESTAURANT = 'restaurant';

    /** @var string */
    const RETAIL = 'retail';

    /** @var string */
    const RIAD = 'riad';

    /** @var string */
    const SEMI_DETACHED = 'semi_detached';

    /** @var string */
    const SEMI_DETACHED_BUNGALOW = 'semi_detached_bungalow';

    /** @var string */
    const STUDIO = 'studio';

    /** @var string */
    const TERRACED = 'terraced';

    /** @var string */
    const TERRACED_BUNGALOW = 'terraced_bungalow';

    /** @var string */
    const TOWN_HOUSE = 'town_house';

    /** @var string */
    const VILLA = 'villa';

    /** @var string */
    const WAREHOUSE = 'warehouse';

    /**
     * @return bool
     */
    public function hasAccessibility()
    {
        return $this->accessibility;
    }

    /**
     * @param bool $accessibility
     *
     * @return ListingObject
     */
    public function setAccessibility($accessibility)
    {
        $this->accessibility = $accessibility;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdministrationFees()
    {
        return $this->administrationFees;
    }

    /**
     * @param string $administrationFees
     *
     * @return ListingObject
     */
    public function setAdministrationFees($administrationFees)
    {
        $this->administrationFees = $administrationFees;

        return $this;
    }

    /**
     * @return float
     */
    public function getAnnualBusinessRates()
    {
        return $this->annualBusinessRates;
    }

    /**
     * @param float $annualBusinessRates
     *
     * @return ListingObject
     */
    public function setAnnualBusinessRates($annualBusinessRates)
    {
        $this->annualBusinessRates = $annualBusinessRates;

        return $this;
    }

    /**
     * @return AreasObject
     */
    public function getAreas()
    {
        return $this->areas;
    }

    /**
     * @param AreasObject $areas
     *
     * @return ListingObject
     */
    public function setAreas(AreasObject $areas)
    {
        $this->areas = $areas;

        return $this;
    }

    /**
     * @return int
     */
    public function getAvailableBedrooms()
    {
        return $this->availableBedrooms;
    }

    /**
     * @param int $availableBedrooms
     *
     * @return ListingObject
     */
    public function setAvailableBedrooms($availableBedrooms)
    {
        $this->availableBedrooms = $availableBedrooms;

        return $this;
    }

    /**
     * @return DateTimeHelper
     */
    public function getAvailableFromDate()
    {
        return $this->availableFromDate;
    }

    /**
     * @param DateTimeHelper $availableFromDate
     *
     * @return ListingObject
     */
    public function setAvailableFromDate(DateTimeHelper $availableFromDate)
    {
        $this->availableFromDate = $availableFromDate;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasBasement()
    {
        return $this->basement;
    }

    /**
     * @param bool $basement
     *
     * @return ListingObject
     */
    public function setBasement($basement)
    {
        $this->basement = $basement;

        return $this;
    }

    /**
     * @return int
     */
    public function getBathrooms()
    {
        return $this->bathrooms;
    }

    /**
     * @param int $bathrooms
     *
     * @return ListingObject
     */
    public function setBathrooms($bathrooms)
    {
        $this->bathrooms = $bathrooms;

        return $this;
    }

    /**
     * @return array
     */
    public function getBillsIncluded()
    {
        return $this->billsIncluded;
    }

    /**
     * @param array $billsIncluded
     *
     * @return ListingObject
     */
    public function setBillsIncluded($billsIncluded)
    {
        $this->billsIncluded = $billsIncluded;

        return $this;
    }

    /**
     * @return string
     */
    public function getBranchReference()
    {
        return $this->branchReference;
    }

    /**
     * @param string $branchReference
     *
     * @return ListingObject
     */
    public function setBranchReference($branchReference)
    {
        $this->branchReference = $branchReference;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasBurglarAlarm()
    {
        return $this->burglarAlarm;
    }

    /**
     * @param bool $burglarAlarm
     *
     * @return ListingObject
     */
    public function setBurglarAlarm($burglarAlarm)
    {
        $this->burglarAlarm = $burglarAlarm;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBusinessForSale()
    {
        return $this->businessForSale;
    }

    /**
     * @param bool $businessForSale
     *
     * @return ListingObject
     */
    public function setBusinessForSale($businessForSale)
    {
        $this->businessForSale = $businessForSale;

        return $this;
    }

    /**
     * @return array
     */
    public function getBuyerIncentives()
    {
        return $this->buyerIncentives;
    }

    /**
     * @param array $buyerIncentives
     *
     * @return ListingObject
     */
    public function setBuyerIncentives($buyerIncentives)
    {
        $this->buyerIncentives = $buyerIncentives;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     *
     * @return ListingObject
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string
     */
    public function getCentralHeating()
    {
        return $this->centralHeating;
    }

    /**
     * @param string $centralHeating
     *
     * @return ListingObject
     */
    public function setCentralHeating($centralHeating)
    {
        $this->centralHeating = $centralHeating;

        return $this;
    }

    /**
     * @return bool
     */
    public function isChainFree()
    {
        return $this->chainFree;
    }

    /**
     * @param bool $chainFree
     *
     * @return ListingObject
     */
    public function setChainFree($chainFree)
    {
        $this->chainFree = $chainFree;

        return $this;
    }

    /**
     * @return array
     */
    public function getCommercialUseClasses()
    {
        return $this->commercialUseClasses;
    }

    /**
     * @param array $commercialUseClasses
     *
     * @return ListingObject
     */
    public function setCommercialUseClasses($commercialUseClasses)
    {
        $this->commercialUseClasses = $commercialUseClasses;

        return $this;
    }

    /**
     * @return array
     */
    public function getConnectedUtilities()
    {
        return $this->connectedUtilities;
    }

    /**
     * @param array $connectedUtilities
     *
     * @return ListingObject
     */
    public function setConnectedUtilities($connectedUtilities)
    {
        $this->connectedUtilities = $connectedUtilities;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasConservatory()
    {
        return $this->conservatory;
    }

    /**
     * @param bool $conservatory
     *
     * @return ListingObject
     */
    public function setConservatory($conservatory)
    {
        $this->conservatory = $conservatory;

        return $this;
    }

    /**
     * @return int
     */
    public function getConstructionYear()
    {
        return $this->constructionYear;
    }

    /**
     * @param int $constructionYear
     *
     * @return ListingObject
     */
    public function setConstructionYear($constructionYear)
    {
        $this->constructionYear = $constructionYear;

        return $this;
    }

    /**
     * @return array
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param array $content
     *
     * @return ListingObject
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getCouncilTaxBand()
    {
        return $this->councilTaxBand;
    }

    /**
     * @param string $councilTaxBand
     *
     * @return ListingObject
     */
    public function setCouncilTaxBand($councilTaxBand)
    {
        $this->councilTaxBand = $councilTaxBand;

        return $this;
    }

    /**
     * @return string
     */
    public function getDecorativeCondition()
    {
        return $this->decorativeCondition;
    }

    /**
     * @param string $decorativeCondition
     *
     * @return ListingObject
     */
    public function setDecorativeCondition($decorativeCondition)
    {
        $this->decorativeCondition = $decorativeCondition;

        return $this;
    }

    /**
     * @return float
     */
    public function getDeposit()
    {
        return $this->deposit;
    }

    /**
     * @param float $deposit
     *
     * @return ListingObject
     */
    public function setDeposit($deposit)
    {
        $this->deposit = $deposit;

        return $this;
    }

    /**
     * @return array
     */
    public function getDetailedDescription()
    {
        return $this->detailedDescription;
    }

    /**
     * @param array $detailedDescription
     *
     * @return ListingObject
     */
    public function setDetailedDescription($detailedDescription)
    {
        $this->detailedDescription = $detailedDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayAddress()
    {
        return $this->displayAddress;
    }

    /**
     * @param string $displayAddress
     *
     * @return ListingObject
     */
    public function setDisplayAddress($displayAddress)
    {
        $this->displayAddress = $displayAddress;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasDoubleGlazing()
    {
        return $this->doubleGlazing;
    }

    /**
     * @param bool $doubleGlazing
     *
     * @return ListingObject
     */
    public function setDoubleGlazing($doubleGlazing)
    {
        $this->doubleGlazing = $doubleGlazing;

        return $this;
    }

    /**
     * @return EpcRatingsObject
     */
    public function getEpcRatings()
    {
        return $this->epcRatings;
    }

    /**
     * @param EpcRatingsObject $epcRatings
     *
     * @return ListingObject
     */
    public function setEpcRatings(EpcRatingsObject $epcRatings)
    {
        $this->epcRatings = $epcRatings;

        return $this;
    }

    /**
     * @return array
     */
    public function getFeatureList()
    {
        return $this->featureList;
    }

    /**
     * @param array $featureList
     *
     * @return ListingObject
     */
    public function setFeatureList($featureList)
    {
        $this->featureList = $featureList;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasFireplace()
    {
        return $this->fireplace;
    }

    /**
     * @param bool $fireplace
     *
     * @return ListingObject
     */
    public function setFireplace($fireplace)
    {
        $this->fireplace = $fireplace;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasFishingRights()
    {
        return $this->fishingRights;
    }

    /**
     * @param bool $fishingRights
     *
     * @return ListingObject
     */
    public function setFishingRights($fishingRights)
    {
        $this->fishingRights = $fishingRights;

        return $this;
    }

    /**
     * @return array
     */
    public function getFloorLevels()
    {
        return $this->floorLevels;
    }

    /**
     * @param array $floorLevels
     *
     * @return ListingObject
     */
    public function setFloorLevels($floorLevels)
    {
        $this->floorLevels = $floorLevels;

        return $this;
    }

    /**
     * @return int
     */
    public function getFloors()
    {
        return $this->floors;
    }

    /**
     * @param int $floors
     *
     * @return ListingObject
     */
    public function setFloors($floors)
    {
        $this->floors = $floors;

        return $this;
    }

    /**
     * @return string
     */
    public function getFurnishedState()
    {
        return $this->furnishedState;
    }

    /**
     * @param string $furnishedState
     *
     * @return ListingObject
     */
    public function setFurnishedState($furnishedState)
    {
        $this->furnishedState = $furnishedState;

        return $this;
    }

    /**
     * @return GoogleStreetViewObject
     */
    public function getGoogleStreetView()
    {
        return $this->googleStreetView;
    }

    /**
     * @param GoogleStreetViewObject $googleStreetView
     *
     * @return ListingObject
     */
    public function setGoogleStreetView(GoogleStreetViewObject $googleStreetView)
    {
        $this->googleStreetView = $googleStreetView;

        return $this;
    }

    /**
     * @return float
     */
    public function getGroundRent()
    {
        return $this->groundRent;
    }

    /**
     * @param float $groundRent
     *
     * @return ListingObject
     */
    public function setGroundRent($groundRent)
    {
        $this->groundRent = $groundRent;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasGym()
    {
        return $this->gym;
    }

    /**
     * @param bool $gym
     *
     * @return ListingObject
     */
    public function setGym($gym)
    {
        $this->gym = $gym;

        return $this;
    }

    /**
     * @return LeaseExpiryObject
     */
    public function getLeaseExpiry()
    {
        return $this->leaseExpiry;
    }

    /**
     * @param LeaseExpiryObject $leaseExpiry
     *
     * @return ListingObject
     */
    public function setLeaseExpiry(LeaseExpiryObject $leaseExpiry)
    {
        $this->leaseExpiry = $leaseExpiry;

        return $this;
    }

    /**
     * @return string
     */
    public function getLifeCycleStatus()
    {
        return $this->lifeCycleStatus;
    }

    /**
     * @param string $lifeCycleStatus
     *
     * @return ListingObject
     */
    public function setLifeCycleStatus($lifeCycleStatus)
    {
        $this->lifeCycleStatus = $lifeCycleStatus;

        return $this;
    }

    /**
     * @return string
     */
    public function getListedBuildingGrade()
    {
        return $this->listedBuildingGrade;
    }

    /**
     * @param string $listedBuildingGrade
     *
     * @return ListingObject
     */
    public function setListedBuildingGrade($listedBuildingGrade)
    {
        $this->listedBuildingGrade = $listedBuildingGrade;

        return $this;
    }

    /**
     * @return string
     */
    public function getListingReference()
    {
        return $this->listingReference;
    }

    /**
     * @param string $listingReference
     *
     * @return ListingObject
     */
    public function setListingReference($listingReference)
    {
        $this->listingReference = $listingReference;

        return $this;
    }

    /**
     * @return int
     */
    public function getLivingRooms()
    {
        return $this->livingRooms;
    }

    /**
     * @param int $livingRooms
     *
     * @return ListingObject
     */
    public function setLivingRooms($livingRooms)
    {
        $this->livingRooms = $livingRooms;

        return $this;
    }

    /**
     * @return LocationObject
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param LocationObject $location
     *
     * @return ListingObject
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasLoft()
    {
        return $this->loft;
    }

    /**
     * @param bool $loft
     *
     * @return ListingObject
     */
    public function setLoft($loft)
    {
        $this->loft = $loft;

        return $this;
    }

    /**
     * @return bool
     */
    public function isNewHome()
    {
        return $this->newHome;
    }

    /**
     * @param bool $newHome
     *
     * @return ListingObject
     */
    public function setNewHome($newHome)
    {
        $this->newHome = $newHome;

        return $this;
    }

    /**
     * @return DateTimeHelper
     */
    public function getOpenDay()
    {
        return $this->openDay;
    }

    /**
     * @param DateTimeHelper $openDay
     *
     * @return ListingObject
     */
    public function setOpenDay(DateTimeHelper $openDay)
    {
        $this->openDay = $openDay;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasOutbuildings()
    {
        return $this->outbuildings;
    }

    /**
     * @param bool $outbuildings
     *
     * @return ListingObject
     */
    public function setOutbuildings($outbuildings)
    {
        $this->outbuildings = $outbuildings;

        return $this;
    }

    /**
     * @return array
     */
    public function getOutsideSpace()
    {
        return $this->outsideSpace;
    }

    /**
     * @param array $outsideSpace
     *
     * @return ListingObject
     */
    public function setOutsideSpace($outsideSpace)
    {
        $this->outsideSpace = $outsideSpace;

        return $this;
    }

    /**
     * @return array
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * @param array $parking
     *
     * @return ListingObject
     */
    public function setParking($parking)
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPetsAllowed()
    {
        return $this->petsAllowed;
    }

    /**
     * @param bool $petsAllowed
     *
     * @return ListingObject
     */
    public function setPetsAllowed($petsAllowed)
    {
        $this->petsAllowed = $petsAllowed;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasPorterSecurity()
    {
        return $this->porterSecurity;
    }

    /**
     * @param bool $porterSecurity
     *
     * @return ListingObject
     */
    public function setPorterSecurity($porterSecurity)
    {
        $this->porterSecurity = $porterSecurity;

        return $this;
    }

    /**
     * @return PricingObject
     */
    public function getPricing()
    {
        return $this->pricing;
    }

    /**
     * @param PricingObject $pricing
     *
     * @return ListingObject
     */
    public function setPricing(PricingObject $pricing)
    {
        $this->pricing = $pricing;

        return $this;
    }

    /**
     * @return string
     */
    public function getPropertyType()
    {
        return $this->propertyType;
    }

    /**
     * @param string $propertyType
     *
     * @return ListingObject
     */
    public function setPropertyType($propertyType)
    {
        $this->propertyType = $propertyType;

        return $this;
    }

    /**
     * @return float
     */
    public function getRateableValue()
    {
        return $this->rateableValue;
    }

    /**
     * @param float $rateableValue
     *
     * @return ListingObject
     */
    public function setRateableValue($rateableValue)
    {
        $this->rateableValue = $rateableValue;

        return $this;
    }

    /**
     * @return MinimumContractLengthObject
     */
    public function getRentalTerm()
    {
        return $this->rentalTerm;
    }

    /**
     * @param MinimumContractLengthObject $rentalTerm
     *
     * @return ListingObject
     */
    public function setRentalTerm(MinimumContractLengthObject $rentalTerm)
    {
        $this->rentalTerm = $rentalTerm;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRepossession()
    {
        return $this->repossession;
    }

    /**
     * @param bool $repossession
     *
     * @return ListingObject
     */
    public function setRepossession($repossession)
    {
        $this->repossession = $repossession;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRetirement()
    {
        return $this->retirement;
    }

    /**
     * @param bool $retirement
     *
     * @return ListingObject
     */
    public function setRetirement($retirement)
    {
        $this->retirement = $retirement;

        return $this;
    }

    /**
     * @return int
     */
    public function getSapRating()
    {
        return $this->sapRating;
    }

    /**
     * @param int $sapRating
     *
     * @return ListingObject
     */
    public function setSapRating($sapRating)
    {
        $this->sapRating = $sapRating;

        return $this;
    }

    /**
     * @return ServiceChargeObject
     */
    public function getServiceCharge()
    {
        return $this->serviceCharge;
    }

    /**
     * @param ServiceChargeObject $serviceCharge
     *
     * @return ListingObject
     */
    public function setServiceCharge(ServiceChargeObject $serviceCharge)
    {
        $this->serviceCharge = $serviceCharge;

        return $this;
    }

    /**
     * @return bool
     */
    public function isServiced()
    {
        return $this->serviced;
    }

    /**
     * @param bool $serviced
     *
     * @return ListingObject
     */
    public function setServiced($serviced)
    {
        $this->serviced = $serviced;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSharedAccommodation()
    {
        return $this->sharedAccommodation;
    }

    /**
     * @param bool $sharedAccommodation
     *
     * @return ListingObject
     */
    public function setSharedAccommodation($sharedAccommodation)
    {
        $this->sharedAccommodation = $sharedAccommodation;

        return $this;
    }

    /**
     * @return string
     */
    public function getSummaryDescription()
    {
        return $this->summaryDescription;
    }

    /**
     * @param string $summaryDescription
     *
     * @return ListingObject
     */
    public function setSummaryDescription($summaryDescription)
    {
        $this->summaryDescription = $summaryDescription;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasSwimmingPool()
    {
        return $this->swimmingPool;
    }

    /**
     * @param bool $swimmingPool
     *
     * @return ListingObject
     */
    public function setSwimmingPool($swimmingPool)
    {
        $this->swimmingPool = $swimmingPool;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTenanted()
    {
        return $this->tenanted;
    }

    /**
     * @param bool $tenanted
     *
     * @return ListingObject
     */
    public function setTenanted($tenanted)
    {
        $this->tenanted = $tenanted;

        return $this;
    }

    /**
     * @return TenantEligibilityObject
     */
    public function getTenantEligibility()
    {
        return $this->tenantEligibility;
    }

    /**
     * @param TenantEligibilityObject $tenantEligibility
     *
     * @return ListingObject
     */
    public function setTenantEligibility(TenantEligibilityObject $tenantEligibility)
    {
        $this->tenantEligibility = $tenantEligibility;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasTennisCourt()
    {
        return $this->tennisCourt;
    }

    /**
     * @param bool $tennisCourt
     *
     * @return ListingObject
     */
    public function setTennisCourt($tennisCourt)
    {
        $this->tennisCourt = $tennisCourt;

        return $this;
    }

    /**
     * @return string
     */
    public function getTenure()
    {
        return $this->tenure;
    }

    /**
     * @param string $tenure
     *
     * @return ListingObject
     */
    public function setTenure($tenure)
    {
        $this->tenure = $tenure;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalBedrooms()
    {
        return $this->totalBedrooms;
    }

    /**
     * @param int $totalBedrooms
     *
     * @return ListingObject
     */
    public function setTotalBedrooms($totalBedrooms)
    {
        $this->totalBedrooms = $totalBedrooms;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasUtilityRoom()
    {
        return $this->utilityRoom;
    }

    /**
     * @param bool $utilityRoom
     *
     * @return ListingObject
     */
    public function setUtilityRoom($utilityRoom)
    {
        $this->utilityRoom = $utilityRoom;

        return $this;
    }

    /**
     * @return bool
     */
    public function isWaterfront()
    {
        return $this->waterfront;
    }

    /**
     * @param bool $waterfront
     *
     * @return ListingObject
     */
    public function setWaterfront($waterfront)
    {
        $this->waterfront = $waterfront;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasWoodFloors()
    {
        return $this->woodFloors;
    }

    /**
     * @param bool $woodFloors
     *
     * @return ListingObject
     */
    public function setWoodFloors($woodFloors)
    {
        $this->woodFloors = $woodFloors;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return array_filter([
            'accessibility' => $this->hasAccessibility(),
            'administration_fees' => $this->getAdministrationFees(),
            'annual_business_rates' => $this->getAnnualBusinessRates(),
            'areas' => $this->getAreas(),
            'available_bedrooms' => $this->getAvailableBedrooms(),
            'available_from_date' => $this->getAvailableFromDate(),
            'basement' => $this->hasBasement(),
            'bathrooms' => $this->getBathrooms(),
            'bills_included' => $this->getBillsIncluded(),
            'branch_reference' => $this->getBranchReference(),
            'burglar_alarm' => $this->hasBurglarAlarm(),
            'business_for_sale' => $this->isBusinessForSale(),
            'buyer_incentives' => $this->getBuyerIncentives(),
            'category' => $this->getCategory(),
            'central_heating' => $this->getCentralHeating(),
            'chain_free' => $this->isChainFree(),
            'commercial_use_classes' => $this->getCommercialUseClasses(),
            'connected_utilities' => $this->getConnectedUtilities(),
            'conservatory' => $this->hasConservatory(),
            'construction_year' => $this->getConstructionYear(),
            'content' => $this->getContent(),
            'council_tax_band' => $this->getCouncilTaxBand(),
            'decorative_condition' => $this->getDecorativeCondition(),
            'deposit' => $this->getDeposit(),
            'detailed_description' => $this->getDetailedDescription(),
            'display_address' => $this->getDisplayAddress(),
            'double_glazing' => $this->hasDoubleGlazing(),
            'epc_ratings' => $this->getEpcRatings(),
            'feature_list' => $this->getFeatureList(),
            'fireplace' => $this->hasFireplace(),
            'fishing_rights' => $this->hasFishingRights(),
            'floor_levels' => $this->getFloorLevels(),
            'floors' => $this->getFloors(),
            'furnished_state' => $this->getFurnishedState(),
            'google_street_view' => $this->getGoogleStreetView(),
            'ground_rent' => $this->getGroundRent(),
            'gym' => $this->hasGym(),
            'lease_expiry' => $this->getLeaseExpiry(),
            'life_cycle_status' => $this->getLifeCycleStatus(),
            'listed_building_grade' => $this->getListedBuildingGrade(),
            'listing_reference' => $this->getListingReference(),
            'living_rooms' => $this->getLivingRooms(),
            'location' => $this->getLocation(),
            'loft' => $this->hasLoft(),
            'new_home' => $this->isNewHome(),
            'open_day' => $this->getOpenDay(),
            'outbuildings' => $this->hasOutbuildings(),
            'outside_space' => $this->getOutsideSpace(),
            'parking' => $this->getParking(),
            'pets_allowed' => $this->isPetsAllowed(),
            'porter_security' => $this->hasPorterSecurity(),
            'pricing' => $this->getPricing(),
            'property_type' => $this->getPropertyType(),
            'rateable_value' => $this->getRateableValue(),
            'rental_term' => $this->getRentalTerm(),
            'repossession' => $this->isRepossession(),
            'retirement' => $this->isRetirement(),
            'sap_rating' => $this->getSapRating(),
            'service_charge' => $this->getServiceCharge(),
            'serviced' => $this->isServiced(),
            'shared_accommodation' => $this->isSharedAccommodation(),
            'summary_description' => $this->getSummaryDescription(),
            'swimming_pool' => $this->hasSwimmingPool(),
            'tenanted' => $this->isTenanted(),
            'tenant_eligibility' => $this->getTenantEligibility(),
            'tennis_court' => $this->hasTennisCourt(),
            'tenure' => $this->getTenure(),
            'total_bedrooms' => $this->getTotalBedrooms(),
            'utility_room' => $this->hasUtilityRoom(),
            'waterfront' => $this->isWaterfront(),
            'wood_floors' => $this->hasWoodFloors()
        ]);
    }
}
