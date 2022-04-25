<?php

namespace Dakralex\ClickUpParty\Teams;

use Dakralex\ClickUpParty\Contracts\Teams\Team as Contract;
use Dakralex\ClickUpParty\Data\Deleteable;

class Team implements Contract
{
    /**
     * @readonly
     */
    public int $id;
    public string $name;
    public string $color;
    public string $avatarPath;
    public $members;
}
