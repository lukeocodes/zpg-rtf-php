<?php

namespace ZpgRtf\Tests\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ZpgRtf\Methods\ListingMethod;
use ZpgRtf\Objects\ContentObject;
use ZpgRtf\Objects\CoordinatesObject;
use ZpgRtf\Objects\DescriptionObject;
use ZpgRtf\Objects\EpcRatingsObject;
use ZpgRtf\Objects\GoogleStreetViewObject;
use ZpgRtf\Objects\ListingObject;
use ZpgRtf\Objects\LocationObject;
use ZpgRtf\Objects\PricingObject;

class ListingMethodTest extends TestCase
{
    public function testUpdateListingValidationPasses()
    {
        // Prepare the payload to send.
        $listing = new ListingObject();
        $listing->setAccessibility(false)
            ->setBasement(false)
            ->setBathrooms(4)
            ->setBranchReference('branch-001')
            ->setBurglarAlarm(true)
            ->setCategory('residential')
            ->setCentralHeating('full')
            ->setChainFree(true)
            ->setConnectedUtilities([
                'electricity',
                'fibre_optic',
                'gas',
                'satellite_cable_tv',
                'water',
            ])
            ->setConservatory(false)
            ->setConstructionYear(2015)
            ->setCouncilTaxBand('D')
            ->setDecorativeCondition('excellent')
            ->setDisplayAddress('Some Parade, Essex')
            ->setDoubleGlazing(true)
            ->setFeatureList([
                'Feature 1',
                'Feature 2',
                'Feature 3',
                'Feature 4',
                'Feature 5',
            ])
            ->setFireplace(true)
            ->setFloorLevels([
                'ground',
                1,
                2,
            ])
            ->setFloors(3)
            ->setGroundRent(99.99)
            ->setLifeCycleStatus('available')
            ->setListingReference('listing-000001')
            ->setLivingRooms(1)
            ->setLoft(true)
            ->setOutsideSpace([
                'private_garden',
                'terrace',
            ])
            ->setParking([
                'single_garage',
                'off_street_parking',
            ])
            ->setPropertyType('town_house')
            ->setRateableValue(12000)
            ->setSummaryDescription(
                'A well decorated house with lots of space with easy access to nearby shops and public transportation.'
            )
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

        // Start the method to handle the payload with the certificate supplied by ZPG.
        $method = new ListingMethod(__DIR__.'/../Mocks/certificate.pem');

        // We need a mock response so our tests don't actually spam ZPG.
        $mock = new MockHandler([
            new Response(200, [
                'Content-type' => 'application/json'
            ], file_get_contents(__DIR__.'/../Mocks/update_listing_200_response.json'))
        ]);

        // The mock is given to a handler stack that the client knows what to do with.
        $handler = HandlerStack::create($mock);

        // Now create a client to the method for us to send it.
        $mockClient = new Client(['handler' => $handler]);
        $method->setClient($mockClient);

        // Send the payload off to the api.
        $response = $method->sendUpdate($listing);

        $this->assertInstanceOf(
            Response::class,
            $response
        );
    }
}
