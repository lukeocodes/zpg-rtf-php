<?php

namespace ZpgRtf\Objects;

use ZpgRtf\Helpers\DateTimeHelper;

/**
 * The listing object structures the listing payload.
 */
class ListingObject implements \JsonSerializable
{
    /** @var null|bool **/
    private $accessibility;

    /** @var null|string **/
    private $administrationFees;

    /** @var null|float **/
    private $annualBusinessRates;

    /** @var null|AreasObject **/
    private $areas;

    /** @var null|int **/
    private $availableBedrooms;

    /** @var null|DateTimeHelper **/
    private $availableFromDate;

    /** @var null|bool **/
    private $basement;

    /** @var null|int **/
    private $bathrooms;

    /**
     * Array of enum (electricity, gas, internet, satellite_cable_tv, telephone, tv_licence, water)
     *
     * @var null|array
     */
    private $billsIncluded;

    /** @var null|string **/
    private $branchReference;

    /** @var null|bool **/
    private $burglarAlarm;

    /** @var null|bool **/
    private $businessForSale;

    /**
     * Array of enum (equity_loan, help_to_buy, mi_new_home, new_buy, part_buy_part_rent, shared_equity,
     * shared_ownership)
     *
     * @var null|array
     */
    private $buyerIncentives;

    /**
     * Enum (commercial, residential)
     *
     * @var null|string
     */
    private $category;

    /**
     * Enum (full, partial, none)
     *
     * @var null|string
     **/
    private $centralHeating;

    /** @var null|bool **/
    private $chainFree;

    /**
     * @see http://www.planningportal.gov.uk/permission/commonprojects/changeofuse
     *
     * @var null|array
     */
    private $commercialUseClasses;

    /**
     * Enum (electricity, fibre_optic, gas, satellite_cable_tv, telephone, water)
     *
     * @var null|array
     */
    private $connectedUtilities;

    /** @var null|bool **/
    private $conservatory;

    /** @var null|int **/
    private $constructionYear;

    /** @var null|array **/
    private $content;

    /**
     * Enum (A, B, C, D, E, F, G, H, I)
     *
     * @var null|string
     */
    private $councilTaxBand;

    /**
     * Enum (excellent, good, average, needs_modernisation)
     *
     * @var null|string
     */
    private $decorativeCondition;

    /** @var null|float **/
    private $deposit;

    /** @var null|array **/
    private $detailedDescription;

    /** @var null|string **/
    private $displayAddress;

    /** @var null|bool **/
    private $doubleGlazing;

    /** @var null|EpcRatingsObject **/
    private $epcRatings;

    /** @var null|array **/
    private $featureList;

    /** @var null|bool **/
    private $fireplace;

    /** @var null|bool **/
    private $fishingRights;

    /**
     * Enum (penthouse, <integers greater than zero>, ground, basement)
     *
     * @var null|array
     */
    private $floorLevels;

    /** @var null|int **/
    private $floors;

    /**
     * Emum (furnished, furnished_or_unfurnished, part_furnished, unfurnished)
     *
     * @var null|string
     */
    private $furnishedState;

    /** @var null|GoogleStreetViewObject **/
    private $googleStreetView;

    /** @var null|float **/
    private $groundRent;

    /** @var null|bool **/
    private $gym;

    /** @var null|LeaseExpiryObject **/
    private $leaseExpiry;

    /**
     * Enum (available, under_offer, sold_subject_to_contract, sold, let_agreed, let)
     *
     * @var null|string
     */
    private $lifeCycleStatus;

    /**
     * Enum(category_a, category_b, category_c, grade_a, grade_b, grade_b_plus, grade_one, grade_two, grade_two_star,
     * locally_listed)
     *
     * @var null|string
     */
    private $listedBuildingGrade;

    /** @var null|string **/
    private $listingReference;

    /** @var null|int **/
    private $livingRooms;

    /** @var null|LocationObject **/
    private $location;

    /** @var null|bool **/
    private $loft;

    /** @var null|bool **/
    private $newHome;

    /** @var null|DateTimeHelper **/
    private $openDay;

    /** @var null|bool **/
    private $outbuildings;

    /**
     * Enum (balcony, communal_garden, private_garden, roof_terrace, terrace)
     *
     * @var null|array
     */
    private $outsideSpace;

    /**
     * Enum (double_garage, off_street_parking, residents_parking, single_garage, underground)
     *
     * @var null|array
     */
    private $parking;

    /** @var null|bool **/
    private $petsAllowed;

    /** @var null|bool **/
    private $porterSecurity;

    /** @var null|PricingObject **/
    private $pricing;

    /** @var null|string */
    private $propertyType;

    /** @var null|float */
    private $rateableValue;

    /** @var null|MinimumContractLengthObject **/
    private $rentalTerm;

    /** @var null|bool **/
    private $repossession;

    /** @var null|bool **/
    private $retirement;

    /** @var null|int **/
    private $sapRating;

    /** @var null|ServiceChargeObject **/
    private $serviceCharge;

    /** @var null|bool **/
    private $serviced;

    /** @var null|bool **/
    private $sharedAccommodation;

    /** @var null|string **/
    private $summaryDescription;

    /** @var null|bool **/
    private $swimmingPool;

    /** @var null|bool **/
    private $tenanted;

    /** @var null|TenantEligibilityObject **/
    private $tenantEligibility;

    /** @var null|bool **/
    private $tennisCourt;

    /**
     * Enum (feudal, freehold, leasehold, share_of_freehold)
     *
     * @var null|string
     */
    private $tenure;

    /** @var null|int **/
    private $totalBedrooms;

    /** @var null|bool **/
    private $utilityRoom;

    /** @var null|bool **/
    private $waterfront;

    /** @var null|bool **/
    private $woodFloors;

    /**
     * @return null|bool
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
    public function setAccessibility(bool $accessibility): self
    {
        $this->accessibility = $accessibility;

        return $this;
    }

    /**
     * @return null|string
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
    public function setAdministrationFees(string $administrationFees): self
    {
        $this->administrationFees = $administrationFees;

        return $this;
    }

    /**
     * @return null|float
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
    public function setAnnualBusinessRates(float $annualBusinessRates): self
    {
        $this->annualBusinessRates = $annualBusinessRates;

        return $this;
    }

    /**
     * @return null|AreasObject
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
    public function setAreas(AreasObject $areas): self
    {
        $this->areas = $areas;

        return $this;
    }

    /**
     * @return null|int
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
    public function setAvailableBedrooms(int $availableBedrooms): self
    {
        $this->availableBedrooms = $availableBedrooms;

        return $this;
    }

    /**
     * @return null|DateTimeHelper
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
    public function setAvailableFromDate(DateTimeHelper $availableFromDate): self
    {
        $this->availableFromDate = $availableFromDate;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setBasement(bool $basement): self
    {
        $this->basement = $basement;

        return $this;
    }

    /**
     * @return null|int
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
    public function setBathrooms(int $bathrooms): self
    {
        $this->bathrooms = $bathrooms;

        return $this;
    }

    /**
     * @return null|array
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
    public function setBillsIncluded(array $billsIncluded): self
    {
        $this->billsIncluded = $billsIncluded;

        return $this;
    }

    /**
     * @return null|string
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
    public function setBranchReference(string $branchReference): self
    {
        $this->branchReference = $branchReference;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setBurglarAlarm(bool $burglarAlarm): self
    {
        $this->burglarAlarm = $burglarAlarm;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setBusinessForSale(bool $businessForSale): self
    {
        $this->businessForSale = $businessForSale;

        return $this;
    }

    /**
     * @return null|array
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
    public function setBuyerIncentives(array $buyerIncentives): self
    {
        $this->buyerIncentives = $buyerIncentives;

        return $this;
    }

    /**
     * @return null|string
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
    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return null|string
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
    public function setCentralHeating(string $centralHeating): self
    {
        $this->centralHeating = $centralHeating;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setChainFree(bool $chainFree): self
    {
        $this->chainFree = $chainFree;

        return $this;
    }

    /**
     * @return null|array
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
    public function setCommercialUseClasses(array $commercialUseClasses): self
    {
        $this->commercialUseClasses = $commercialUseClasses;

        return $this;
    }

    /**
     * @return null|array
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
    public function setConnectedUtilities(array $connectedUtilities): self
    {
        $this->connectedUtilities = $connectedUtilities;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setConservatory(bool $conservatory): self
    {
        $this->conservatory = $conservatory;

        return $this;
    }

    /**
     * @return null|int
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
    public function setConstructionYear(int $constructionYear): self
    {
        $this->constructionYear = $constructionYear;

        return $this;
    }

    /**
     * @return null|array
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
    public function setContent(array $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return null|string
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
    public function setCouncilTaxBand(string $councilTaxBand): self
    {
        $this->councilTaxBand = $councilTaxBand;

        return $this;
    }

    /**
     * @return null|string
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
    public function setDecorativeCondition(string $decorativeCondition): self
    {
        $this->decorativeCondition = $decorativeCondition;

        return $this;
    }

    /**
     * @return null|float
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
    public function setDeposit(float $deposit): self
    {
        $this->deposit = $deposit;

        return $this;
    }

    /**
     * @return null|array
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
    public function setDetailedDescription(array $detailedDescription): self
    {
        $this->detailedDescription = $detailedDescription;

        return $this;
    }

    /**
     * @return null|string
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
    public function setDisplayAddress(string $displayAddress): self
    {
        $this->displayAddress = $displayAddress;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setDoubleGlazing(bool $doubleGlazing): self
    {
        $this->doubleGlazing = $doubleGlazing;

        return $this;
    }

    /**
     * @return null|EpcRatingsObject
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
    public function setEpcRatings(EpcRatingsObject $epcRatings): self
    {
        $this->epcRatings = $epcRatings;

        return $this;
    }

    /**
     * @return null|array
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
    public function setFeatureList(array $featureList): self
    {
        $this->featureList = $featureList;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setFireplace(bool $fireplace): self
    {
        $this->fireplace = $fireplace;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setFishingRights(bool $fishingRights): self
    {
        $this->fishingRights = $fishingRights;

        return $this;
    }

    /**
     * @return null|array
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
    public function setFloorLevels(array $floorLevels): self
    {
        $this->floorLevels = $floorLevels;

        return $this;
    }

    /**
     * @return null|int
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
    public function setFloors(int $floors): self
    {
        $this->floors = $floors;

        return $this;
    }

    /**
     * @return null|string
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
    public function setFurnishedState(string $furnishedState): self
    {
        $this->furnishedState = $furnishedState;

        return $this;
    }

    /**
     * @return null|GoogleStreetViewObject
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
    public function setGoogleStreetView(GoogleStreetViewObject $googleStreetView): self
    {
        $this->googleStreetView = $googleStreetView;

        return $this;
    }

    /**
     * @return null|float
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
    public function setGroundRent(float $groundRent): self
    {
        $this->groundRent = $groundRent;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setGym(bool $gym): self
    {
        $this->gym = $gym;

        return $this;
    }

    /**
     * @return null|LeaseExpiryObject
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
    public function setLeaseExpiry(LeaseExpiryObject $leaseExpiry): self
    {
        $this->leaseExpiry = $leaseExpiry;

        return $this;
    }

    /**
     * @return null|string
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
    public function setLifeCycleStatus(string $lifeCycleStatus): self
    {
        $this->lifeCycleStatus = $lifeCycleStatus;

        return $this;
    }

    /**
     * @return null|string
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
    public function setListedBuildingGrade(string $listedBuildingGrade): self
    {
        $this->listedBuildingGrade = $listedBuildingGrade;

        return $this;
    }

    /**
     * @return null|string
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
    public function setListingReference(string $listingReference): self
    {
        $this->listingReference = $listingReference;

        return $this;
    }

    /**
     * @return null|int
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
    public function setLivingRooms(int $livingRooms): self
    {
        $this->livingRooms = $livingRooms;

        return $this;
    }

    /**
     * @return null|LocationObject
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
    public function setLocation(LocationObject $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setLoft(bool $loft): self
    {
        $this->loft = $loft;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setNewHome(bool $newHome): self
    {
        $this->newHome = $newHome;

        return $this;
    }

    /**
     * @return null|DateTimeHelper
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
    public function setOpenDay(DateTimeHelper $openDay): self
    {
        $this->openDay = $openDay;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setOutbuildings(bool $outbuildings): self
    {
        $this->outbuildings = $outbuildings;

        return $this;
    }

    /**
     * @return null|array
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
    public function setOutsideSpace(array $outsideSpace): self
    {
        $this->outsideSpace = $outsideSpace;

        return $this;
    }

    /**
     * @return null|array
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
    public function setParking(array $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setPetsAllowed(bool $petsAllowed): self
    {
        $this->petsAllowed = $petsAllowed;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setPorterSecurity(bool $porterSecurity): self
    {
        $this->porterSecurity = $porterSecurity;

        return $this;
    }

    /**
     * @return null|PricingObject
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
    public function setPricing(PricingObject $pricing): self
    {
        $this->pricing = $pricing;

        return $this;
    }

    /**
     * @return null|string
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
    public function setPropertyType(string $propertyType): self
    {
        $this->propertyType = $propertyType;

        return $this;
    }

    /**
     * @return null|float
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
    public function setRateableValue(float $rateableValue): self
    {
        $this->rateableValue = $rateableValue;

        return $this;
    }

    /**
     * @return null|MinimumContractLengthObject
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
    public function setRentalTerm(MinimumContractLengthObject $rentalTerm): self
    {
        $this->rentalTerm = $rentalTerm;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setRepossession(bool $repossession): self
    {
        $this->repossession = $repossession;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setRetirement(bool $retirement): self
    {
        $this->retirement = $retirement;

        return $this;
    }

    /**
     * @return null|int
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
    public function setSapRating(int $sapRating): self
    {
        $this->sapRating = $sapRating;

        return $this;
    }

    /**
     * @return null|ServiceChargeObject
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
    public function setServiceCharge(ServiceChargeObject $serviceCharge): self
    {
        $this->serviceCharge = $serviceCharge;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setServiced(bool $serviced): self
    {
        $this->serviced = $serviced;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setSharedAccommodation(bool $sharedAccommodation): self
    {
        $this->sharedAccommodation = $sharedAccommodation;

        return $this;
    }

    /**
     * @return null|string
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
    public function setSummaryDescription(string $summaryDescription): self
    {
        $this->summaryDescription = $summaryDescription;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setSwimmingPool(bool $swimmingPool): self
    {
        $this->swimmingPool = $swimmingPool;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setTenanted(bool $tenanted): self
    {
        $this->tenanted = $tenanted;

        return $this;
    }

    /**
     * @return null|TenantEligibilityObject
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
    public function setTenantEligibility(TenantEligibilityObject $tenantEligibility): self
    {
        $this->tenantEligibility = $tenantEligibility;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setTennisCourt(bool $tennisCourt): self
    {
        $this->tennisCourt = $tennisCourt;

        return $this;
    }

    /**
     * @return null|string
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
    public function setTenure(string $tenure): self
    {
        $this->tenure = $tenure;

        return $this;
    }

    /**
     * @return null|int
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
    public function setTotalBedrooms(int $totalBedrooms): self
    {
        $this->totalBedrooms = $totalBedrooms;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setUtilityRoom(bool $utilityRoom): self
    {
        $this->utilityRoom = $utilityRoom;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setWaterfront(bool $waterfront): self
    {
        $this->waterfront = $waterfront;

        return $this;
    }

    /**
     * @return null|bool
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
    public function setWoodFloors(bool $woodFloors): self
    {
        $this->woodFloors = $woodFloors;

        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize(): array
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
