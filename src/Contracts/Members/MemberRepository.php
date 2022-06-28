<?php

namespace Dakralex\ClickupParty\Contracts\Members;

use Dakralex\ClickupParty\Members\MemberCollection;

interface MemberRepository
{
    public function all(): MemberCollection;

    public function allForWorkspace($workspace): MemberCollection;

    public function allForTask($task): MemberCollection;

    public function allForList($list): MemberCollection;
}