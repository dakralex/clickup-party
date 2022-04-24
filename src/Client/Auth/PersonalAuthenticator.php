<?php

namespace Dakralex\ClickUpParty\Client\Auth;

use Dakralex\ClickUpParty\Config\Config;

class PersonalAuthenticator extends Authenticator
{
    protected string $token;

    public function __construct(Config $config)
    {
        $this->token = $config->authMethodData['token'];
    }

    public function getName(): string
    {
        return 'personal';
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
