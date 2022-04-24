<?php

namespace Dakralex\ClickUpParty\Client;

use Dakralex\ClickUpParty\Client\Auth\Authenticator;
use Dakralex\ClickUpParty\Config\Config;
use Dakralex\ClickUpParty\Support\Str;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ClickUpApi implements Requester
{
    protected Config $config;
    protected Authenticator $authenticator;

    public function __construct(Config $config, Authenticator $authenticator)
    {
        $this->config = $config;
        $this->authenticator = $authenticator;
    }

    public function get(string $path = '', $query = null): Response
    {
        return $this->getRequest()->get($this->url($path), $query);
    }

    public function post(string $path = '', $query = null, array $data = []): Response
    {
        return $this->getRequest()->post($this->url($path, $query), $data);
    }

    public function put(string $path = '', $query = null, array $data = []): Response
    {
        return $this->getRequest()->put($this->url($path, $query), $data);
    }

    public function delete(string $path = '', $query = null, array $data = []): Response
    {
        return $this->getRequest()->delete($this->url($path, $query), $data);
    }

    protected function getRequest(): PendingRequest
    {
        $token = $this->authenticator->getToken();

        return Http::acceptJson()->withToken("$token", '');
    }

    protected function url(string $path = '', $query = null)
    {
        if (is_array($query)) {
            $query = http_build_query($query);
        }

        return Str::start($this->config->apiUrl() . $path, '/') . is_string($query) ? Str::start($query, '?') : '';
    }
}
