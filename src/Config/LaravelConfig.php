<?php

namespace Dakralex\ClickUpParty\Config;

class LaravelConfig implements Config
{
    public function __construct()
    {
        $this->apiUrl = config('clickup-party.api_url');
        $this->authMethod = config('clickup-party.auth_method');
        $this->authMethodData = config('clickup-party.auth_methods')[$this->authMethod];
    }
}
