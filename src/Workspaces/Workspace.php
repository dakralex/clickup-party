<?php

namespace Dakralex\ClickupParty\Workspaces;

use Dakralex\ClickupParty\Contracts\Workspaces\Workspace as Contract;
use Dakralex\ClickupParty\Data\Model;

class Workspace extends Model implements Contract
{
    public string $entityIdentifier = 'workspace';

    protected array $casts = [
        'id' => 'int',
        'name' => 'string',
        'color' => 'string',
        'avatar' => 'string'
    ];

    public function getMembers()
    {
        // TODO Stub getMembers method
        return $this->getProperty('members');
    }
}
