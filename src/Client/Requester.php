<?php

namespace Dakralex\ClickUpParty\Client;

use Illuminate\Http\Client\Response;

interface Requester
{
    public function get(string $path = '', $query = null): Response;

    public function post(string $path = '', $query = null, array $data = []): Response;

    public function put(string $path = '', $query = null, array $data = []): Response;

    public function delete(string $path = '', $query = null, array $data = []): Response;
}
