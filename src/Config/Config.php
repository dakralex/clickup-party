<?php

namespace Dakralex\ClickUpParty\Config;

abstract class Config
{
    protected string $apiUrl;
    protected string $authMethod;
    protected array $authMethodData;

    public function apiUrl(): string
    {
        return $this->apiUrl;
    }

    public function authMethod(): string
    {
        return $this->authMethod;
    }

    public function authMethodData(): array
    {
        return $this->authMethodData;
    }
}
