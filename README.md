# ZPG Realtime Feed integration for PHP

[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-coverage]][link-scrutinizer]
[![Code Quality][ico-scrutinizer]][link-scrutinizer]

## Todo (in order of priority)

- Enhance to PHP7 (or downgrade composer requirements).
- Change composer config for phpunit from `requires-dev` to `suggests`.
- Check enum's for their values on `set` instead of relying on JSON validation.
- Introduce better built in exception types and error handling.
- Use a JSON serialization library to create the request payloads instead of `\JSONSerializable`.
- Look at a Rightmove RTDF equivalent. 😇

## Install

`composer require to-be/confirmed`

## Update/Create a listing

This method allows you to describe a listing. It is used for both creation and update purposes and, in either case, the listing should be described in its entirety.

```php
        use ZpgRtf\Methods\ListingMethod;
        use ZpgRtf\Objects\BranchObject;
        use ZpgRtf\Objects\ContentObject;
        use ZpgRtf\Objects\CoordinatesObject;
        use ZpgRtf\Objects\DescriptionObject;
        use ZpgRtf\Objects\EpcRatingsObject;
        use ZpgRtf\Objects\GoogleStreetViewObject;
        use ZpgRtf\Objects\ListingObject;
        use ZpgRtf\Objects\LocationObject;
        use ZpgRtf\Objects\PricingObject;

        $listing = new ListingObject();
        $listing->setAccessibility(false)
            ->setBasement(false)
            ->setBathrooms(4)
            ->setBranchReference('branch-001')
            ->setBurglarAlarm(true)
            ->setCategory('residential')
            ->setCentralHeating('full')
            ->setChainFree(true)
            ->setConnectedUtilities(['electricity', 'fibre_optic', 'gas', 'satellite_cable_tv', 'water'])
            ->setConservatory(false)
            ->setConstructionYear(2015)
            ->setCouncilTaxBand('D')
            ->setDecorativeCondition('excellent')
            ->setDisplayAddress('Some Parade, Essex')
            ->setDoubleGlazing(true)
            ->setFeatureList(['Feature 1', 'Feature 2', 'Feature 3', 'Feature 4', 'Feature 5'])
            ->setFireplace(true)
            ->setFloorLevels(['ground', 1, 2])
            ->setFloors(3)
            ->setGroundRent(99.99)
            ->setLifeCycleStatus('available')
            ->setListingReference('listing-000001')
            ->setLivingRooms(1)
            ->setLoft(true)
            ->setOutsideSpace(['private_garden', 'terrace'])
            ->setParking(['single_garage', 'off_street_parking'])
            ->setPropertyType('town_house')
            ->setRateableValue(12000)
            ->setSummaryDescription('A well decorated house.')
            ->setTenure('freehold')
            ->setTotalBedrooms(3)
            ->setUtilityRoom(true);

        $contentsImages = [
            'http://via.placeholder.com/800x600',
            'http://via.placeholder.com/800x600/ffffff',
            'http://via.placeholder.com/800x600/000000',
        ];

        $contents = [];

        foreach ($contentsImages as $key => $image) {
            $content = new ContentObject();
            $content->setUrl($image)
                ->setCaption('image: ' . $key)
                ->setType('image');

            $contents[] = $content;
        }

        $listing->setContent($contents);

        $descriptionTexts = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut fermentum justo. Sed id magna eu ante 
mattis semper. Vivamus purus lectus, sollicitudin vitae velit feugiat, porttitor rhoncus elit.',
            'Integer rhoncus nulla quis nibh malesuada interdum. Nulla fermentum neque nec lacus ullamcorper fringilla. 
Mauris posuere quam nec erat accumsan, at sodales diam bibendum. Fusce vitae tortor purus.',
        ];

        $descriptions = [];

        foreach ($descriptionTexts as $text) {
            $description = new DescriptionObject();
            $description->setText($text);

            $descriptions[] = $description;
        }

        $listing->setDetailedDescription($descriptions);

        $epcRatings = new EpcRatingsObject();
        $epcRatings->setEerCurrentRating(84)
            ->setEerPotentialRating(92);

        $listing->setEpcRatings($epcRatings);

        $coordinates = new CoordinatesObject();
        $coordinates->setLatitude(52.0453067)
            ->setLongitude(0.7534206);

        $googleStreetView = new GoogleStreetViewObject();
        $googleStreetView->setCoordinates($coordinates)
            ->setHeading(25.84)
            ->setPitch(76.92);

        $listing->setGoogleStreetView($googleStreetView);

        $location = new LocationObject();
        $location->setPropertyNameOrNumber(9)
            ->setStreetName('Some Road')
            ->setLocality('Somefield')
            ->setTownOrCity('Somebury')
            ->setCounty('Somefolk')
            ->setPostalCode('SO10 2YA')
            ->setCountryCode('GB')
            ->setCoordinates($coordinates);

        $listing->setLocation($location);

        $pricing = new PricingObject();
        $pricing->setCurrencyCode('GBP')
            ->setPrice(289995)
            ->setPriceQualifier('from')
            ->setTransactionType('sale');

        $listing->setPricing($pricing);

        $pathToZpgCert = '../local/cert/file.pem';

        $method = new ListingMethod($pathToZpgCert);
        $response = $method->sendUpdate($listing);
```

## Delete a listing

This method allows you to remove a listing from a branch's inventory list.

```php
        use ZpgRtf\Methods\ListingMethod;
        use ZpgRtf\Objects\ListingDeleteObject;
        
        $listingDelete = new ListingDeleteObject();
        $listingDelete->setListingReference('listing-000001')
            ->setDeletionReason('withdrawn');

        $pathToZpgCert = '../local/cert/file.pem';

        $method = new ListingMethod($pathToZpgCert);
        $response = $method->sendDelete($listingDelete);
```

## List all listings

Because of the incremental nature of the service it is possible for the data that ZPG has to drift relative to yours (because of network problems or uncaught errors, for example). It is recommended that you periodically check the synchronisation of data between their system and yours. The listing/list method allows you retrieve a summary of the listing inventory for a branch and their state.

```php
        use ZpgRtf\Methods\ListingMethod;
        use ZpgRtf\Objects\BranchObject;
        
        $branch = new BranchObject();
        $branch->setBranchReference('branch-001');

        $pathToZpgCert = '../local/cert/file.pem';

        $method = new ListingMethod($pathToZpgCert);
        $response = $method->getList($branch);
```

## Update/Create a branch

This method allows you to describe a branch, to which listings are then associated. The address and other contact details allow ZPG to identify the equivalent branch on our system and map your branch_reference to theirs.

```php
        use ZpgRtf\Methods\BranchMethod;
        use ZpgRtf\Objects\BranchObject;
        use ZpgRtf\Objects\CoordinatesObject;
        use ZpgRtf\Objects\LocationObject;
        use ZpgRtf\Objects\PafAddressObject;

        $branch = new BranchObject();
        $branch->setWebsite('https://www.testagent.com/branch-name')
            ->setTelephone('02081111121')
            ->setBranchReference('branch-001')
            ->setBranchName('branch-name')
            ->setEmail('branch-name@testagent.com');

        $branchLocation = new LocationObject();
        $branchLocation->setPropertyNameOrNumber(9)
            ->setStreetName('Some Road')
            ->setLocality('Somefield')
            ->setTownOrCity('Somebury')
            ->setCounty('Somefolk')
            ->setPostalCode('SO10 2YA')
            ->setCountryCode('GB');

        $branchCoordinates = new CoordinatesObject();
        $branchCoordinates->setLatitude(52.0451852)
            ->setLongitude(0.7523342);

        $branchLocation->setCoordinates($branchCoordinates);

        $branchPaf = new PafAddressObject();
        $branchPaf->setAddressKey('02341509')
            ->setOrganisationKey('00001150')
            ->setPostcodeType('S');

        $branchLocation->setPafAddress($branchPaf)
            ->setPafUdprn('00001234');

        $branch->setLocation($branchLocation);

        $pathToZpgCert = '../local/cert/file.pem';

        $method = new BranchMethod($pathToZpgCert);
        $response = $method->update($branch);
```

## Credit

It's worth mentioning that for no other reason than consistency that descriptions of methods and objects have been lifted straight from [ZPG's Real-time Listing Service documentation](https://realtime-listings.webservices.zpg.co.uk/docs/latest/documentation.html#methods).

## Contributing

Please see [code of conduct](CODE_OF_CONDUCT.md) and [contributing guide](CONTRIBUTING.md) if interested in contributing.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-travis]: https://travis-ci.org/lukeoliff/zpg-rtf-php
[link-scrutinizer]: https://scrutinizer-ci.com/g/lukeoliff/zpg-rtf-php/?branch=master

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat
[ico-travis]: https://img.shields.io/travis/lukeoliff/zpg-rtf-php/master.svg?style=flat
[ico-coverage]: https://img.shields.io/scrutinizer/coverage/g/lukeoliff/zpg-rtf-php.svg?style=flat
[ico-scrutinizer]: https://img.shields.io/scrutinizer/g/lukeoliff/zpg-rtf-php/master.svg?style=flat
