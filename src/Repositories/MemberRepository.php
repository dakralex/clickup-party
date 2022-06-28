<?php

namespace Dakralex\ClickupParty\Repositories;

use Dakralex\ClickupParty\Contracts\Members\MemberRepository as RepositoryContract;
use Dakralex\ClickupParty\Members\MemberCollection;

class MemberRepository implements RepositoryContract
{

    public function all(): MemberCollection
    {
        // TODO Stub. Implement actual request
        return MemberCollection::make();
    }

    public function allForWorkspace($workspace): MemberCollection
    {
        // TODO Stub. Implement actual request
        return MemberCollection::make();
    }

    public function allForTask($task): MemberCollection
    {
        // TODO Stub. Implement actual request
        return MemberCollection::make();
    }

    public function allForList($list): MemberCollection
    {
        // TODO Stub. Implement actual request
        return MemberCollection::make();
    }
}