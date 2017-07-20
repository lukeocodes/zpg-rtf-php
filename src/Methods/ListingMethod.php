<?php

namespace ZpgRtf\Methods;

use GuzzleHttp\Psr7\Response;
use ZpgRtf\Objects\BranchObject;
use ZpgRtf\Objects\ListingObject;
use ZpgRtf\Objects\ListingDeleteObject;

/**
 * The listing method allows you to list, update or delete listings on the ZPG rtf.
 */
class ListingMethod extends AbstractMethod
{
    /** @var string */
    const UPDATE_SCHEMA = 'http://realtime-listings.webservices.zpg.co.uk/docs/v1.2/schemas/listing/update.json';

    /** @var string */
    const LIST_SCHEMA = 'http://realtime-listings.webservices.zpg.co.uk/docs/v1.2/schemas/listing/list.json';

    /** @var string */
    const DELETE_SCHEMA = 'http://realtime-listings.webservices.zpg.co.uk/docs/v1.2/schemas/listing/delete.json';

    /**
     * @param BranchObject $branchObject
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getList(BranchObject $branchObject): Response
    {
        return $this->validateAndSend(self::LIST_SCHEMA, 'listing/list', $branchObject);
    }

    /**
     * @param ListingObject $listingObject
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function sendUpdate(ListingObject $listingObject): Response
    {
        return $this->validateAndSend(self::UPDATE_SCHEMA, 'listing/update', $listingObject);
    }

    /**
     * @param ListingDeleteObject $listingDeleteObject
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function sendDelete(ListingDeleteObject $listingDeleteObject): Response
    {
        return $this->validateAndSend(self::DELETE_SCHEMA, 'listing/delete', $listingDeleteObject);
    }
}
