<?php

namespace Dakralex\ClickUpParty\Contracts\Teams;

use Dakralex\ClickUpParty\Teams\TeamCollection;

interface TeamRepository
{
    public function all(): TeamCollection;

    public function find(int $id): ?Team;
}
