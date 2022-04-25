<?php

namespace Dakralex\ClickUpParty\Repositories;

use Dakralex\ClickUpParty\Contracts\Teams\Team;
use Dakralex\ClickUpParty\Contracts\Teams\TeamRepository as RepositoryContract;
use Dakralex\ClickUpParty\Teams\TeamCollection;

class TeamRepository implements RepositoryContract
{
    public function all(): TeamCollection
    {
        // TODO Stub. Implement actual request
        return TeamCollection::make();
    }

    public function find(int $id): ?Team
    {
        // TODO Stub. Implement actual request
        return null;
    }
}
