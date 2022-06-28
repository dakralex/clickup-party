<?php

namespace Dakralex\ClickupParty\Facades;

use Dakralex\ClickupParty\Contracts\Workspaces\Workspace;
use Dakralex\ClickupParty\Contracts\Workspaces\WorkspaceRepository;
use Dakralex\ClickupParty\Workspaces\WorkspaceCollection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static WorkspaceCollection all()
 * @method static Workspace find(int $id)
 */
class Workspaces extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WorkspaceRepository::class;
    }
}
