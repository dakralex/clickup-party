<?php

namespace Dakralex\ClickupParty\Contracts\Workspaces;

use Dakralex\ClickupParty\Workspaces\WorkspaceCollection;

interface WorkspaceRepository
{
    public function all(): WorkspaceCollection;

    public function find(int $id): ?Workspace;
}
