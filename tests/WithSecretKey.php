<?php

namespace Dasundev\FilamentAccessSecret\Tests;

trait WithSecretKey
{
    private bool $withSecretKey = false;

    private string $url = '/admin/login';

    public function withSecretKey(string $key): static
    {
        $this->withSecretKey = true;

        $this->url = "/admin/$key";

        return $this;
    }
}
