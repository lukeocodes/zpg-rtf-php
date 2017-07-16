# ZPG Realtime Feed integration for PHP

[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-coverage]][link-scrutinizer]
[![SensioLabs Insight][ico-sensio]][link-sensio]
[![Code Climate][ico-climate]][link-climate]
[![Code Quality][ico-scrutinizer]][link-scrutinizer]

## Install

`composer require to-be/confirmed`

:)

## Update/Create a branch

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

        $method = new BranchMethod($pathToZpgCert);
        $response = $method->update($branch);
```

## Contributing

Please see [code of conduct](CODE_OF_CONDUCT.md) and [contributing guide](CONTRIBUTING.md) if interested in contributing.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-travis]: https://travis-ci.org/lukeoliff/zpg-rtf-php
[link-sensio]: https://insight.sensiolabs.com/projects/db952452-4122-40db-82c3-26d495842dd6
[link-climate]: https://codeclimate.com/github/lukeoliff/zpg-rtf-php
[link-scrutinizer]: https://scrutinizer-ci.com/g/lukeoliff/zpg-rtf-php/?branch=master

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat
[ico-travis]: https://img.shields.io/travis/lukeoliff/zpg-rtf-php/master.svg?style=flat
[ico-coverage]: https://img.shields.io/scrutinizer/coverage/g/lukeoliff/zpg-rtf-php.svg?style=flat
[ico-sensio]: https://img.shields.io/sensiolabs/i/db952452-4122-40db-82c3-26d495842dd6.svg?style=flat
[ico-climate]: https://img.shields.io/codeclimate/github/lukeoliff/zpg-rtf-php.svg?style=flat
[ico-scrutinizer]: https://img.shields.io/scrutinizer/g/lukeoliff/zpg-rtf-php/master.svg?style=flat
