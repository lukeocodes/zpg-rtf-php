<?php

namespace ZpgRtf\Methods;

use League\JsonGuard\Validator;
use League\JsonReference\Dereferencer;
use ZpgRtf\Objects\BranchObject;

/**
 * The branch method allows you to update a branch.
 */
class BranchMethod extends AbstractMethod implements MethodInterface
{
    /** @var string */
    const UPDATE_SCHEMA = 'http://realtime-listings.webservices.zpg.co.uk/docs/v1.2/schemas/branch/update.json';

    /** @var string */
    const UPDATE_URI = 'branch/update';

    /**
     * @return bool
     *
     * @throws \Exception If validation fails. Needs a custom exception type.
     */
    public function update(BranchObject $branchObject)
    {
        $payload = json_encode($branchObject);
        $schema = Dereferencer::draft4()->dereference(self::UPDATE_SCHEMA);
        $validator = new Validator(json_decode($payload), $schema);

        if ($validator->fails()) {
            throw new \Exception('Fails validation');
        }

        $result = $this->getClient()->request('POST', self::UPDATE_URI, [
            'body' => $payload
        ]);

        return $result;
    }
}
