<?php

namespace Dakralex\ClickUpParty\Facades;

use Dakralex\ClickUpParty\Contracts\Teams\TeamRepository;
use Illuminate\Support\Facades\Facade;

/**
 * @method static TeamCollection all()
 * @method static Team find(int $id)
 */
class Teams extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TeamRepository::class;
    }
}
