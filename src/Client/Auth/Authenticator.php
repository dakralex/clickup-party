<?php

namespace Dakralex\ClickUpParty\Client\Auth;

interface Authenticator
{
    public function getName(): string;

    public function getToken(): string;
}
