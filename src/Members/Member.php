<?php

namespace Dakralex\ClickupParty\Members;

use Dakralex\ClickupParty\Contracts\Members\Member as Contract;
use Dakralex\ClickupParty\Data\Model;

class Member extends Model implements Contract
{
    public string $entityIdentifier = 'member';

    protected array $casts = [
        'id' => 'int',
        'username' => 'string',
        'email' => 'string',
        'color' => 'string',
        'initials' => 'string',
        'profilePicture' => 'string',
        'profileInfo' => 'object'
    ];
}