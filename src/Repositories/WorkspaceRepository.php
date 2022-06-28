<?php

namespace Dakralex\ClickupParty\Repositories;

use Dakralex\ClickupParty\Contracts\Workspaces\Workspace;
use Dakralex\ClickupParty\Contracts\Workspaces\WorkspaceRepository as RepositoryContract;
use Dakralex\ClickupParty\Workspaces\WorkspaceCollection;

class WorkspaceRepository implements RepositoryContract
{
    public function all(): WorkspaceCollection
    {
        // TODO Stub. Implement actual request
        return WorkspaceCollection::make();
    }

    public function find(int $id): ?Workspace
    {
        // TODO Stub. Implement actual request
        return null;
    }
}
